<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex bg-white p-10 rounded-xl shadow-md w-full max-w-4xl dark:bg-gray-800">
            <!-- Left Side / Logo -->
            <div class="hidden md:flex items-center justify-center w-1/2 border-r border-gray-700 pr-8">
                <x-application-logo class="w-24 h-24 text-white" />
            </div>

            <!-- Register Form -->
            <div class="w-full md:w-1/2">
                <form method="POST" action="{{ route('register') }}" class="space-y-6 py-4 pl-10 pr-0">
                    <h2 class="text-2xl font-semibold mb-6 text-center">Create an Account</h2>

                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="name" class="w-full mt-2" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="w-full mt-2" type="email" name="email" :value="old('email')" required />
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
                        <x-text-input id="password_confirmation" class="w-full mt-2" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <x-primary-button class="w-full justify-center">
                            Register
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
