<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-100 min-h-screen flex items-center">
        <div class="max-w-md w-full mx-auto p-6">
            <form action="" method="POST" class="bg-white rounded-lg shadow-lg p-6 space-y-6">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <!-- Header Section -->
                <div class="border-b border-gray-200 pb-6 mb-6">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 pb-12">Kamu akan mengirimkan dukungan kepada
                                {{ $user->username }}</h2>
                        </div>

                        @guest
                            <a href="{{ route('login') }}"
                                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                                Log in
                            </a>
                        @endguest
                    </div>
                </div>

                <!-- Form Fields -->
                <div class="space-y-6">
                    <!-- Nama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                            @if (auth()->check()) readonly @endif>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                            @if (auth()->check()) readonly @endif>
                    </div>

                    <!-- Nominal -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Nominal</label>
                        <input type="number" name="amount" id="amount" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <!-- Pesan -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                        <textarea name="message" id="message" rows="4"
                            class="mt-1 block w-full rounded-md border-b border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                    </div>
                </div>

                <div class="border-b border-gray-200"></div>

                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2">
                        Kirim
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
