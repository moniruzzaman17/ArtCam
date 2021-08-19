<?php

use Illuminate\Database\Seeder;
use App\CoreConfigData;
use Carbon\Carbon;

class ConfigDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create object of config model

        $names = ["app_name","about"];
        $values = [
            "CNC Mela",
            "CNC means Computer Numerical Control. This means a computer converts the design produced by Computer Aided Design software (CAD), into numbers. ... The X, Y and Z axis control the movement of the cutter on a 3D CNC machine. This allows materials to be machined in three directions (3D manufacture)"
        ];

        for ($item=0; $item < count($names); $item++) {
            $config = new CoreConfigData;
            $config->name = $names[$item];
            $config->value = $values[$item];
            $config->save();
        }
    }
}
