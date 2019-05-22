	</div>	<!-- end .wrapper -->

	<footer class="footer contentinfo">
		<div class="footer-widgets">
			<?php dynamic_sidebar('footer-widgets'); ?>
		</div>

		<small class="legal">
			&copy; 2014-2019 by <?php bloginfo('name'); ?>. All Rights Reserved. 
			<?php the_privacy_policy_link(); ?>
			
		</small>
	</footer>

	<?php wp_footer(); //HOOK.  ?>
</body>
</html>