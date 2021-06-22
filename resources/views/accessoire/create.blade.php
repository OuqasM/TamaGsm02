@extends('accessoire.layouts.AccessoirLayout')
@section('Css')
   
@endsection
@section('content')    
<div class="container">
  <div class="row">
    <div class="col-sm-12 pt-5">
      <div class="card ">
          <div class="card-header">
              <h4 class="card-title">Ajouter Un accessoire</h4>
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
                        <form action="{{route('createacs')}}" class="form" name="createForm" id="createForm" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                          <div class="wrraper row">
                            <div class="col-md-6 col-sm-12">                      
                                <!-- Type-->
                                <div class="form-group ">
                                  <select name="type"  id="catgroup" class="select form-control"  required>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled selected >-- Accessoires Téléphone et Tablette --</option>
                                    <option value="PTT">Protection téléphone et tablette</option>
                                    <option value="CTT">Chargeur téléphone et tablette</option>
                                    <option value="CEE">Casque, écouteurs et enceinte</option>
                                    <option value="STP">Support téléphone portable</option>
                                    <option value="PDT">Pièces détachées téléphone</option>
                                    <option value="CAT">Cables & adaptateurs téléphone</option>
                                    <option value="AP">Accessoires Photo</option>
                                    <option value="CTP">Connectique TV / PC</option>
                                    <option value="AS">Accessoires de sport</option>
                                  </select>
                                </div>
                                <!-- nom de produit -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                    <input type="text" id="nom" name="nom" pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom">
                                    <label for="nom">Nom d'accessoire</label>
                                </div>
                                </div>
                                <!-- description -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                    <textarea name="description" rows="5" class="form-control" placeholder="Description" aria-multiline="true" cols="50" id="description-floating"></textarea>                                 
                                    <label for="description-floating">Description d'accessoire</label>
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">                        
                                <!-- prix -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                  <input type="number" placeholder="Prix" class="form-control"  required step="0.1" min="0.0" id="prix" name="prix" />DH
                                  <label for="prix">prix d'accessoir</label>  
                                  </div>
                                </div>
                                <!-- solde -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                  <input type="number" placeholder="Solde" step="0.1" class="form-control"  min="0.0" id="solde" name="solde" />DH
                                  <label for="solde">Ajouter un solde</label>  
                                  </div>
                                </div>
                                <!--file-->                
                                <div class="form-group">
                                  <input type="file" class="images" id="images" name="images[]" accept="image/png,image/jpeg" multiple>  
                                </div>
                            </div>
                                <!-- Upload button -->
                                <div class="col-12 px-0 d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary mr-1 mb-1">Ajouter</button>
                                  <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Annuler</button>
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
            FilePond.create(document.getElementById('images'), {
            name: 'images[]',
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
      
      var form = document.getElementById("createForm");
      var solde = document.getElementById("solde");
 


    form.addEventListener('submit', function(e){
      e.preventDefault();

    
        if(solde.value.trim() === ""){
            solde.value = "0";
          console.log(solde.value);
        }
        form.submit();
      });
      


    
</script>

@endsection