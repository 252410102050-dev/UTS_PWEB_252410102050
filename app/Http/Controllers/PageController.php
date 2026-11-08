<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Data barang disimpan di controller, bukan di view
    private function dataBarang(): array
    {
        return [
            ['nama' => 'Rokok Kretek 12 Batang', 'kategori' => 'Rokok', 'harga' => 24000, 'stok' => 40],
            ['nama' => 'Kopi Sachet', 'kategori' => 'Minuman', 'harga' => 2000, 'stok' => 120],
            ['nama' => 'Mi Instan Goreng', 'kategori' => 'Makanan', 'harga' => 3500, 'stok' => 75],
            ['nama' => 'Air Galon Isi Ulang', 'kategori' => 'Minuman', 'harga' => 6000, 'stok' => 4],
            ['nama' => 'Gas Elpiji 3 Kg', 'kategori' => 'Kebutuhan', 'harga' => 22000, 'stok' => 3],
            ['nama' => 'Telur Ayam per Butir', 'kategori' => 'Dapur', 'harga' => 2500, 'stok' => 60],
            ['nama' => 'Minyak Goreng 1 Liter', 'kategori' => 'Dapur', 'harga' => 18000, 'stok' => 15],
            ['nama' => 'Es Batu Plastik', 'kategori' => 'Minuman', 'harga' => 2000, 'stok' => 5],
        ];
    }

    // Username dibaca dari request parameter (?username=...)
    private function ambilUsername(Request $request): string
    {
        return $request->query('username', 'Tamu');
    }

    public function login()
    {
        return view('login');
    }

    public function masuk(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:30'],
        ], [
            'username.required' => 'Isi dulu usernamenya, Bos.',
        ]);

        return redirect()->route('dashboard', ['username' => $data['username']]);
    }

    public function dashboard(Request $request)
    {
        $barang = $this->dataBarang();
        $menipis = array_filter($barang, fn ($b) => $b['stok'] <= 5);

        return view('dashboard', [
            'username' => $this->ambilUsername($request),
            'jumlahJenis' => count($barang),
            'totalStok' => array_sum(array_column($barang, 'stok')),
            'menipis' => $menipis,
        ]);
    }

    public function pengelolaan(Request $request)
    {
        return view('pengelolaan', [
            'username' => $this->ambilUsername($request),
            'barang' => $this->dataBarang(),
        ]);
    }

    public function profile(Request $request)
    {
        $profil = [
            'jabatan' => 'Penjaga Warung (Shift Malam)',
            'info' => [
                'Nama warung' => 'Warung Madura Sejahtera',
                'Jam operasional' => '24 jam, kecuali pas kiamat',
                'Slogan' => 'Mau beli apa, Bos? Sini, jangan malu-malu.',
                'Pelanggan setia' => 'Pak RT dan seluruh anak kos',
            ],
        ];

        return view('profile', [
            'username' => $this->ambilUsername($request),
            'profil' => $profil,
        ]);
    }
}
