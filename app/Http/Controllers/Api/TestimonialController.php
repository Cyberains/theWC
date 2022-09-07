<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    public function testimonial(): JsonResponse
    {
        $testimonials = Testimonial::where(['status'=> 1])->get();
        if ($testimonials->count() > 0) {
            return response()->json([
                'code' => 200,
                'status' => 1,
                'data' => $testimonials,
                'message' => 'Testimonial Data Successfully Received.'
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'status' => 0,
                'message' => 'No Testimonial data Exists.'
            ]);
        }
    }

    public function create(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required',
            'file_name' => 'required',
        ]);
        if ($request->file_name != null) {
            $save_path = public_path('images/testimonials');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->file_name->extension();
            $image = $request->file('file_name');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/testimonials').'/'.$imageName);
        }
        else{
            $imageName = null;
        }
        $testimonial =new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->base_path = url('public/images/testimonials/');
        $testimonial->file_name = $imageName;
        $testimonial->description = $request->description;
        $testimonial->save();

        return response()->json([
            'code' => 200,
            'status' => 1,
            'data' => $testimonial,
            'message' => 'Testimonial Created Successfully.',
        ]);
    }
}
