jQuery(document).ready(function( $ ) {
	
	$("#_manage_stock").click(function(){
		if ($("#_manage_stock").is(':checked')) {
	        $("#stock_qty_wrapper").show();
	        $("#stock_status_wrapper").show();
	    }
	    else{
	        $("#stock_qty_wrapper").hide();
	        $("#stock_status_wrapper").hide();
	    }
	});

	$("#add-attribute").click(function(){
		var inputs = $("#added-attributes").find( $("input[id='attribute_value']") );
		var order = inputs.length;
		var option_value = $("#attribute_taxonomy").val();
		var option_text = $("#attribute_taxonomy option[value='" + option_value+ "']").text();

		$("#added-attributes").append("<div class='control' id='" + option_value + "'></div>");
		$("#added-attributes").find("div.control#" + option_value).append("<label>" + option_text + "</label><input type='hidden' name='attribute_names[" + order + "]' value='" + option_value + "'><input type='hidden' name='attribute_position[" + order + "]' value='" + order + "'><input type='hidden' name='attribute_is_taxonomy[" + order + "]' value='1'><input type='text' name='attribute_values[" + order + "]' id='attribute_value' value=''>");
		$("<i class='fa fa-remove clickable remove-attribute'>Remove</i>")
		.attr({
		    rel: option_value
		})
		.appendTo("div.control#" + option_value);

		$("#attribute_taxonomy option:selected").attr('disabled','disabled');
		$("#attribute_taxonomy").val("");
	});

	$("body").on('click','.remove-attribute', function(){
		var value = $(this).attr('rel');
		$('#' + value).remove();
		$("#attribute_taxonomy option[value=" + value + "]").removeAttr('disabled');
	});

    function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    reader.onload = function(e) {
	      $('#show-image').attr('src', e.target.result);
	    }

	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#_thumbnail_id").change(function() {
	  readURL(this);
	});
});



