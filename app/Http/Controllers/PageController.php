<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login', ['motors' => $this->motors()]);
    }

    public function dashboard(Request $request)
    {
        if (! $username = $this->username($request)) {
            return $this->kembaliKeLogin();
        }

        $ringkasan = [
            ['label' => 'Model di showroom', 'nilai' => '5 unit'],
            ['label' => 'Mesin terbesar', 'nilai' => 'CVO Road Glide ST · 1.977 cc'],
            ['label' => 'Tenaga tertinggi', 'nilai' => 'Panigale V4 R · 218 hp'],
            ['label' => 'Paling ringan', 'nilai' => 'KTM 300 EXC · 105,9 kg'],
        ];

        return view('dashboard', [
            'username'  => $username,
            'ringkasan' => $ringkasan,
            'motors'    => $this->motors(),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        if (! $username = $this->username($request)) {
            return $this->kembaliKeLogin();
        }

        return view('pengelolaan', ['username' => $username, 'motors' => $this->motors()]);
    }

    public function profile(Request $request)
    {
        if (! $username = $this->username($request)) {
            return $this->kembaliKeLogin();
        }

        $alur = [
            'Browser mengirim GET /profile?username=' . $username,
            'Route (web.php) mencocokkan URL ke PageController@profile',
            'Controller membaca parameter dengan $request->query(\'username\')',
            'Controller memanggil view(\'profile\') dan mengirim datanya',
            'Blade merender HTML, lalu respons dikirim kembali ke browser',
        ];

        return view('profile', ['username' => $username, 'alur' => $alur]);
    }

    private function username(Request $request): ?string
    {
        $nama = trim((string) $request->query('username', ''));

        return $nama === '' ? null : $nama;
    }

    private function kembaliKeLogin()
    {
        return redirect()->route('login')->with('pesan', 'Masukkan username terlebih dahulu.');
    }

    private function motors(): array
    {
        return [
            [
                'slug' => 'panigale-v4r', 'nama' => 'Ducati Panigale V4 R', 'kategori' => 'Superbike',
                'gambar' => 'panigale-v4r.png',
                'mesin' => '998 cc Desmosedici Stradale V4', 'tenaga' => '218 hp', 'torsi' => '114,5 Nm',
                'bobot' => '186,5 kg', 'jok' => '855 mm',
                'sumber' => 'ducati.com',
                'spesifikasi' => [
                    'Mesin' => 'Desmosedici Stradale 90° V4, desmodromic, 4 katup/silinder, berpendingin cairan',
                    'Kapasitas' => '998 cc (81 × 48,4 mm), kompresi 14,0:1',
                    'Tenaga maks.' => '218 hp @ 15.750 rpm (239 hp dengan knalpot racing)',
                    'Torsi maks.' => '114,5 Nm @ 12.000 rpm',
                    'Transmisi' => '6 percepatan, slipper dry clutch, rantai 520',
                    'Suspensi' => 'Öhlins NPX 43 mm (depan), Öhlins TTX36 (belakang)',
                    'Rem depan' => '2 × 330 mm, kaliper Brembo Monobloc Hypure 4 piston',
                    'Ban' => 'Pirelli Diablo Supercorsa SP-V4 120/70 & 200/60 ZR17',
                    'Bobot basah (tanpa BBM)' => '186,5 kg',
                    'Tinggi jok' => '855 mm',
                    'Jarak sumbu roda' => '1.477 mm',
                    'Tangki' => '17 liter',
                ],
            ],
            [
                'slug' => 'road-glide-cvo-st', 'nama' => 'Harley-Davidson CVO Road Glide ST', 'kategori' => 'Bagger',
                'gambar' => 'road-glide-cvo-st.png',
                'mesin' => '1.977 cc Milwaukee-Eight 121 HO', 'tenaga' => '127 hp', 'torsi' => '197 Nm',
                'bobot' => '380 kg', 'jok' => '720 mm',
                'sumber' => 'harley-davidson.com',
                'spesifikasi' => [
                    'Mesin' => 'Milwaukee-Eight 121 High Output V-twin, 4 katup/silinder',
                    'Kapasitas' => '1.977 cc (103,5 × 117,5 mm), kompresi 11,4:1',
                    'Tenaga maks.' => '127 hp (95 kW) @ 4.900 rpm',
                    'Torsi maks.' => '197 Nm (145 lb-ft) @ 4.000 rpm',
                    'Knalpot' => '2-1-2 ganda, peredam titanium dengan ujung serat karbon',
                    'Ban' => 'Dunlop 130/60B19 (depan), 180/55B18 (belakang)',
                    'Bobot siap jalan' => '380 kg',
                    'Tinggi jok (tanpa beban)' => '720 mm',
                    'Jarak sumbu roda' => '1.625 mm',
                    'Rake / trail' => '26° / 170 mm',
                    'Sudut miring maks.' => '32° kiri dan kanan',
                    'Tangki' => '22,7 liter',
                ],
            ],
            [
                'slug' => 'tuono-v4-factory', 'nama' => 'Aprilia Tuono V4 Factory', 'kategori' => 'Hypernaked',
                'gambar' => 'tuono-v4-factory.png',
                'mesin' => '1.099 cc V4 65°', 'tenaga' => '180 hp', 'torsi' => '121 Nm',
                'bobot' => '211 kg', 'jok' => '836 mm',
                'sumber' => 'aprilia.com',
                'spesifikasi' => [
                    'Mesin' => 'V4 65°, 4 katup/silinder, berpendingin cairan, ride-by-wire',
                    'Kapasitas' => '1.099 cc (81 × 53,32 mm)',
                    'Tenaga maks.' => '180 hp (132,4 kW) @ 11.800 rpm',
                    'Torsi maks.' => '121 Nm @ 9.650 rpm',
                    'Transmisi' => '6 percepatan',
                    'Rem belakang' => 'Cakram 220 mm, kaliper Brembo',
                    'Bobot basah' => '211 kg (BBM minimal 90% tangki)',
                    'Tinggi jok' => '836 mm',
                    'Jarak sumbu roda' => '1.450 mm',
                    'Tangki' => '18 liter',
                ],
            ],
            [
                'slug' => 'streetfighter-v4sp', 'nama' => 'Ducati Streetfighter V4 SP', 'kategori' => 'Hypernaked',
                'gambar' => 'streetfighter-v4sp.png',
                'mesin' => '1.103 cc Desmosedici Stradale V4', 'tenaga' => '214 hp', 'torsi' => '120 Nm',
                'bobot' => '188 kg', 'jok' => '845 mm',
                'sumber' => 'ducati.com',
                'spesifikasi' => [
                    'Mesin' => 'Desmosedici Stradale 90° V4, desmodromic, 4 katup/silinder, berpendingin cairan',
                    'Kapasitas' => '1.103 cc (81 × 53 mm), kompresi 14,0:1',
                    'Tenaga maks.' => '214 hp',
                    'Torsi maks.' => '120 Nm',
                    'Suspensi' => 'Öhlins dengan SmartEC 3.0 (termasuk steering damper)',
                    'Velg' => 'Serat karbon',
                    'Layar' => 'TFT 6,9 inci dengan optical bonding',
                    'Bobot basah (tanpa BBM)' => '188 kg',
                    'Tinggi jok' => '845 mm',
                    'Jarak sumbu roda' => '1.496 mm',
                    'Rake / trail' => '24,5° / 99 mm',
                    'Tangki' => '16 liter',
                ],
            ],
            [
                'slug' => 'ktm-300-exc', 'nama' => 'KTM 300 EXC Hard Enduro', 'kategori' => 'Hard Enduro',
                'gambar' => 'ktm-300-exc.png',
                'mesin' => '293,15 cc 2-tak', 'tenaga' => 'Tidak dirilis KTM', 'torsi' => 'Tidak dirilis KTM',
                'bobot' => '105,9 kg', 'jok' => '963 mm',
                'sumber' => 'ktm.com',
                'spesifikasi' => [
                    'Mesin' => '1 silinder 2-tak, injeksi Keihin EFI (throttle body 39 mm)',
                    'Kapasitas' => '293,15 cc',
                    'Transmisi' => '6 percepatan, kopling basah DDS dengan hidrolik Brembo',
                    'Rangka' => 'Double-cradle baja 25CrMo4, subframe poliamida berpenguat aluminium',
                    'Suspensi depan' => 'WP XACT USD 48 mm, langkah 300 mm',
                    'Suspensi belakang' => 'WP XPLOR dengan PDS, langkah 310 mm',
                    'Bobot (tanpa BBM)' => '105,9 kg',
                    'Tinggi jok' => '963 mm',
                    'Ground clearance' => '347 mm',
                    'Tangki' => '± 9 liter',
                ],
            ],
        ];
    }
}