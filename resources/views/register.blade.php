<x-layout>
    <x-slot:title>
        Sign Up
    </x-slot:title>

    <div class="hero bg-base-200 min-h-screen">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <div class="text-center lg:text-left lg:w-1/2 mb-8 lg:mb-0 ml-0 lg:ml-10">
      <h1 class="text-5xl font-bold lexend-zetta">Sign Up now!</h1>
      <p class="py-6 font-medium montserrat">
        Sign up now to start tracking your progress and connecting with like-minded individuals.
      </p>
    </div>
    <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl poppins-regular">
        <div class="card-body">
            <h1 class="text-center text-3xl font-semibold lexend-zetta mb-4">
                <a href="{{ route('home') }}">FitMartial</a>
            </h1>
            <!-- REGISTER FORM -->
            <fieldset class="fieldset">
                <label class="label">Name</label>
                <input type="text" class="input input-bordered w-full" placeholder="Full Name" required/>
                <label class="label">Email</label>
                <input type="email" class="input input-bordered w-full" placeholder="e.g anonymous@example.com" required/>
                <label class="label">Password</label>
                <input type="password" class="input input-bordered w-full" placeholder="Password" required/>
                <button class="btn btn-neutral mt-4">Sign Up</button>
            </fieldset>

            <!-- OR DIVIDER -->
                    <div class="flex items-center gap-3 my-4">
                        <div class="grow h-px bg-gray-300"></div>
                        <span class="text-sm text-gray-500 font-medium">OR</span>
                        <div class="grow h-px bg-gray-300"></div>
                    </div>

                    <!-- GOOGLE LOGIN -->
                    <button class="btn w-full bg-white text-black border border-gray-300 rounded-md
                                hover:bg-gray-100 flex items-center justify-center gap-3">
                        <img src="https://developers.google.com/identity/images/g-logo.png"
                            alt="Google logo"
                            class="w-5 h-5">
                        Sign Up with Google
                    </button>

                    <p class="poppins-regular mt-4 text-xs text-center text-gray-600">
                    By signing up, you agree to the <a href="#" class="link link-hover text-blue-500">Terms of Service</a> 
                    and <a href="#" class="link link-hover text-blue-500">Privacy Policy</a>, including 
                    <a href="#" class="link link-hover text-blue-500">Cookie Use</a>.
                </p>
        </div>
    </div>
  </div>
</div>
</x-layout>