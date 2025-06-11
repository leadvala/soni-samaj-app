<?php

use App\Models\HomePageSetting;
use App\Models\Media;

function homeSettingPressMedia()
{
    $array = [];
    $homePageSetting = HomePageSetting::first();

    if (!$homePageSetting) {
        return $array; 
    }

    $explode = explode(',', $homePageSetting->press_logo);

    if (count($explode) > 0) {
        foreach ($explode as $mediaId) {
            $media = Media::find($mediaId);
            if ($media) {
                $array[] = [
                    'id' => $media->id,
                    'path' => $media->path,
                ];
            }
        }
    }

    return $array;
}
