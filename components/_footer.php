<!-- Footer Section -->
<div class="footer container-fluid">
	<div class="w-100 p-3">
		<div class="row">
			<div class="col-12 col-md-6 m-auto w3-footer-nav">
				<div class="links">
					<a href="index.php">Home</a>
					<a href="about.php">About</a>
					<a href="team.php">Team</a>
					<a href="testimonials.php">Testimonials</a>
					<a href="contact.php">Contact</a>
				</div>
			</div>
			<div class="col-12 col-md-6 m-auto w3-footer-copy">
				<div class="copyright">
					<p>&copy; 2017 Goal. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts </a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- js -->
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/JiSlider.js"></script>
<script>
	$(window).load(function () {
		$('#JiSlider').JiSlider({color: '#fff', start: 1, reverse: false}).addClass('ff')
	})
</script>
<!-- stats -->
<script src="assets/js/jquery.waypoints.min.js"></script>
<script src="assets/js/jquery.countup.js"></script>
<script>
	$('.counter').countUp();
</script>
<!-- //stats -->
<script src="assets/js/moment.js"></script>
<script src="assets/js/moment-timezone-with-data.js"></script>
<script tsrc="assets/js/timer.js"></script>
<script src="assets/js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
      $("#owl-demo2").owlCarousel({
        items : 1,
        lazyLoad : false,
        autoPlay : true,
        navigation : false,
        navigationText :  false,
        pagination : true,
      });
    });
</script>
<script src="assets/js/index.js"></script>
<script src="assets/js/move-top.js"></script>
<script src="assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });		
		});
</script>