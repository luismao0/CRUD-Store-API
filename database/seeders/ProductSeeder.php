<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $data = [
            [
                'title' => 'Product 1',
                'price' => 2000,
                'description' => 'Product 1 Description',
                'image' => null,
                'user_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Product::insert($data);

        // Testing Dummy Products
        Product::factory(100)->create();
    }
}
