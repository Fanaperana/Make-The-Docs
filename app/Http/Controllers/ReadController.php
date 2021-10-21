<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReadController extends Controller
{
    //
    function index(){

        $files = Storage::directories('public/data/Users');
        $repos = Storage::files('public/data');

        return view('read.index')->with([
            'files' => $files,
            'repos' => $repos,
        ]);
    }
}
