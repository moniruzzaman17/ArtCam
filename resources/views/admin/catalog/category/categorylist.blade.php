<h6 class="cat-title">{{$config['appName']}} Categories</h6>
<ul id="motherCatSortable">
	@foreach ($motherCategories as $key => $motherCategory)
	@if($motherCategory->visibility == 1)
	<li class="ui-state-default d-flex align-items-center cat-item" data="{{$motherCategory->entity_id}}" id="id_{{$motherCategory->entity_id}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$motherCategory->name}} <i class="delete-cat fas fa-trash-alt" data="{{$motherCategory->entity_id}}"></i> <i class="eye-open fa fa-eye" data="{{$motherCategory->entity_id}}"></i></li>
	@else
	<li class="ui-state-default d-flex align-items-center cat-item" data="{{$motherCategory->entity_id}}" id="id_{{$motherCategory->entity_id}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$motherCategory->name}} <i class="delete-cat fas fa-trash-alt" data="{{$motherCategory->entity_id}}"></i> <i class="eye-close fa fa-eye-slash" data="{{$motherCategory->entity_id}}"></i></li></li>
	@endif
	@endforeach
</ul>
<script>
	var $motherSortable = $( "#motherCatSortable" );

  $motherSortable.sortable({
    stop: function ( event, ui ) {
        // parameters will be a string "id[]=1&id[]=3&id[]=10"...etc
        var parameters = $motherSortable.sortable( "serialize" );

        var _token   = $('meta[name="csrf-token"]').attr('content');

        var url = '/sort/mother/category?'+parameters;

        $.ajax({
          url: url,
          type:"POST",
          data:{
            parm:parameters,
            _token: _token
          },
          success:function(data){
            console.log(data);
          }
        });
      }
    });
</script>