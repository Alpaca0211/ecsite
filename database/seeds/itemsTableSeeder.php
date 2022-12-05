<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 100; $i++) {
        DB::table('items')->insert([
          'name' => str_random(10),
          'price' => 1200,
          'description' => 'Test Item',
          'recommend'=> '',
          'picture01'=> '',
          'picture02'=> '',
          'picture03'=> '',
        ]);
    }
  }
}
