<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index(){
        return response()->json([
            "response" => Settings::find(1)
        ]);
    }

    public function update(Request $request){
        $idToUpdate = 1;
        $currently = $request->currently;
        $is_available = $request->is_available;

        Settings::find($idToUpdate)->update([
            "currently" => $currently,
            "is_available" => $is_available,
        ]);

        return response()->json([
            "response" => "Settings updated successfully",
        ]);
    }
}
