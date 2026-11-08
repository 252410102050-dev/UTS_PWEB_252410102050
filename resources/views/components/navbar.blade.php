@props(['username'])

<nav class="bg-emerald-800 text-white">
    <div class="mx-auto flex max-w-5xl flex-wrap items-center gap-x-6 gap-y-2 px-4 py-3">
        <a href="{{ route('dashboard', ['username' => $username]) }}" class="mr-auto text-lg font-bold">
            🏪 Warung Madura Sejahtera
        </a>
        <a href="{{ route('dashboard', ['username' => $username]) }}" class="hover:text-amber-300">Dashboard</a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="hover:text-amber-300">Pengelolaan</a>
        <a href="{{ route('profile', ['username' => $username]) }}" class="hover:text-amber-300">Profil</a>
        <a href="{{ route('login') }}" class="rounded bg-amber-400 px-3 py-1 font-semibold text-emerald-900 hover:bg-amber-300">Keluar</a>
    </div>
</nav>
