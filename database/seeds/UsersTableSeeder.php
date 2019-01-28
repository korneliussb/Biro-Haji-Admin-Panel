<?php

use Illuminate\Database\Seeder;
use App\Models\BackpackUser;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BackpackUser::create([
        	"id"=>1,
        	"name"=>"admin",
        	"email"=>"admin@admin.com",
        	"password"=>bcrypt("password")
        ]);

        BackpackUser::create([
        	"id"=>2,
        	"name"=>"user",
        	"email"=>"user@user.com",
        	"password"=>bcrypt("password")
        ]);
    }
}
