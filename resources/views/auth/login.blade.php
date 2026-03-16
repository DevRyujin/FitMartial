<x-guest-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">

            {{-- Right text section --}}
            <div class="text-center lg:text-left lg:w-1/2 mb-8 lg:mb-0 ml-0 lg:ml-10">
                <h1 class="text-5xl font-bold lexend-zetta">Welcome Back</h1>
                <p class="py-6 font-medium montserrat">
                    Log in to continue your fitness and martial arts journey. Track your progress, reflect on your training,
                    and connect with a purpose-driven community.
                </p>
            </div>

            {{-- Card --}}
            <div class="card bg-gray-800 w-full max-w-sm shrink-0 shadow-2xl poppins-regular">
                <div class="card-body">

                    <h1 class="text-center text-3xl font-semibold lexend-zetta mb-4">
                        <a href="{{ route('LandingPage') }}">FitMartial</a>
                    </h1>

                    {{-- Session Status (Breeze best practice) --}}
                    @if (session('status'))
                        <div class="alert alert-success mb-4">
                            <span>{{ session('status') }}</span>
                        </div>
                    @endif

                    {{-- Validation Errors (best practice) --}}
                    @if ($errors->any())
                        <div class="alert alert-error mb-4">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- LOGIN FORM (Breeze backend) --}}
                    <form method="POST" action="{{ route('login') }}" class="space-y-3 poppins-regular">
                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="label">
                                <span class="label-text">Email</span>
                            </label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                class="input input-bordered w-full rounded-lg text-gray-900"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                            />
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="label">
                                <span class="label-text">Password</span>
                            </label>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="input input-bordered w-full rounded-lg text-gray-900"
                                placeholder="Enter your password"
                                required
                                autocomplete="current-password"
                            />
                        </div>

                        {{-- Remember Me (Breeze best practice) --}}
                        <div class="flex items-center justify-between pt-1">
                            <label class="label cursor-pointer gap-2">
                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                    class="checkbox checkbox-sm"
                                />
                                <span class="label-text text-sm">Remember me</span>
                            </label>

                            {{-- Forgot password --}}
                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="link link-hover text-sm hover:text-blue-400"
                                >
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        {{-- Submit --}}
                    <button
                        type="submit"
                        class="btn w-full mt-3 rounded-lg bg-gray-700 text-white hover:bg-gray-600 border-none hover:shadow-lg
                            focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-400 focus-visible:ring-offset-2
                            poppins-semibold"
                    >
                        Login
                    </button>

                    </form>

                    {{-- OR DIVIDER --}}
                    <div class="flex items-center gap-3 my-4">
                        <div class="grow h-px bg-gray-300"></div>
                        <span class="text-sm text-gray-500 font-medium">OR</span>
                        <div class="grow h-px bg-gray-300"></div>
                    </div>

                    {{-- GOOGLE LOGIN (UI only for now) --}}
                    <button
                        type="button"
                        class="btn w-full bg-white text-black border border-gray-300 rounded-md
                               hover:bg-gray-200 flex items-center justify-center gap-3 hover:shadow-lg"
                    >
                        <img
                            src="https://developers.google.com/identity/images/g-logo.png"
                            alt="Google logo"
                            class="w-5 h-5"
                        >
                        Continue with Google
                    </button>

                    {{-- REGISTER LINK --}}
                    <p class="text-center text-sm mt-4">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="link link-primary text-blue-500 hover:text-blue-400">Sign up</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
