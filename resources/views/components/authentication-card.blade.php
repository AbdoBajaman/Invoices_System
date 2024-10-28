<div style="background-image: url(assets/img/pexels-mikhail-nilov-6963069.jpg);
background-size: cover;
background-position:center;
     background-repeat: no-repeat, no-repeat; "
    class="min-h-screen flex flex-row sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="">
       {{-- <img class="rounded-full h-40 w-40 " src="assets/img/Bajaman.png" alt="" srcset=""> --}}
    </div>

    <head>
        <style>
            .div {}
        </style>
    </head>
    <div class="opacity-70 text-right">
        <div style="opacity: 0.8; box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;"
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg opacity-70">
            {{ $slot }}
        </div>
        @if (!str_contains(url()->current(), 'register'))
        
            <div style="opacity: 0.8; box-shadow: rgba(3, 102, 214, 0.3) 0px 0px 0px 3px;"
                class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg opacity-70">
                <span class="text-sm text-gray-600 pr-5 ">{{ __('ليس لديك حساب؟') }}
                    <a style="color: --tw-text-opacity: 1;
    color: rgb(29 78 216 / var(--tw-text-opacity))"
                        href="{{ route('register') }}"
                        class="text-blue-700 hover:text-blue-900  text-base font-bold mx-2">{{ __('سجل') }}</a>
                </span>
            </div>
        @endif
    </div>
</div>
