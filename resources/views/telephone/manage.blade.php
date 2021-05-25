@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')
    <!-- DataTables -->
    <link href="{{ asset('css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="container-fluid">
  
  <div class="row">
      <div class="col-sm-12">
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
          @endif
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
                  <table id="telephone" class="table table-striped dt-responsive nowrap">
                      <thead>
                          <tr>
                              <th>Nom de produit</th>
                              <th>Prix/Solde</th>
                              <th>Nombre de Visite</th>
                              <th>Ajouter par</th>
                              <th>Ajouter le</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($collect->all() as $couple)
                              <tr>
                                <td>{{$couple['telephones']->nom}}</td>
                                <td>{{$couple['telephones']->prix}}/{{$couple['telephones']->solde ?:0}}</td>
                                <td>{{$couple['telephones']->nbr_visite}}</td>
                                <td>{{$couple['user']->name}}</td>
                                <td>{{$couple['telephones']->created_at}}</td>
                                <td><a href="{{ route('deletephone',$couple['telephones']->id_tele) }}"><input type="submit" value="Supprimer" class="btn btn-danger"></a></td>
                                <td><a href="{{ route('editphone',$couple['telephones']->id_tele) }}"><input type="submit" value="Modifiée" class="btn btn-primary"></a></td>
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
        $('#telephone').dataTable( {
        "pageLength" : 6,
        "lengthChange": true,

        } );  
      </script>    
@endsection