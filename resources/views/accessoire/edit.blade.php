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
            max-width: 100%; 
          }
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
            display: flex; } 
          }
            .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1; 
            }
            .product-title, .price, .sizes, .colors {
            text-transform: UPPERCASE;
            font-weight: bold; 
          }
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
                    <form action="{{route('updateacs')}}" class="contact-form" name="createForm" id="createForm" enctype="multipart/form-data"  method="POST">
                        {{ csrf_field() }}
                      <div class="wrraper row">
                        <div class="col-md-12 col-sm-12">                      
                            <!-- marque-->
                            <div class="form-group ">
                                <select name="type"  id="catgroup" class="select form-control"  required>
                                    <option value="" disabled >Marque</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="1000">-- Telephones --</option>
                                    <option value="Huawei" {!! ($acss->type == 'Huawei') ? 'selected': '' !!} >Huawei</option>
                                    <option value="Samsung"  {!! ($acss->type == 'Samsung') ? 'selected': '' !!}>Samsung</option>
                                    <option value="Apple"  {!! ($acss->type == 'Apple') ? 'selected': '' !!}>Apple</option>
                                    <option value="Xiaomi" {!! ($acss->type == 'Xiaomi') ? 'selected': '' !!}>Xiaomi</option>
                                    <option value="Oppo"  {!! ($acss->type == 'Oppo') ? 'selected': '' !!}>Oppo</option>
                                    <option value="OnePlus"  {!! ($acss->type == 'OnePlus') ? 'selected': '' !!}>OnePlus</option>
                                    <option value="Motorola"  {!! ($acss->type == 'Motorola') ? 'selected': '' !!}>Motorola</option>
                                    <option value="Sony"  {!! ($acss->type == 'Sony') ? 'selected': '' !!}>Sony</option>
                                    <option value="Autres"  {!! ($acss->type == 'Autres') ? 'selected': '' !!}>Autres</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="2000">-- Tablettes et Autres --</option>
                                    <option value="HuaweiT"  {!! ($acss->type == 'HuaweiT') ? 'selected': '' !!}>Huawei</option>
                                    <option value="SamsungT"  {!! ($acss->type == 'SamsungT') ? 'selected': '' !!}>Samsung</option>
                                    <option value="AppleT"  {!! ($acss->type == 'AppleT') ? 'selected': '' !!}>Apple</option>
                                    <option value="AutresT"  {!! ($acss->type == 'AutresT') ? 'selected': '' !!}>Autres</option>
                                </select>
                            </div>
                            <input type="text" value="{{$acss->id_acces}}" hidden name="idphone">
                            <!-- nom de produit -->
                            <div class="form-group">
                              <input type="text" name="nomproduit" value="{{$acss->nom ?: '' }}"  pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom De Produit">
                            </div>
                            <!-- description -->
                            <div class="form-group">
                              <textarea name="description" rows="5" class="form-control" 
                               aria-multiline="true" cols="50">{{$acss->description ?: '' }}</textarea>
                              </div>
                            <!-- prix -->
                            <div class="form-group">
                              <input type="number" placeholder="Prix" class="form-control" value="{{$acss->prix ?: '0' }}" required  min="0.0" step="0.1" id="prix" name="prix" />DH
                            </div>
                            <!-- solde -->
                            <div class="form-group">
                              <input type="number" placeholder="Solde" class="form-control" value="{{$acss->per_solde }}" min="0.0" step="0.1" id="solde" name="solde" />DH
                            </div>
                            <!--file-->                
                            <div class="form-group">
                              <input type="file" class="images" id="images" name="images[]" accept="image/png,image/jpeg" multiple>  
                            </div>
                            <div class="form-group">
                            @foreach ($allimg as $img)
                            <div class="row" id="img{{$img->id}}" >
                            <div class="col">
                            <img src="{{asset('storage/'.$img->path)}}" class="rounded" width="60" height="60" />
                            </div>
                            <div class="col">
                              <div class="row"><a onclick="deleteImage({{$img->id}})" href="#"><i class="fa fa-trash" aria-hidden="true" >Supprimer</i></a></div>
                              <div class="row"><a href="{{asset('storage/'.$img->path)}}" download><i class="fa fa-download"></i>Telecharger<br></a></div>
                            </div>
                          </div>
                            @endforeach
                            </div>
                        </div>
                        <!-- Upload button -->
                        <div class="form-group">
                            <button class="btn btn-secondary" type="submit" value="upload">Enregistre</button>
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
            labelIdle: 'Ajouter des images',
            allowFileTypeValidation: true,
            acceptedFileTypes: ['.png', '.jpeg', '.jpg'],
            labelFileTypeNotAllowed: 'Le type du fichier est invalide vous devez choisir une image',
            fileValidateTypeLabelExpectedTypes: 'L\'extension doit être : {allTypes}',
            imagePreviewMaxHeight: 200,
            imageCropAspectRatio: '1:1',
            credits: null,
            instantUpload: false,
            
        });
      
      function deleteImage(IdImage){
        $.ajax({
            type : "POST",
            url : '/telephone/deleteImage',
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            data : {
                id : IdImage
            },
            success: function (message) {
                document.getElementById('img'+IdImage).style.display ='none';
            },
            error: function(message){
                // alert('Les codes ne sont pas les memes essayer a nouveau ou renvoyer l\'email aprée 2 minutes !');
                // disableBtnTimeOut(120);
            },
            async : false

        });
      }
 
</script>

@endsection