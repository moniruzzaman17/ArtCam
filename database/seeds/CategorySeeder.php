<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\SubCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $catNames = ["Door","Bed"];
        $catPositions = ["2","1"];
        $catVisibilities = ["1","1"];

        for ($item=0; $item < count($catNames); $item++) {
            $cat = new Category;
            $cat->name = $catNames[$item];
            $cat->position = $catPositions[$item];
            $cat->visibility = $catVisibilities[$item];
            $cat->save();
        }

        $subCatNames = ["3D","2D","3D","2D"];
        $subCatParents = ["1","1","2","2"];
        $subCatPositions = ["1","2","1","2"];
        $subCatVisibilities = ["1","1","1","1"];

        for ($subitem=0; $subitem < count($subCatNames); $subitem++) {
            $subCat = new SubCategory;
            $subCat->name = $subCatNames[$subitem];
            $subCat->parent_id = $subCatParents[$subitem];
            $subCat->position = $subCatPositions[$subitem];
            $subCat->visibility = $subCatVisibilities[$subitem];
            $subCat->save();
        }
    }
}
