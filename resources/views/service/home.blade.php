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
        .parent {
            position: relative;
        }

        .child {
            position: absolute;
            bottom: 0px;
            right: 0px;
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
                                            <div class="col-md-7 col-lg-6 col-xs-5">
                                                    @if($couple->image!=null)
                                                    <img src="{{asset('storage/'.$couple->image)}}" alt="element 01" class="rounded-left" height="200px" width="200px">
                                                    @else
                                                    <img src="{{asset('images/no-image.png')}}" class="rounded-left" height="200px" width="200px"/>
                                                    @endif
                                            </div>
                                            <div class="col-md-5 col-lg-6">
                                                <div class="card-body parent">
                                                    <p class="card-title m-0">{{$couple->nom}}</p>
                                                    <p class="card-text text-ellipsis">
                                                        {{$couple->description}}
                                                    </p>
                                                    <span class="">
                                                        A partir de<p class="price">{{$couple->prix}}DH</p>
                                                    </span>
                                                        <button type="button" class="btn btn-icon rounded-circle btn-light-danger mr-1 mb-1 child" onclick="LikeSrv('{{$couple->id}}')">
                                                        <i class="bx bx-heart"></i>
                                                        </button>
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

        async function LikeSrv(ID){
            Swal.fire("Here's the title!", "...and here's the text!");

            const { value: email } = await Swal.fire({
                title: 'Input email address',
                input: 'email',
                inputLabel: 'Your email address',
                inputPlaceholder: 'Entrer votre email'
            })
            if (email) {
                $.ajax({
                    url: "/service/likeSrv",
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
                       // console.log(response);
                    }
                });
            }
        }
</script>
@endsection







