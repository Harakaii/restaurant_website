
<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{ asset('/') }}FrontEndSourceFile/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="{{ asset('/') }}FrontEndSourceFile/css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="{{ asset('/') }}FrontEndSourceFile/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset('/') }}FrontEndSourceFile/css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="{{ asset('/') }}FrontEndSourceFile/js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->   
<link href="{{ asset('/') }}FrontEndSourceFile/fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
<link href="{{ asset('/') }}FrontEndSourceFile/fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
<!-- //web-fonts -->
<style>
	.StripeElement {
		box-sizing: border-box;

		height: 40px;

		padding: 10px 12px;

		border: 1px solid transparent;
		border-radius: 4px;
		background-color: white;

		box-shadow: 0 1px 3px 0 #e6ebf1;
		-webkit-transition: box-shadow 150ms ease;
		transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
		box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
		border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
		background-color: #fefde5 !important;}
</style>

</head>
<body> 
	<!-- banner -->
        @include('FrontEnd.include.banner')
	<!-- //banner -->   
	<!-- add-products -->
        @yield('content')

	<!-- footer -->
    @include('FrontEnd.include.footer')


	<!-- //footer --> 
	<!-- cart-js -->
	<script src="{{ asset('/') }}FrontEndSourceFile/js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->	
	<!-- Owl-Carousel-JavaScript -->
	<script src="{{ asset('/') }}FrontEndSourceFile/js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  
	<!-- start-smooth-scrolling -->
	<script src="{{ asset('/')}}FrontEndSourceFile/js/SmoothScroll.min.js"></script>  
	<script type="text/javascript" src="{{ asset('/') }}FrontEndSourceFile/js/move-top.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}FrontEndSourceFile/js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	  
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/') }}FrontEndSourceFile/js/bootstrap.js"></script>
</body>
</html>