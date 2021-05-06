<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-lg p-3 mb-5 bg-white rounded" id="navbar">
  <a class="navbar-brand" href="#">
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
          <li>      
              <a class="nav-link" href="#"><i class="fas fa-camera"></i>
                  Déposer votre annonce</a>
           </li> 
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i> Contatez nous
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="https://www.facebook.com/mehdi.ouqas"><i class="fab fa-facebook"> Facebook</i></a>
            <a class="dropdown-item" href="https://www.linkedin.com/in/mehdi-ouqas-292320180/"><i class="fab fa-linkedin"> Linkedin</i></a>
          </div>
        </li>
      </ul>
  </div>
</nav>