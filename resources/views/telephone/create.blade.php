@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')

  <style>
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                margin: 0; 
            }
            input:focus {

            outline-color: rgb(233, 0, 0);
            }
            img {
            max-width: 100%; }


            .tab-content {
            overflow: hidden; }
            .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
              animation-name: opacity;
            -webkit-animation-duration: .3s;
              animation-duration: .3s; }

            .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em; }

            @media screen and (min-width: 997px) {
            .wrapper {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex; } }


            .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; }

            .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;



            font-weight: bold; }

            .checked, .price span {
            color: #ff9f1a; }


            .product-title {
            margin-top: 0; }

            .size {
            margin-right: 10px; }
            .size:first-of-type {
            margin-left: 40px; }


            /*# sourceMappingURL=style.css.map */
  </style> 
@endsection
@section('content')    
      <div class="container">  
        <div class="card px-3">
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
                              <input type="text" name="nomproduit" pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom De Produit">
                            </div>
                            <!-- description -->
                            <div class="form-group">
                              <textarea name="description" rows="5" class="form-control"
                               aria-multiline="true"  placeholder="Description du produit" cols="50"></textarea>
                              </div>
                            <!-- prix -->
                            <div class="form-group">
                              <input type="number" placeholder="Prix" class="form-control"  required step="0.1" min="0.0" id="prix" name="prix" />DH
                            </div>
                            <!-- solde -->
                            <div class="form-group">
                              <input type="number" placeholder="Solde" step="0.1" class="form-control"  min="0.0" id="solde" name="solde" />DH
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
                                <th scope="row">Ram</th>
                                <td class="px-0"><img src="{{ asset('images/ram.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price " data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="ram" name="ram" /></span> Gb</td>
                                
                              </tr>
                              <tr>
                                <th scope="row">Stockage</th>
                                <td class="px-0"><img src="{{ asset('images/storage.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" step="0.1" class="form-control" class="w-50" min="0.0" id="stockage" name="stockage"/>
                                </span> Gb</td>
                              </tr>
                              <tr>
                                <th scope="row">Batterie</th>
                                <td class="px-0"><img src="{{ asset('images/battery.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="batterie" name="batterie"/>
                                </span> mA</td>
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
  @endsection
@section('contentJs')

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