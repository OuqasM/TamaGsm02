@extends('service.layouts.ServiceLayouts')
@section('Css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
                                    
                /* E-commerce */
                .price {
                    color: #ff9f1a; 
                }
                
                .card { 
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
                /* The Modal (background) */
          .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            padding-top: 100px; /* Location of the box */
            padding-bottom: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            /* background-color: rgb(0,0,0); Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            z-index: 10;
            }
            

            /* Modal Content */
            .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            }
        #Success .modal-content,  #failed .modal-content  {            
            width: 50%;
            position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
            }

            
            /* The Close Button */
            .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            }

            .close:hover,
            .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            }
            .Conversion-Container{
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }
            #ImageAndDescritpion {
                
                position: relative;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
            }
    </style>
@endsection
@section('content')

<div class="container">
    <section id="widgets-Statistics">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
            </div>
        </div>
    <section>
    <div class="row">
        <div class="col-md-9 col-lg-9 col-sm-7 col-12">
                   @php
                       $cmt=0;
                   @endphp  
                    <div class="row">
                        @foreach ($al as $couple)
                    
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12" @if ($cmt%2==0) data-aos="zoom-in-right"   @else  data-aos="zoom-in-left"  @endif data-aos-duration="1500">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row no-gutters">
                                            <div class="col-md-7 col-lg-5 col-xs-5">

                                                <a onclick="ShowModel('{{$couple->nom}}','{{$couple->description}}','{{$couple->prix}}','{{$couple->image}}');">
                                                    @if($couple->image!=null)
                                                    <img src="{{asset('storage/'.$couple->image)}}" alt="element 01" class="rounded-left" height="200px" width="200px">
                                                    @else
                                                    <img src="{{asset('images/no-image.png')}}" class="rounded-left" height="200px" width="200px"/>        
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-md-5 col-lg-7">
                                                <div class="card-body">
                                                    <p class="card-title m-0">{{$couple->nom}}</p>
                                                    <p class="card-text text-ellipsis">
                                                        {{$couple->description}}
                                                    </p>
                                                    <span class="">
                                                        
                                                            <p class="price">{{$couple->prix}}DH</p>
                                                    </span>
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
        </div>
        <div class="col-md-3 col-lg-3 col-sm-5">
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
        function ShowModel(Title,Description,Prix,Image){
          $('#ModalCard').remove();
          $(".container").append(
            '<div id="ModalCard" class="modal">'+
                '<!-- Modal content -->'+
                '<div class="modal-content">'+ 
                    '<h3 class="card-header text-center">'+
                    '<span class="close" id="closeModal">&times;</span>'+Title+'</h3>'+
                    '<div class=" row">'+
                        '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">'+
                            '<div class="Conversion-Container">'+
                                '<div class="row  m-0"  id="CardImage">'+
                                '<img src="../storage/'+Image+'" height="100%" width="100%" />'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">'+
                            '<div class="mx-2">'+
                                '<div class="row">'+
                                    '<p class="card-text">'+
                                        Description+
                                    '</p></div>'+
                               '</div>'+
                                '<div class="row mb-2">'+
                                '<p>À Partir de </p> <strong class="price"> '+Prix+'DH</strong>'+
                                '</div>'+
                                '<div class="row mb-2">'+
                                    'hna locaion'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '<div>'+
                '</div>'+
            '</div>');
            var span = document.getElementById("closeModal");
            var modal = document.getElementById("ModalCard");      
            modal.style.display = "block";
            //When the user clicks on <span> (x), close the modal
            span.addEventListener('click', function() {
            modal.style.display = "none";
            });
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
            
        }
    </script> 
@endsection







