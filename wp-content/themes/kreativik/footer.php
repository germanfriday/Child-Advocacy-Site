<!-- start footer -->
				<div id="footer">
					<p>&copy; <?=date('Y')?> <?=get_option('copyright')?> – covering all the little things in life</p>
				</div>
				<!-- end footer -->
				<div class="clear"></div>
			</div>
			<!-- end main wrapper -->
		</div>
		<!-- end shadow wrapper -->
		<div id="pointer" style="display:none"><?=get_template_directory_uri();?>/images/arrow.jpg</div>
		<? wp_footer(); ?>
		<? $ga = get_option('uds_ga_tracking_code'); ?>
		<? if(!empty($ga)): ?>
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			try {
				var pageTracker = _gat._getTracker("<?=$ga?>");
				pageTracker._trackPageview();
			} catch(err) {}
		</script>
		<? endif; ?>
	</body>
</html>