<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage RotorWash
 * @since RotorWash 1.0
 * Template Name: Home
 */

get_header();
?>

<?
if( have_posts() ):
    while( have_posts() ):
        the_post();

?>

            <article class="post home">
                <h2 class="page-title"><?php the_title(); ?></h2>

                <?php the_content(); ?>

            </article><!-- end .post -->
<?php 

    endwhile;
endif;
?>
<div class="home-sidebar">
    <?php 
	if ( dynamic_sidebar('home-widgets') ) : 
	else : 
	?>
	<?php endif; ?>
</div>

<aside id="sidebar">
    <ul>
    <?php 
if ( dynamic_sidebar('intervention') ) : 
else : 
?>
<?php endif; ?>
</ul>
</aside>
<? get_footer(); ?>

