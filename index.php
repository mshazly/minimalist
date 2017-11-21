<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage themename
 */
get_header(); ?>
	<section class="target-section" data-nav-id="#about" data-nav-text="About">
		<div class="container">
			<div class="row">
				<div class="col-md-12 h-100">
					<?php while(have_posts()) : the_post(); ?>
					<a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
					<span><?php the_time(get_option('date_format')); ?><span>
					<?php the_content(); ?>
					<hr />

					<?php endwhile; ?>

				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
