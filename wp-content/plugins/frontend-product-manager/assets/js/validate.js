jQuery(document).ready(function( $ ) {

	jQuery.validator.addMethod("salePrice", function(value, element) {
	  var regular_price = $("#_regular_price").val();
	  return this.optional(element) || value <= regular_price;
	}, "Sale price must be less than regular price");

	$("#submit_new_product").on("click", function() {
		
		$("#fpm_add_product_form").validate({
	      
			rules : {
				_regular_price : { number: true },
				_sale_price : { 
					salePrice : true, 
					number: true
				},
				_stock:{ number: true }
			}
			,
		  	showErrors: function(errorMap, errorList) {
		      // Clean up any tooltips for valid elements
		      	$.each(this.validElements(), function (index, element) {
					var $element = $(element);
					$element.data("title", "") // Clear the title - there is no error associated anymore
					.removeClass("error")
					.tooltip("destroy");
		      });
		      // Create new tooltips for invalid elements
				$.each(errorList, function (index, error) {
					var $element = $(error.element);
					$element.tooltip("destroy") // Destroy any pre-existing tooltip so we can repopulate with new tooltip content
					.data("title", error.message)
					.addClass("error")
					.tooltip(); // Create a new tooltip based on the error messsage we just set in the title
				});
		  	},
			submitHandler: function(form) {
				var manage_stock = 'no';
				if( $('#_manage_stock').is(":checked") )
					manage_stock = 'yes';
				if( !CKEDITOR.instances['post_content'].getData() )
					CKEDITOR.instances['post_content'].setData( 'There is no description for this product' ) ;
			 	form.submit();
			 	/*
			 	var attribute_names = [], attribute_position = [], attribute_is_taxonomy = [], attribute_values = [];
			 	$('input[name^="attribute_names"]').each(function() {
				    attribute_names.push( $(this).val() );
				});
				$('input[name^="attribute_position"]').each(function() {
				    attribute_position.push( $(this).val() );
				});
				$('input[name^="attribute_is_taxonomy"]').each(function() {
				    attribute_is_taxonomy.push( $(this).val() );
				});
				$('input[name^="attribute_values"]').each(function() {
				    attribute_values.push( $(this).val() );
				});

			 	var formData = 
				{
					'post_title': $('#post_title').val(),
					'post_content': CKEDITOR.instances['post_content'].getData(),
					'post_excerpt': CKEDITOR.instances['post_excerpt'].getData(),
					'_regular_price': $('#_regular_price').val(),
					'_sale_price': $('#_sale_price').val(),
					'_tax_status': $('#_tax_status').val(),
					'_tax_class': $('#_tax_class').val(),
					'_sku': $('#_sku').val(),
					'_manage_stock': manage_stock,
					'_stock': $('#_stock').val(),
					'_stock_status': $('#_stock_status').val(),
					'attribute_names': attribute_names, 
					'attribute_position': attribute_position,
					'attribute_is_taxonomy': attribute_is_taxonomy,
					'attribute_values': attribute_values,
					'_thumbnail_id': $('#_thumbnail_id').val(),
					'product_cat': $('#product_cat').val(),
				};
				console.log(formData);
				
			 	$.ajax({
					type: 'POST',
					dataType: 'JSON',
					url: fpmPostSumitter.fpmAjaxUrl,
					data:{
						action: 'add_product_process',
						data: formData,
						security: fpmPostSumitter.security
					},
					complete: function( xhr, status ){
			            console.log("Request complete: " + status);
			        },
					success: function(response){
						if( response ){
							//alert( );
						}
						console.log(response);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						console.log(XMLHttpRequest);
						console.log(textStatus);
						console.log(errorThrown);
					}
				});	
				*/
			}
		});
	});
});