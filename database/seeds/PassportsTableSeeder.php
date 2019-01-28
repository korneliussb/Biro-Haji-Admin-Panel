<?php

use Illuminate\Database\Seeder;
use App\Models\Passport;

class PassportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Passport::create([
        	"id"=>2,
        	"name"=>"Nani",
        	"address"=>"Jalan Baru",
        	"release_date"=>"2000-10-10",
        	"release_at"=>"2000-10-10" 
        ]);
    }
}
