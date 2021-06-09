@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')
    <!-- DataTables -->
    <link href="{{ asset('css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="container">
  <div class="row">
      <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @elseif(Session::has('failed'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('failed') }}
                    @php
                        Session::forget('failed');
                    @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($services as $couple)
                              <tr>
                                <th>{{$couple->nom}}</th>
                                <td>{{$couple->prix}}</td>
                                <td>{{$couple->created_at}}</td>
                                <td><img src="{{asset('storage/'.$couple['image'].'')}}" class="rounded" width="30" height="30" /><td>
                                <td><a style="float:right;" href="{{ route('editsrv',$couple->id) }}"><button class="btn btn-primary rounded-circle"><i class="fas fa-pencil-alt"></i></button></a>
                                <form style="float:left;" action="{{route('deletesrv')}}" onsubmit="return confirm('Vous êtes sûr de supprimer {{$couple->nom}}?');" id="formDelete" method="POST">
                                    @csrf
                                    <input type="text" name="id" value="{{$couple->id_acces}}" hidden>
                                    <button type="submit"  class="btn btn-primary rounded-circle"><i class="fa fa-trash"></i></button>
                                </form> 
                                </td>
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
@section('contentJs')
      <!-- Datatable Assets -->
      <script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.init.js') }}"></script>
      <script>
        $('#acs').dataTable( {
        "pageLength" : 6,
        "lengthChange": true,

        });

    </script>   
@endsection