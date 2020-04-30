<?php
get_header();
?>
    <main class="container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'list_post' ); ?>>
                    <header class="entry-header">
						<?php
						if ( is_single() ) :
//			the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
						//		?>
                    </header><!-- .entry-header -->
                    <div class="entry-content">
						<?php the_excerpt(); ?>
                    </div><!-- .entry-content -->
                    <!--	<footer class="entry-footer">-->
                    <a href="<?php echo get_permalink(); ?>">
                        <button class="btn_readmore right">Читать далее</button>
                    </a>
                </article><!-- #post-## -->
			<?php
			endwhile;
		endif;
		?>
        </section>


    </main>

<?php
get_footer();
