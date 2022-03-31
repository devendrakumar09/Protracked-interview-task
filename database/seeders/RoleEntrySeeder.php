<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Role;
        $data->title = 'user';
        $data->description = 'user';
        $data->save();

        $data = new Role;
        $data->title = 'admin';
        $data->description = 'admin';
        $data->save();

    }
}
