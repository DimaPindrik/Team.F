<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Widget;

class WidgetController extends Controller
{
  public function index()
  {
    $widgets = Widget::all();
    return view('dashboard.index', compact('widgets'));
  }

  public function show(Widget $widget)
  {
    //return $widget  <-- json object data
    return view('dashboard.show', compact('widget'));
  }
}
