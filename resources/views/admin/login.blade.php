
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Feedback-tool') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    
    <div id="app">
        <div>
            <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
            <div class="flex">
                <div class="w-full">
                    <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                            {{ __('Login') }}
                        </header>
                        @if(session()->has('login_error'))
                            <h6 class="text-red-700 text-success my-5 text-center">{{ session()->get('login_error') }}</h6>
                        @endif
                        <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('admin.auth') }}">
                            @csrf

                            <div class="flex flex-wrap">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('E-Mail Address') }}:
                                </label>

                                <input id="email" type="email"
                                    class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                    
                                </p>
                                @enderror
                            </div>

                            <div class="flex flex-wrap">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Password') }}:
                                </label>

                                <input id="password" type="password"
                                    class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                                    required>

                                @error('password')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="flex items-center">
                                <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                                    <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="ml-2">{{ __('Remember Me') }}</span>
                                </label>

                               
                            </div>

                            <div class="flex flex-wrap mb-10">
                                <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                            <div class="mb-10"></div>
                        </form>

                    </section>
                </div>
            </div>
        </main>
        </div>


    </div>
</body>
</html>