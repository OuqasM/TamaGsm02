@extends('layouts.app')    
@section('contentCss')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
             .price {
                    color: #ff9f1a; 
                }               
                .card {
                height: 450px;
                width: 300px;
                transition: all 0.20s ease-in-out;  
                }
                .card:hover {
                transition: 0.25s ease-out;
                box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                }
                .swiper-container { 
                    width: 100%;
                    height: 100%;
                }
                .swiper-slide {
                    text-align: center;
                    font-size: 18px;
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

                div .cam{
                    position: absolute;
                    top: 12px;
                    left: 12px;
                    color: black;
                    }
                    .containerP {
                        padding-top: 20px;
                        padding-bottom: 20px;
                        background-color: rgba(256, 256, 265, 1);
                        border-radius: 20px;
                        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;                      }
                .card-body img ,.swiper-slide img{
                    height: 300px;
                    mix-blend-mode: multiply;
                    object-fit: cover;

                }
                   
</style>
@endsection
@section('content')
        <div class="container">
        {{-- <div class=" col-sm-9"> --}}
            <div class="  containerP px-2 my-5 mx-2">    
                <div class="row">
                    <h2 class="col-9 card-title ml-3 ">Telephones et Tabletes</h2>
                    <a href="#" class="btn btn-outline-primary col-2 pb-0">Voir Tous..</a>
                </div>
                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($collect as $item)
                            <div class="swiper-slide pb-3 col-md-3 col">
                                <div class="card bg-light mb-3 ">
                                    <div class="card-body">
                                        <div><i class="fas fa-camera cam"> {{count($item['imgs'])}}</i>
                                            @if($item['imgs']->get(0)!=null)
                                            <img src="{{asset('storage/'.$item['imgs']->get(0)['path'].'')}}" class="card-img-top"/>
                                            @else
                                            <img src="{{asset('images/no-image.png')}}" class="card-img-top"/>        
                                            @endif
                                        </div>                                        <h5 class="card-title">{{$item['telephones']->nom}}</h5>
                                        <div class="separator">Prix</div>

                                                @if($item['telephones']->per_solde > 0)
                                                <p class="price"><del>{{$item['telephones']->prix}}<small>dh</small></del><strong class="bloc_left_price">{{$item['telephones']->per_solde}}<small>dh</small></strong></p>
                                                @else 
                                                    <p class="price">{{$item['telephones']->prix}}<small>dh</small></p>
                                                @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            
                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
            </div>
            
            <div class="containerP px-2 my-5 mx-2">    
                <div class="row">
                    <h2 class="col-9 card-title">Accessoires</h2>
                    <a href="#" class="btn btn-outline-primary col-2">Voir Tous..</a>
                </div>
                    <div class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                    
                            @foreach ($collectA as $item)
                            <div class="swiper-slide col-md-3 pb-5 col">
                                <div class="card" style="width: 18rem;">
                                        <div><i class="fas fa-camera cam"> {{count($item['aimgs'])}}</i>
                                            @if($item['aimgs']->get(0)!=null)
                                            <img src="{{asset('storage/'.$item['aimgs']->get(0)['path'].'')}}" class="card-img-top"/>
                                            @else
                                            <img src="{{asset('images/no-image.png')}}" class="card-img-top"/>        
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <a><h2 class="">{{$item['acss']->nom}}</h2></a>
                                                @if($item['acss']->per_solde > 0)
                                                <p class="price"><del>{{$item['acss']->prix}}DH</del><strong class="bloc_left_price">{{$item['acss']->per_solde}}DH</strong></p>
                                                @else 
                                                    <p class="price">{{$item['acss']->prix}}DH</p>
                                                @endif
                                        </div>
                                </div>
                            </div>
                            @endforeach  
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
            </div>
        {{-- </div> --}}
        {{-- <div class="px-5 col-sm-3 ">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="category.html">Telephones & Tablettes</a></li>
                    <li class="list-group-item"><a href="category.html">Accessoires</a></li>
                    <li class="list-group-item"><a href="category.html">Nos services</a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Les promotion d'aujourd'huit</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff" />
                    <h5 class="card-title">Product title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="bloc_left_price">99.00 $</p>
                </div>
            </div>
        </div>  --}}
        </div>
@endsection
@section('contentJs')   
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: false,
        loop:true,
        // autoplay: {
        // delay: 4000,
        // disableOnInteraction : false,
        // },
        pauseOnMouseEnter : true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 15,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });

    </script>
@endsection