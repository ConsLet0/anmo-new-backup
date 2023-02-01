<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Banner2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner2              =   new \App\Models\Banner2();
        $banner2->name        =   'Banner 2';
        $banner2->foto        =   '2.jpeg';
        $banner2->save();
        $this->command->info('Data Banner2 Berhasil Di Insert !');
    }
}
