<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
          'imagePath'=>"http://img.game.co.uk/ml2/2/6/2/6/262620_xb1_b.png",
          'title'=>'Aalo 5',
          'description'=>'Great game',
          'price'=>35,
          'tier'=>1
        ]);
        $product->save();
        $product = new \App\Product([
          'imagePath'=>"http://www.imgderp.com/wp-content/uploads/sites/41/2013/09/halo-4-cover.jpg",
          'title'=>'Balo 4',
          'description'=>'Great game',
          'price'=>25,
              'tier'=>2
        ]);
        $product->save();
        $product = new \App\Product([
          'imagePath'=>"http://firsthour.net/screenshots/halo-3/halo-3-cover.jpg",
          'title'=>'Calo 3',
          'description'=>'Great game',
              'tier'=>1
        ]);
        $product->save();
        $product = new \App\Product([
          'imagePath'=>"http://www.pixeldynamo.com/wp-content/uploads/2015/04/1100262092-00.jpg",
          'title'=>'Halo 2',
          'description'=>'Great game',
              'tier'=>1
        ]);
        $product->save();
        $product = new \App\Product([
          'imagePath'=>"http://vignette2.wikia.nocookie.net/halo/images/8/81/Halo_Combat_Evolved_-_Xbox_Cover.png/revision/latest?cb=20150331162657",
          'title'=>'Halo 1',
          'description'=>'Great game',
            'tier'=>2
        ]);
        $product->save();
    }
}
