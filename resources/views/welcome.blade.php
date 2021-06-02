<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>


<body>
    <x-guest-layout>
        <x-auth-card>
            <p class="text-xl text-black flex items-center justify-center">Welcome to your ticketing system!</p>
            <div class="flex items-center justify-center">
                <a href="{{ route('register') }}" class="pt-2">
                    <x-button>
                        Sign up for FREE
                    </x-button>
                </a>
            </div>
            <div class="d-flex flex-column items-center p-2">
                <span class="mt-4 text-sm text-gray-600">Already registered?</span>
                <a href="{{ route('login') }}" class="pt-2">
                    <x-button>
                        Login
                    </x-button>
                </a>
            </div>
        </x-auth-card>
    </x-guest-layout>
</body>


</html>