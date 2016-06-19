<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();//truncate();
        $groups = [
          ['id'=>1, 'name'=>'Friend', 'updated_at'=> New DateTime, 'created_at'=>New DateTime],
          ['id'=>2, 'name'=>'Family', 'updated_at'=> New DateTime, 'created_at'=>New DateTime],
          ['id'=>3, 'name'=>'Office', 'updated_at'=> New DateTime, 'created_at'=>New DateTime],
          ['id'=>4, 'name'=>'Other', 'updated_at'=> New DateTime, 'created_at'=>New DateTime],
        ];
        DB::table('groups')->insert($groups);
    }
}
