<x-guest-layout>
    @section('title')
    تسجيل دخول

    @endsection
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class='flex justify-center'>
                <h1 style="font-family: Norican" class="text-2xl md:text-5xl">
                    Bajaman

                 </h1>
            </div>

            <div>
                <x-label for="email" value="{{ __('البريد الالكتروني') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('كلمه السر') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('نسيت كلمه السر؟') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('تسجيل دخول') }}
                </x-button>
            </div>
        </form>



    </x-authentication-card>





</x-guest-layout>
