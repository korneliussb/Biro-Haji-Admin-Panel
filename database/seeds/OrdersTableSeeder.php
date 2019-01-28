<?php

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Order::create([
        // 	"user_id"=>1,
        // 	"plan_id"=>2,
        // 	"schedule_id"=>"1",
        // 	"quantity"=>"2",
        // 	"total_amount"=>20000, 
        // 	"start_at"=>'2000-11-11', 
        // 	"end_at"=>'2000-11-11'
        // ]);

        // Order::create([
        // 	"user_id"=>2,
        // 	"plan_id"=>3,
        // 	"schedule_id"=>"2",
        // 	"quantity"=>"3",
        // 	"total_amount"=>30000, 
        // 	"start_at"=>'2000-10-10', 
        // 	"end_at"=>'2000-11-10'
        // ]);
    }
}
