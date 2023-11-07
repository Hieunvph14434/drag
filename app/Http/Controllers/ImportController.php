<?php

namespace App\Http\Controllers;

use App\Imports\CategoriesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importCate(Request $request)
    {
        // dd($request->file('file'));
        Excel::import(new CategoriesImport(), $request->file('file'));
        return redirect()->route("importGet")->with("message", "Success!");
    }
}
