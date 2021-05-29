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
                              <th>Nom de produit</th>
                              <th>Prix/Solde</th>
                              <th>Nombre de Visite</th>
                              <th>Ajouter le</th>
                              <th>Images</th>
                              <th></th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($collect->all() as $couple)
                              <tr id="tele{{$couple['acss']->id_acces}}">
                                <th>{{$couple['acss']->nom}}</th>
                                <td>{{$couple['acss']->prix}}/{{$couple['acss']->solde ?:0}}</td>
                                <td>{{$couple['acss']->nbr_visite}}</td>
                                <td>{{$couple['acss']->created_at}} par {{$couple['user']->name}}</td>
                                <td><img @if(count($couple['imgs'])>0) src="{{asset('storage/'.$couple['imgs']->get(0)['path'].'')}}" @endif class="rounded" width="30" height="30" /> <i class="fas fa-camera"> {{count($couple['imgs'])}}</i><td>
                                <td><a href="{{ route('editacs',$couple['acss']->id_acces) }}"><button class="btn btn-primary rounded-circle"><i class="fas fa-pencil-alt"></i></button></a>
                                <form style="float:left;" action="{{route('deleteacs')}}" onsubmit="return confirm('Vous êtes sûr de supprimer {{$couple['acss']->nom}}?');" id="formDelete" method="POST">
                                    @csrf
                                    <input type="text" name="id" value="{{$couple['acss']->id_acces}}" hidden>
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