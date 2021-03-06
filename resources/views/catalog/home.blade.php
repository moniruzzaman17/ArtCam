<div class="row w-100 m-auto product-card">
  @foreach ($products as $key => $product)
  <div class="col-sm-6 col-md-4">
    <div class="card">
      <img src="{{asset('medias/'.$product->medias[0]->image)}}">
      <div class="card-content">
        <a href="#">
          <h6>{{$product->name}}</h6>
          <a href="" class="card-category download" data="{{$product->entity_id}}">Download Now <i class="fas fa-download" aria-hidden="true"></i></a>
        </a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="product-pagination d-flex justify-content-center" id="product_default_page_pagination" style="margin-top: 40px;">
    {{ $products->links() }}
  </div>
</div>