<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Otip_Theme
 */

get_header(); ?>

    <section class="mainabout">
        <div class="container-fluid">
			<?php
			$myposts = get_posts( array(
					'numberposts' => 2,
					'category'    => 'block',
				)
			);

			foreach ( $myposts as $post ) {
				setup_postdata( $post );
				$a = 0;
				$b = 1;
				?>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-5 order-<?php ?>">
						<?php if ( has_post_thumbnail() ) { ?>

							<?php the_post_thumbnail(); ?>
                            HAVE THUMBNAIL DO SOMETHING
							<?php
						} else {
							?>
                            <img class="" src="//placehold.it/500x300&text=NO LOGO" alt="">
							<?php
						}
						?>
                    </div>
                    <div class="col-12 col-md-5 align-self-center order-<?php ?>">
                        <h1 class="mainh"> <?php the_title(); ?></h1>
                        <p class="mainp about align-self-center">
							<?php the_excerpt(); ?></p>
                        <a href="<?php echo get_permalink(); ?>">
                            <div class="aboutbuttonposition">
                                <button class="aboutbutton" type="button">Читать далее</button>
                            </div>
                        </a>
                    </div>
                </div>
				<?php
			}

			wp_reset_postdata();
			?>

        </div>
    </section>


    <section class="container-fluid d-none d-md-block prepodback">
		<?php
		// вывод сотрудников
//        todo Это явно надо переписать
		$args = array(
			'number' => 1,
			'orderby' => 'Name',
			'order'   => 'DESC'

		);
		$terms = get_terms( 'tax_staff' , $args );
		if ( $terms ) {
			foreach ( $terms as $term ) {
				echo "<h1>{$term->name}</h1>";

				$posts = get_posts( array(
					'post_type' => 'staff',
					'tax_staff' => 'teacher'
				) );
				foreach ( $posts as $post ) {
					setup_postdata( $post );
					the_title( '<h3>', '</h1>' );
				}
				wp_reset_postdata();
			}

		}
		?>
    </section>


    <section class="container-fluid googlemap">
        <h1><span class="underline">На</span>ши контакты</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="columntext">
                        <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                        <a href="#map">Московский пр.-т д.72</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="columntext contwithboarder">
                        <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                        <a href="mailto:otip@vstu.by"> otip@vstu.by</a>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="columntext ">
                        <i class="fa fa-mobile fa-2x" aria-hidden="true"></i>
                        <a href="tel: 8(0212)495355"> 8(0212)49-53-55</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" id="map">

                </div>
            </div>
        </div>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUiwQs_PI6PLbOaNM20fVEWqD2upQjNVQ&callback=initMap"></script>
        <script>
            function initMap() {
                var uluru = {lat: 55.1781968, lng: 30.2351773};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: uluru
                });
                var marker = new google.maps.Marker({
                    position: uluru,
                    map: map
                });
            }
        </script>
    </section>
<?php
get_footer();
