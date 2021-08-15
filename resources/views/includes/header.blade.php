<div class="container-fluid header-top-link">
  <div class="container">
    <nav class="navbar-expand-lg navbar-dark">
      <div class="">
        <ul class="custom-navbar d-flex flex-row justify-content-md-center justify-content-xl-end mb-0 list-unstyled">
          <li class="active">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="">
            <a class="nav-link" href="#">Privacy Policy</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<div class="container-fluid header-navbar">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand d-flex align-items-center" href="#"><img src="{{asset('images/logo.png')}}" alt=""> <h6 class="pl-2">Company Name</h6></a>
      <form class="form-inline search-form my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          @for($i=1; $i<5; $i++)
          <li class="nav-item">
            <div class="nav-item-action">
              <a class="nav-link" href="#">Category {{$i}}</a><span class="dropdown-toggle custom-toggler"></span>
            </div>
            <div class="sub-menu">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <div class="nav-item-link">
                    <a class="nav-link" href="#">Category {{$i}}</a>
                    <a class="nav-link" href="#">Category {{$i}}</a>
                    <a class="nav-link" href="#">Category {{$i}}</a>
                    <a class="nav-link" href="#">Category {{$i}}</a>
                    <a class="nav-link" href="#">Category {{$i}}</a>
                    <a class="nav-link" href="#">Category {{$i}}</a>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          @endfor
        </ul>
      </div>
    </nav>

  </div>
</div>
<div class="header-menu-bar container-fluid">
  <div class="container">
    <ul class="navbar-nav">
    </ul>
  </div>
</div>