<?php get_header(); ?>

	<div id="content" class="row">
		<div class="hero-unit">
			<h1>Hello!</h1>
			<p>My name is Marcus Carlsson, this is my personal portfolio site. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt fermentum augue sed mattis. Phasellus eu ante eget magna elementum feugiat vel a lorem. Curabitur vestibulum gravida elementum. </p>
			<p>
				<a class="btn btn-primary btn-large">
					Learn more
				</a>
			</p>
		</div>
		<div class="span9">
			<?php 
			$myposts = get_posts();
			foreach( $myposts as $post ) : setup_postdata( $post ); ?>
				<article>
					<h1><?php the_title(); ?></h1>
					<?php the_excerpt(); ?>
					<a href="<?php the_permalink(); ?>">Read more</a>
				</article>
			<?php endforeach; ?>
		
		</div>
	</div>

<?php get_footer(); ?>