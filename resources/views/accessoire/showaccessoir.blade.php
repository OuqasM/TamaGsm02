@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')
    <style>
                            body {
                font-family: 'open sans';
                overflow-x: hidden; 
                min-height: 100vh;
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
		<div class="card">
				<div class="wrapper row pr-0 pl-0">
					<div class="col-md-6">
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
					<div class="col-md-6">
						<h3 class="product-title">{{$acs->nom}}</h3>
						
						<p class="product-description">{{$acs->description}}</p>
					
                              @if($acs->per_solde > 0)
                              <p><h4 class="price">prix actuel : <span><del>{{$acs->prix}}DH</del></span></h4>
                              <strong class="bloc_left_price">{{$acs->per_solde}}DH</strong></p>
                              @else 
                              <h4 class="price">prix actuel : <span>{{$acs->prix}}DH</span></h4>
                              @endif
                              <p><i class="fas fa-map-marked-alt"></i> Mrirt, Rue El Farah Qrt 2 appt 101</p>
                              <p><i class="fas fa-phone"></i> 0635666101</p>
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