<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [];

          for($i = 1; $i<=150000; $i++)
          {
            $data[] = [
            'title' => Str::random(7),
            'category_id' => rand(1,80),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
            'status' => 'Active',
            'stock' => rand(50,200),
            ];
          }
        $chunks = array_chunk($data,150);
        foreach($chunks as $chunk) {
          Product::insert($chunk);
        }

    }

}
