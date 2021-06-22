@extends('service.layouts.ServiceLayouts')
@section('Css')
  <style>
            .CentredDiv{
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%,-50%);
            }
            .clas .btn {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      background-color: #555;
      color: white;
      font-size: 16px;
      padding: 12px 24px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
    } 
  </style> 
@endsection
@section('content')    
<div class="container">
    <div class="row">
      <div class="col-sm-12 pt-5">
          <div class="card mt-5">
              <div class="card-header">
                  <h4 class="card-title">Modifier Ce Cervice</h4>
              </div>
              <div class="card-content">
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
                  <form class="form" action="{{route('updatesrv')}}" name="createForm" id="createForm" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}  
                    <div class="form-body">
                          <div class="row">
                              <div class="col-12 px-0">
                                  <div class="form-label-group">
                                    <input type="text" value="{{$service->id}}" hidden name="id">
                                      <input type="text" name="nom" pattern="[A-z0-9\s]+" required value="{{$service->nom}}"  id="nom-service-floating" class="form-control" placeholder="Nom" >
                                      <label for="nom-service-floating">Nom de service</label>
                                  </div>
                              </div>
                              <div class="col-12 px-0">
                                  <div class="form-label-group">
                                      <textarea name="description" rows="5" class="form-control" placeholder="Description" aria-multiline="true" cols="50" id="description-floating">{{$service->description}}</textarea>                                 
                                      <label for="description-floating">Description</label>
                                  </div>
                              </div>
                              <div class="col-12 px-0">
                                  <div class="form-label-group">
                                      <input type="number" id="prix-floating" placeholder="Prix" value="{{$service->prix}}"  class="form-control" required step="0.1" min="0.0" name="prix" >
                                      <label for="prix-floating">Prix</label>
                                  </div>
                              </div>
                              <div class="col-12 px-0">
                                  <div class="form-label-group">
                                      <input type="file" class="image" id="image" name="image" accept="image/png,image/jpeg">  
                                      <label for="image">Ajouter Une image</label>
                                  </div>
                              </div>
                              <div class="col-12 px-0 clas"  >
                                    {{-- @if($service->image != '')
                                      <img src="{{asset('storage/'.$service->image)}}" height="60px" width="50px"/>
                                      <a onclick="deleteImage('{{$service->image}}')" href="#" class="btn"><i class='bx bx-trash'></i></a>
                                    @endif --}}
                              </div>
                              <div class="col-12 px-0 d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary mr-1 mb-1">Enregistrer</button>
                                  <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Initialiser</button>
                              </div>
                          </div>
                      </div>
                  </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
@section('Js')

<script type="text/javascript">
            FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginFileValidateType,
            FilePondPluginImagePreview,
        );        
            FilePond.create(document.getElementById('image'), {
            name: 'image',
            labelIdle: 'Faire glisser ou choisir Une Image',
            allowFileTypeValidation: true,
            acceptedFileTypes: ['.png', '.jpeg', '.jpg'],
            labelFileTypeNotAllowed: 'Le type du fichier est invalide vous devez choisir une image',
            fileValidateTypeLabelExpectedTypes: 'L\'extension doit être : {allTypes}',
            imagePreviewMaxHeight: 200,
            imageCropAspectRatio: '1:1',
            credits: null,
            instantUpload: false
            
        });    
        function deleteImage(PATH){
        $.ajax({
            type : "POST",
            url : '/service/deleteSrvImage',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                path : PATH
            },
            success: function (message) {
             //   document.getElementById('img').style.display = 'none';
            },
            async : false

        });
      }
</script>
@endsection