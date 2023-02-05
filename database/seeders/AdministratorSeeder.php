<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator              =   new \App\Models\User;
        $administrator->name        =   'Administrator';
        $administrator->email       =   'anmocafe954@gmail.com';
        $administrator->roles       =   'Admin';
        $administrator->password    =   bcrypt('Anmo_Cafe-945.');
        $administrator->save();
        $this->command->info('User Admin Berhasil Di Insert !');
    }
}
