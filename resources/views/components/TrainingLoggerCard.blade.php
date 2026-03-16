<div
    class="bg-gray-800 rounded-xl p-6 shadow-lg"
    role="dialog"
    aria-labelledby="training-form-title"
>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">

        <h2
            id="training-form-title"
            class="text-2xl font-semibold montserrat"
        >
            Add Training Session
        </h2>

        <!-- Close -->
        <button
            type="button"
            data-training-close
            aria-label="Close training form"
            class="text-red-700 hover:text-red-500 focus:outline-none focus:ring"
        >
            <x-heroicon-m-x-circle class="h-7 w-7"/>
        </button>

    </div>

    <!-- Form -->
    <form
        class="space-y-4"
        data-training-form
        autocomplete="off"
    >
    @csrf

        <fieldset class="space-y-4">

            <!-- Activity -->
            <div>
                <label
                    for="activity"
                    class="block text-sm font-medium mb-1"
                >
                    Activity / Technique
                </label>

                <input
                    type="text"
                    id="activity"
                    name="activity"
                    required
                    placeholder="e.g. Shadowboxing, Kicks, Kata, Running"
                    class="w-full p-2 rounded-md bg-gray-700 text-white
                           border border-gray-600
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <!-- Notes -->
            <div>
                <label
                    for="notes"
                    class="block text-sm font-medium mb-1"
                >
                    Notes
                </label>

                <textarea
                    id="notes"
                    name="notes"
                    rows="3"
                    placeholder="What went well? What needs improvement?"
                    class="w-full p-2 rounded-md bg-gray-700 text-white
                           border border-gray-600
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>

        </fieldset>

        <!-- Actions -->
        <div class="flex gap-2 pt-2">

            <button
                type="submit"
                class="px-4 py-2 rounded bg-blue-600 text-white
                       hover:bg-blue-700 transition"
            >
                Save Training
            </button>

            <button
                type="button"
                data-training-edit
                class="px-4 py-2 rounded bg-yellow-500 text-black
                       hover:bg-yellow-600 transition"
            >
                Edit
            </button>

        </div>

    </form>

</div>
