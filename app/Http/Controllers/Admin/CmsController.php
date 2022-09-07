<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function getIndex(Request $request)
    {

        $cms = Cms::select(\DB::raw("cms.*"))->where('type', $request->type)->first();
        return view('admin.cms.index', compact('cms'));
    }

    public function postUpdate(Request $request)
    {
        $this->validate($request, [
            'heading' => 'required',
            'description' => 'required'
        ]);


        try {

            $cms = Cms::where('type', $request->type)->first();
            if (blank($cms)) {
                return errorMessage('data_not_found');
            }
            $cms->heading = $request->heading;
            $cms->description = $request->description;
            $cms->save();
            return successMessage('cms_updated');
        } catch (\Throwable $th) {
            // Rollback Transaction
            \DB::rollBack();
            return exceptionErrorMessage($th);
        }
    }
}
