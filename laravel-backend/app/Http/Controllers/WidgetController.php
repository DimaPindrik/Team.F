<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Widget;
use JWTAuth;


class WidgetController extends Controller
{
  public function show(Widget $widget)
  {
    return view('widgets.'.$widget->path)->withWidget($widget);
  }
  public function getWidgets()
  {
    $user = JWTAuth::parseToken()->toUser();
    $widgets = Widget::all();
    $response = [
      'widgets' => $widgets,
      'user' => $user

    ];
    return response()->json($response, 200);
  }
}
