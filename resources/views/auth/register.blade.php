<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

                <!-- Security Question -->
                <div>
                    <x-input-label for="security_question" :value="__('Security Question')" />
                    <select id="security_question" name="security_question" required
                            class="mt-1 w-full rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        <option value="" disabled {{ old('security_question') ? '' : 'selected' }}>Select a security question</option>
                        <option value="What was the name of your first pet?" {{ old('security_question') === "What was the name of your first pet?" ? 'selected' : '' }}>What was the name of your first pet?</option>
                        <option value="What is your mother's maiden name?" {{ old('security_question') === "What is your mother's maiden name?" ? 'selected' : '' }}>What is your mother's maiden name?</option>
                        <option value="What was the name of your first school?" {{ old('security_question') === "What was the name of your first school?" ? 'selected' : '' }}>What was the name of your first school?</option>
                        <option value="What is your favorite book?" {{ old('security_question') === "What is your favorite book?" ? 'selected' : '' }}>What is your favorite book?</option>
                        <option value="What city were you born in?" {{ old('security_question') === "What city were you born in?" ? 'selected' : '' }}>What city were you born in?</option>
                    </select>
                    <x-input-error :messages="$errors->get('security_question')" class="mt-2 text-sm text-red-600" />
                </div>

                <!-- Security Answer -->
                <div>
                    <x-input-label for="security_answer" :value="__('Security Answer')" />
                    <x-text-input id="security_answer" name="security_answer" type="text"
                                  class="mt-1 w-full rounded-lg shadow-sm border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                  :value="old('security_answer')" required />
                    <x-input-error :messages="$errors->get('security_answer')" class="mt-2 text-sm text-red-600" />
                </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
