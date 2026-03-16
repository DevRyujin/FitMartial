<x-guest-layout>
    <x-slot:title>
        Sign Up
    </x-slot:title>

    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">

            <!-- LEFT SIDE TEXT -->
            <div class="text-center lg:text-left lg:w-1/2 mb-8 lg:mb-0 ml-0 lg:ml-10">
                <h1 class="text-5xl font-bold lexend-zetta">Sign Up now!</h1>
                <p class="py-6 font-medium montserrat">
                    Sign up now to start tracking your progress and connecting with like-minded individuals.
                </p>
            </div>

            <!-- REGISTER CARD -->
            <div class="card bg-gray-800 w-full max-w-sm shrink-0 shadow-2xl poppins-regular">
                <div class="card-body">

                    <h1 class="text-center text-3xl font-semibold lexend-zetta mb-4">
                        <a href="{{ route('LandingPage') }}">FitMartial</a>
                    </h1>

                    <!-- REGISTER FORM (Breeze backend) -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <fieldset class="fieldset">

                            <!-- Name -->
                            <label class="label">Name</label>
                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="input input-bordered w-full rounded-lg text-gray-900"
                                placeholder="Full Name"
                                required
                                autofocus
                                autocomplete="name"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Email -->
                            <label class="label mt-2">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="input input-bordered w-full rounded-lg text-gray-900"
                                placeholder="e.g anonymous@example.com"
                                required
                                autocomplete="username"
                            />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Password -->
                            <label class="label mt-2">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="input input-bordered w-full rounded-lg text-gray-900"
                                placeholder="Password"
                                required
                                autocomplete="new-password"
                            />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Confirm Password -->
                            <label class="label mt-2">Confirm Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="input input-bordered w-full rounded-lg text-gray-900"
                                placeholder="Confirm Password"
                                required
                                autocomplete="new-password"
                            />
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            {{-- Submit --}}
                            <button
                                type="submit"
                                class="btn w-full mt-3 rounded-lg bg-gray-700 text-white hover:bg-gray-600 border-none hover:shadow-lg
                                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-400 focus-visible:ring-offset-2
                                    poppins-semibold"
                            >
                                Sign Up
                            </button>

                        </fieldset>
                    </form>

                    <!-- OR DIVIDER -->
                    <div class="flex items-center gap-3 my-4">
                        <div class="grow h-px bg-gray-300"></div>
                        <span class="text-sm text-gray-500 font-medium">OR</span>
                        <div class="grow h-px bg-gray-300"></div>
                    </div>

                    <!-- GOOGLE SIGNUP (UI ONLY for now) -->
                    <button type="button"
                        class="btn w-full bg-white text-black border border-gray-300 rounded-md
                               hover:bg-gray-200 flex items-center justify-center gap-3">
                        <img src="https://developers.google.com/identity/images/g-logo.png"
                             alt="Google logo"
                             class="w-5 h-5">
                        Sign Up with Google
                    </button>

                    <!-- Terms -->
                    <p class="poppins-regular mt-4 text-xs text-center text-gray-600">
                        By signing up, you agree to the
                        <a href="#" class="link link-hover text-blue-500 hover:text-blue-400">Terms of Service</a>
                        and
                        <a href="#" class="link link-hover text-blue-500 hover:text-blue-400">Privacy Policy</a>,
                        including
                        <a href="#" class="link link-hover text-blue-500 hover:text-blue-400">Cookie Use</a>.
                    </p>

                    <!-- Already registered -->
                    <p class="text-center text-sm mt-4">
                        Already registered?
                        <a href="{{ route('login') }}" class="link link-hover text-blue-500 hover:text-blue-400">
                            Login
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
