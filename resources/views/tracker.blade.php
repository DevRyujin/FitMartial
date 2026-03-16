<x-app-layout>
    <x-slot:title>Tracker</x-slot:title>

    <div class="pl-0 lg:pl-90 max-w-7xl mx-auto p-6 min-h-screen">

        <h1 class="text-3xl text-center font-bold lexend-zetta mb-2 text-white">
            Your Training Tracker
        </h1>

        <p class="poppins-regular text-center text-gray-300 mb-6">
            Track your training sessions, monitor your progress, and stay motivated.
        </p>

        <!-- Calendar -->
        <section
            data-calendar
            class="relative max-w-4xl mx-auto bg-gray-800 rounded-xl p-4"
        >

            <!-- Header -->
            <div class="flex items-center justify-between mb-4 gap-2">

                <!-- Prev -->
                <button
                    data-calendar-prev
                    aria-label="Previous Month"
                    class="p-2 text-gray-400 hover:text-white focus:ring rounded"
                >
                    <x-heroicon-o-chevron-left class="h-5 w-5"/>
                </button>

                <!-- Month / Year (clickable) -->
                <button
                    data-calendar-picker
                    type="button"
                    class="flex items-center gap-2 text-lg sm:text-xl font-semibold montserrat
                           hover:text-blue-400 hover:underline focus:ring rounded"
                >
                    <span data-calendar-month-year></span>
                    <x-solar-calendar-bold-duotone class="h-4 w-4 sm:h-5 sm:w-5"/>
                </button>

                <!-- Next -->
                <button
                    data-calendar-next
                    aria-label="Next Month"
                    class="p-2 text-gray-400 hover:text-white focus:ring rounded"
                >
                    <x-heroicon-o-chevron-right class="h-5 w-5"/>
                </button>
            </div>

            <!-- Picker Panel -->
            <div
                data-calendar-picker-panel
                class="absolute top-16 left-1/2 -translate-x-1/2 z-50
                       w-64 bg-gray-900 rounded-xl shadow-lg p-4 hidden"
            >
                <!-- Months -->
                <div class="grid grid-cols-3 gap-2 mb-4 text-center text-sm">
                    @foreach (['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'] as $i => $m)
                        <button
                            data-month="{{ $i }}"
                            class="py-1 rounded hover:bg-gray-700 transition"
                        >
                            {{ $m }}
                        </button>
                    @endforeach
                </div>

                <!-- Year Controls -->
                <div class="flex items-center justify-between">
                    <button data-year-prev class="hover:text-blue-400">
                        <x-heroicon-c-chevron-left class="h-7 w-7"/>
                    </button>
                    <span data-picker-year class="font-semibold"></span>
                    <button data-year-next class="hover:text-blue-400">
                        <x-heroicon-c-chevron-right class="h-7 w-7"/>
                    </button>
                </div>
            </div>

            <!-- Weekdays -->
            <div class="grid grid-cols-7 text-center text-sm font-medium text-gray-400 mb-2">
                <span>Sun</span><span>Mon</span><span>Tue</span>
                <span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
            </div>

            <!-- Days -->
            <div data-calendar-grid class="grid grid-cols-7 gap-2"></div>

            <!-- Day Training Overlay -->
            <div
                data-training-overlay
                class="absolute inset-0 bg-black/60 z-50 hidden
                    flex items-center justify-center p-4"
            >

                <!-- Training Card -->
                <div class="w-full max-w-md">
                    {{-- Training Logger Card --}}
                    @include('components.TrainingLoggerCard')
                </div>

            </div>

        </section>
        
        <div class="max-w-4xl mx-auto mt-6">
            @include('components.TrainingInfo')
        </div>

        <div class="mx-auto mt-6">
            @include('components.training-info-edit-card')
        </div>
    </div>
</x-app-layout>
