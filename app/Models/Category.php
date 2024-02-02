<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $imageUrl, $image;

    public static function newCategory($request)
    {
        self::saveInfo(new Category(), $request, self::imageSave($request->file('image')));
    }
    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if (self::$image = $request->file('image')) {

            self::deleteImageFromFolder(self::$category->image);

            self::$imageUrl = self::imageSave(self::$image);

        } else {

            self::$imageUrl = self::$category->image;
        }
        self::saveInfo(self::$category, $request, self::$imageUrl);
    }

    public static function deleteCategory($request)
    {
        self::$category = Category::find($request->id);

        self::deleteImageFromFolder(self::$category->image);

        self::$category->delete();
    }
    // Delete Image from folder 
    private static function deleteImageFromFolder($image)
    {
        if (file_exists($image)) {
            unlink($image);
        }
    }

    //get image Url
    private static function imageSave($image)
    {
        $extension = $image->extension();
        $imageName = time() . '.' . $extension;
        $directory = "Upload/category-image/";
        $image->move($directory, $imageName);
        $imageUrl = $directory . $imageName;
        return $imageUrl;
    }

    //save Basic information 
    private static function saveInfo($category, $request, $imageUrl)
    {
        $category->name  = $request->name;
        $category->description  = $request->description;
        $category->image  = $imageUrl;
        $category->status  = $request->status;
        $category->save();
    }
}
