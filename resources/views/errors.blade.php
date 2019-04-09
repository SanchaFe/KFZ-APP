@if ($errors->any())
<div class="alert alert-danger span2 clearfix" style="top: 20px" role="alert">
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
    No changes made...
</div>
@endif
@if(session()->has('message'))
    <div class="alert alert-success" style="top: 20px" role="alert">
        {{ session()->get('message') }}
    </div>
@endif