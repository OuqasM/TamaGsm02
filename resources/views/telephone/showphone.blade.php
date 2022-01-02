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
					<div class="col-lg-6 col-md-5 col-sm-12 col-12">
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
                                            <img class="d-block w-100" src="{{asset('storage/'.$slider->path)}}" height="400px" width="100%" /></div>
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
					<div class="col-lg-6 col-md-7 col-sm-12 col-12">
                        <div class="">
                            <table class="table table-striped" style="overflow-x: hidden">
                                <tbody>
                                  <tr>
                                    <th scope="row">Ram</th>
                                    <td><span class="" data-toggle="tooltip">{{ floor($tele->ram) }}GB</span> </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Stockage</th>
                                    <td><span class="" data-toggle="tooltip">{{floor($tele->stockage)}}GB</span> </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Batterie</th>
                                    <td><span class="" data-toggle="tooltip">{{floor($tele->battery)}}mAh</span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Caméra</th>
                                    <td><span class="" data-toggle="tooltip">{{floor($tele->back_cam_reslolution)}}MP</span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Caméra Selfy</th>
                                    <td><span class="" data-toggle="tooltip">{{floor($tele->selfy_cam_resolution)}}MP</span>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Ecran</th>
                                    <td><span class="" data-toggle="tooltip">{{$tele->taille_ecron ?: 6.8}}</span>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-header">
                              @if($tele->per_solde > 0)
                              <p><h4>Prix Actuel : <small class="price"><del>{{$tele->prix}}DH</del></small><br><strong class="bloc_left_price">{{$tele->per_solde}}DH</strong></h4>
                              </p>
                              @else
                              <h4 class="price">Prix : <span>{{$tele->prix}}DH</span></h4>
                              @endif
                            <div class="inputContainer">
                                <a href="https://www.google.com/maps/place/33%C2%B009'57.7%22N+5%C2%B033'57.7%22W/@33.1660278,-5.566575,144m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d33.1660388!4d-5.5660235">
                                <i class='bx bxl-periscope icon'></i>
                                <input  value="Voir L'emplacement" class="form-control Field" readonly/></a>
                            </div>
                            <div class="inputContainer" onclick="myFunction()">
                              <i class='bx bxs-phone icon'></i>
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

    async function LikePhone(ID){
          Swal.fire("Here's the title!", "...and here's the text!");

          const { value: email } = await Swal.fire({
          title: 'Input email address',
          input: 'email',
          inputLabel: 'Your email address',
          inputPlaceholder: 'Entrer votre email'
         })
        if (email) {
            $.ajax({
                url: "/telephone/likephone",
                type:"POST",
                headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id: ID,
                    email: email
                },
                success:function(response){
                    Swal.fire(
                    'Good job!',
                    response,
                    'success'
                    )
                }
            });
        }
    }

</script>
@endsection
