<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\ProfilePartai;
use Database\Factories\PartaiFactory; 

class PartaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partyData = [
            [
                'nama_partai' => 'Partai Kebangkitan Bangsa (PKB)',
                'ketua_umum' => 'Nama Ketua PKB',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Gerakan Indonesia Raya (GERINDRA)',
                'ketua_umum' => 'Nama Ketua GERINDRA',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Demokrasi Indonesia Perjuangan (PDIP)',
                'ketua_umum' => 'Nama Ketua PDIP',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Golkar',
                'ketua_umum' => 'Nama Ketua Golkar',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Nasdem',
                'ketua_umum' => 'Nama Ketua Nasdem',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Buruh',
                'ketua_umum' => 'Nama Ketua Partai Buruh',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Gelombang Rakyat Indonesia (GELORA)',
                'ketua_umum' => 'Nama Ketua GELORA',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Keadilan Sejahtera (PKS)',
                'ketua_umum' => 'Nama Ketua PKS',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Kebangkitan Nusantara (PKN)',
                'ketua_umum' => 'Nama Ketua PKN',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Hati Nurani Rakyat (HANURA)',
                'ketua_umum' => 'Nama Ketua HANURA',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Garda Perubahan Indonesia (GARUDA)',
                'ketua_umum' => 'Nama Ketua GARUDA',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Amanat Nasional (PAN)',
                'ketua_umum' => 'Nama Ketua PAN',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Bulan Bintang (PBB)',
                'ketua_umum' => 'Nama Ketua PBB',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Demokrat',
                'ketua_umum' => 'Nama Ketua Demokrat',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Solidaritas Indonesia (PSI)',
                'ketua_umum' => 'Nama Ketua PSI',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Persatuan Indonesia (PERINDO)',
                'ketua_umum' => 'Nama Ketua PERINDO',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Persatuan Pembangunan (PPP)',
                'ketua_umum' => 'Nama Ketua PPP',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Nanggroe Aceh (Partai Lokal Aceh)',
                'ketua_umum' => 'Nama Ketua Partai Nanggroe Aceh',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Generasi Atjeh Beusaboh Tha\'at dan Taqwa (Partai Lokal Aceh)',
                'ketua_umum' => 'Nama Ketua Partai Generasi Atjeh Beusaboh Tha\'at dan Taqwa',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Darul Aceh (Partai Lokal Aceh)',
                'ketua_umum' => 'Nama Ketua Partai Darul Aceh',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Adil Sejahtera Aceh (Partai Lokal Aceh)',
                'ketua_umum' => 'Nama Ketua Partai Adil Sejahtera Aceh',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Soliditas Independen Rakyat Indonesia (Partai Lokal Aceh)',
                'ketua_umum' => 'Nama Ketua Partai Soliditas Independen Rakyat Indonesia',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
            [
                'nama_partai' => 'Partai Ummat',
                'ketua_umum' => 'Nama Ketua Partai Ummat',
                'jumlah_kasus_suap_gratifikasi' => rand(0, 100),
                'nominal_suap_gratifikasi' => rand(1000, 100000),
                'nominal_kasus_korupsi' => rand(1000, 100000),
                'jumlah_kasus_korupsi' => rand(0, 50),
            ],
        ];

        foreach ($partyData as $data) {
            DB::table('profile_partai')->insert($data);
        }
}

}
