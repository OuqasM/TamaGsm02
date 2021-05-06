@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')
    <style>
                            body {
                font-family: 'open sans';
                overflow-x: hidden; }

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

                .details {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -webkit-flex-direction: column;
                    -ms-flex-direction: column;
                        flex-direction: column; }

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

                .product-title, .rating, .product-description, .price, .sizes {
                margin-bottom: 15px; }

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
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($allimg as $key => $slider)

                                <li class="{{$key == 0 ? 'active' : '' }}" data-target="#carouselExampleIndicators" data-slide-to="{{$key+1}}"></li>
                                @endforeach

                            </ol>
                            <div class="carousel-inner" role="listbox">

                                @foreach($allimg as $key => $slider)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                        <img class="d-block w-100" src="{{asset('storage/'.$slider->path)}}" height="400" width="250 "/></div>
                          
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
					<div class="details col-md-6">
						<h3 class="product-title">{{$tele->nom}}</h3>
						
						<p class="product-description">{{$tele->description}}</p>
					
                            <table class="table table-striped">
                            
                                <tbody>
                                  <tr>
                                    <th scope="row">Ram</th>
                                    <td><span class="price" data-toggle="tooltip" title="small">{{$tele->ram ? : 6}}</span> </td>
                                    <td><img src="{{ asset('images/ram.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Stockage</th>
                                    <td><span class="price" data-toggle="tooltip" title="small">{{$tele->stockage ?: 64}}</span> </td>
                                    <td><img src="{{ asset('images/ram.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Batterie</th>
                                    <td><span class="price" data-toggle="tooltip" title="small">{{$tele->ram ? : 6}}</span>
                                    </td>
                                    <td><img src="{{ asset('images/file-storage.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Caméra</th>
                                    <td><span class="price" data-toggle="tooltip" title="small">{{$tele->back_cam_reslolution ? : 40}}</span> Mp
                                    </td>
                                    <td><img src="{{ asset('images/mobile-camera.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                    <th scope="row">Caméra Selfy</th>
                                    <td><span class="price" data-toggle="tooltip" title="small">{{$tele->selfy_cam_resolution ? : 14}}</span> Mp
                                    </td>
                                    <td><img src="{{ asset('images/selfie.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                 
                                  <tr>
                                    <th scope="row">Ecran</th>
                                    <td><span class="price" data-toggle="tooltip" title="small">{{$tele->taille_ecron ?: 6.8}}</span>
                                    </td>
                                    <td><img src="{{ asset('images/icran.png') }}"
                                        width="30" height="30" /></td>
                                  </tr>
                                </tbody>
                              </table>
                              <h4 class="price">prix actuel : <span>{{$tele->prix}}DH</span></h4>

					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
  @endsection