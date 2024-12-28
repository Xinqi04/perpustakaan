<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @laravelPWA
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/register.css', 'resources/js/register.js'])
    </head>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <body>

        <section class="logo-container">
            <img src="{{ asset('images/emojione_books.png') }}" alt="Logo">
        </section>
    
        <section class="register-container">
            <div class="register">
                <p class="text"><span>Home </span> / Register</p>
                    <h3>Register</h3>
                <p>Input your full name, username, phone number and password.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-container">
                        <div class="left">
                            <!-- Full Name -->
                            <div>
                                <x-input-label for="name" :value="__('Full Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
    
                            <!-- Username -->
                            <div class="mt-4">
                                <x-input-label for="username" :value="__('Username')" />
                                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                            </div>
    
                            <!-- Phone Number -->
                            <div class="mt-4">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="phone_number" />
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>
    
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>
    
                        <div class="right">
                            <!-- Address -->
                            <div class="mt-4">
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
    
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
    
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end mt-4"> 
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div> 
        </section>
    
        <footer>
            &copy; 2024 Perpustakaan Online. All rights reserved.
        </footer>
    
        <script src="{{ asset('../resources/js/regis.js') }}"></script>
    </body>
    
</html>