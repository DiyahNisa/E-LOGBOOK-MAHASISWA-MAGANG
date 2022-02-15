<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mahasiswas')->insert([
            'idMahasiswa' => '1',
            'user_id' => '6',
            'nim' => '1234',
            'univ' => 'sekretaris',
            'email' => 'di@gmail.com',
            'noTelp' => '85736728657',
            'alamat' => 'Jl. Taman Praja, Kel. Mojorejo, Kec. Taman, Kota Madiun',
            'level' => 'Admin Informatika'

        ]);

        DB::table('mahasiswas')->insert([
            'idMahasiswa' => '2',
            'user_id' => '7',
            'nim' => '1234',
            'univ' => 'coba',
            'email' => 'a@gmail.com',
            'noTelp' => '85736728657',
            'alamat' => 'Malang',
            'level' => 'Admin Informasi'

        ]);

        DB::table('mahasiswas')->insert([
            'idMahasiswa' => '3',
            'user_id' => '8',
            'nim' => '1234',
            'univ' => 'coba',
            'email' => 'b@gmail.com',
            'noTelp' => '85736728657',
            'alamat' => 'Madiun',
            'level' => 'Admin Persandian'

        ]);

        DB::table('mahasiswas')->insert([
            'idMahasiswa' => '4',
            'user_id' => '9',
            'nim' => '1234',
            'univ' => 'POLINEMA',
            'email' => 'c@gmail.com',
            'noTelp' => '85736728657',
            'alamat' => 'Surabaya',
            'level' => 'Admin Statistika'

        ]);
    }
}
