@extends('layouts.app')    
@section('contentCss')
    <style>
                                    
                                    /* E-commerce */
                                    body {
                      background: #e8cbc0;
                    background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
                    background: linear-gradient(to right, #e8cbc0, #636fa4);
                    min-height: 100vh;}

                .card {
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                transition: all 0.2s ease-in-out;
                box-sizing: border-box;
                margin-top:10px;
                margin-bottom:10px;
                background-color:#FFF;
                }

                .card:hover {
                box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                }
                .card > .card-inner {
                padding:10px;
                }
                .card .header h2, h3 {
                margin-bottom: 0px;
                margin-top:0px;
                }
                .card .header {
                margin-bottom:5px;
                }
                .card img{
                width:100%;
                }
    </style>
@endsection
@section('content')
 
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Tama Gsm Market</h1>
        <p class="lead text-muted mb-0">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte...</p>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
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
        <div class="col">
            <div class="row">
                <div class="carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="First slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="Second slide" /></div>
                        <div class="carousel-item"><img class="d-block img-fluid" src="https://via.placeholder.com/900x350" alt="Third slide" /></div>
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

                    @foreach ($collect->all() as $couple)
                    <!-- list group item-->
           
                    <div class="col-sm-4">
                        <div class="card">
                          <div class="image">
                            <img src="storage/{{$couple['imgs']->get(0)['path']}}" class="rounded" width="80" height="200" />
                          </div>
                          <div class="card-inner">
                            <div class="header">
                              <a href="show/{{$couple['telephones']->id_tele}}"><h2>{{$couple['telephones']->nom}}</h2></a>
                              <h6>{{$couple['telephones']->marque}}</h6>
                          </div>
                          <div class="content">
                            @if($couple['telephones']->per_solde > 0)
                            <p><del>{{$couple['telephones']->prix}}DH</del><strong class="bloc_left_price">{{$couple['telephones']->per_solde}}DH</strong></p>
                            @else 
                                <p>{{$couple['telephones']->prix}}DH</p>
                            @endif
                          </div>
                            </div>
                        </div>
                      </div>
                    @endforeach

            </div>
        </div>

    </div>
</div>






@endsection








