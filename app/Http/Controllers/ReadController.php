<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReadController extends Controller
{
    //
    function index(){

        $files = Storage::disk('local')->directories('data');
        $repos = Storage::disk('local')->files('data');

        return view('read.index')->with([
            'files' => $files,
            'repos' => $repos,
        ]);
    }
}
