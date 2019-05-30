<?php get_header(); //include header.php ?>
		<main class="content">
			<?php 
			//begin "The Loop." Check to see if any posts were found
			if( have_posts() ){ 
				while( have_posts() ){
					the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="post">
				
				<div class="overlay">
					<?php the_post_thumbnail( 'large' ); ?>
					<h2 class="entry-title"> 
						<a href="<?php the_permalink(); ?>"> 
							<?php the_title(); ?> 
						</a>
					</h2>
				</div>

				<div class="entry-content">
					<?php 
					//show all custom fields in a list
					the_meta();  ?>

					<?php 
					//get one custom field value
					echo get_post_meta( get_the_ID(), 'Year', true ); ?>

					<?php the_content(); ?>
					<?php wp_link_pages(); //support "paged" posts ?>
				</div>
				
			</article>

			

			<!-- end post -->
			<?php 
				} //end while
				?>
			
			<section class="pagination">
				<?php mmc_pagination(); ?>
			</section>

			<?php
			} //end if there are posts
			else{
				echo 'Sorry, no posts to show';
			} ?>
		</main>
		<!-- end #content -->


<?php get_footer(); ?>

