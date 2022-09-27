<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $img_width = 1024;
    protected $img_height = 400;

    public function getIndex(Request $request)
    {
        $banners = \App\Models\Banner::select(\DB::raw("banners.*"))->orderBy('priority', 'asc')->get();
        $img_width = $this->img_width;
        $img_height = $this->img_height;

        return view('admin.banners.index', compact('banners', 'img_width', 'img_height'));
    }


    public function postCreate(Request $request)
    {

        $this->validate($request, [
            'image' => 'required'
        ]);

        $dataArr = arrayFromPost(['image']);

        try {
            // Start Transaction
            \DB::beginTransaction();

            $banner = new \App\Models\Banner();
            $banner->priority = \App\Models\Banner::max('priority') + 1;
            $banner->image = saveBase64File([
                'width' => $this->img_width,
                'height' => $this->img_height,
                'data_url' => $dataArr->image,
            ]);
            $banner->status = 1;
            $banner->save();

            // Commit Transaction
            \DB::commit();

            return successMessage('banner_image_added');
        } catch (\Throwable $th) {
            // Rollback Transaction
            \DB::rollBack();
            return exceptionErrorMessage($th);
        }
    }


    public function getDelete(Request $request)
    {

        $banner = \App\Models\Banner::where('id', $request->id)->delete();
        return redirect()->route('admin.banners.index');
    }

    public function postChangeImageOrder(Request $request)
    {
        $this->validate($request, [
            'order' => 'required|array'
        ]);
        $dataArr = arrayFromPost(['order']);

        try {
            // Start Transaction
            \DB::beginTransaction();

            if (is_array($dataArr->order) && count($dataArr->order)) {
                foreach ($dataArr->order as $key => $banner_image_id) {
                    $banner_image = \App\Models\Banner::find($banner_image_id);
                    $banner_image->priority = $key + 1;
                    $banner_image->save();
                }
            }

            // Commit Transaction
            \DB::commit();

            return successMessage();
        } catch (\Exception $e) {
            // Rollback Transaction
            \DB::rollBack();
            return exceptionErrorMessage($e);
        }
    }
}
