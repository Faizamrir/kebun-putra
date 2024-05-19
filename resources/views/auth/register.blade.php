<x-guest-layout>
    <form method="POST" class="space-y-4 md:space-y-6" action="{{ route('register') }}">
        @csrf

        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
            Buat Akun
        </h1>
        <!-- Name -->
        <div>
            <x-input-label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Name')" />
            <input id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Email')" />
            <input id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password" :value="__('Password')" />

            <input id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Confirm Password')" />

            <input id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
            </div>
            <div class="ml-3 text-sm">
              <label for="terms" class="font-light text-gray-500 dark:text-gray-300">Saya setuju dengan <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Syarat dan ketentuan yang berlaku</a></label>
            </div>
        </div>

        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Buat Akun</button>
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Sudah punya Akun? <a href="{{ route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login disini</a>
                  </p>
    </form>
</x-guest-layout>
