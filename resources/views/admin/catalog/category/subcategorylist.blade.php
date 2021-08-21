
@foreach ($motherCategories as $key => $motherCategory)
<h6 class="cat-title">{{$motherCategory->name}}</h6>
<ul id="subCatSortable">
	@foreach ($motherCategory->subCategories as $key => $subCategory)

	@if($subCategory->visibility == 1)
	<li class="ui-state-default d-flex align-items-center sub-cat-item" data="{{$subCategory->entity_id}}" id="id_{{$subCategory->entity_id}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$subCategory->name}}  <i class="delete-subcat fas fa-trash-alt" data="{{$subCategory->entity_id}}"></i> <i class="sub-eye-open fa fa-eye" data="{{$subCategory->entity_id}}"></i></li>
	@else
	<li class="ui-state-default d-flex align-items-center sub-cat-item" data="{{$subCategory->entity_id}}" id="id_{{$subCategory->entity_id}}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{$subCategory->name}}  <i class="delete-subcat fas fa-trash-alt" data="{{$subCategory->entity_id}}"></i> <i class="sub-eye-close fa fa-eye-slash" data="{{$subCategory->entity_id}}"></i></li></li>
	@endif
	@endforeach
</ul>
@endforeach
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