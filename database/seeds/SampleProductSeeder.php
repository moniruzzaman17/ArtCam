<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductMediaGallery;

class SampleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pName = ["Sample Product 1","Sample Product 2","Sample Product 3","Sample Product 4","Sample Product 5","Sample Product 6","Sample Product 7","Sample Product 8","Sample Product 9"];
        $categories = ["1","1","1","1","1","1","1","1","1"];
        $subCategories = ["1","1","1","2","1","1","1","2","1"];

        $i=1;
        for ($item=0; $item < count($pName); $item++) {
            $prod = new Product;
            $media = new ProductMediaGallery;
            $prod->name = $pName[$item];
            $prod->category_id = $categories[$item];
            $prod->sub_category_id = $subCategories[$item];
            $prod->save();

            $media->product_id = $i;
            $media->image = 'sample'.$i.'.jpg';
            $media->file = 'sample'.$i.'.jpg';
            $media->save();
            $i++;
        }
    }
}
