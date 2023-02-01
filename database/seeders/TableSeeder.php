<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table                  =   new \App\Models\Table();
        $table->no_meja         =   '1';
        $table->status          =   'Kosong';
        $table->save();
        $this->command->info('Data Table Berhasil Di Insert !');
    }
}
