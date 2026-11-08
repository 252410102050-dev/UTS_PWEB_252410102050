@extends('layouts.app')

@section('title', 'Pengelolaan | Warung Madura Sejahtera')

@section('content')
@include('partials.judul', [
    'judul' => 'Pengelolaan Barang',
    'subjudul' => 'Daftar barang di warung. Stok 5 ke bawah ditandai menipis.',
])

<div class="overflow-x-auto rounded-xl bg-white shadow">
    <table class="w-full text-left">
        <thead class="bg-emerald-800 text-white">
            <tr>
                <th class="p-3">No</th>
                <th class="p-3">Nama barang</th>
                <th class="p-3">Kategori</th>
                <th class="p-3">Harga</th>
                <th class="p-3">Stok</th>
                <th class="p-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $b)
                <tr class="border-t border-slate-100">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3 font-semibold">{{ $b['nama'] }}</td>
                    <td class="p-3">{{ $b['kategori'] }}</td>
                    <td class="p-3">Rp {{ number_format($b['harga'], 0, ',', '.') }}</td>
                    <td class="p-3">{{ $b['stok'] }}</td>
                    <td class="p-3">
                        @if ($b['stok'] <= 5)
                            <span class="rounded-full bg-red-100 px-3 py-0.5 text-xs font-semibold text-red-700">Menipis</span>
                        @else
                            <span class="rounded-full bg-emerald-100 px-3 py-0.5 text-xs font-semibold text-emerald-800">Aman</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
