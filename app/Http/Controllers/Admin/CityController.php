<?php

namespace App\Http\Controllers\Admin;

use App\Exports\cityExport;
use App\Http\Controllers\Controller;
use App\Imports\cityImport;
use App\Models\WorldCity;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CityController extends Controller
{
    public function index()
    {
        $cities = WorldCity::select(\DB::raw('world_cities.*'))->paginate(25);
        $currentpage = $cities->currentPage();
        return view('admin.cities.index',compact(['cities','currentpage']));
    }

    function itemSearch(Request $request)
    {
        if($request->ajax())
        {
            $datas = $request->all();
            $cities=WorldCity::where('name','LIKE','%'.$datas['query']."%")->paginate(25);
            $categorycount=WorldCity::where('name','LIKE','%'.$datas['query']."%")->count();
            if($categorycount){
                $currentpage = $cities->currentPage();
                return view('admin.cities.paggination_cities', compact(['cities','currentpage']))->render();
            }else{?>
                <tr>
                    <td colspan="4">No matching records found</td>
                </tr>
            <?php }
        }
    }

    public function create()
    {
        $city = WorldCity::orderBy('id','DESC')->get();
        return json_encode($city);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:world_cities,name',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        //crop Image
        if ($request->image != null) {
            $save_path = public_path('images/city');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/city').'/'.$imageName);
        }
        else{
            $imageName=null;
        }
        $city = new WorldCity();
        $city->name=$request->name;
        $city->image= $imageName;   // public_path('images/city').'/'.
        $city->save();
        Session::flash('message', 'City added successfully.');
        return redirect()->route('admin.cities');

    }

    public function edit(Request $request)
    {
        $cityrow = WorldCity::find($request->id);
//        if(!blank($cityrow)) {
//            $cityrow->name=WorldCity::where('id',$cityrow->id)->value('name');
//        }
        echo $cityrow;
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:world_cities,name',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=400,min_height=400',
        ]);
        $update = WorldCity::find($request->id);
        $update->name = $request->name;
        $update->save();
        if($request->image != '') {
            $save_path = public_path('images/city');
            if (!file_exists($save_path)) {
                mkdir($save_path, 0777, true);
            }
            $getimagename = $update->image;
            $imageName = time().'.'.$request->image->extension();
            $image = $request->file('image');
            $img = Image::make($image->path());
            $img->fit(400,400)->save(public_path('images/city').'/'.$imageName);
            $imageupdate = WorldCity::where('id',$request->id)->update(['image'=>$imageName]);
            if ($getimagename != null) {
                $image_path = public_path().'/images/city/'.$getimagename;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
        }
        Session::flash('message', 'City updated successfully.');
        return redirect()->route('admin.cities');
    }

    public function destroy($id): RedirectResponse
    {
        WorldCity::find($id)->delete();
        Session::flash('message', 'City deleted successfully.');
        return redirect()->route('admin.cities');
    }

    public function import(){
        return view('admin.cities.cities_import');
    }

    public function importCSV(Request $request){
        $request->validate([
            'import_file' => 'required|mimes:xlsx,txt'
        ]);
        try{
            Excel::import(new cityImport,request()->file('import_file'));
        }catch ( ValidationException $e ){
            return response()->json(['success'=>'errorList','message'=> $e->errors()]);
        }
        Session::flash('message', 'City Imported Successfully.');
        return redirect()->route('admin.cities');
    }

    public function downloadCSVSample(): BinaryFileResponse
    {
        return Excel::download(new cityExport, 'city_sheet'.time().'.xlsx');
    }
}
