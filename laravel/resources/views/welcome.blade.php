@extends('layouts.master')

@section('title')
  !Welcome!
@endsection

@section('content')
  @if(count($errors) > 0)
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col-md-6">
      <h3 class="raleway">Sign <span class="text-red">Up</span></h3>
      <form action="{{ route('signup') }}" method="post">
        <div class="form-group">
          <label for="email">Your E-Mail</label>
          <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}" />
        </div>
        <div class="form-group">
          <label for="username">Your Username</label>
          <input class="form-control" type="text" name="username" id="username" value="{{ Request::old('username') }}" />
        </div>
        <div class="form-group">
          <label for="password">Your Password</label>
          <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}" />
      </form>
    </div>
    <div class="col-md-6">
      <h3 class="raleway">Sign <span class="text-red">In</span></h3>
      <form action="{{ route('signin') }}" method="post">
        <div class="form-group">
          <label for="email">Your E-Mail</label>
          <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}" />
        </div>
        <div class="form-group">
          <label for="password">Your Password</label>
          <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}" />
      </form>
    </div>
  </div>
  </div>

@endsection
