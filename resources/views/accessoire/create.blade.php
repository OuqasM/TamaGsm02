@extends('accessoire.layouts.AccessoirLayout')
@section('contentCss')
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
      <div class="container ">  
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
                    <h3 style="text-align: center;">Ajouter des accessoir</h3>
                    <form action="{{route('createacs')}}" class="contact-form" name="createForm" id="createForm" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                      <div class="wrraper row">
                        <div class="col-md-12 col-sm-12">                      
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
                              <input type="text" name="nom" pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom">
                            </div>
                            <!-- description -->
                            <div class="form-group">
                              <textarea name="description" rows="5" class="form-control"
                               aria-multiline="true"  placeholder="Description" cols="50"></textarea>
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
                            <!-- Upload button -->
                            <div class="form-group">
                              <button class="btn btn-secondary" type="submit" value="upload">Publier le telephone</button>
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