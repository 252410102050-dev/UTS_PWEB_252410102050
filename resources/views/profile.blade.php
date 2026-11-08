@extends('layouts.app')

@section('title', 'Profil | Warung Madura Sejahtera')

@section('content')
@include('partials.judul', [
    'judul' => 'Profil',
    'subjudul' => 'Data penjaga warung yang sedang bertugas.',
])

<div class="rounded-xl bg-white p-6 shadow">
    <div class="flex items-center gap-4">
        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-emerald-700 text-2xl font-bold text-white">
            {{ strtoupper(substr($username, 0, 1)) }}
        </div>
        <div>
            <h2 class="text-xl font-bold">{{ $username }}</h2>
            <p class="text-slate-500">{{ $profil['jabatan'] }}</p>
        </div>
    </div>

    <dl class="mt-6 grid gap-4 sm:grid-cols-2">
        @foreach ($profil['info'] as $label => $isi)
            <div>
                <dt class="text-sm text-slate-500">{{ $label }}</dt>
                <dd class="font-semibold">{{ $isi }}</dd>
            </div>
        @endforeach
    </dl>
</div>
@endsection
