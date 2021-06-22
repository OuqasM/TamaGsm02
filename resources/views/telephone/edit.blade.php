@extends('telephone.layouts.TelephoneLayouts')
@section('Css')
  <style>
       .swiper-container {
        width: 60%;
        height: 60%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
      .swiper-slide .btn {
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
                    <form action="{{route('updatetelephone')}}" class="contact-form" name="createForm" id="createForm" enctype="multipart/form-data"  method="POST">
                        {{ csrf_field() }}
                      <div class="wrraper row">
                        <div class="col-md-6">                      
                            <!-- marque-->
                            <div class="form-group ">
                                <select name="marque"  id="catgroup" class="select form-control"  required>
                                    <option value="" disabled >Marque</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="1000">-- Telephones --</option>
                                    <option value="Huawei" {!! ($tele->marque == 'Huawei') ? 'selected': '' !!} >Huawei</option>
                                    <option value="Samsung"  {!! ($tele->marque == 'Samsung') ? 'selected': '' !!}>Samsung</option>
                                    <option value="Apple"  {!! ($tele->marque == 'Apple') ? 'selected': '' !!}>Apple</option>
                                    <option value="Xiaomi" {!! ($tele->marque == 'Xiaomi') ? 'selected': '' !!}>Xiaomi</option>
                                    <option value="Oppo"  {!! ($tele->marque == 'Oppo') ? 'selected': '' !!}>Oppo</option>
                                    <option value="OnePlus"  {!! ($tele->marque == 'OnePlus') ? 'selected': '' !!}>OnePlus</option>
                                    <option value="Motorola"  {!! ($tele->marque == 'Motorola') ? 'selected': '' !!}>Motorola</option>
                                    <option value="Sony"  {!! ($tele->marque == 'Sony') ? 'selected': '' !!}>Sony</option>
                                    <option value="Autres"  {!! ($tele->marque == 'Autres') ? 'selected': '' !!}>Autres</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="2000">-- Tablettes et Autres --</option>
                                    <option value="HuaweiT"  {!! ($tele->marque == 'HuaweiT') ? 'selected': '' !!}>Huawei</option>
                                    <option value="SamsungT"  {!! ($tele->marque == 'SamsungT') ? 'selected': '' !!}>Samsung</option>
                                    <option value="AppleT"  {!! ($tele->marque == 'AppleT') ? 'selected': '' !!}>Apple</option>
                                    <option value="AutresT"  {!! ($tele->marque == 'AutresT') ? 'selected': '' !!}>Autres</option>
                                </select>
                            </div>
                            <input type="text" value="{{$tele->id_tele}}" hidden name="idphone">
                            <!-- nom de produit -->
                            <div class="form-group">
                              <input type="text" name="nomproduit" value="{{$tele->nom ?: '' }}"  pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom De Produit">
                            </div>
                            <!-- description -->
                            <div class="form-group">
                              <textarea name="description" rows="5" class="form-control" 
                               aria-multiline="true" cols="50">{{$tele->description ?: '' }}</textarea>
                              </div>
                            <!-- prix -->
                            <div class="form-group">
                              <input type="number" placeholder="Prix" class="form-control" value="{{$tele->prix ?: '' }}" required  min="0.0" step="0.1" id="prix" name="prix" />DH
                            </div>
                            <!-- solde -->
                            <div class="form-group">
                              <input type="number" placeholder="Solde" class="form-control" value="{{$tele->per_solde }}" min="0.0" step="0.1" id="solde" name="solde" />DH
                            </div>
                            <!--file-->                
                            <div class="form-group">
                              <input type="file" class="images" id="images" name="images[]" accept="image/png,image/jpeg" multiple>  
                            </div>
                            <div class="form-group">
                            <div class="swiper-container mySwiper">
                              <div class="swiper-wrapper">
                                @foreach ($allimg as $img)
                                <div class="swiper-slide">
                                    <img src="{{asset('storage/'.$img->path)}}" height="60px" width="50px"/>
                                    <a onclick="deleteImage({{$img->id}})" class="btn" href="#"><i class="bx bx-trash" aria-hidden="true" ></i></a>                                  </div>
                                @endforeach
                              </div>
                              <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6" >                      
                          <!-- configuration -->
                          <table class="table table-striped form-group">                      
                            <tbody>
                              <tr>
                                <th scope="row">Ram</th>
                                <td class="px-0"><img src="{{ asset('images/ram.png') }}" width="30" height="30"/></td>
                                <td><span class="price " data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="ram" value="{{$tele->ram ?: '' }}" name="ram" /></span>
                                  Gb</td>
                                
                              </tr>
                              <tr>
                                <th scope="row">Stockage</th>
                                <td class="px-0"><img src="{{ asset('images/storage.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="stockage" value="{{$tele->stockage ?: '' }}" name="stockage"/>
                                </span> Gb</td>
                              </tr>
                              <tr>
                                <th scope="row">Batterie</th>
                                <td class="px-0"><img src="{{ asset('images/battery.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="batterie" value="{{$tele->battery ?: '' }}" name="batterie"/>
                                </span> mA</td>
                              </tr>
                              <tr>
                                <th scope="row">Caméra</th>
                                <td class="px-0"><img src="{{ asset('images/mobile-camera.png') }}"
                                  width="30" height="30" /></td>
                                <td ><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1" id="camera" value="{{$tele->back_cam_reslolution ?: '' }}" name="camera"/>  
                                  </span> Mp</td>
                              </tr>
                                <th scope="row">Caméra Selfy</th>
                                <td class="px-0"><img src="{{ asset('images/selfie.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control" class="w-50" min="0.0" step="0.1"  id="selfie" value="{{$tele->selfy_cam_resolution ?: '' }}" name="selfie"/>
                                  </span> Mp
                                </td>                                
                              </tr>                            
                              <tr>
                                <th scope="row">Ecran</th>
                                <td class="px-0"><img src="{{ asset('images/icran.png') }}"
                                  width="30"  height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="form-control"  class="w-50" min="0.0" step="0.1" id="ecran" value="{{$tele->taille_ecron ?: '' }}" name="ecran"/>
                                </span> P
                                
                              </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- Upload button -->
                          <div class="form-group">
                              <button class="btn btn-secondary" type="submit" value="upload">Enregistrer</button>
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
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
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
              Swal.fire({
                        title: 'Supprimée!',
                        text: "Image suprimée!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                        }).then((result) => {
                            location.reload();     
                        }) 
            },
            async : false
        });
      }
       var form = document.getElementById("createForm");
      // const prix = document.getElementById("username");
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