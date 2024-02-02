<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    private static $brand,$image,$newImage,$extension,$directory,$imageUrl;
    public static function newBrand($request)
    {
        self::$image = $request->file('image');
        self::$imageUrl = self::saveImage(self::$image);

        self::$brand = new Brand();
        self::saveInfo(self::$brand,$request,self::$imageUrl);
       
    }
    public static function updateBrand($request)
    {
        self::$brand = Brand::find($request->id);
        if(self::$image = $request->file('image'))
        {
            self::deleteImageFromFolder(self::$brand->image);
            self::$imageUrl = self::saveImage(self::$image);
        }
        else {
            self::$imageUrl = self::$brand->image;
        }
        self::saveInfo(self::$brand,$request,self::$imageUrl);
    }
    public static function deleteBrand($request)
    {
        self::$brand = Brand::find($request->id);
        self::deleteImageFromFolder(self::$brand->image);
        self::$brand->delete();
    }
    private static function saveImage($image)
    {
            $extension = $image->extension();
            $newImage = time().'.'.$extension;
            $directory = "upload/brand-image/";
            $image->move($directory,$newImage);
            $imageUrl = $directory . $newImage;
            return $imageUrl;
    }
    private static function saveInfo($brand,$request,$imageUrl)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
    }
    private static function deleteImageFromFolder($image)
    {
        if(file_exists($image))
            {
                unlink($image);
            }
    }
}
