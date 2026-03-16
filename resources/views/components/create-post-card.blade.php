<div class="card bg-gray-900 border border-gray-800 shadow-xl rounded-2xl">
    <div class="card-body p-5"

        x-data="{
            content: '',
            showPicker: false,

            imageFiles: [],
            imagePreviews: [],

            addEmoji(e) {
                this.content += e.detail.unicode;
            },

            pickImages(event) {
                const files = Array.from(event.target.files);
                if (!files.length) return;

                files.forEach(file => {
                    this.imageFiles.push(file);
                    this.imagePreviews.push(URL.createObjectURL(file));
                });

                this.syncFiles();
            },

            removeImage(index) {
                if (this.imagePreviews[index]) {
                    URL.revokeObjectURL(this.imagePreviews[index]);
                }

                this.imageFiles.splice(index, 1);
                this.imagePreviews.splice(index, 1);

                this.syncFiles();
            },

            syncFiles() {
                const dt = new DataTransfer();

                this.imageFiles.forEach(file => dt.items.add(file));

                this.$refs.fileInput.files = dt.files;
            }
        }"
    >

        <!-- HEADER -->
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold montserrat">
                Create Post
            </h2>
        </div>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- TEXT -->
            <textarea
                name="content"
                x-model="content"
                rows="3"
                class="w-full bg-transparent text-gray-200 text-lg placeholder-gray-500 resize-none border-0 focus:ring-0"
                placeholder="Share your training progress..."
            ></textarea>

            <!-- ACTION BUTTONS -->
            <div class="flex justify-end gap-3 mt-3">

                <!-- EMOJI -->
                <div class="relative">
                    <button
                        type="button"
                        @click="showPicker = !showPicker"
                        class="h-10 w-10 rounded-lg bg-gray-800 hover:bg-gray-700 flex items-center justify-center"
                    >
                        <x-solar-emoji-funny-circle-outline class="h-7 w-7"/>
                    </button>

                    <div
                        x-show="showPicker"
                        @click.outside="showPicker = false"
                        class="absolute right-0 mt-2 z-50"
                    >
                        <emoji-picker @emoji-click="addEmoji($event)"></emoji-picker>
                    </div>
                </div>

                <!-- IMAGE INPUT -->
                <label
                    class="h-10 w-10 rounded-lg bg-gray-800 hover:bg-gray-700 cursor-pointer flex items-center justify-center"
                >
                    <x-solar-album-bold class="h-7 w-7"/>

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        accept="image/*"
                        class="hidden"
                        x-ref="fileInput"
                        @change="pickImages"
                    >
                </label>

            </div>

            <!-- PREVIEWS -->
            <div x-show="imagePreviews.length" class="mt-3 grid grid-cols-2 gap-3">

                <template x-for="(preview, index) in imagePreviews" :key="preview">

                    <div class="relative">

                        <img
                            :src="preview"
                            class="w-full h-40 object-cover rounded-xl border border-gray-800"
                        >

                        <button
                            type="button"
                            @click="removeImage(index)"
                            class="absolute top-2 right-2 bg-black/60 text-white w-7 h-7 rounded-full"
                        >
                            ✕
                        </button>

                    </div>

                </template>

            </div>

            <!-- POST BUTTON -->
            <button
                type="submit"
                :disabled="!content.trim() && imageFiles.length === 0"
                :class="(!content.trim() && imageFiles.length === 0)
                    ? 'opacity-50 cursor-not-allowed'
                    : ''"
                class="w-full mt-4 bg-blue-700 hover:bg-blue-600 text-white rounded-lg py-2"
            >
                Post
            </button>

        </form>

    </div>
</div>
