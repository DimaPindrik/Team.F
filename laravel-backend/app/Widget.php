<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
  public function getPathAttribute() {
    return str_replace(' ', '', strtolower($this->name));
  }
}
