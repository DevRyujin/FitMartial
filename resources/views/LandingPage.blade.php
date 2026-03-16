<x-guest-layout>
    <x-navbar />

    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <img src="{{ asset('images/koi-yin-yang.jpg') }}" alt="Hero Image koi-yin-yang"
            class="max-w-sm rounded-lg shadow-2xl"
            >
            <div>
                <h1 class="text-5xl font-bold lexend-zetta">Train with Purpose. Connect with Discipline.</h1>
                <p class="py-6 font-medium montserrat">
                        Share your progress, stay disciplined, and connect with people who walk the same path.
                </p>
                <button class="btn bg-blue-900 text-white poppins-regular p-4 hover:bg-blue-800 border-0">
                    <a href="{{ route('register') }}">Start Your Journey</a>
                </button>
            </div>
        </div>
    </div>
</x-guest-layout>