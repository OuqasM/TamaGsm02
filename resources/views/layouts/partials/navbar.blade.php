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
    <li class="nav-item"><a data-text="About" href="{{ route('getallphones') }}">About</a></li>
    <li class="nav-item"><a data-text="Secvices" href="#">Secvices</a></li>
    <li class="nav-item" ><a data-text="Contact Us" href="#">Contact Us</a></li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"> More</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Foods and Drink</a>
        <a class="dropdown-item" href="#">Home interior</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Category 1</a>
        <a class="dropdown-item" href="#">Category 2</a>
        <a class="dropdown-item" href="#">Category 3</a>
      </div>
    </li>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </ul>
</div>
</nav>
