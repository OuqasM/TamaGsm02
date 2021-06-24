@extends('telephone.layouts.TelephoneLayouts')
@section('Css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
                                    
                /* E-commerce */
                .price {
                    color: #ff9f1a; 
                }
                
                .card {
                padding:10px;
                display: flex;
                background-color:rgb(255, 255, 255);
                border-radius: 5px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                margin: 5px; 
                transition: all 0.20s ease-in-out;                
                }
                .card:hover {
                transition: 0.25s ease-out;
                box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                }

                .card img{
                width:100%;
                margin-left: 1px;
                margin-right: 1px;
               }
    </style>
@endsection
@section('content')

<div class="container">
    <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-5">
                   @php
                       $cmt=0;
                   @endphp  
                    @foreach ($collect->all() as $couple)
                      <!-- list group item-->
                            <div  @if ($cmt%2==0) data-aos="zoom-in-right"   @else  data-aos="zoom-in-left"  @endif data-aos-duration="1500">
                                <div {{--class="col-xl-4 col-sm-6 col-12"--}}>
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="row no-gutters">
                                                    <div class="col-md-7 col-lg-5 col-xs-5">
                                                        <a class="link" href="{{route('showphone',$couple['telephones']->id_tele)}}">
                                                            @if($couple['imgs']->get(0)!=null)
                                                            <img src="{{asset('storage/'.$couple['imgs']->get(0)['path'].'')}}" alt="element 01" class="rounded-left" height="200px" width="200px">
                                                            @else
                                                            <img src="{{asset('images/no-image.png')}}" class="rounded-left" height="200px" width="200px"/>        
                                                            @endif
                                                            </a>
                                                    </div>
                                                    <div class="col-md-5 col-lg-7">
                                                        <div class="card-body">
                                                            <p class="card-title m-0">{{$couple['telephones']->nom}}</p>
                                                            <p class="card-text text-ellipsis">
                                                                Tiramisu dessert gingerbread topping tiramisu tart bonbon. Powder
                                                                cotton candy sweet roll sugar plum donut jelly-o donut chocolate.
                                                            </p>
                                                            <span class="">
                                                                @if($couple['telephones']->per_solde > 0)
                                                                <p class="price"><del class="">{{$couple['telephones']->prix}}DH</del><strong class="bloc_left_price">{{$couple['telephones']->per_solde}}DH</strong></p>
                                                                @else 
                                                                    <p class="price">{{$couple['telephones']->prix}}DH</p>
                                                                @endif
                                                            </span>
                                                        <span><i class="bx bx-camera font-size-large align-middle mr-50"></i>{{count($couple['imgs'])}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                           
                                    {{-- <div class="card">
                                        <div class="row">
                                            <div class="col-md-5 ">
                                                    <a class="link" href="{{route('showphone',$couple['telephones']->id_tele)}}">
                                                    @if($couple['imgs']->get(0)!=null)
                                                    <img src="{{asset('storage/'.$couple['imgs']->get(0)['path'].'')}}" class="rounded" width="80" height="200" />
                                                    @else
                                                    <img src="{{asset('images/no-image.png')}}" class="rounded" width="80" height="200" />        
                                                    @endif
                                                    </a>
                                                
                                            </div>
                                            <div class="col-md-7 ">
                                                <div class="container">
                                                    <div class="">
                                                    <h2>{{$couple['telephones']->nom}}</h2></a>
                                                    <h6>{{$couple['telephones']->marque}}</h6>
                                                    </div>
                                                    <div class="">
                                                        @if($couple['telephones']->per_solde > 0)
                                                        <p class="price"><del class="">{{$couple['telephones']->prix}}DH</del><strong class="bloc_left_price">{{$couple['telephones']->per_solde}}DH</strong></p>
                                                        @else 
                                                            <p class="price">{{$couple['telephones']->prix}}DH</p>
                                                        @endif
                                                        <p><i class="fas fa-camera"> {{count($couple['imgs'])}}</i></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                        </div>
                        @php
                            $cmt++;
                        @endphp  
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4">
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
            </div>
    </div>
</div>
@endsection
@section('Js')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script> 
@endsection







