@extends('service.layouts.ServiceLayouts')
@section('Css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
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
                height: 100%;
               }
               @media all and (max-width : 765px) and (min-width: 250px){
                .card img{
                    max-height: 200px;
                    display: block;
                    margin-right: auto;
                    margin-left: auto;
                }
                .card {
                    max-width: 300px;
                    display: block;
                    margin-right: auto;
                    margin-left: auto;
                    width: 100%;
                }
               }
               @media all and (max-width : 992px) and (min-width: 768px){
                .card img{
                    display: block;
                    margin-right: auto;
                    margin-left: auto;
                }
               }
               @media all and (max-width : 768px) and (min-width: 576px){
                #tohide {
                    display: none;
                }
               }
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

<div class="container">
    <section id="widgets-Statistics">
        <div class="row">
            <div class="col-12 mt-1 mb-2">
            </div>
        </div>
    <section>
    <div class="row">
        <div class="col-md-9 col-lg-9 col-sm-12 col-12">
                   @php
                       $cmt=0;
                   @endphp
                    <div class="row">
                        @foreach ($al as $couple)

                            <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12" @if ($cmt%2==0) data-aos="zoom-in-right"   @else  data-aos="zoom-in-left"  @endif data-aos-duration="1500">
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

                                                        A partir de<p class="price">{{$couple->prix}}DH</p>
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
        <div class="col-md-3 col-lg-3 col-sm-12" id="tohide">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="http://127.0.0.1:8000/telephone/showallphones" disabled="true">Telephones & Tablettes</a></li>
                    <li class="list-group-item"><a href="http://127.0.0.1:8000/accessoir/showallacs">Accessoires</a></li>
                    <li class="list-group-item"><a href="#">Nos services</a></li>
                </ul>
            </div>
            <div class="card">
                <img src="{{asset('/images/Promotion.PNG')}}" class="card-img-top" alt="Accroche HTML">
                <div class="card-footer bg-primary text-white text-uppercase">
                    <a href="#" class="text-white promos" >Les promotion d'aujourd'huit</a>
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
                                '<img src="../storage/'+Image+'" height="100%" class="rounded" width="100%" />'+
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
                                '<div class="card-header">'+
                                    '<h4 class="price">Prix : <span>'+Prix+'DH</span></h4>'+
                                    '<div class="inputContainer">'+
                                        '<a href="https://www.google.com/maps/place/33%C2%B009\'57.7%22N+5%C2%B033\'57.7%22W/@33.1660278,-5.566575,144m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d33.1660388!4d-5.5660235">'+
                                        '<i class="bx bxl-periscope icon"></i>'+
                                        '<input  value="Voir L\'emplacement" class="form-control Field" readonly/></a>'+
                                    '</div>'+
                                    '<div class="inputContainer" onclick="myFunction()">'+
                                        '<i class="bx bxs-phone icon"></i>'+
                                        '<input id="numero" value="0635666101" class="form-control Field" readonly/>'+
                                    '</div>'+
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







