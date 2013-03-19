<?php
/*
Template Name: Archives
*/
get_header(); ?>

<article class="post">

		<?php the_post(); ?>
		<h2><?php the_title(); ?></h2>
		
		<?php get_search_form(); ?>
		
		<h3>Archives by Month:</h2>
		<select name="archive-menu" id="archive-menu" onChange="document.location.href=this.options[this.selectedIndex].value;">
<option value="">Select month</option>
<?php wp_get_archives('type=monthly&format=option'); ?>
</select>
		
		<h3>Latest 3 Posts in each category:</h2>
		<ul class="archive">
			<?php
wp_reset_query();
$cats = get_categories('');
foreach ($cats as $cat) :

$args = array(
'posts_per_page' => 3,
'cat' => $cat->term_id,
);

query_posts($args);
if (have_posts()) :
echo '<div class="category">';
echo '<div class="title">'.$cat->name.'</div>';
while (have_posts()) : the_post(); ?>		

<!-- this area is for the display of your posts the way you want it -->
<!-- i.e. title, exerpt(), etc. --><div><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>


<?php endwhile; ?>
</div>
<?php else :
echo '<div class="title">No Posts for '.$cat->name.' Category</div>';

endif; wp_reset_query(); ?>

<?php endforeach; ?>
		</ul>

</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>