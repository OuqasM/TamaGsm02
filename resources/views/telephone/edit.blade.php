@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')
    <!-- DataTables -->
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="container-fluid">
  <div class="row page-title">
      <div class="col-md-12">
          <div class="float-right mt-1">
              <a class="btn btn-success add-button" href="#">Ajouter</a>
          </div>
          <h4 class="mb-1 mt-0">Les Cours</h4>
      </div>
  </div>
  <div class="row">
      <div class="col-12">
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
                  <table id="telephone" class="table dt-responsive nowrap">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Nom de produit</th>
                              <th>Prix</th>
                              <th>Solde</th>
                              <th>Nombre de Visite</th>
                              <th>Images</th>
                              <th>Ajouter par</th>
                              <th>Ajouter le</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($collect->all() as $couple)
                              <tr>
                                <td>{{$couple['telephones']->id_tele}}</td>
                                <td>{{$couple['telephones']->nom}}</td>
                                <td>{{$couple['telephones']->prix}}</td>
                                <td>{{$couple['telephones']->solde}}</td>
                                <td>{{$couple['telephones']->nbr_visite}}</td>
                                <td>
                                  @if($couple['imgs']->get(0)!=null)
                                        <img src="{{asset('storage/'.$couple['imgs']->get(0)['path'].'')}}" class="rounded"width="30" height="30"  />
                                  @else
                                        <img src="{{asset('images/no-image.png')}}" class="rounded" width="30" height="30" />        
                                  @endif
                                </td>
                                <td>{{$couple['user']->name}}</td>
                                <td>{{$couple['telephones']->created_at}}</td>
                                {{-- <form action="{{ route('enseignant.cours.destroy', $cour) }}" method="POST"
                                          style="display: inline-block">
                                          {{ method_field('DELETE') }}
                                          {{ csrf_field() }}
                                          <input type="submit" value="Supprimer" class="btn btn-danger">
                                      </form> --}}
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
      <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.init.js') }}"></script>
      <script>
        $('#telephone').dataTable( {
        "pageLength" : 5,
        "lengthChange": false
        } );  
      </script>    
@endsection