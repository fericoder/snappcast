<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function watermark($file)
    {
        $watermark = \Image::make('img/logo.png');
        $img = \Image::make(ltrim($file, "/"));
        $watermarkSize = $img->width() - 20; //size of the image minus 20 margins
        $watermarkSize = $img->width() / 2; //half of the image size
        $resizePercentage = 70;//70% less then an actual image (play with this value)
        $watermarkSize = round($img->width() * ((100 - $resizePercentage) / 100), 2); //watermark will be $resizePercentage less then the actual width of the image
        $watermark->resize($watermarkSize, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->insert($watermark, 'bottom-right', 10, 10);
        $img->save(ltrim($file, "/"));
    }

    protected function uploadFile($file, $watermark = true, $resize = true)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;

        $filePath = "/storage/upload/{$year}/{$month}/{$day}/";
        $fileName = time() . "_" . $file->getClientOriginalName();

//        $file->move(public_path() . '_html' . $filePath, $fileName);
        $file->move(public_path() . $filePath, $fileName);
        $file = "$filePath" . "$fileName";

        $imageMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
        $contentType = mime_content_type(ltrim($file, "/"));
        if ($watermark == true && in_array($contentType, $imageMimeTypes)) {
            $this->watermark($file);
        }
        if ($resize == true && in_array($contentType, $imageMimeTypes)) {
            $sizes = ["239" => "215", "350" => "234", "250" => "167", "755" => "504", "120" => "80", "848" => "566", "1475" => "800", "400" => "200"];
            return $url['images'] = $this->resize($file, $sizes, $filePath, $fileName);
        } else {
            return $file;
        }
    }

    private function resize($path, $sizes, $filePath, $fileName)
    {
        $images['original'] = $filePath . $fileName;
        foreach ($sizes as $width => $height) {
            $size = $width . ',' . $height;
            $images[$size] = $filePath . "{$size}_" . $fileName;

//            \Image::make(public_path() . '_html' . $path)->resize($width, $height, function ($constraint) {
            \Image::make(public_path() . $path)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
//            })->save(public_path() . '_html' .$images[$size]);
            })->save(public_path() . $images[$size]);
        }
        return $images;
    }


    protected function fa_num_to_en($string)
    {
        $persian1 = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        $persian2 = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
        $num = range(0, 9);
        $string = str_replace($persian1, $num, $string);
        return str_replace($persian2, $num, $string);
}


}
