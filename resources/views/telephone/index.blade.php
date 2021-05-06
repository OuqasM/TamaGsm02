@extends('telephone.layouts.TelephoneLayouts')
@section('content')
<div class="container">
<form action="{{route('addImg')}}" method="post" enctype="multipart/form-data">
  {{ method_field('POST') }}
  {{ csrf_field() }}
  <div class="card-header">
    <h4 class="card-title"> stor tele image </h4>
  </div>
  <div class="card-body">
    <div class="form-group">
      <input type="number" class="form-control" id="id" name="id" placeholder="Enter Id">
    </div>
    
        <div class="form-group">
          <input type="file" class="main_image" id="image" name="image" accept="image/png,image/jpeg">
          {!!$errors->first('image', '<span class="text-danger">:message</span>')!!}
        </div>
  </div>
  <div class="card-footer">

    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </form>
</div>
  @endsection