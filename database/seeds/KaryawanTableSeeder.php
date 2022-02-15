<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            'idKaryawan' => '1',
            'user_id' => '1',
            'nik' => '1234',
            'jabatan' => 'sekretaris',
            'noTelp' => '85736728657',
            'alamat' => 'Balikpapan',

        ]);

        DB::table('karyawans')->insert([
            'idKaryawan' => '2',
            'user_id' => '2',
            'nik' => '1234',
            'jabatan' => 'sekretaris',
            'noTelp' => '85736728657',
            'alamat' => 'Manado',

        ]);

        DB::table('karyawans')->insert([
            'idKaryawan' => '3',
            'user_id' => '3',
            'nik' => '1234',
            'jabatan' => 'sekretaris',
            'noTelp' => '85736728657',
            'alamat' => 'Sulawesi',

        ]);

        DB::table('karyawans')->insert([
            'idKaryawan' => '4',
            'user_id' => '4',
            'nik' => '1234',
            'jabatan' => 'sekretaris',
            'noTelp' => '85736728657',
            'alamat' => 'Jl. Taman Praja, Kel. Mojorejo, Kec. Taman, Kota Madiun',

        ]);

        DB::table('karyawans')->insert([
            'idKaryawan' => '5',
            'user_id' => '5',
            'nik' => '1234',
            'jabatan' => 'sekretaris',
            'noTelp' => '85736728657',
            'alamat' => 'Madiun',

        ]);
    }
}
