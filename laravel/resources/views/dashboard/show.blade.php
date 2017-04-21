@extends('layouts.master')

@section('title')
  ~Widget Dashboard~
@endsection

@section('content')

  <section class="jumbotron text-center">
    <div class="container">
        <p>{{ $widget->name }}</p>
    </div>
  </section>

@endsection

@section('footer')

  <script src="/js/file.js"></script>

@endsection
