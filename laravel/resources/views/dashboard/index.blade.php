@extends('layouts.master')

@section('title')
  ~Widget Dashboard~
@endsection

@section('content')

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="khand"><span class="font150">WIDGET<span class="text-red">DASHBOARD</span></span></h1>
      <p class="lead text-muted">This is the dashboard menu for the widgets</p>
      <div class="row">
        @foreach ($widgets as $widget)
        <div class="col-md-4">
          <center><a href="/dashboard/ {{ $widget->id }}">
          <img src="{{ $widget->image }}"  width="80" height="80">
          </a>
          <p>{{ $widget->name }}</p>
          <p class="lead text-muted">{{ $widget->description }}</p></center>
        </div>
        @endforeach
      </div>
    </div>
  </section>

@endsection

@section('footer')

  <script src="/js/file.js"></script>

@endsection
