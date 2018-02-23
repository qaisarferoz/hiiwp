<?php
/**
 * The template for displaying all SportsPress pages.
 *
 * @package HiiWP
 */
global $post;
get_header();
echo '<!--SportPress-->';
get_template_part( 'templates/title' );
$author_id  = get_the_author_meta('ID');
$current_user = get_current_user_id();
$edit = ($author_id == $current_user) ? true : false;
?>

	<section id="primary" class="row"> 
		<div class="in_grid">
		<main id="main" role="main" class="col-9 content-box">
			<?php 
			if($edit) echo "<div>This is you! would you like to <a href='/wp-admin/post.php?post=".get_the_id()."&action=edit'>edit you player profile?</a></div>";
	
			while ( have_posts() ) : the_post();
				the_content(  )	;
			endwhile; // end of the loop. ?>

		</main><!-- #main -->
		</div>
	</section><!-- #primary -->
<?php get_footer(); ?>
