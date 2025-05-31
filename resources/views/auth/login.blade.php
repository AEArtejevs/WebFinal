<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="flex flex-col md:flex-row bg-white p-10 m-4 rounded-xl shadow-md w-full max-w-4xl dark:bg-gray-800">

            <div
                class="flex items-center justify-center w-full md:w-1/2 border-b md:border-b-0 md:border-r border-gray-700 md:pr-8 pb-8 md:pb-0">
                <x-application-logo class="w-24 h-24 text-white" />
            </div>

            <div class="w-full md:w-1/2 flex flex-col justify-center">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6 py-4 px-0 md:pl-10">
                    <h2 class="text-2xl font-semibold mb-6 text-center md:text-left">Login to Your Account</h2>

                    @csrf

                    <div>
                        <x-input-label for="email" value="Email" />
                        <x-text-input id="email" class="w-full mt-2" type="email" name="email" :value="old('email')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="w-full mt-2" type="password" name="password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember"
                                class="rounded border-gray-500 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm">Remember me</span>
                        </label>

                        <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                            Don't have an account?
                            <a href="{{ route('register') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Register
                            </a>
                        </p>
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
