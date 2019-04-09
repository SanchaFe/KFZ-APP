@extends('layout') 
@section('title') KFZ-APP
@endsection
 
@section('jumbotron')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Serializer</h1>
    <p class="lead">Here you can upload & download <b>.csv .xml .json</b> files.</p>
  </div>
</div>
@endsection

@section('err')
@include('errors')
@endsection

@section('content')

<h2>Upload files</h2>


<div id="accordion">

  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            CSV
          </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <div class="container">

          <form action="{{url('/serializercsv')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="upload-file">Input .csv file</label>
              <input type="file" class="form-control-file" name="upload-file">
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            XML
          </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <div class="container">
          <form action="{{url('/serializerxml')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="upload-file">Input .xml file</label>
              <input type="file" class="form-control-file" name="upload-file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            JSON
          </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <div class="container">
          <form action="{{url('/serializerjson')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="upload-file">Input .json file</label>
              <input type="file" class="form-control-file" name="upload-file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
 
@section('content2')
<h2>Download files</h2>
<div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Download file as .csv</h5>
        <p class="card-text">Download database content...</p>
        <form action="{{url('/serializergetcsv')}}" method="post" enctype="multipart/form-data">
          @csrf
        <button type="submit" class="btn btn-primary">Download as CSV</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Download file as .xml</h5>
        <p class="card-text">Download database content...</p>
        <button type="submit" class="btn btn-primary">Download as XML</button>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Download file as .json</h5>
        <p class="card-text">Download database content...</p>
        <button type="submit" class="btn btn-primary">Download as JSON</button>
      </div>
    </div>
  </div>
</div>
@endsection