@extends('layouts.app')

@section('title', 'Masuk | Warung Madura Sejahtera')

@section('content')
<div class="mx-auto mt-10 max-w-md rounded-2xl bg-white p-8 shadow-lg">
    <div class="mb-6 text-center">
        <div class="text-5xl">🏪</div>
        <h1 class="mt-2 text-2xl font-bold text-emerald-900">Warung Madura Sejahtera</h1>
        <p class="text-sm text-slate-500">Masuk dulu, Bos. Stok nggak bakal ngitung sendiri.</p>
    </div>

    <form method="POST" action="{{ route('masuk') }}" class="space-y-4">
        @csrf
        <div>
            <label for="username" class="font-semibold">Username</label>
            <input id="username" type="text" name="username" value="{{ old('username') }}"
                placeholder="contoh: cak_slamet"
                class="mt-1 w-full rounded-lg border border-slate-300 p-2 focus:outline-none focus:ring-4 focus:ring-emerald-200">
            @error('username')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="w-full rounded-lg bg-emerald-700 px-4 py-2 font-semibold text-white hover:bg-emerald-800 transition-colors">
            Masuk
        </button>
    </form>
</div>
@endsection
