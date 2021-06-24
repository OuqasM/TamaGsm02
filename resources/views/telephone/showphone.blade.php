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

                /*# sourceMappingURL=style.css.map */
    </style>
@endsection

@section('content')
        <div class="container">
		<div class="card">
				<div class="wrapper row ">
					<div class="col-md-6" >
                        <div class="card-content">
						<div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($allimg as $key => $slider)

                                <li class="{{$key == 0 ? 'active' : '' }}" data-target="#carouselExampleIndicators" data-slide-to="{{$key+1}}"></li>
                                @endforeach

                            </ol>
                            <div class="carousel-inner" role="listbox">

                                @foreach($allimg as $key => $slider)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" src="{{asset('storage/'.$slider->path)}}" /></div>
                          
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
					</div>
					<div class="col-md-6">
                            <h3 class="card-title">{{$tele->nom}}</h3>
                            <p class="product-description">{{$tele->description}}</p>
                        <div class="card-body">
                            <table class="table table-striped">
                            
                                <tbody>
                                  <tr>
                                    <th scope="row">Ram</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{ floor($tele->ram) }}</span> </td>
                                    <td><img src="{{ asset('images/ram.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Stockage</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{$tele->stockage }}</span> </td>
                                    <td><img src="{{ asset('images/storage.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Batterie</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{$tele->battery }}</span>
                                    </td>
                                    <td><img src="{{ asset('images/battery.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Caméra</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{floor($tele->back_cam_reslolution)}}</span> Mp
                                    </td>
                                    <td><img src="{{ asset('images/mobile-camera.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                    <th scope="row">Caméra Selfy</th>
                                    <td><span class="" data-toggle="tooltip" title="small">{{floor($tele->selfy_cam_resolution)}}</span> Mp
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
                              @if($tele->per_solde > 0)
                              <p><h4>Prix Actuel : <small class="price"><del>{{$tele->prix}}DH</del></small><strong class="bloc_left_price">{{$tele->per_solde}}DH</strong></h4>
                              </p>
                              @else 
                              <h4 class="price">Prix : <span>{{$tele->prix}}DH</span></h4>
                              @endif
                              <p><i class="fas fa-map-marked-alt"></i> Mrirt, Rue El Farah Qrt 2 appt 101</p>
                              <p><i class="fas fa-phone"></i> 0635666101</p>
                        </div>
                    </div>
				</div>
		</div>
    </div>
  </body>
  @endsection
  @section('contentJs')
  <script>
      var mybutton = document.getElementById("myBtn");
     mybutton.innerHTML = '<i class="fas fa-chevron-circle-up"></i>';
    
     
  </script>
      
  @endsection