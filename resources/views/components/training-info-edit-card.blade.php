@props(['show' => false, 'entry' => []])

<div x-data="{ show: {{ $show ? 'true' : 'false' }}, entry: {{ json_encode($entry) }} }" x-show="show" x-transition @click.away="$dispatch('close-edit')" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <form method="POST" x-bind:action="'/training/' + entry.id" class="bg-gray-800 p-6 rounded-lg shadow-md max-w-md w-full mx-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold lexend-zetta">Edit Training Session</h2>
            <button type="button" @click="$dispatch('close-edit')" class="text-gray-400 hover:text-white transition">
                <x-heroicon-o-x-mark class="w-6 h-6" />
            </button>
        </div>
        

        <div class="mb-4 poppins-regular">
            <label for="training_date" class="block text-sm font-medium text-gray-300 mb-1">
                Training Date
            </label>

            <input
                type="date"
                id="training_date"
                name="training_date"
                x-model="entry.training_date"
                readonly
                class="w-full px-3 py-2 bg-gray-700 text-gray-400 rounded cursor-not-allowed"
            >
        </div>
        <div class="mb-4 poppins-regular">
            <label for="activity" class="block text-sm font-medium text-gray-300 mb-1">Activity</label>
            <input type="text" id="activity" name="activity" x-model="entry.activity" class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4 poppins-regular">
            <label for="notes" class="block text-sm font-medium text-gray-300 mb-1">Notes</label>
            <textarea id="notes" name="notes" rows="4" x-model="entry.notes" class="w-full px-3 py-2 bg-gray-700 text-white rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>  
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Save Changes</button>  
            <button type="button" @click="$dispatch('close-edit')" class="ml-2 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
        </div>
    </form>
</div>