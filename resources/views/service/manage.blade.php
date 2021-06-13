@extends('service.layouts.ServiceLayouts')
@section('Css')
   <style></style>
@endsection
@section('content')
<div class="container">
  <div class="row">
      <div class="col-sm-12 pt-5">
          <div class="card">
              <div class="card-body">
            @if(Session::has('success'))
                <div class="alert border-primary alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                        <i class="bx bx-star"></i>
                        <span>
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </span>
                    </div>
                </div>
            @elseif(Session::has('failed'))
                <div class="alert border-warning alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center">
                        <i class="bx bx-star"></i>
                        <span>
                            {{ Session::get('failed') }}
                            @php
                                Session::forget('failed');
                            @endphp
                        </span>
                    </div>
                </div>
            @endif
                  <table id="acs" class="table table-striped dt-responsive nowrap">
                      <thead>
                          <tr>
                              <th>Service</th>
                              <th>Prix</th>
                              <th>Ajouter le</th>
                              <th>Images</th>
                              <th></th>
                              <th></th><div class="container">
  <div class="row">
      <div class="col-sm-12 pt-5">
                           </tr>
                      </thead>
                      <tbody>
                          @foreach ($services as $couple)
                              <tr>
                                <th>{{$couple->nom}}</th>
                                <td>{{$couple->prix}}</td>
                                <td>{{$couple->created_at}}</td>
                                <td><img src="{{asset('storage/'.$couple['image'].'')}}" class="rounded" width="30" height="30" /></td>
                                <td>
                                <a style="float:right;" href="{{ route('editsrv',$couple->id) }}"><button class="btn btn-primary rounded-circle"><i class='bx bx-edit' ></i></button></a>
                                <form style="float:left;" action="{{route('deletesrv')}}" onsubmit="return confirm('Vous êtes sûr de supprimer {{$couple->nom}}?');" id="formDelete" method="POST">
                                    @csrf
                                    <input type="text" name="id" value="{{$couple->id}}" hidden>
                                    <button type="submit"  class="btn btn-primary rounded-circle"><i class='bx bx-trash' ></i></button>
                                </form> 
                                </td>
                                <td></td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div> <!-- end card body-->
          </div> <!-- end card -->
      </div><!-- end col-->
  </div>
  <!-- end row-->
</div>
@endsection
@section('Js')
      
      <script>
        $('#acs').dataTable( {
        "pageLength" : 6,
        "lengthChange": true,

        });

    </script>   
@endsection