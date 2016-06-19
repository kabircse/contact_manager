<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->truncate();
        $faker = Faker::create();
        $contacts = [];
        foreach(range(1,20) as $row){
          $contacts[] = [
            'name' => $faker->name,
            'company' =>$faker->company,
            'email' => $faker->email,
            'mobile' => $faker->phoneNumber,
            'address' =>$faker->address.', '.$faker->country,
            'group_id' => rand(1,4),
            'created_at' => New DateTime,
            'updated_at' => New DateTime
          ];
        }
        DB::table('contacts')->insert($contacts);
    }
}
