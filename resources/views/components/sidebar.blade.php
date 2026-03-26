<aside class="relative group bg-black-900 text-white fixed sticky top-0 left-0 h-screen w-20 hover:w-64 transition-all duration-300 flex flex-col shadow-lg overflow-hidden overflow-x-hidden ">

    <!-- Logo / Header -->
    <div class="p-6 flex items-center gap-3">
        <h2 class="text-2xl font-bold lexend-zetta opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap">
            FitMartial
        </h2>
    </div>

    <!-- Navigation -->
    <ul class="flex-1 overflow-y-auto overflow-x-hidden p-4 space-y-2 poppins-regular">

        <!-- Profile -->
        <a href="{{ route('profile.edit') }}"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-user-circle-bold-duotone class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                My Profile
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                My Profile
            </span>
        </a>

        <!-- Home -->
        <a href="{{ route('home') }}"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-home-smile-broken class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Home
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Home
            </span>
        </a>

        <!-- Community -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-users-group-two-rounded-line-duotone class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Community
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Community
            </span>
        </a>

        <!-- Explore -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-planet-outline class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Explore
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Explore
            </span>
        </a>

        <!-- My Posts -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-gallery-minimalistic-broken class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                My Posts
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                My Posts
            </span>
        </a>

        <!-- Training Tracker -->
        <a href="{{ route('tracker') }}"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-meditation-bold-duotone class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Training Tracker
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Training Tracker
            </span>
        </a>

        <!-- Calorie Tracker -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-weigher-outline class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Calorie Tracker
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Calorie Tracker
            </span>
        </a>

        <!-- Personal Notes -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-notes-minimalistic-bold-duotone class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Personal Notes
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Personal Notes
            </span>
        </a>

        <!-- Progress -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-infinity-broken class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Progress Overview
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Progress Overview
            </span>
        </a>

        <!-- Saved -->
        <a href="#"
           class="relative flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item min-w-0">
            <x-solar-bell-outline class="h-7 w-7 shrink-0"/>
            <span class="opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
                Notifications
            </span>
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                Notifications
            </span>
        </a>

    </ul>

    <!-- Bottom Section -->
    <div x-data="{ open: false }" class="relative p-4">

        <button @click="open = !open"
            class="relative w-full flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition group/item">
            
            <x-solar-hamburger-menu-broken class="h-7 w-7 shrink-0"/>

            <span class="opacity-0 group-hover:opacity-100 transition">
                More
            </span>

            <!-- Tooltip -->
            <span class="absolute left-full ml-2 bg-gray-800 text-sm px-2 py-1 rounded shadow-lg
                         opacity-0 translate-x-2 
                         group-hover/item:opacity-100 group-hover/item:translate-x-0
                         group-hover:opacity-0
                         pointer-events-none transition">
                More
            </span>
        </button>

        <!-- Dropdown -->
        <div x-show="open" x-transition @click.outside="open = false"
            class="absolute bottom-16 left-4 right-4 bg-gray-800 rounded-xl shadow-xl overflow-hidden">

            <li class="divide-y divide-gray-700 text-sm">

                <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition min-w-0">
                    <x-solar-settings-minimalistic-broken class="h-7 w-7"/>
                    Settings
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition min-w-0">
                    <x-heroicon-o-shield-exclamation class="h-7 w-7"/>
                    Privacy
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition text-red-400 text-left">
                        <x-solar-logout-3-broken class="h-7 w-7"/>
                        Log Out
                    </button>
                </form>

            </li>
        </div>

    </div>

</aside>