<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostPhoto;

class PostPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = PostPhoto::all();
        return view('admin.postPhotos.index', compact('photos'));
    }
}
