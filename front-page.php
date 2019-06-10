<?php get_header(); //include header.php ?>
		<main class="content">
			<?php 
			//begin "The Loop." Check to see if any posts were found
			if( have_posts() ){ 
				while( have_posts() ){
					the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="post">
				<h2 class="entry-title"> 
					<a href="<?php the_permalink(); ?>"> 
						<?php the_title(); ?> 
					</a>
				</h2>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages(); //support "paged" posts ?>
				</div>
				
			</article>


			<!-- end post -->
			<?php 
				} //end while
			} //end if there are posts
			else{
				echo 'Sorry, no posts to show';
			} ?>

			
			<?php //get one recent piece of work in the web design category
			$portfolio_pieces = new WP_Query( array(
				'post_type' => 'portfolio_piece',
				'posts_per_page' => 1,
				'tax_query' => array(
					array(
						'taxonomy' => 'project_category',
						'terms'		=> 'web-design',
						'field'		=> 'slug',
					),
				),
			) );
			//begin custom loop
			if( $portfolio_pieces->have_posts() ){
			 ?>
			<section class="featured-work">
				<h2>Featured Work</h2>

				<?php 
				while( $portfolio_pieces->have_posts() ){
					$portfolio_pieces->the_post();	
				?>
				<div class="overlay">
					<?php the_post_thumbnail( 'medium' ); ?>
					<h3><?php the_title(); ?></h3>
				</div>
				<?php } //end while 

				//clean up
				wp_reset_postdata();
				?>

			</section>
			<?php } //end custom loop ?>
		</main>
		<!-- end #content -->


<?php get_footer(); ?>

