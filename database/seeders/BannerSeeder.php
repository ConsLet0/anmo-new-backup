<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner              =   new \App\Models\Banner();
        $banner->name        =   'Banner 1';
        $banner->foto        =   '1.jpeg';
        $banner->save();
        $this->command->info('Data Banner Berhasil Di Insert !');
    }
}
