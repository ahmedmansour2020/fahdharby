<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
  public function to_info(){
    $title = "معلومات الموقع";
    $duration_number=Setting::where('key','duration_number')->first();

    return view('admin.settings.info',compact('title','duration_number'));
  }

  public function save_info(Request $request){
    $type = 'info';
    Setting::where('type', $type)->delete();
    if (request('duration_number')) {
        $duration_number = new Setting();
        $duration_number->type = $type;
        $duration_number->key = 'duration_number';
        $duration_number->value = request('duration_number');
        $duration_number->save();
    }
    return redirect()->back()->with('success', __('items.success_update'));
  }
}
