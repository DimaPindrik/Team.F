<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use JWTAuth;

class GalleryController extends Controller
{
  public function viewGalleryList(Request $request)
  {

  }

  public function viewGalleryPics()
  {

  }

  public function doImageUpload(Request $request)
  {
    return $request->all();
    return response()->json([
      'message' => 'Image Successfully Uploaded!',
      'image' => $image
      ],200);
  }

  public function saveGallery(Request $request)
  {

  }

}
