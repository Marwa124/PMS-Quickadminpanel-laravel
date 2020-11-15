<?php

namespace App\Http\Controllers;

use App\Imports\FingerprintImport;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportsController extends Controller
{



    public function user(){
        return view('imports.user');
    }

    public function storeUser(){
        Excel::import(new UsersImport(), request()->file('file'));
        return back();
    }
}
