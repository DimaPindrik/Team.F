<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::to('css/main.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Khand:400,300,500,600,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,500,300,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,700,400italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic|Montserrat:400,700|Ubuntu:400,300,300italic,400italic,500italic,500,700,700italic|Lobster|Pacifico|Quicksand:400,300,700|Questrial|Architects+Daughter|Kaushan+Script|Satisfy|Fugaz+One|Oleo+Script:400,700|Audiowide' rel='stylesheet' type='text/css'>

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>
        <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' }; </script>

        <title>@yield('title')</title>

            <center><h1 class="khand"><span class="font150">TEAM<span class="text-red">F</span><class="font150">PROJECT</span></h1></center>

    </head>

    <body>
      @include('includes.header')
        <div class="container">
          @yield('content')
        </div>
    </body>

    <br  />
    <footer>
        @include('includes.footer')
    </footer>


<script src="{{ mix("js/app.js") }}"></script>
</html>
