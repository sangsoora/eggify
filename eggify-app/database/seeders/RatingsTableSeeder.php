<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('ratings')->truncate();
        //DB::insert('insert into ratings (id,rating,recommended,title,comment,photo,user_id) values (?,?,?,?,?,?,?)', [2, 5, 1, 'Rating title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus leo vel metus porttitor, at elementum massa mattis. Praesent dictum faucibus nisi ut malesuada. Mauris facilisis lacus vel porttitor venenatis.', '', 5]);
        //DB::insert('insert into ratings (id,rating,recommended,title,comment,photo,user_id) values (?,?,?,?,?,?,?)', [1, 3, 1, 'Rating title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus leo vel metus porttitor, at elementum massa mattis. Praesent dictum faucibus nisi ut malesuada. Mauris facilisis lacus vel porttitor venenatis.', '', 6]);

        Schema::enableForeignKeyConstraints();
    }
}
