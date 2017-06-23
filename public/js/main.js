/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
	
	$(".add-to-cart").click(function(){
		
		var product_id = $(this).closest("div.single-products").find("input[name='product-id']").val();
		$.ajaxSetup({
			headers:{
				'X-CSRF-Token': $('input[name="_token"]').val()
			}
		});
		
		$.ajax({
			type: "POST",
			url: '/sendtocart',
			data: {product_id:product_id},
			success: function(data){
				
				if(data == "failed")
					sweetAlert("Oops...", "This product already in your cart", "error");
				else 
				{
					swal("Added to cart", "Your product added to cart", "success");
					console.log(data);
					$("#mycart-total").text(data);
				}
					
			}
		
		});
		
	});
	
	$('.cart_quantity_delete').click(function(){
		var test = $(this);
		$.confirm({
			title:'Remove this product from cart',
			buttons: {
				confirm: function () {
					var product_id = test.attr("data-product");
					$.ajaxSetup({
						headers:{
							'X-CSRF-Token': $('input[name="_token"]').val()
						}
					});
					$.ajax({
						type: "POST",
						url: '/deletefromcart',
						data: {product_id:product_id},
						success: function(data){
				
							if(data == "success")
								location.reload();
								
							else	 
								$.alert("Try Again later");
						}
		
					});
					
				},
				cancel: function () {
					$.alert('Canceled!');
				}
			}
		})
	});

});
