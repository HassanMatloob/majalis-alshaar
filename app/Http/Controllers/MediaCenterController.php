<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaCenterController extends Controller
{
    public function index() {
        return view('pages.media-center.list');
    }

    public function show() {
        return view('pages.media-center.show');
    }
}
