<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Warung Madura Sejahtera')</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="flex min-h-screen flex-col bg-amber-50 text-slate-800">

    {{-- Navbar hanya tampil kalau sudah ada username (bukan di halaman login) --}}
    @isset($username)
        <x-navbar :username="$username" />
    @endisset

    <main class="mx-auto w-full max-w-5xl flex-1 p-4 md:p-6">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>
