<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> <?php wp_title(">", true); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png"/>
	<?php wp_enqueue_script( "jquery" ); ?>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php //the_header_image_tag(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
<!--        topper-->
        <div class="container-fluid location d-none d-md-block">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="inlinetext">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <a href="#location"><?php echo get_option( 'contacts_options' )['my_adres']; ?></a>
                    </div>
                </div>
                <div class="col">
                    <div class="inlinetext">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <a href="mailto:<?php echo get_option( 'contacts_options' )['my_mail']; ?>"> <?php echo get_option( 'dds_options' )['my_mail']; ?></a>
                    </div>
                </div>
                <div class="col">
                    <div class="inlinetext">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <a href="tel: <?php echo get_option('contacts_options')['my_tel']; ?>"> <?php echo get_option( 'contacts_options' )['my_tel']; ?></a>
                    </div>
                </div>
                <div class="col align-self-end d-md-none d-lg-block">
                    <div class="inlinetext">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <a href="/wp-admin/">
							<?php
							$current_user = wp_get_current_user();
							if ( 0 == $current_user->ID ) {
								echo 'Login/ Sign in ';
							} else {
								echo 'Hello: ' . $current_user->user_login;
							}
							?></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="navbar navbar-default" role="navigation">

                <!-- Brand and toggle get grouped for better mobile display -->
                <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php university_logo();

					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse justify-content-end',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					) );
					?>

                </nav>

            </div>
        </div>

			<?php if ( ! is_front_page() ):
				dds_readline();
			else:
            ?>
                <img class="img-fluid w-100" src="<?php echo get_header_image(); ?>" alt="<?php echo get_bloginfo('title'); ?>">
            <?php
			endif;
			?>

    </header><!-- #masthead -->
    <div id="sitecontent" class="">


