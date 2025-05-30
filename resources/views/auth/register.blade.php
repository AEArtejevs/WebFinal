<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div
            class="flex flex-col md:flex-row bg-white p-10 m-4 rounded-xl shadow-md w-full max-w-4xl dark:bg-gray-800">

            <!-- Logo section -->
            <div
                class="flex items-center justify-center w-full md:w-1/2 border-b md:border-b-0 md:border-r border-gray-700 md:pr-8 pb-8 md:pb-0 mb-6 md:mb-0">
                <x-application-logo class="w-24 h-24 text-white" />
            </div>

            <!-- Register Form -->
            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <form method="POST" action="{{ route('register') }}" class="space-y-6 py-4 px-0 md:pl-10">
                    <h2 class="text-2xl font-semibold mb-6 text-center md:text-left">Create an Account</h2>

                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" class="w-full mt-2" type="text" name="name" :value="old('name')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="w-full mt-2" type="email" name="email" :value="old('email')"
                            required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="w-full mt-2" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" value="Confirm Password" />
                        <x-text-input id="password_confirmation" class="w-full mt-2" type="password"
                            name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <x-primary-button class="w-full justify-center">
                            Register
                        </x-primary-button>
                    </div>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600 dark:text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}"
                        class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                        Log in
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
