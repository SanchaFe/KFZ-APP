@extends('layout') 
@section('title') KFZ-APP
@endsection
 

@section('jumbotron')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">KFZ-APP</h1>
    <p class="lead">Ohmed Sofizadeh & Hanna Kühl</p>
  </div>
</div>
@endsection
@section('content')


<div class="container">
    <form action="/search" method="POST" role="search">
        @csrf
        <label>Please enter your search request</label>
        <div class="form-group input-group mb-3">
            <input type="text" class="form-control" name="search">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Button</button>
            </div>
        </div>
        @if(isset($search))
        <label>The Search results for your query : <b> {{ $search }} </b> </label> 

        @endif
    </form>
</div>

<table class="table table-hover table-dark form-group">
    <thead>
        <tr>
            <th scope="col">Abkürzungszeichen</th>
            <th scope="col">Stadt</th>
            <th scope="col">Kreis</th>
            <th scope="col">Land</th>
        </tr>
    </thead>
    @foreach($kfz as $kfzdaten)
    <tbody>
        <tr>
            <td>{{ $kfzdaten->abk }}</td>

            <td> {{ $kfzdaten->stadt }} <br>
                <a href="https://de.wikipedia.org/wiki/{{ $kfzdaten->stadt }}" class="btn btn-light">Wiki</a>
                <a href="https://www.google.com/maps/place/{{ $kfzdaten->stadt }}" class="btn btn-success">Maps</a>
            </td>

            <td> {{ $kfzdaten->kreis }} <br>
                <a href="https://de.wikipedia.org/wiki/{{ $kfzdaten->kreis }}" class="btn btn-light">Wiki</a>
                <a href="https://www.google.com/maps/place/{{ $kfzdaten->kreis }}" class="btn btn-success">Maps</a>
            </td>

            <td> {{ $kfzdaten->land }} <br>
                <a href="https://de.wikipedia.org/wiki/{{ $kfzdaten->land }}" class="btn btn-light">Wiki</a>
                <a href="https://www.google.com/maps/place/{{ $kfzdaten->land }}" class="btn btn-success">Maps</a>
            </td>

        </tr>
    </tbody>
    @endforeach
</table>
@endsection