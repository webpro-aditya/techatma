<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Techatma
 */

?>

<!-- <footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'techatma' ) ); 
						?>"> -->
<?php
/* translators: %s: CMS name, i.e. WordPress. */
// printf( esc_html__( 'Proudly powered by %s', 'techatma' ), 'WordPress' );
?>
<!-- </a>
			<span class="sep"> | </span> -->
<?php
/* translators: 1: Theme name, 2: Theme author. */
//printf( esc_html__( 'Theme: %1$s by %2$s.', 'techatma' ), 'techatma', '<a href="https://techatma.com">Aditya Dandotia</a>' );
?>
<!-- </div>.site-info -->
<!-- </footer>#colophon -->
<!-- footer -->
<footer>
	<div class="container-xl">
		<div class="footer-inner">
			<div class="row d-flex align-items-center gy-4">
				<!-- copyright text -->
				<div class="col-md-4">
					<span class="copyright">
						© <?php echo date('Y') ?>.
						<?php
						printf(esc_html__('Theme: %1$s by %2$s.', 'techatma'), 'techatma', '<a href="https://techatma.com">Aditya D</a>');
						?>.
					</span>
				</div>

				<!-- social icons -->
				<div class="col-md-4 text-center">
					<ul class="social-icons list-unstyled list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>

				<!-- go to top button -->
				<div class="col-md-4">
					<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
				</div>
			</div>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>