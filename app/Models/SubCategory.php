<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subCategory, $image, $imageName, $directory, $extension, $imageUrl;
    public static function NewSubCategory($request)
    {
        self::$image = $request->file('image');
        self::$imageUrl = self::getImageUrl(self::$image);

        self::$subCategory = new SubCategory();
        self::$subCategory->name = $request->name;
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::$imageUrl;
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }
    public static function updateCategory($request)
    {
        self::$subCategory = SubCategory::find($request->id);
        if (self::$image = $request->file('image')) {
            self::deleteImageFromFolder(self::$subCategory->image);
            self::$imageUrl = self::getImageUrl(self::$image);
        } else {
            self::$imageUrl = self::$subCategory->image;
        }

        self::$subCategory->name = $request->name;
        // self::$subCategory->category_id = $request->category_id;
        self::$subCategory->description = $request->description;
        self::$subCategory->image = self::$imageUrl;
        self::$subCategory->status = $request->status;
        self::$subCategory->save();
    }
    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        self::deleteImageFromFolder(self::$subCategory->image);
        self::$subCategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    private static function getImageUrl($image)
    {
        $extension = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $extension;
        $directory = "Upload/sub-category-image/";
        $image->move($directory, $imageName);
        $imageUrl  = $directory . $imageName;
        return $imageUrl;
    }
    private static function deleteImageFromFolder($image)
    {
        if (file_exists($image)) {
            unlink($image);
        }
    }
}
