{{-- Training Info Wrapper --}}
<div class="w-full"
     x-data="{ currentPage: 1, totalPages: {{ ceil($trainingEntries->count() / 9) }}, editing: false, editEntry: { id: '', training_date: '', activity: '', notes: '' } }">

    {{-- Header Block --}}
    <div class="bg-gray-800 rounded-xl px-6 py-4 shadow-lg">
        <h2 class="text-2xl font-semibold montserrat">
            Training Information
        </h2>
    </div>

    <div class="mt-6">

        @if($trainingEntries->count())

            {{-- Cards Grid --}}
            <div class="grid grid-cols-3 gap-6 justify-items-center">

                @foreach ($trainingEntries as $index => $entry)

                    <div
                        x-show="$el.dataset.page == currentPage"
                        data-page="{{ intval($index / 9) + 1 }}"
                        x-transition
                        @click="editing = true; editEntry = { 
                            id: {{ $entry->id }}, 
                            training_date: '{{ $entry->training_date->format('Y-m-d') }}', 
                            activity: '{{ addslashes($entry->activity) }}', 
                            notes: '{{ addslashes($entry->notes) }}'
                        }"
                        class="bg-gray-800 p-6 rounded-xl shadow-md w-full max-w-sm
                            hover:scale-[1.03] transition-transform duration-200 flex flex-col cursor-pointer
                            {{ $entry->training_date->isToday() ? 'ring-2 ring-blue-500' : '' }}"
                    >
                        <h3 class="text-lg font-semibold text-white montserrat">
                            {{ $entry->activity }}
                        </h3>

                        <p class="text-md font-light text-gray-300 mt-2 poppins-regular flex-grow line-clamp-3">
                            {{ $entry->notes }}
                        </p>

                        <p class="text-sm text-gray-500 mt-4 poppins-regular">
                            {{ $entry->training_date->format('M d, Y') }}
                        </p>

                    </div>

                @endforeach

            </div>

            {{-- Edit Modal --}}
            <div x-show="editing" x-transition @click.away="editing = false" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <form method="POST" x-bind:action="'/training/' + editEntry.id" class="bg-gray-800 p-6 rounded-lg shadow-md max-w-md w-full mx-4">
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
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Save Changes</button>  
                        <button type="button" @click="editing = false" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                    </div>
                </form>
            </div>

            {{-- DaisyUI Pagination --}}
            @if($trainingEntries->count() > 9)

                <div class="flex justify-center mt-8">

                    <div class="join mx-5">

                        {{-- Previous --}}
                        <button
                            class="join-item btn btn-lg w-7"
                            @click="currentPage = Math.max(1, currentPage - 1)"
                            :disabled="currentPage === 1"
                        >
                            <x-heroicon-o-chevron-left class="w-5 h-4"/>
                        </button>

                        {{-- Page Indicator --}}
                        <span class="join-item px-4 py-2 flex items-center">
                            Page <span x-text="currentPage"></span> / <span x-text="totalPages"></span>
                        </span>

                        {{-- Next --}}
                        <button
                            class="join-item btn btn-lg w-7"
                            @click="currentPage = Math.min(totalPages, currentPage + 1)"
                            :disabled="currentPage === totalPages"
                        >
                            <x-heroicon-o-chevron-right class="w-5 h-4"/>
                        </button>

                    </div>

                </div>

            @endif

        @else

            {{-- Empty State --}}
            <div class="mt-4 bg-gray-800 rounded-lg p-4">
                <p class="text-gray-400">
                    No training sessions logged yet.
                </p>
            </div>

        @endif

    </div>

</div>