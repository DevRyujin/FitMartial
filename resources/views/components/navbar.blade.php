<header class="flex justify-between items-center p-4 px-20">
    <!-- LOGO -->
    <h1 class="font-semibold text-3xl lexend-zetta">
        <a href="{{ route('LandingPage') }}">FitMartial</a>
    </h1>

    <!-- NAVIGATION -->
    <nav>
        <ul class="flex items-center gap-6 font-medium montserrat">

            <!-- AUTH LINKS -->
            <li>
                <a href="{{ route('register') }}" class="leading-[2.47rem]">
                    Sign Up
                </a>
            </li>

            <li>
                <a href="{{ route('login') }}" class="btn bg-blue-600 text-white">
                    Login
                </a>
            </li>

        </ul>
    </nav>
</header>