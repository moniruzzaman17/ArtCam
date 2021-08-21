$(document).ready(function() {
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
});

$(document).ready(function() {
	var $motherSortable = $( "#subCatSortable" );

	$motherSortable.sortable({
		stop: function ( event, ui ) {
        // parameters will be a string "id[]=1&id[]=3&id[]=10"...etc
        var parameters = $motherSortable.sortable( "serialize" );

        var _token   = $('meta[name="csrf-token"]').attr('content');

        var url = '/sort/sub/category?'+parameters;

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
});

$(document).on('click', '.eye-open', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var catID = $(this).attr("data");
	var _token   = $('meta[name="csrf-token"]').attr('content');

	var url = '/category/status/change/disable';

	$.ajax({
		url: url,
		type:"POST",
		data:{
			catID:catID,
			_token: _token
		},
		success:function(data){
			$(".cat-list").html('');
			$(".cat-list").html(data);
		}
	});
});

$(document).on('click', '.eye-close', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var catID = $(this).attr("data");
	var _token   = $('meta[name="csrf-token"]').attr('content');

	var url = '/category/status/change/enable';

	$.ajax({
		url: url,
		type:"POST",
		data:{
			catID:catID,
			_token: _token
		},
		success:function(data){
			$(".cat-list").html('');
			$(".cat-list").html(data);
		}
	});
});

$(document).on('click', '.sub-eye-open', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var subCatID = $(this).attr("data");
	var _token   = $('meta[name="csrf-token"]').attr('content');

	var url = '/subcategory/status/change/disable';

	$.ajax({
		url: url,
		type:"POST",
		data:{
			subCatID:subCatID,
			_token: _token
		},
		success:function(data){
			$(".sub-cat-list").html('');
			$(".sub-cat-list").html(data);
		}
	});
});

$(document).on('click', '.sub-eye-close', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var subCatID = $(this).attr("data");
	var _token   = $('meta[name="csrf-token"]').attr('content');

	var url = '/subcategory/status/change/enable';

	$.ajax({
		url: url,
		type:"POST",
		data:{
			subCatID:subCatID,
			_token: _token
		},
		success:function(data){
			$(".sub-cat-list").html('');
			$(".sub-cat-list").html(data);
		}
	});
});


$(document).on('click', '.delete-cat', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var catID = $(this).attr("data");
	var _token   = $('meta[name="csrf-token"]').attr('content');

	var url = '/category/delete';

	if (confirm("Are you sure?")) {
		$.ajax({
			url: url,
			type:"POST",
			data:{
				catID:catID,
				_token: _token
			},
			success:function(data){
				$(".cat-list").html('');
				$(".cat-list").html(data);
			}
		});
	}
	return false;
});

$(document).on('click', '.delete-subcat', function(e) {
	e.preventDefault();
	e.stopPropagation();
	var subCatID = $(this).attr("data");
	var _token   = $('meta[name="csrf-token"]').attr('content');

	var url = '/subcategory/delete';

	if (confirm("Are you sure?")) {
		$.ajax({
			url: url,
			type:"POST",
			data:{
				subCatID:subCatID,
				_token: _token
			},
			success:function(data){
				$(".sub-cat-list").html('');
				$(".sub-cat-list").html(data);
			}
		});
	}
	return false;
});

$(document).ready(function(){
	$(document).on('click', '.cat-item', function(event){
		event.preventDefault();
    // event.stopPropagation();
    var catID = $(this).attr('data');
    var url = "/category/details/{catID}";

    $.ajax({
    	url: url,
    	type: 'GET',
    	data: { catID: catID },
    	success: function(data)
    	{
    		$(".catDetail-wrapper").html('');
    		$(".catDetail-wrapper").html(data);
    	}
    });
});
});

$(document).ready(function(){
	$(document).on('click', '.sub-cat-item', function(event){
		event.preventDefault();
    // event.stopPropagation();
    var catID = $(this).attr('data');
    var url = "/subcategory/details/{subCatID}";

    $.ajax({
    	url: url,
    	type: 'GET',
    	data: { subCatID: catID },
    	success: function(data)
    	{
    		$(".catDetail-wrapper").html('');
    		$(".catDetail-wrapper").html(data);
    	}
    });
});
});