@extends('telephone.layouts.TelephoneLayouts')
@section('Css')

@endsection
@section('content')    
<div class="container">
  <div class="row">
    <div class="col-sm-12 pt-5">
      <div class="card ">
      <div class="card-header">
          <h4 class="card-title">Ajouter Un Telephone</h4>
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
                    <form action="{{route('createtelephone')}}" class="contact-form" name="createForm" id="createForm" enctype="multipart/form-data" onsubmit = "return(validate());" method="POST">
                        {{ csrf_field() }}
                      <div class="wrraper row">
                        <div class="col-md-6">                      
                            <!-- marque-->
                            <div class="form-group ">
                                <select name="marque" id="catgroup" class="select form-control" required>
                                    <option value="" disabled selected>Marque</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="1000">-- Telephones --</option>
                                    <option value="Huawei">Huawei</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Apple">Apple</option>
                                    <option value="Xiaomi">Xiaomi</option>
                                    <option value="Oppo">Oppo</option>
                                    <option value="OnePlus">OnePlus</option>
                                    <option value="Motorola">Motorola</option>
                                    <option value="Sony">Sony</option>
                                    <option value="Autres">Autres</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="2000">-- Tablettes et Autres --</option>
                                    <option value="HuaweiT">Huawei</option>
                                    <option value="SamsungT">Samsung</option>
                                    <option value="AppleT">Apple</option>
                                    <option value="AutresT">Autres</option>
                                </select>
                            </div>
                            <!-- nom de produit -->
                            <div class="form-group">
                                <div class="form-label-group">
                                  <input type="text" name="nomproduit" id="nomproduit-floating" pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom">
                                  <label for="nomproduit-floating">Nom de produit</label>
                                </div>
                            </div>
                            <!-- description -->
                            <div class="form-group">
                               <div class="form-label-group">
                                <textarea name="description" id="description-floating" rows="5" class="form-control"
                                aria-multiline="true"  placeholder="Description" cols="50"></textarea>      
                                <label for="description-floating">Description du Telephone</label>
                              </div>
                            </div>
                            <!-- prix -->
                            <div class="form-group">
                              <div class="form-label-group">
                                <input type="number" placeholder="Prix" class="form-control"  required step="0.1" min="0.0" id="prix-floating" name="prix" />
                                <label for="prix-floating">prix du telephone en DH</label>
                              </div>
                            </div>
                            <!-- solde -->
                            <div class="form-group">
                              <div class="form-label-group">
                                <input type="number" placeholder="Solde" step="0.1" class="form-control"  min="0.0" id="solde-floating" name="solde" />
                                <label for="solde-floating">solde du telephone en DH</label>
                              </div>
                            </div>
                            <!--file-->                
                            <div class="form-group">
                              <input type="file" class="images" id="images" name="images[]" accept="image/png,image/jpeg" multiple>  
                            </div>
                        </div>
                        <div class="col-md-6" >                      
                          <!-- configuration -->
                          <table class="table table-striped form-group">                      
                            <tbody>
                              <tr>
                                <td class="pt-0 mr-1"><img src="{{ asset('images/ram.png') }}"
                                  width="30" height="30" /></td>
                                <td colspan="2" class="p-1">                   
                                 <div class="form-label-group">
                                  <input type="number" class="form-control" placeholder="La Ram" class="w-50" min="0.0" step="0.1" id="ram" name="ram" />
                                  <label for="ram">Géga bytes</label>
                                </div>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Stockage</th>
                                <td class="px-0"><img src="{{ asset('images/storage.png') }}"
                                  width="30" height="30" /></td>
                                <td>
                                  <div class="form-label-group">
                                    <input type="number" step="0.1" class="form-control" placeholder="Le Stockage" class="w-50" min="0.0" id="stockage" name="stockage"/>
                                    <label for="stockage">Géga bytes</label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Batterie</th>
                                <td class="px-0"><img src="{{ asset('images/battery.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="batterie" name="batterie"/>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">Caméra</th>
                                <td class="px-0"><img src="{{ asset('images/mobile-camera.png') }}"
                                  width="30" height="30" /></td>
                                <td ><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" step="0.1" class="w-50" min="0.0" id="camera" name="camera"/>  
                                </span> Mp</td>
                              </tr>
                                <th scope="row">Caméra Selfy</th>
                                <td class="px-0"><img src="{{ asset('images/selfie.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="selfie" name="selfie"/>
                                </span> Mp
                                </td>                                
                              </tr>                            
                              <tr>
                                <th scope="row">Ecran</th>
                                <td class="px-0"><img src="{{ asset('images/icran.png') }}"
                                  width="30"  height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" step="0.1"  class="w-50" min="0.0" id="ecran" name="ecran"/>
                                </span> P
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- Upload button -->
                          <div class="form-group">
                              <button class="btn btn-secondary" type="submit" value="upload">Ajouter</button>
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
            labelIdle: 'Faire glisser ou choisir les images du Telephone',
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
      var ram = document.getElementById("ram");
      var stockage = document.getElementById("stockage");
      var batterie = document.getElementById("batterie");
      var camera = document.getElementById("camera");
      var selfie = document.getElementById("selfie");
      var ecran = document.getElementById("ecran");


    form.addEventListener('submit', function(e){
      e.preventDefault();

      var arr = [ram,solde, stockage, batterie, camera, selfie, ecran ];
      arr.forEach(element => {
        if(element.value.trim() === ""){
          element.value = "0";
          console.log(element.value);
        }
      });
      form.submit();
      });
      


    
</script>

@endsection