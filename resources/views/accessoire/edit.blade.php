@extends('accessoire.layouts.AccessoirLayout')
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
    }  </style>   
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
                        <form action="{{route('updateacs')}}" class="form" name="createForm" id="createForm" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <input type="text" value="{{$acss->id_acces}}" hidden name="idAcs">
                          <div class="wrraper row">
                            <div class="col-md-6 col-sm-12">                      
                                <!-- Type-->
                                <div class="form-group ">
                                  <select name="type"  id="catgroup" class="select form-control"  required>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled >-- Accessoires Téléphone et Tablette --</option>
                                    <option value="PTT"  {!! ($acss->type == 'PTT') ? 'selected': '' !!}>Protection téléphone et tablette</option>
                                    <option value="CTT"  {!! ($acss->type == 'CTT') ? 'selected': '' !!}>Chargeur téléphone et tablette</option>
                                    <option value="CEE"  {!! ($acss->type == 'CEE') ? 'selected': '' !!}>Casque, écouteurs et enceinte</option>
                                    <option value="STP" {!! ($acss->type == 'STP') ? 'selected': '' !!}>Support téléphone portable</option>
                                    <option value="PDT"  {!! ($acss->type == 'PDT') ? 'selected': '' !!}>Pièces détachées téléphone</option>
                                    <option value="CAT"  {!! ($acss->type == 'CAT') ? 'selected': '' !!}>Cables & adaptateurs téléphone</option>
                                    <option value="AP"  {!! ($acss->type == 'AP') ? 'selected': '' !!}>Accessoires Photo</option>
                                    <option value="CTP"  {!! ($acss->type == 'CTP') ? 'selected': '' !!}>Connectique TV / PC</option>
                                    <option value="AS"  {!! ($acss->type == 'AS') ? 'selected': '' !!}>Accessoires de sport</option>
                                  </select>
                                </div>
                                <!-- nom de produit -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                    <input type="text" id="nom" name="nomproduit" value="{{$acss->nom ?: '' }}" pattern="[A-z0-9\s]+" required class="form-control" placeholder="Nom">
                                    <label for="nom">Nom d'accessoire</label>
                                 </div>
                                </div>
                                <!-- description -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                    <textarea name="description" rows="5" class="form-control" placeholder="Description" aria-multiline="true" cols="50" id="description-floating">{{$acss->description ?: '' }}</textarea>                                 
                                    <label for="description-floating">Description d'accessoire</label>
                                  </div>
                                </div>
                            </div>    
                            <div class="col-md-6 col-sm-12">                      
                                <!-- prix -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                  <input type="number" placeholder="Prix" class="form-control" value="{{$acss->prix ?: '' }}" required step="0.1" min="0.0" id="prix" name="prix" />DH
                                  <label for="prix">prix d'accessoir</label>  
                                  </div>
                                </div>
                                <!-- solde -->
                                <div class="form-group">
                                  <div class="form-label-group">
                                  <input type="number" placeholder="Solde" step="0.1" class="form-control" value="{{$acss->per_solde ?: '' }}" min="0.0" id="solde" name="solde" />DH
                                  <label for="solde">Ajouter un solde</label>  
                                  </div>
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
                              <!-- Upload button -->
                                <div class="col-12 px-0 d-flex justify-content-end">
                                  <button type="submit" class="btn btn-primary mr-1 mb-1">Enregistrer</button>
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
            url : '/accessoir/deleteAcsImage',
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