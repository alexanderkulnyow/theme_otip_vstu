<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otip_Theme
 */
?>
</div>
<div class="w-100"></div>
<footer class="container-fluid footer">
    <div class="row bloginfo">
        <a href="http://vstu.by/ru/">
            <img src="https://placehold.it/50x70&text=40 * 50" alt="logo">
        </a>
        <p><?php echo get_bloginfo( 'description' ) ?></p>

    </div>
    <div>
        <p class="footbrand">
            &#169; Кафедра "<?php bloginfo( 'name' ); ?>" 2017г.
        </p>
    </div>
</footer>
<!--<div class="container">-->
<!--    <div class="row">-->
<!--		--><?php //if ( current_user_can( 'administrator' ) ) {
//			global $wpdb;
//			echo "<pre>";
//			print_r( $wpdb->queries );
//			echo "</pre>";
//		} ?>
<!--    </div>-->
</div>
<?php
wp_footer();
?>

<!-- Designed & by dds.by. Vitebsk, Belarus-->
<!--http://dds.by/-->
</body>
</html>
