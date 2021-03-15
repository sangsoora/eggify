<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('permissions_role')->truncate();

        $items = [

            1 => [
                'permission' => [1],
            ],
            2 => [
                'permission' => [],
            ],

        ];

        foreach ($items as $id => $item) {
            $role = Role::find($id);

            foreach ($item as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
