<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'nama' => 'Mawar',
            'level' => 'Super Admin',
            'username' => 'spAdmin',
            'password' =>  Hash::make('spAdmin'),
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'nama' => 'Melati',
            'level' => 'Admin Informatika',
            'username' => 'admin1',
            'password' =>  Hash::make('admin1'),
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'nama' => 'Kamboja',
            'level' => 'Admin Informasi',
            'username' => 'admin2',
            'password' =>  Hash::make('admin2'),
        ]);

        DB::table('users')->insert([
            'id' => '4',
            'nama' => 'Anggrek',
            'level' => 'Admin Persandian',
            'username' => 'admin3',
            'password' =>  Hash::make('admin3'),
        ]);

        DB::table('users')->insert([
            'id' => '5',
            'nama' => 'Teratai',
            'level' => 'Admin Statistika',
            'username' => 'admin4',
            'password' =>  Hash::make('admin4'),
        ]);

        DB::table('users')->insert([
            'id' => '6',
            'nama' => 'Mandala',
            'level' => 'Mahasiswa Informatika',
            'username' => 'Mhs1',
            'password' =>  Hash::make('mhs1'),
        ]);

        DB::table('users')->insert([
            'id' => '7',
            'nama' => 'Lala',
            'level' => 'Mahasiswa Informasi',
            'username' => 'Mhs2',
            'password' =>  Hash::make('mhs2'),
        ]);

        DB::table('users')->insert([
            'id' => '8',
            'nama' => 'Putra',
            'level' => 'Mahasiswa Persandian',
            'username' => 'Mhs3',
            'password' =>  Hash::make('mhs3'),
        ]);

        DB::table('users')->insert([
            'id' => '9',
            'nama' => 'Putri',
            'level' => 'Mahasiswa Statistika',
            'username' => 'Mhs4',
            'password' =>  Hash::make('mhs4'),
        ]);
    }
}
