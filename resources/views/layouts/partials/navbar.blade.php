  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-lg p-3 mb-5 bg-white rounded" id="navbar">
    <a class="navbar-brand" href="{{route('login')}}">
        <img src="{{ asset('images/logot.png') }}" alt="" height="30" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--left navbar  -->    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
            <li>
                <a class="nav-link" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
            </li>           
        
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
  </nav>