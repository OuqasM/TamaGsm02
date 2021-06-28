@extends('layouts.app')    
@section('contentCss')
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
                .swiper-container { 
                    width: 100%;
                    height: 100%;
                }
                .swiper-slide {
                    text-align: center;
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
                    padding: 0;

                }

                .card-body .ficon{
                    position: absolute;
                    bottom: 12px;
                    left: 12px;
                    color: rgb(0, 0, 0);
                    }
                    
                .card img {
                    mix-blend-mode: multiply;
                    object-fit: cover;
                    margin: 0px;
                    width: 100%;
                    height: 240px;
                    border-radius: 15px;
                }
            
                .cardC{
                    height: 380px;
                    width: 200px;
                    border:solid 1px;
                    border-radius: 15px;

                }
                   
    </style>
@endsection
@section('content')
        <div class="container">
            <section id="widgets-Statistics">
                <div class="row">
                    <div class="col-12 mt-1 mb-2">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-info mx-auto my-1">
                                        <i class="bx bx-mobile-alt font-medium-5"></i>
                                    </div>
                                    <p class="text-muted mb-0 line-ellipsis">Telephone et Tablettes</p>
                                    <h2 class="mb-0">{{count($collect)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-warning mx-auto my-1">
                                        <i class="bx bx-usb font-medium-5"></i>
                                    </div>
                                    <p class="text-muted mb-0 line-ellipsis">Accsessoires</p>
                                    <h2 class="mb-0">{{count($collectA)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-primary mx-auto my-1">
                                        <i class='bx bxs-wrench' ></i>
                                    </div>
                                    <p class="text-muted mb-0 line-ellipsis">Services</p>
                                    <h2 class="mb-0">{{count($services)}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
                                        <i class='bx bxs-briefcase-alt-2'></i>
                                    </div>
                                    <p class="text-muted mb-0 line-ellipsis">Piece de ..</p>
                                    <h2 class="mb-0">72</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <hr>
            <div class="card px-2">    
                    <div class="card-header py-1">
                        <h2 class="card-title float-left">Telephones et Tabletes</h2>
                        <a href="{{route('showallphones')}}" class="card-title btn-outline-primary round px-1 float-right">Plus</a>
                    </div>
                    <div class="swiper-container  pb-3 mySwiper card-body">
                        <div class="swiper-wrapper">
                            @foreach ($collect as $item)
                            <div class="swiper-slide px-2 col">
                                <div class="card mb-0 cardC">
                                        <div class="card-header p-0">
                                            @if($item['imgs']->get(0)!=null)
                                                <img src="{{asset('storage/'.$item['imgs']->get(0)['path'].'')}}"/>
                                            @else
                                                <img src="{{asset('images/no-image.png')}}"/>        
                                            @endif
                                        </div>
                                        <div class="card-body p-1">
                                            <a><h2 class="card-title">{{$item['telephones']->nom}}</h2></a>
                                            <div class="card-footer"> 
                                                                        @if($item['telephones']->per_solde > 0)
                                                                        <small class="price"><del>{{$item['telephones']->prix}}<small >DH</small></del><strong class="bloc_left_price">{{$item['telephones']->per_solde}}</strong><small style="color: #c01508;">DH</small></small>
                                                                        @else 
                                                                            <p class="price">{{$item['telephones']->prix}}DH</p>
                                                                        @endif
                                            </div>
                                            <i class="ficon bx bx-camera"> {{count($item['imgs'])}}</i>
                                        </div>
                                </div>



                                </div>
                            @endforeach  
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
            </div>
            <hr>
            <div class="card px-2">    
                <div class="card-header py-1">
                    <h2 class="card-title float-left">Accessoires</h2>
                    <a href="{{ route('showallaccessoires') }}" class="card-title btn-outline-secondary round px-1 float-right">Plus</a>
                </div>
                    <div class="swiper-container pb-3 mySwiper card-body">
                        <div class="swiper-wrapper">
                            @foreach ($collectA as $item)
                                <div class="swiper-slide px-2 col">
                                    <div class="card mb-0 cardC">
                                            <div class="card-header p-0">
                                                @if($item['aimgs']->get(0)!=null)
                                                <img src="{{asset('storage/'.$item['aimgs']->get(0)['path'].'')}}"/>
                                                @else
                                                <img src="{{asset('images/no-image.png')}}" />        
                                                @endif
                                            </div>
                                            <div class="card-body p-1">
                                                <a class="card-title">{{$item['acss']->nom}}</a>
                                                <div class="card-footer">@if($item['acss']->per_solde > 0)
                                                                        <small class="price"><del>{{$item['acss']->prix}}<small >DH</small></del><strong class="bloc_left_price">{{$item['acss']->per_solde}}</strong><small style="color: #c01508;">DH</small></small>
                                                                        @else 
                                                                            <p class="price">{{$item['acss']->prix}}DH</p>
                                                                        @endif
                                                </div>
                                                <i class="ficon bx bx-camera">{{count($item['aimgs'])}}</i>
                                            </div>
                                    </div>
                                </div>
                            @endforeach  
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
            </div>
            <hr>
            <div class="card px-2">    
                <div class="card-header py-1">
                    <h2 class="card-title float-left">Nos Services</h2>
                    <a href="{{ route('showallservices') }}" class="card-title btn-outline-secondary round px-1 float-right">Plus</a>
                </div>
                    <div class="swiper-container pb-3 mySwiper card-body">
                        <div class="swiper-wrapper">
                            @foreach ($services as $item)
                                <div class="swiper-slide px-2 col">
                                    <div class="card mb-0 cardC">
                                            <div class="card-header p-0">
                                                @if($item->image!=null)
                                                <img src="{{asset('storage/'.$item->image)}}"/>
                                                @else
                                                <img src="{{asset('images/no-image.png')}}" />        
                                                @endif
                                            </div>
                                            <div class="card-body p-1">
                                                <a class="card-title">{{$item->nom}}</a>
                                                <div class="card-footer"> 
                                                    <p class="price">{{$item->prix}}DH</p>
                                                </div>
                                                <i class="ficon bx bx-camera">1</i>
                                            </div>
                                    </div>
                                </div>
                            @endforeach  
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
            </div>
        </div>
@endsection
@section('contentJs')   
    <script>
        var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: false,
        loop:true,
        autoplay: {
        delay: 1500,
        disableOnInteraction : true,
        },
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