<div class="container-fluid header-top-link">
  <div class="container">
    <nav class="navbar-expand-lg navbar-dark">
      <div class="">
        <ul class="custom-navbar d-flex flex-row justify-content-md-center justify-content-xl-end mb-0 list-unstyled">
          <li class="active">
            <a class="nav-link" href="{{route('about')}}">About Us</a>
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
      <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}"><img src="{{asset('images/'.$config['logo'])}}" alt=""> <h6 class="pl-2">{{$config['appName']}}</h6></a>
      <form action="{{route('search')}}" method="post" class="form-inline search-form my-2 my-lg-0">
        @csrf
        <input class="form-control mr-sm-2 p-2" name="keyword" type="search" placeholder="type keyword(s) here" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          @php $i=1; @endphp
          @foreach ($categories as $key => $category)
          @if(count($category->subCategories)>0)
          <li class="nav-item">
            <div class="nav-item-action">
              <a class="nav-link" href="{{route('category',["type"=>"category","id"=>$category->entity_id])}}">{{$category->name}}</a><span class="dropdown-toggle custom-toggler"></span>
            </div>
            <div class="sub-menu">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <div class="nav-item-link">
                    @foreach ($category->subCategories as $key => $subCategory)
                    @if($subCategory->visibility == 1)
                    <a class="nav-link" href="{{route('category',["type"=>"subcategory","id"=>$subCategory->entity_id])}}">{{$subCategory->name}}</a>
                    @endif
                    @endforeach
                  </div>
                </li>
              </ul>
            </div>
          </li>
          @else
          <li class="nav-item">
            <div class="nav-item-action">
              <a class="nav-link" href="{{route('category',["type"=>"category","id"=>$category->entity_id])}}">{{$category->name}}</a>
            </div>
          </li>
          @endif
          @endforeach
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