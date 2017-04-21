@extends('layouts.master')

@section('title')
  ~Widget Dashboard~
@endsection

@section('content')

  <div id="app">
    <div class="row">
      <todolist class="col-md-4"></todoList>
      <test class="col-md-4 "></test>         
      <weather class="col-md-4"></weather>
    </div>
    <div class="row">
      <example class="col-md-4"></example>
      <weather class="col-md-4"></weather>
      <wiki class="col-md-4"></wiki>
    </div>

  </div>
@endsection
