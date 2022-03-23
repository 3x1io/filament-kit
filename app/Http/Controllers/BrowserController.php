<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrowserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('folder_path')) {
            $request->validate([
                "folder_path" => "required",
                "folder_name" => "required",
            ]);

            $root = $request->get('folder_path');
            $name = $request->get('folder_name');
        } else {
            $root = base_path();
            $name = base_path();
        }


        $folders =  File::directories($root);
        $files =  File::files($root);
        $foldersArray = [];
        $filesArray = [];

        foreach ($folders as $folder) {
            array_push($foldersArray, [
                "path" => $folder,
                "name" => str_replace($root . '/', '', $folder),
            ]);
        }

        foreach ($files as $file) {
            array_push($filesArray, [
                "path" => $file,
                "name" => str_replace($root . '/', '', $file),
            ]);
        }


        return response()->json([
            "folders" => $foldersArray,
            "files" => $filesArray,
            "back_path" => str_replace('/' . $name, '', $root),
            "back_name" => $name,
            "current_path" => $root
        ], 200);
    }
}
