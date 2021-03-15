<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();

        $items = [
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'user'],
        ];

        foreach ($items as $item) {
            Role::create($item);
        }

        Schema::enableForeignKeyConstraints();
    }
}
