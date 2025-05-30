<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen ">
        <div class="flex bg-white p-10 rounded-xl shadow-md w-full max-w-4xl dark:bg-gray-800">
            <!-- Logo or Left Side Content -->
            <div class="hidden md:flex items-center justify-center w-1/2 border-r border-gray-700 pr-8">
                <x-application-logo class="w-24 h-24 text-white" />
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-1/2">

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6 py-4 pl-10 pr-0">
                <h2 class="text-2xl font-semibold mb-6 text-center">Login to Your Account</h2>

                    @csrf

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="w-full mt-2" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="w-full mt-2" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-500 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm">Remember me</span>
                        </label>
                        <a href="#" class="text-sm text-indigo-700 dark:text-indigo-400 hover:underline">Forgot password?</a>
                    </div>

                    <div>
                        <x-primary-button class="w-full justify-center">
                            Log in
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
