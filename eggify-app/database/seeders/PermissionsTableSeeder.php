<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('permissions')->truncate();

        $items = [
            ['id' => 1, 'name' => 'all'],
        ];

        foreach ($items as $item) {
            Permission::create($item);
        }

        Schema::enableForeignKeyConstraints();
    }
}
