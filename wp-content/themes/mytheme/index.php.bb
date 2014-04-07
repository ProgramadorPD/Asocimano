<!--
    <div class="slide-banner">
        <?php
            //if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'mywidget slideshow' ) ) {}
        ?>
    </div>
    <div class="widgets-theme">
        <?php
            //if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'mywidget name' ) ) {}
        ?>
    </div>
        
        <?php 
            //if ( have_posts() ) {
                //while ( have_posts() ) {
                    //the_post();
        ?>
        <article class="posts-main">
            <h2><a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></h2>
            <small>Publicado el <?php //the_time( 'j/m/Y' ); ?> por <?php //the_author_posts_link(); ?></small>
            <?php
                    //if ( has_post_thumbnail() ) {
            ?>
            <div class="thumbnail">
                <?php //the_post_thumbnail(); ?>
            </div>
            <?php
                    //}
    
                    //the_excerpt();
                //}
            ?>
        </article>
    
-->
<?php
        //if ( function_exists( "pagination" ) ) pagination( $additional_loop->max_num_pages );
    //}
?>
<?php get_header(); ?>

<div class="container-logo">
    <img src="<?php //echo IMAGES_URL . 'logo.png' ?>" alt="Asociación Colombiana de Cirugía de la Mano">
</div>
<nav class="container-menu">
    <ul>
        <li>
            <a href="#" class="font-nav nav-link">ASOCIATE</a>
        </li>
        <li>
            <a href="#" class="font-nav nav-link">PREVENCIÓN</a>
        </li>
        <li>
            <a href="#" class="font-nav nav-link">BIBLIOTECA</a>
        </li>
        <li>
            <a href="#" class="font-nav nav-link">CONTACTOS</a>
        </li>
        <li>
            <a href="#" class="font-nav nav-link">CONSULTAS</a>
        </li>
    </ul>
</nav>
<div class="arrow-br arrow-item item-1">
    <a href="<?php //echo Config::getUrl( '', 'congreso' ) ?>" onclick="return( loadPageAnimated( '<?php //echo Config::getUrl( '', 'congreso' ) ?>' ) )">CONGRESO 2014</a>
</div>
<div class="arrow-br arrow-item item-2">
    <a href="<?php //echo Config::getUrl( '', 'noticias' ) ?>">NOTICIAS</a>
</div>
<div class="arrow-bl arrow-item item-3">
    <a href="#">HISTORIA</a>
</div>
<div class="arrow-br arrow-item item-4">
    <a href="#">CASOS</a>
</div>
<div class="arrow-bl arrow-item item-5">
    <a href="#">CONTACTO</a>
</div>
<div class="arrow-bl arrow-item item-6">
    <a href="#">PUBLICIDAD</a>
</div>
<div class="box-subcontainer">
    <div id="load-subcontainer"></div>
</div>
<div class="container-slideshow">
    <div id="fc-slideshow" class="fc-slideshow">
        <ul class="fc-slides">
            <li>
                <img src="<?php //Config::getUrlImage( 'slide-1.png' ); ?>" /><h3>Item #1</h3>
            </li>
            <li>
                <img src="<?php //Config::getUrlImage( 'slide-2.png' ); ?>" /><h3>Item #2</h3>
            </li>
            <li>
                <img src="<?php //Config::getUrlImage( 'slide-3.png' ); ?>" /><h3>Item #3</h3>
            </li>
            <li>
                <img src="<?php //Config::getUrlImage( 'slide-4.png' ); ?>" /><h3>Item #4</h3>
            </li>
        </ul>
    </div>
</div>
<div class="container-slideshow-market">
    <div id="jssor-slider-market">
        <div u="slides" style="cursor: move; position: absolute; overflow: hidden; left: 0px; top: 0px; width: 600px; height: 300px;">
            <div><img u="image" src="<?php //Config::getUrlImage( 'market-1.png' ); ?>" /></div>
            <div><img u="image" src="<?php //Config::getUrlImage( 'market-2.png' ); ?>" /></div>
            <div><img u="image" src="<?php //Config::getUrlImage( 'market-3.png' ); ?>" /></div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
