<?php get_header(); ?>

	<div id="content" class="row">
		<div class="span9">

			<?php the_post(); ?>
				<article>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
		
		</div>
	</div>

<?php get_footer(); ?>