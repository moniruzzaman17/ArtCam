<?php

use Illuminate\Database\Seeder;
use App\MediaGallery;


class MediaGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names       = [
            "logo"
        ];

        $values      = [
            "logo.png"
        ];

        $mob_values  = [
            ""
        ];

        $urls  = [
            ""
        ];

        $media_types = [
            "logo"
        ];

        $positions  = [
            ""
        ];

        $visibilities  = [
            "1"
        ];

        for ($item=0; $item < count($names); $item++) {
            $media = new MediaGallery;

            $media->name                = $names[$item];
            $media->value               = $values[$item];
            $media->media_type          = $media_types[$item];
            $media->position            = $positions[$item];
            $media->mob_value           = $mob_values[$item];
            $media->url                 = $urls[$item];
            $media->visibility_status   = $visibilities[$item];
            $media->timestamps          = false;
            $media->save();

        }
    }
}
