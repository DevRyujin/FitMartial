{{-- Training Info Wrapper - Fully Reactive with Pagination --}}
{{-- Script must be defined BEFORE the x-data uses it --}}
<script>
function trainingInfoComponent() {
        console.log('=== TrainingInfo Component Init ===');

        return {
            entries: [],
            currentPage: 1,
            pageSize: 9,
            editing: false,
            editEntry: { id: '', training_date: '', activity: '', notes: '' },

            get totalPages() {
                return Math.max(1, Math.ceil(this.entries.length / this.pageSize));
            },

            get paginatedEntries() {
                const start = (this.currentPage - 1) * this.pageSize;
                const end = start + this.pageSize;
                return this.entries.slice(start, end);
            },

            init() {
                // Expose global function for calendar to trigger updates
                window.updateTrainingEntries = () => this.refreshEntries();
                console.log('TrainingInfo initialized');
                // Fetch initial data
                this.refreshEntries();
            },

            async refreshEntries() {
                console.log('refreshEntries called');
                try {
                    const response = await fetch('/training-entries', {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        credentials: 'same-origin',
                    });

                    if (!response.ok) throw new Error('Failed to fetch');

                    const data = await response.json();
                    this.entries = data.entries;
                    this.currentPage = 1;
                    console.log('Entries refreshed:', this.entries.length);
                    console.log('Updated entries:', this.entries);
                } catch (error) {
                    console.error('Error refreshing training entries:', error);
                }
            }
        };
    }
</script>

<div class="w-full" x-data="trainingInfoComponent()" x-init="init()">

    {{-- Header Block --}}
    <div class="bg-gray-800 rounded-xl px-6 py-4 shadow-lg">
        <h2 class="text-2xl font-semibold montserrat">
            Training Information
        </h2>
    </div>

    {{-- Cards Grid - Paginated via Alpine --}}
    <template x-if="entries && entries.length > 0">
        <div class="mt-6">
            <div class="grid grid-cols-3 gap-6 justify-items-center">
                <template x-for="entry in paginatedEntries" :key="entry.id">
                    <div
                        x-transition
                        @click="editEntry = { ...entry }; editing = true"
                        class="bg-gray-800 p-6 rounded-xl shadow-md w-full max-w-sm
                            hover:scale-[1.03] transition-transform duration-200 flex flex-col cursor-pointer"
                        :class="{ 'ring-2 ring-blue-500': entry.is_today }"
                    >
                        <h3 class="text-lg font-semibold text-white montserrat" x-text="entry.activity"></h3>
                        <p class="text-md font-light text-gray-300 mt-2 poppins-regular flex-grow line-clamp-3" x-text="entry.notes"></p>
                        <p class="text-sm text-gray-500 mt-4 poppins-regular" x-text="entry.formatted_date"></p>
                    </div>
                </template>
            </div>

            {{-- DaisyUI Pagination --}}
            <template x-if="totalPages > 1">
                <div class="flex justify-center mt-8">
                    <div class="join mx-5">
                        <button
                            class="join-item btn btn-lg w-7"
                            @click="currentPage = Math.max(1, currentPage - 1)"
                            :disabled="currentPage === 1"
                        >
                            <svg class="w-5 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <span class="join-item px-4 py-2 flex items-center">
                            Page <span x-text="currentPage" class="mx-1"></span> of <span x-text="totalPages" class="mx-1"></span>
                        </span>
                        <button
                            class="join-item btn btn-lg w-7"
                            @click="currentPage = Math.min(totalPages, currentPage + 1)"
                            :disabled="currentPage === totalPages"
                        >
                            <svg class="w-5 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </template>

    {{-- Empty State --}}
    <template x-if="entries && entries.length === 0">
        <div class="mt-6 bg-gray-800 rounded-lg p-4">
            <p class="text-gray-400">No training sessions logged yet.</p>
        </div>
    </template>

    {{-- Edit Modal --}}
    <div x-show="editing" x-transition @click.away="editing = false" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <form method="POST" :action="'/training/' + editEntry.id" @submit="editing = false" class="bg-gray-800 p-6 rounded-lg shadow-md max-w-md w-full mx-4">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold lexend-zetta">Edit Training Session</h2>
                <button type="button" @click="editing = false" class="text-gray-400 hover:text-white transition">
                    <x-heroicon-o-x-mark class="w-6 h-6" />
                </button>
            </div>

            <div class="mb-4 poppins-regular">
                <label for="training_date" class="block text-sm font-medium text-gray-300 mb-1">Training Date</label>
                <input type="date" id="training_date" name="training_date" x-model="editEntry.training_date" class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 poppins-regular">
                <label for="activity" class="block text-sm font-medium text-gray-300 mb-1">Activity</label>
                <input type="text" id="activity" name="activity" x-model="editEntry.activity" class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-4 poppins-regular">
                <label for="notes" class="block text-sm font-medium text-gray-300 mb-1">Notes</label>
                <textarea id="notes" name="notes" rows="4" x-model="editEntry.notes" class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save Changes</button>
                <button type="button" @click="editing = false" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
            </div>
        </form>
    </div>

</div>