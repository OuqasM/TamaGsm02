@extends('service.layouts.ServiceLayouts')
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
        <div class="col-9">
                   @php
                       $cmt=0;
                   @endphp  
                    @foreach ($al as $couple)
                    <!-- list group item-->
                        <div class="col-sm-12"  @if ($cmt%2==0) data-aos="zoom-in-right"   @else  data-aos="zoom-in-left"  @endif data-aos-duration="1500">
                            <div class="card">
                                <div class="row">
                                    <div class="image col-md-5">
                                            <a class="link" href="#">
                                            @if($couple->image !=null)
                                            <img src="{{asset('storage/'.$couple->image)}}" class="rounded" width="80" height="200" />
                                            @else
                                            <img src="{{asset('images/no-image.png')}}" class="rounded" width="80" height="200" />        
                                            @endif
                                            </a>
                                        
                                    </div>
                                    <div>
                                        <div class="container">
                                            <div class="">
                                            <h2>{{$couple->nom}}</h2></a>
                                            <h6>{{$couple->description}}</h6>
                                            </div>
                                            <div class="">                                                 
                                                A partir de <p class="price">{{$couple->prix}}DH</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php
                            $cmt++;
                        @endphp  
                    @endforeach
        </div>
        <div class="col-3 ">
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







