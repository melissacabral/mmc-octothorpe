<?php get_header(); //include header.php ?>
		<main class="content">
			<?php 
			//begin "The Loop." Check to see if any posts were found
			if( have_posts() ){ 
				while( have_posts() ){
					the_post(); ?>
			<article id="post-<?php the_ID(); ?>" class="post">
				<?php the_post_thumbnail( 'large' ); ?>
				<h2 class="entry-title"> 
					<a href="<?php the_permalink(); ?>"> 
						<?php the_title(); ?> 
					</a>
				</h2>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages(); //support "paged" posts ?>
				</div>
				<div class="postmeta">
					<span class="author">by: <?php the_author(); ?></span>
					<span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<span class="num-comments"><?php comments_number(); ?></span>
					<span class="categories"> 
						<?php the_category(' '); ?>
					</span>
					<span class="tags"><?php the_tags(); ?></span>
				</div>
				<!-- end postmeta -->
			</article>

			<?php comments_template(); //include the list of comments and form ?>

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

<?php get_sidebar(); ?>
<?php get_footer(); ?>

