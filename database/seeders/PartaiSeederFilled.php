<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\ProfilePartai;
use Database\Factories\PartaiFactory; 

class PartaiSeederFilled extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partyData = [
            [
                'nama_partai' => 'Partai Kebangkitan Bangsa (PKB)',
                'ketua_umum' => 'Muhaimin Iskandar',
                'jumlah_kasus_suap_gratifikasi' => 18,
                'nominal_suap_gratifikasi' => 35.8,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Gerakan Indonesia Raya (GERINDRA)',
                'ketua_umum' => 'Prabowo Subianto',
                'jumlah_kasus_suap_gratifikasi' => 23,
                'nominal_suap_gratifikasi' => 62.3,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Demokrasi Indonesia Perjuangan (PDIP)',
                'ketua_umum' => 'Megawati Soekarnoputri',
                'jumlah_kasus_suap_gratifikasi' => 66,
                'nominal_suap_gratifikasi' => 311,
                'nominal_kasus_korupsi' => 39.8,
                'jumlah_kasus_korupsi' => 2,
            ],
            [
                'nama_partai' => 'Partai Golongan Karya (Golkar)',
                'ketua_umum' => 'Airlangga Hartanto',
                'jumlah_kasus_suap_gratifikasi' => 64,
                'nominal_suap_gratifikasi' => 280,
                'nominal_kasus_korupsi' => 3270,
                'jumlah_kasus_korupsi' => 9,
            ],
            [
                'nama_partai' => 'Partai Nasional Demokrat (NasDem)',
                'ketua_umum' => 'Surya Paloh',
                'jumlah_kasus_suap_gratifikasi' => 18,
                'nominal_suap_gratifikasi' => 224,
                'nominal_kasus_korupsi' => 49.9,
                'jumlah_kasus_korupsi' => 2,
            ],
            [
                'nama_partai' => 'Partai Buruh',
                'ketua_umum' => 'Said Iqbal',
                'jumlah_kasus_suap_gratifikasi' => 0,
                'nominal_suap_gratifikasi' => 0,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Gelombang Rakyat Indonesia (Gelora)',
                'ketua_umum' => 'Anis Matta',
                'jumlah_kasus_suap_gratifikasi' => 0,
                'nominal_suap_gratifikasi' => 0,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Keadilan Sejahtera (PKS)',
                'ketua_umum' => 'Ahmad Syaikhu',
                'jumlah_kasus_suap_gratifikasi' => 17,
                'nominal_suap_gratifikasi' => 97,
                'nominal_kasus_korupsi' => 2.8,
                'jumlah_kasus_korupsi' => 1,
            ],
            [
                'nama_partai' => 'Partai Kebangkitan Nusantara (PKN)',
                'ketua_umum' => 'I Wayan Gede Pasek Suardika',
                'jumlah_kasus_suap_gratifikasi' => 0,
                'nominal_suap_gratifikasi' => 0,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Hati Nurani Rakyat (HANURA)',
                'ketua_umum' => 'Oesman Sapta Odang',
                'jumlah_kasus_suap_gratifikasi' => 13,
                'nominal_suap_gratifikasi' => 8.62,
                'nominal_kasus_korupsi' => 2300,
                'jumlah_kasus_korupsi' => 1,
            ],
            [
                'nama_partai' => 'Partai Garda Perubahan Indonesia (GARUDA)',
                'ketua_umum' => 'Ahmad Ridha Sabana',
                'jumlah_kasus_suap_gratifikasi' => 0,
                'nominal_suap_gratifikasi' => 0,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Amanat Nasional (PAN)',
                'ketua_umum' => 'Zulkifli Hasan',
                'jumlah_kasus_suap_gratifikasi' => 28,
                'nominal_suap_gratifikasi' => 195,
                'nominal_kasus_korupsi' => 2.18,
                'jumlah_kasus_korupsi' => 1,
            ],
            [
                'nama_partai' => 'Partai Bulan Bintang (PBB)',
                'ketua_umum' => 'Yusril Ihza Mahendra',
                'jumlah_kasus_suap_gratifikasi' => 3,
                'nominal_suap_gratifikasi' => 1.17,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Demokrat',
                'ketua_umum' => 'Agus Harimurti Yudhoyono',
                'jumlah_kasus_suap_gratifikasi' => 48,
                'nominal_suap_gratifikasi' => 119,
                'nominal_kasus_korupsi' => 1120,
                'jumlah_kasus_korupsi' => 9,
            ],
            [
                'nama_partai' => 'Partai Solidaritas Indonesia (PSI)',
                'ketua_umum' => 'Kaesang Pangarep',
                'jumlah_kasus_suap_gratifikasi' => 0,
                'nominal_suap_gratifikasi' => 0,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Persatuan Indonesia (PERINDO)',
                'ketua_umum' => 'Hary Tanoesoedibjo',
                'jumlah_kasus_suap_gratifikasi' => 1,
                'nominal_suap_gratifikasi' => 0.098,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
            [
                'nama_partai' => 'Partai Persatuan Pembangunan (PPP)',
                'ketua_umum' => 'Muhammad Mardiono',
                'jumlah_kasus_suap_gratifikasi' => 19,
                'nominal_suap_gratifikasi' => 21.8,
                'nominal_kasus_korupsi' => 99.9,
                'jumlah_kasus_korupsi' => 1,
            ],
            [
                'nama_partai' => 'Partai Ummat',
                'ketua_umum' => 'Ridho Rahmadi',
                'jumlah_kasus_suap_gratifikasi' => 0,
                'nominal_suap_gratifikasi' => 0,
                'nominal_kasus_korupsi' => 0,
                'jumlah_kasus_korupsi' => 0,
            ],
        ];

        foreach ($partyData as $data) {
            DB::table('profile_partai')->insert($data);
        }
}

}
