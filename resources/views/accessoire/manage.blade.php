@extends('accessoire.layouts.AccessoirLayout')
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
                              <tr>
                                <th>{{$couple['acss']->nom}}</th>
                                <td>{{$couple['acss']->prix}}/{{$couple['acss']->per_solde }}</td>
                                <td>{{$couple['acss']->nbr_visite}}</td>
                                <td>{{$couple['acss']->created_at}} par {{$couple['user']->name}}</td>
                                <td><img @if(count($couple['imgs'])>0) src="{{asset('storage/'.$couple['imgs']->get(0)['path'].'')}}" @endif class="rounded" width="30" height="30" /> <i class="fas fa-camera"> {{count($couple['imgs'])}}</i><td>
                                <td><a  href="{{ route('editacs',$couple['acss']->id_acces) }}"><button class="btn btn-primary rounded-circle"><i class="bx bx-edit"></i></button></a>
                                <form style="float:left;" action="{{route('deleteacs')}}" onsubmit="return confirm('Vous êtes sûr de supprimer {{$couple['acss']->nom}}?');" id="formDelete" method="POST">
                                    @csrf
                                    <input type="text" name="id" value="{{$couple['acss']->id_acces}}" hidden>
                                    <button type="submit"  class="btn btn-primary rounded-circle"><i class="bx bx-trash"></i></button>
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
@section('Js')
      
      <script>
        $('#acs').dataTable( {
        "pageLength" : 6,
        "lengthChange": true,

        });

    </script>   
@endsection