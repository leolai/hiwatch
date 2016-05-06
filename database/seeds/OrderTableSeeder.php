<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [];
        foreach (range(1, 1000) as $index)
        {
            $datas[] = [
                'user_id'     => $index,
                'products'       => '{"1":[1,15],"2":[1,1]}',
                'user_id' => 1,
                'status' => rand(1,6),
                'promotion_info' => '',
                'country' => '',
                'province' => '',
                'city' => '',
                'address' => '',
                'contact' => '',
                'remark' => '',
                'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'  => \Carbon\Carbon::now()->toDateTimeString(),
            ];
        }
        DB::table('order')->insert($datas);
    }
}
