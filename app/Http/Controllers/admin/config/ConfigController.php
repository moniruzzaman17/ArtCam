<?php

namespace App\Http\Controllers\admin\config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CoreConfigData;
use App\MediaGallery;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

class ConfigController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $logo = MediaGallery::where('name','logo')->first()->value;
      $app_name = CoreConfigData::where('name','app_name')->first()->value;
      $about = CoreConfigData::where('name','about')->first()->value;

      $configration=array(
        'logo' => $logo,
        'appName' => $app_name,
        'about' => $about
    );

      return view('admin.config.config', compact('configration'));
  }

  public function save(Request $request)
  {
    $Messages = ['company_name.required' => 'Company name is required',
    'about.required' => 'About company is required'];

    $validatedData = $request->validate([
        'company_name' => 'required|string',
        'logo' => 'nullable',
        'about' => 'required'
    ],$Messages);

    if ($request->hasFile('logo')) {
        $image = $request->file('logo');

        $media = new MediaGallery;
        $image_name=explode('.',$image->getClientOriginalName())[0];

        $new_name = $image_name . Carbon::now('Asia/Dhaka')->format('YmdHu') .'.' .$image->getClientOriginalExtension();

        MediaGallery::where('name','logo')->update([
            "value" => $new_name
        ]);

            $image_path = public_path('images/'.request('oldLogo'));
            if(File::exists($image_path)) {
              File::delete($image_path);
          }

      $image->move(public_path('images'), $new_name);

      CoreConfigData::where('name','app_name')->update([
        "value" => request('company_name')
    ]);

      CoreConfigData::where('name','about')->update([
        "value" => request('about')
    ]);
      return redirect()->back()->with('success','Configuration has been saved');
  }
  else{
    CoreConfigData::where('name','app_name')->update([
        "value" => request('company_name')
    ]);

    CoreConfigData::where('name','about')->update([
        "value" => request('about')
    ]);
    return redirect()->back()->with('success','Configuration has been saved');
}
}
}
