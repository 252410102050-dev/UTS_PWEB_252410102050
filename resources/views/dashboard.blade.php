@extends('layouts.app')

@section('title', 'Dashboard | Warung Madura Sejahtera')

@section('content')
@include('partials.judul', [
    'judul' => 'Dashboard',
    'subjudul' => 'Halo, ' . $username . '! Ini ringkasan warung hari ini.',
])

<div class="grid gap-4 sm:grid-cols-3">
    <div class="rounded-xl bg-white p-5 shadow">
        <p class="text-sm text-slate-500">Jenis barang</p>
        <p class="text-3xl font-bold text-emerald-800">{{ $jumlahJenis }}</p>
    </div>
    <div class="rounded-xl bg-white p-5 shadow">
        <p class="text-sm text-slate-500">Total stok</p>
        <p class="text-3xl font-bold text-emerald-800">{{ $totalStok }}</p>
    </div>
    <div class="rounded-xl bg-white p-5 shadow">
        <p class="text-sm text-slate-500">Stok menipis</p>
        <p class="text-3xl font-bold text-red-600">{{ count($menipis) }}</p>
    </div>
</div>

<div class="mt-6 rounded-xl bg-white p-5 shadow">
    <h2 class="mb-3 text-lg font-bold">Perlu kulakan lagi</h2>
    <ul class="space-y-1">
        @forelse ($menipis as $b)
            <li class="flex justify-between border-b border-slate-100 py-1">
                <span>{{ $b['nama'] }}</span>
                <span class="font-semibold text-red-600">sisa {{ $b['stok'] }}</span>
            </li>
        @empty
            <li class="text-slate-500">Aman semua, Bos.</li>
        @endforelse
    </ul>
    <a href="{{ route('pengelolaan', ['username' => $username]) }}"
        class="mt-4 inline-block rounded-lg bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition-colors">
        Lihat semua barang
    </a>
</div>
@endsection
