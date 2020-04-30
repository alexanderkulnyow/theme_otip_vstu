<?php
get_header(); ?>
    <div id="primary" class="container content-area">
        <main id="main" class="site-main row" role="main">
			<?php
			if ( have_posts() ) :
				get_template_part( 'template-parts/content', get_post_format() );
			else :
				get_template_part( 'template-parts/content', 'none' );
							endif;
			?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
