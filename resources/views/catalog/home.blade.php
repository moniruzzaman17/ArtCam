<div class="row w-100 m-auto product-card">
  @for($i=1; $i<11; $i++)
  <div class="col-sm-6 col-md-3">
    <div class="card">
      <img src="{{asset('medias/sample'.$i.'.jpg')}}">
      <div class="card-content">
        <a href="#">
          <h6>Wooden CNC Bed Design</h6>
          <a href="#" class="card-category" download="{{asset('medias/sample'.$i.'.jpg')}}">Download Now <i class="fas fa-chevron-right fa-sm"></i></a>
        </a>
      </div>
    </div>
  </div>
  @endfor
</div>
<script>
  // download image
function forceDownload(url, fileName){
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "blob";
    xhr.onload = function(){
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL(this.response);
        var tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
    }
    xhr.send();
}
</script>