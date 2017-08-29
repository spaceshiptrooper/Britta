<?php
///////////////////////////////////////////////////////////////
//
//		BRITTA
//		Author: spaceshiptrooper
//		Copyright: 2017 Britta
//		Version: 0.0.0.1
//		File Last Updated: 6/28/2017 at 11:11 P.M.
//
///////////////////////////////////////////////////////////////
?>
	<footer class="long-bottom">
		<p>&copy; Copyright <?php print($required->functions->html_escape(date('Y'))); ?>. All rights reserved. <a href="<?php print($required->functions->html_escape($config['BRITTA_WEBSITE'])); ?>"><?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></a></p>
		<ul class="social">
			<li><a href="https://facebook.com/britta.json"><i class="fa fa-facebook"></i></a></li>
			<li><a href="https://twitter.com/britta_json"><i class="fa fa-twitter"></i></a></li>
			<li><a href="<?php print($required->functions->html_escape($config['BRITTA_WEBSITE'])); ?>"><i class="fa fa-github"></i></a></li>
		</ul>
	</footer>
