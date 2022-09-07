<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::all();
        if ($categories != null) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $categories,
                'message' => 'Category Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Category data Exists.'
            ]);
        }
    }

    public function subCategory(Request $request, $id): JsonResponse
    {
        $categories = SubCategory::where(['category_id' => $id])->get();
        if ($categories->count() > 0) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $categories,
                'message' => 'Sub-Category Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Sub-Category data Exists.'
            ]);
        }
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->image != null) {
            $save_path = public_path('images/category');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/category').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $category =new Category();
        $category->title = $request->title;
        $category->image = $imageName;
        $category->description = $request->description;
        $category->top_category = $request->top_category;
        $category->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $category,
            'message' => 'Category Created Successfully.',
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        if ($request->image != null) {
            $save_path = public_path('images/category');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/category').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $category = Category::find($request->id);
        $category->title = $request->title;
        $category->image = $imageName;
        $category->description = $request->description;
        $category->top_category = $request->top_category;
        $category->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $category,
            'message' => 'Category Updated Successfully.',
        ]);
    }

    public function delete(Request $request): JsonResponse
    {
        $category = Category::find($request->id);
        if( File::exists(public_path('images/category/'.$category->image)) ) {
            File::delete(public_path('images/category/'.$category->image));
        }
        $category->delete();
        return response()->json([
            'code' => 200,
            'status' => 1,
            'message' => 'Category Deleted Successfully.',
        ]);
    }
}
