<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    for ($i=1; $i<=3 ; $i++) {
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => 0,
        'status' => "Active",
      ]);
    }
    for ($i=1; $i<=3 ; $i++) {
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => 1,
        'status' => "Active",
      ]);
    }
    for ($i=1; $i<=3 ; $i++) {
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => 2,
        'status' => "Active",
      ]);
    }
    for ($i=1; $i<=3 ; $i++) {
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => 3,
        'status' => "Active",
      ]);
    }
    for($i = 1; $i<=10; $i++){
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => rand(3,10),
        'status' => "Active",
      ]);
    }
    for($i = 1; $i<=10; $i++){
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => rand(10,20),
        'status' => "Active",
      ]);
    }
    for($i = 1; $i<=20; $i++){
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => rand(20,30),
        'status' => "Active",
      ]);
    }
    for($i = 1; $i<=28; $i++){
      DB::table('category')->insert([
        'title' => Str::random(7),
        'parent_id' => rand(30,40),
        'status' => "Active",
      ]);
    }
  }
}
