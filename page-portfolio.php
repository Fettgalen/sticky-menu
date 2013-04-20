<?php get_header(); ?>

	<div id="content" class="row">
		<div class="span12">

			<?php
			global $post;

			$args = array(
				'post_type'      => 'project',
				'posts_per_page' => -1
			);

			$myposts = get_posts( $args );

			foreach( $myposts as $post ) : setup_postdata( $post ); ?>

				<?php $background = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>

				<article style="background-image: url('<?php echo $background[0]; ?>');">
					<h1><?php the_title(); ?></h1>
					<?php the_excerpt(); ?>
				</article>
				
			<?php endforeach; ?>
		
		</div>
	</div>

<?php get_footer(); ?>