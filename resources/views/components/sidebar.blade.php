<aside class="bg-gray-900 text-white fixed top-0 left-0 h-screen w-64 flex flex-col shadow-lg">

    <!-- Logo / Header -->
    <div class="p-6 border-b border-gray-700">
        <h2 class="text-2xl font-bold lexend-zetta">FitMartial</h2>
    </div>

    <!-- Scrollable Navigation -->
    <ul class="flex-1 overflow-y-auto p-4 space-y-2 poppins-regular">

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-user-circle-bold-duotone class="h-7 w-7"/>
            My Profile
        </a>

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-home-smile-broken class="h-7 w-7"/>
            Dashboard
        </a>

        <a href="{{ route('home') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-home-smile-broken class="h-7 w-7"/>
            Home
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-users-group-two-rounded-line-duotone class="h-7 w-7"/>
            Community
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-planet-outline class="h-7 w-7"/>
            Explore
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-gallery-minimalistic-broken class="h-7 w-7"/>
            My Posts
        </a>

        <a href="{{ route('tracker') }}"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-meditation-bold-duotone class="h-7 w-7"/>
            Training Tracker
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-notes-minimalistic-bold-duotone class="h-7 w-7"/>
            Personal Notes
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-infinity-broken class="h-7 w-7"/>
            Progress Overview
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition">
            <x-solar-album-line-duotone class="h-7 w-7"/>
            Saved Posts
        </a>

    </ul>

    <!-- Bottom Sticky Section -->
    <div x-data="{ open: false }" class="relative p-4 border-t border-gray-700">

        <!-- More Button -->
        <button
            @click="open = !open"
            type="button"
            class="w-full flex items-center gap-3 px-4 py-2 rounded-xl hover:bg-gray-800 transition"
        >
            <x-solar-hamburger-menu-broken class="h-7 w-7"/>
            More
        </button>

        <!-- Dropdown Card -->
        <div
            x-show="open"
            x-transition
            @click.outside="open = false"
            class="absolute bottom-16 left-4 right-4 bg-gray-800 rounded-xl shadow-xl poppins-regular overflow-hidden"
        >
            <li class="divide-y divide-gray-700 text-sm">

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition">
                    <x-solar-settings-minimalistic-broken class="h-7 w-7"/>
                    Settings
                </a>

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition">
                    <x-heroicon-o-shield-exclamation class="h-7 w-7"/>
                    Privacy
                </a>

                <!-- Logout MUST be a POST form in Laravel -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 hover:bg-gray-700 transition text-red-400 text-left">
                        <x-solar-logout-3-broken class="h-7 w-7"/>
                        {{ __('Log Out') }}
                    </button>
                </form>

            </li>
        </div>

    </div>

</aside>
