<div class="col-md-12 carousel slide my-4" id="carouselExampleIndicators" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"><img class="d-block img-fluid" src="images/islamic.jpg" width="350" height="900" alt="First slide" /></div>
            <div class="carousel-item"><img class="d-block img-fluid" src="images/islamic.jpg"  width="350" height="900" alt="Second slide" /></div>
            <div class="carousel-item"><img class="d-block img-fluid" src="images/islamic.jpg"  width="350" height="900" alt="Third slide" /></div>
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
<nav class=" navbar navbar-expand-lg sticky-top navbar-default">
  <a class="navbar-brand" href="#">
    <img src="{{ asset('images/logot.png') }}" alt="" height="30" />
</a>
  <div class="navbar-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <img src="/images/menu.png" height="30" width="30" >  
     </button>
  </div>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav ml-auto">
        <li><a data-text="Home" href="#">Home</a></li>
    <li><a data-text="About" href="{{ route('getallphones') }}">About</a></li>
    <li><a data-text="Secvices" href="#">Secvices</a></li>
    <li><a data-text="Contact Us" href="#">Contact Us</a></li>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </ul>
</div>
</nav>
