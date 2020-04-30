<?php
get_header();
?>

    <main class="container mt-5 mb-5">

        <div class="row news__block">
			<?php
			while ( have_posts() ) :
				the_post(); ?>
                <div class="news__item col-md-4 pl-5 pr-5 pb-5">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <h3 class="color_coral" itemprop="name"><?php the_title(); ?></h3>
                    </a>
                    <div class="text-justify mt-4"><?php the_excerpt(); ?></div>

                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="news__link"
                       rel="bookmark"> Читать полностью...</a>
                </div>
			<?php
			endwhile; // End of the loop.
			?>
        </div>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize( $wp_query->query_vars ); ?>';
                var current_page = <?php echo ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <button id="true_loadmore" class="center-block pr-5 pl-5">Загрузить ещё</button>
		<?php endif; ?>
    </main>

<?php
get_footer();
