<x-guest-layout>
    <x-slot:title>
        Forgot Password
    </x-slot:title>

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-gray-900 border border-gray-800 rounded-2xl shadow-xl p-8">

            {{-- Title --}}
            <h1 class="text-2xl font-bold lexend-zetta text-white text-center">
                Forgot Password
            </h1>

            {{-- Description --}}
            <p class="mt-4 text-sm text-gray-300 leading-relaxed">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </p>

            {{-- Session Status --}}
            <x-auth-session-status class="mt-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
                @csrf

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-200" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full bg-gray-800 text-white border-gray-700 focus:border-blue-500 focus:ring-blue-500 rounded-lg"
                        type="email"
                        name="email"
                        :value="old('email')"
                        placeholder="e.g. anonymous@gmail.com"
                        required
                        autofocus
                    />

                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Button --}}
                <button
                    type="submit"
                    class="btn w-full rounded-lg !bg-blue-700 !text-white hover:!bg-blue-600 border-none poppins-semibold"
                >
                    Email Password Reset Link
                </button>

                {{-- Back to login --}}
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-white link link-hover">
                        Back to Login
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>
