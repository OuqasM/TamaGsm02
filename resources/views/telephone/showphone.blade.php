@extends('telephone.layouts.TelephoneLayouts')
@section('Css')
    <style>
                .price {
                color: #ff9f1a;
                 }
                .bloc_left_price {
                color: #c01508;
                text-align: center;
                font-weight: bold;
                font-size: 150%;
                }
                .back{
                    position: relative;
                    top: 15px;
                    left: 15px;
                    z-index: 5;
                }
                /* .love{
                    position: relative;
                    top: 10px;
                    right: 10px;
                    z-index: 1;
                } */
                .inputContainer i {
                position: absolute;
                }
                .inputContainer {
                width: 100%;
                margin-bottom: 10px;
                }
                .icon {
                padding: 15px;
                color: rgb(49, 0, 128);
                width: 70px;
                text-align: left;
                }
                .Field {
                width: 100%;
                padding: 10px;
                text-align: center;
                font-size: 20px;
                font-weight: 500;
                }
</style>
@endsection

@section('content')
<div class="container pt-5">
    <div class="card">
        <a href="javascript:history.back()"><i class='bx bxs-left-arrow-circle back bx-md'></i></a>
        
				<div class="row">
					<div class="col-md-6">
                        <div class="card-content">
                            <div class="carousel slide m-1" id="carouselExampleIndicators" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach($allimg as $key => $slider)

                                    <li class="{{$key == 0 ? 'active' : '' }}" data-target="#carouselExampleIndicators" data-slide-to="{{$key+1}}"></li>
                                    @endforeach

                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach($allimg as $key => $slider)
                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                            <img class="d-block w-100" src="{{asset('storage/'.$slider->path)}}" height="400px" width="200px" /></div>            
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-header">
                            <h3 class="card-title">{{$tele->nom}}</h3>
                            <p class="product-description">{{$tele->description}}</p>
                            <button type="button" class="btn btn-icon rounded-circle btn-light-danger mr-1 mb-1" onclick="LikePhone('{{ $tele->id_tele }}')">
                                <i class="bx bx-heart"></i></button>      
                      </div>
					</div>
					<div class="col-md-6">
                        <div class="">
                            <table class="table table-striped">                           
                                <tbody>
                                  <tr>
                                    <th scope="row">Ram</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{ floor($tele->ram) }}GB</span> </td>
                                    <td><img src="{{ asset('images/ram.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Stockage</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{floor($tele->stockage)}}GB</span> </td>
                                    <td><img src="{{ asset('images/storage.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Batterie</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{floor($tele->battery)}}mAh</span>
                                    </td>
                                    <td><img src="{{ asset('images/battery.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Caméra</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{floor($tele->back_cam_reslolution)}}MP</span> 
                                    </td>
                                    <td><img src="{{ asset('images/mobile-camera.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                    <th scope="row">Caméra Selfy</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{floor($tele->selfy_cam_resolution)}}MP</span>
                                    </td>
                                    <td><img src="{{ asset('images/selfie.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                 
                                  <tr>
                                    <th scope="row">Ecran</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{$tele->taille_ecron ?: 6.8}}</span>
                                    </td>
                                    <td><img src="{{ asset('images/icran.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                              @if($tele->per_solde > 0)
                              <p><h4>Prix Actuel : <small class="price"><del>{{$tele->prix}}DH</del></small><strong class="bloc_left_price">{{$tele->per_solde}}DH</strong></h4>
                              </p>
                              @else 
                              <h4 class="price">Prix : <span>{{$tele->prix}}DH</span></h4>
                              @endif
                            <div class="inputContainer">
                                <a href="https://www.google.com/maps/place/33%C2%B009'57.7%22N+5%C2%B033'57.7%22W/@33.1660278,-5.566575,144m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d33.1660388!4d-5.5660235">
                                <i class='bx bxl-periscope icon'></i></a>
                                <input  value="Voir L'emplacement" class="form-control Field" readonly/>
                            </div>
                            <div class="inputContainer">
                              <a href="#"><i class='bx bxs-phone icon' onclick="myFunction()"></i></a>
                              <input id="numero" value="0635666101" class="form-control Field" readonly/>
                            </div>
                        </div>
                    </div>
				</div>
	</div>
</div>
@endsection
@section('Js')
<script>
    function myFunction() {
    var copyText =document.getElementById('numero');
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("copy");
    Swal.fire({ icon: 'success', title: 'Numéro de téléphone copié', showConfirmButton: false, timer: 1500 })
    }

        function LikePhone(ID){
                $.ajax({
                url: "/telephone/likephone",
                type:"POST",
                headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                id: ID
                },
                success:function(response){
               
                console.log(response);

                },
                error: function(error) {
                //console.log(error);
                }
            });
            console.log('dddd');
        }

</script>
@endsection