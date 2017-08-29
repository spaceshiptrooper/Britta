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
<!DOCTYPE html>
<html>
<head>
<title>Codes - <?php print($required->functions->html_escape($config['WEBSITE_TITLE'])); ?></title>
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'style.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'custom.css')); ?>">
<link rel="stylesheet" href="<?php print($required->functions->html_escape($config['URL'] . 'css' . DS . 'responsive.css')); ?>">
<link rel="icon" href="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'favicon.png')); ?>">
</head>

<body>
<?php require(ROOT . 'template' . DS . 'header.php'); ?>

	<main class="container">
		<div class="left-container pull-left">
			<h1>Hello <?php print($required->functions->html_escape($self->first_name . ' ' . $self->last_name)); ?></h1>
			<hr>
<?php
if($self->avatar != '') {
?>
			<img src="<?php print($required->functions->html_escape($config['URL'] . 'avatars' . DS . $self->avatar)); ?>" alt="<?php print($required->functions->html_escape($self->first_name)); ?>'s picture" class="avatar side">
<?php
} else {
?>
			<img src="<?php print($required->functions->html_escape($config['URL'] . 'images' . DS . 'logo.png')); ?>" alt="<?php print($required->functions->html_escape($self->first_name)); ?>'s picture" class="avatar side">
<?php
}
?>
		</div>

		<div class="main-break"></div>

		<div class="main-container pull-right">
			<a id="top"></a>
			<h1>Codes For Britta</h1>
			<hr>
			<div class="p-t-15"></div>
			<p><strong>Britta</strong> supports <strong>BBcode</strong> and some of <strong>Markdown</strong>'s syntax.</p>
			<div class="p-t-15"></div>

			<hr>
			<h4>Table Of Contents</h4>
			<hr>
			<ul>
				<li>
					<a href="#bold" title="Bold" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Bold</a>
					<ul>
						<li><a href="#bbcode_bold" title="BBcode Bold" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode</a></li>
					</ul>
					<ul>
						<li><a href="#markdown_bold" title="Markdown Bold" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Markdown</a></li>
					</ul>
				</li>
				<li>
					<a href="#italics" title="Italics" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Italics</a>
					<ul>
						<li><a href="#bbcode_italics" title="BBcode Italics" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode</a></li>
					</ul>
					<ul>
						<li><a href="#markdown_italics" title="Markdown Italics" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Markdown</a></li>
					</ul>
				</li>
				<li>
					<a href="#links" title="Links" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Links</a>
					<ul>
						<li><a href="#bbcode_links" title="BBcode Links" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode</a></li>
					</ul>
					<ul>
						<li><a href="#markdown_links" title="Markdown Links" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Markdown</a></li>
					</ul>
				</li>
				<li>
					<a href="#images" title="Images" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Images</a>
					<ul>
						<li><a href="#bbcode_images" title="BBcode Images" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode</a></li>
					</ul>
					<ul>
						<li><a href="#markdown_images" title="Markdown Images" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Markdown</a></li>
					</ul>
				</li>
				<li>
					<a href="#quotes" title="Quotes" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Quotes</a>
					<ul>
						<li><a href="#bbcode_quotes" title="BBcode Quotes" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode</a></li>
					</ul>
					<ul>
						<li><a href="#markdown_quotes" title="Markdown Quotes" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Markdown</a></li>
					</ul>
				</li>
				<li>
					<a href="#extras" title="Extras" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Extras</a>
					<ul>
						<li>
							<a href="#codes" title="Codes" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Codes</a>
							<ul>
								<li><a href="#basic_code" title="Basic Code Sample & Basic Code" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Code Sample & Basic Code</a></li>
							</ul>
							<ul>
								<li><a href="#basic_html" title="Basic HTML Sample & Basic HTML" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic HTML Sample & Basic HTML</a></li>
							</ul>
							<ul>
								<li><a href="#basic_css" title="Basic CSS Sample & Basic CSS" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic CSS Sample & Basic CSS</a></li>
							</ul>
							<ul>
								<li><a href="#basic_javascript" title="Basic Javascript/Jquery Sample & Basic Javascript/Jquery" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Javascript/Jquery Sample & Basic Javascript/Jquery</a></li>
							</ul>
							<ul>
								<li><a href="#basic_apache" title="Basic Apache Sample & Basic Apache" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Apache Sample & Basic Apache</a></li>
							</ul>
							<ul>
								<li><a href="#basic_mysql" title="Basic MySQL Sample & Basic MySQL" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic MySQL Sample & Basic MySQL</a></li>
							</ul>
							<ul>
								<li><a href="#basic_php" title="Basic PHP Sample & Basic PHP" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic PHP Sample & Basic PHP</a></li>
							</ul>
							<ul>
								<li><a href="#basic_hack" title="Basic Hack Sample & Basic Hack" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Hack Sample & Basic Hack</a></li>
							</ul>
							<ul>
								<li><a href="#basic_python" title="Basic Python Sample & Basic Python" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Python Sample & Basic Python</a></li>
							</ul>
							<ul>
								<li><a href="#basic_ruby" title="Basic Ruby Sample & Basic Ruby" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Ruby Sample & Basic Ruby</a></li>
							</ul>
							<ul>
								<li><a href="#basic_c" title="Basic C Sample & Basic C" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic C Sample & Basic C</a></li>
							</ul>
							<ul>
								<li><a href="#basic_c_sharp" title="Basic C# Sample & Basic C#" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic C# Sample & Basic C#</a></li>
							</ul>
							<ul>
								<li><a href="#basic_c_plus_plus" title="Basic C++ Sample & Basic C++" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic C++ Sample & Basic C++</a></li>
							</ul>
							<ul>
								<li><a href="#basic_visual_basic" title="Basic Visual Basic Sample & Basic Visual Basic" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Visual Basic Sample & Basic Visual Basic</a></li>
							</ul>
							<ul>
								<li><a href="#basic_erlang" title="Basic Erlang Sample & Basic Erlang" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Erlang Sample & Basic Erlang</a></li>
							</ul>
							<ul>
								<li><a href="#basic_scala" title="Basic Scala Sample & Basic Scala" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Scala Sample & Basic Scala</a></li>
							</ul>
							<ul>
								<li><a href="#basic_swift" title="Basic Swift Sample & Basic Swift" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Swift Sample & Basic Swift</a></li>
							</ul>
							<ul>
								<li><a href="#basic_java" title="Basic Java Sample & Basic Java" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Java Sample & Basic Java</a></li>
							</ul>
							<ul>
								<li><a href="#basic_go" title="Basic Go Sample & Basic Go" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Go Sample & Basic Go</a></li>
							</ul>
							<ul>
								<li><a href="#basic_lua" title="Basic Lua Sample & Basic Lua" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Lua Sample & Basic Lua</a></li>
							</ul>
							<ul>
								<li><a href="#basic_prolog" title="Basic Prolog Sample & Basic Prolog" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Prolog Sample & Basic Prolog</a></li>
							</ul>
							<ul>
								<li><a href="#basic_perl" title="Basic Perl Sample & Basic Perl" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic Perl Sample & Basic Perl</a></li>
							</ul>
							<ul>
								<li><a href="#basic_cold_fusion" title="Basic ColdFusion Sample & Basic ColdFusion" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Basic ColdFusion Sample & Basic ColdFusion</a></li>
							</ul>
						</li>
						<li>
							<a href="#miscellaneous" title="Miscellaneous" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Miscellaneous</a>
							<ul>
								<li><a href="#logo" title="Logo" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Logo</a></li>
							</ul>
							<ul>
								<li><a href="#toggle" title="Toggle" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Toggle</a></li>
							</ul>
							<ul>
								<li><a href="#comment" title="Comment" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Comment</a></li>
							</ul>
							<ul>
								<li>
									<a href="#headers" title="Headers" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Headers</a>
									<ul>
										<li>
											<a href="#bbcode_headers" title="BBCode Headers" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Headers</a>
											<ul>
												<li><a href="#bbcode_header_1" title="BBCode Header 1" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Header 1</a></li>
												<li><a href="#bbcode_header_2" title="BBCode Header 2" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Header 2</a></li>
												<li><a href="#bbcode_header_3" title="BBCode Header 3" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Header 3</a></li>
												<li><a href="#bbcode_header_4" title="BBCode Header 4" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Header 4</a></li>
												<li><a href="#bbcode_header_5" title="BBCode Header 5" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Header 5</a></li>
												<li><a href="#bbcode_header_6" title="BBCode Header 6" onmousedown="return false;" data-toggle="tooltip" data-placement="top">BBCode Header 6</a></li>
											</ul>
										</li>
										<li>
											<a href="#custom_headers" title="Custom Headers" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Headers</a>
											<ul>
												<li><a href="#custom_header_1" title="Custom Header 1" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Header 1</a></li>
												<li><a href="#custom_header_2" title="Custom Header 2" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Header 2</a></li>
												<li><a href="#custom_header_3" title="Custom Header 3" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Header 3</a></li>
												<li><a href="#custom_header_4" title="Custom Header 4" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Header 4</a></li>
												<li><a href="#custom_header_5" title="Custom Header 5" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Header 5</a></li>
												<li><a href="#custom_header_6" title="Custom Header 6" onmousedown="return false;" data-toggle="tooltip" data-placement="top">Custom Header 6</a></li>
											</ul>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>

			<div class="p-t-40"></div>

			<!-- Bold -->
			<div class="top-hover">
				<hr>
				<span class="top pull-right"></span>
				<h2><a id="bold"></a>Bold</h2>
				<hr>
				<span class="top-hover top pull-right"></span>
				<h3><a id="bbcode_bold"></a><strong>BBCode</strong></h3>
				<hr>
			</div>
			<p><?php
$code = '[code]&lsqb;b&rsqb;TEXT_HERE&lsqb;/b&rsqb;[/code]';

print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[b]This text will be bold.[/b]')); ?></p>

			<div class="p-t-25"></div>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="markdown_bold"></a><strong>Markdown</strong></h3>
			<hr>
			<p><?php
$code = '[code]&ast;&ast;TEXT_HERE&ast;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('**This text will be bold.**')); ?></p>


			<!-- Italics -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<h2><a id="italics"></a>Italics</h2>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="bbcode_italics"></a><strong>BBCode</strong></h3>
			<hr>
			<p><?php
$code = '[code]&lsqb;i&rsqb;TEXT_HERE&lsqb;/i&rsqb;[/code]';

print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[i]This text will be italicized.[/i]')); ?></p>

			<div class="p-t-25"></div>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="markdown_italics"></a><strong>Markdown</strong></h3>
			<hr>
			<p><?php
$code = '[code]&ast;TEXT_HERE&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('*This text will be italicized.*')); ?></p>



			<!-- Links -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<h2><a id="links"></a>Links</h2>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="bbcode_links"></a><strong>BBCode</strong></h3>
			<hr>
			<p><?php
$code = '[code]&lsqb;url&rsqb;URL_HERE&lsqb;/url&rsqb;[/code]';

print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[url]' . $config['URL'] . 'codes.php[/url]')); ?></p>
			<hr>

			<p><?php
$code = '[code]&lsqb;url=URL_HERE&rsqb;TEXT_HERE&lsqb;/url&rsqb;[/code]';

print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[url=' . $config['URL'] . 'codes.php]TEXT_HERE[/url]')); ?></p>

			<div class="p-t-25"></div>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="markdown_links"></a><strong>Markdown</strong></h3>
			<hr>
			<p><?php
$code = '[code]&lsqb;TITLE_TEXT_HERE&rsqb;&lpar;URL_HERE&rpar;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[TITLE_TEXT_HERE](' . $config['URL'] . 'codes.php)')); ?></p>
			<hr>

			<p><?php
$code = '[code]&lsqb;TEXT_HERE&rsqb;&lpar;URL_HERE &quot;TITLE_TEXT_HERE&quot;&rpar;[/code]';

print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[TEXT_HERE](' . $config['URL'] . 'codes.php "TITLE_TEXT_HERE")')); ?></p>

			<!-- Images -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<h2><a id="images"></a>Images</h2>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="bbcode_images"></a><strong>BBCode</strong></h3>
			<hr>
			<p><?php
$code = '[code]&lsqb;img&rsqb;IMAGE_URL_HERE&lsqb;/img&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[img]' . $config['URL'] . 'images' . DS . 'logo.png[/img]')); ?></p>
			<hr>

			<p><?php
$code = '[code]&lsqb;img width=WIDTH_HERE&rsqb;IMAGE_URL_HERE&lsqb;/img&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[img width=300]' . $config['URL'] . 'images' . DS . 'logo.png[/img]')); ?></p>
			<hr>

			<p><?php
$code = '[code]&lsqb;img height=HEIGHT_HERE&rsqb;IMAGE_URL_HERE&lsqb;/img&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[img height=300]' . $config['URL'] . 'images' . DS . 'logo.png[/img]')); ?></p>
			<hr>

			<p><?php
$code = '[code]&lsqb;img width=WIDTH_HERE height=HEIGHT_HERE&rsqb;IMAGE_URL_HERE&lsqb;/img&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[img width=300 height=200]' . $config['URL'] . 'images' . DS . 'logo.png[/img]')); ?></p>


			<div class="p-t-25"></div>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="markdown_images"></a><strong>Markdown</strong></h3>
			<hr>
			<p><?php
$code = '[code]!&lsqb;&quot;TITLE_TEXT_HERE&quot;&rsqb;&lpar;IMAGE_URL_HERE&rpar;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('!["TITLE_TEXT_HERE"](' . $config['URL'] . 'images' . DS . 'logo.png)')); ?></p>
			<hr>

			<p><?php
$code = '[code]!&lsqb;&quot;TITLE_TEXT_HERE&quot;&rsqb;&lpar;IMAGE_URL_HERE &quot;ALT_TEXT_HERE&quot;&rpar;[/code]';

print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('!["TITLE_TEXT_HERE"](' . $config['URL'] . 'images' . DS . 'logo.png "ALT_TEXT_HERE")')); ?></p>

			<!-- Quotes -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<h2><a id="quotes"></a>Quotes</h2>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="bbcode_quotes"></a><strong>BBCode</strong></h3>
			<hr>
			<p><?php
$code = '[code]&lsqb;quote&rsqb;QUOTE_HERE&lsqb;/quote&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[quote]Creativity is the key to make dreams reality.[/quote]')); ?></p>
			<hr>

			<p><?php
$code = '[code]&lsqb;quote=QUOTE_AUTHOR&rsqb;QUOTE_HERE&lsqb;/quote&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[quote=Tony Stark]Jarvis... sometimes you gotta run before you can walk.[/quote]')); ?></p>


			<div class="p-t-25"></div>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="markdown_quotes"></a><strong>Markdown</strong></h3>
			<hr>
			<p><?php
$code = '[code]> QUOTE_HERE[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('&gt; Creativity is the key to make dreams reality.')); ?></p>

			<!-- Extras -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<h2><a id="extras"></a>Extras</h2>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="codes"></a><strong>Codes</strong></h3>
			<p>The basic codes for all languages are as is. When you use the <strong>Sample</strong> section, all you have to type in is <strong>sample</strong> in between the your preferred bracket language as shown in all <strong>Sample</strong> sections. This will replace <strong>sample</strong> to a "Hello World!" sample code in that specific language.</p>
			<hr>

			<!-- Basic Code -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_code"></a><strong>Basic Code Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;code&rsqb;sample&lsqb;/code&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[code]sample[/code]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Code</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;code&rsqb;CODE_HERE&lsqb;/code&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[code]This is a random code snippet[/code]')); ?></p>
			<hr>

			<!-- HTML -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_html"></a><strong>Basic HTML Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;html&rsqb;sample&lsqb;/html&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[html]sample[/html]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic HTML</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;html&rsqb;CODE_HERE&lsqb;/html&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[html]<form action="random_file" method="POST">
	<input type="text" name="first_field">
	<input type="text" name="second_field">
	<input type="text" name="third_field">
	<button type="submit">Submit</button>
</form>[/html]'))); ?></p>
			<hr>

			<!-- CSS -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_css"></a><strong>Basic CSS Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;css&rsqb;sample&lsqb;/css&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[css]sample[/css]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic CSS</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;css&rsqb;CODE_HERE&lsqb;/css&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[css].new_site {
	font-size: 12px;
	color: #CCCCCC;
}[/css]'))); ?></p>
			<hr>

			<!-- Javascript/Jquery -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_javascript"></a><strong>Basic Javascript/Jquery Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;javascript&rsqb;sample&lsqb;/javascript&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[javascript]sample[/javascript]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Javascript/Jquery</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;javascript&rsqb;CODE_HERE&lsqb;/javascript&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[javascript]jQuery(document).ready(function() {

	$(\'.new_site\').html(\'This is just my new site!\');

}[/javascript]'))); ?></p>
			<hr>

			<!-- Apache -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_apache"></a><strong>Basic Apache Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;apache&rsqb;sample&lsqb;/apache&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[apache]sample[/apache]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Apache</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;apache&rsqb;CODE_HERE&lsqb;/apache&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[apache]# Forcing HTTPS
RewriteEngine On 
RewriteCond %{HTTP_HOST} ^example\.com [NC]
RewriteCond %{SERVER_PORT} 80 
RewriteRule ^(.*)$ https://www.example.com/$1 [R,L]
[/apache]'))); ?></p>
			<hr>

			<!-- MySQL -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_mysql"></a><strong>Basic MySQL Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;mysql&rsqb;sample&lsqb;/mysql&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[mysql]sample[/mysql]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic MySQL</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;mysql&rsqb;CODE_HERE&lsqb;/mysql&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[mysql]SELECT COUNT(colum_name) AS total FROM table_name[/mysql]'))); ?></p>
			<hr>

			<!-- Python -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_python"></a><strong>Basic Python Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;python&rsqb;sample&lsqb;/python&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[python]sample[/python]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Python</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;python&rsqb;CODE_HERE&lsqb;/python&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[python]# This is a Flask Python sample
from flask import Flask
app = Flask(__name__)

@app.route(\'/\')
def hello_world():
	return \'Hello World!\'

if __name__ == \'__main__\':
	app.run()
[/python]'))); ?></p>
			<hr>

			<!-- Ruby -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_ruby"></a><strong>Basic Ruby Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;ruby&rsqb;sample&lsqb;/ruby&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[ruby]sample[/ruby]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Ruby</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;ruby&rsqb;CODE_HERE&lsqb;/ruby&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[ruby]puts \'Just another sample test\'[/ruby]'))); ?></p>
			<hr>

			<!-- C -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_c"></a><strong>Basic C Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;c&rsqb;sample&lsqb;/c&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[c]sample[/c]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic C</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;c&rsqb;CODE_HERE&lsqb;/c&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[c]#include<stdio.h>
main()
{
    printf(\'Just another sample test\');
}[/c]'))); ?></p>
			<hr>

			<!-- C# -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_c_sharp"></a><strong>Basic C# Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;c#&rsqb;sample&lsqb;/c#&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[c#]sample[/c#]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic C#</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;c#&rsqb;CODE_HERE&lsqb;/c#&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[c#]public class Hello
{
    public static void Main()
    {
        System.Console.WriteLine("Just another sample test");
    }
}[/c#]'))); ?></p>
			<hr>

			<!-- C++ -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_c_sharp"></a><strong>Basic C++ Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;c++&rsqb;sample&lsqb;/c++&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[c++]sample[/c++]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic C++</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;c++&rsqb;CODE_HERE&lsqb;/c++&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[c++]#include <iostream>
int main()
{
    std::cout << "Just another sample test";
}[/c++]'))); ?></p>
			<hr>

			<!-- Visual Basic -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_visual_basic"></a><strong>Basic Visual Basic Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;vb&rsqb;sample&lsqb;/vb&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[vb]sample[/vb]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Visual Basic</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;vb&rsqb;CODE_HERE&lsqb;/vb&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[vb]MessageBox.Show("Just another sample test")[/vb]'))); ?></p>
			<hr>

			<!-- Erlang -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_erlang"></a><strong>Basic Erlang Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;erlang&rsqb;sample&lsqb;/erlang&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[erlang]sample[/erlang]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Erlang</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;erlang&rsqb;CODE_HERE&lsqb;/erlang&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[erlang]-module(another).
-export([another_test/0]).

another_test() -> io:fwrite("Just another sample test").[/erlang]'))); ?></p>
			<hr>

			<!-- Scala -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_scala"></a><strong>Basic Scala Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;scala&rsqb;sample&lsqb;/scala&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[scala]sample[/scala]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Scala</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;scala&rsqb;CODE_HERE&lsqb;/scala&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[scala]println("Just another sample test");[/scala]'))); ?></p>
			<hr>

			<!-- Swift -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_swift"></a><strong>Basic Swift Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;swift&rsqb;sample&lsqb;/swift&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[swift]sample[/swift]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Scala</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;swift&rsqb;CODE_HERE&lsqb;/swift&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[swift]println("Just another sample test")[/swift]'))); ?></p>
			<hr>

			<!-- Java -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_java"></a><strong>Basic Java Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;java&rsqb;sample&lsqb;/java&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[java]sample[/java]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Java</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;java&rsqb;CODE_HERE&lsqb;/java&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[java]public class AnotherTest
{
	public static void main(String[] args) {
		System.out.println("Just another sample test");
	}
}[/java]'))); ?></p>
			<hr>

			<!-- Go -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_go"></a><strong>Basic Go Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;go&rsqb;sample&lsqb;/go&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[go]sample[/go]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Go</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;go&rsqb;CODE_HERE&lsqb;/go&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[go]package main
import "fmt"

func main() {
    fmt.Println("Just another sample test")
}
[/go]'))); ?></p>
			<hr>

			<!-- Lua -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_lua"></a><strong>Basic Lua Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;lua&rsqb;sample&lsqb;/lua&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[lua]sample[/lua]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Lua</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;lua&rsqb;CODE_HERE&lsqb;/lua&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[lua]print("Just another sample test")[/lua]'))); ?></p>
			<hr>

			<!-- Prolog -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_prolog"></a><strong>Basic Prolog Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;prolog&rsqb;sample&lsqb;/prolog&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[prolog]sample[/prolog]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Prolog</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;prolog&rsqb;CODE_HERE&lsqb;/prolog&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[prolog]message(\'Just another sample test\').[/prolog]'))); ?></p>
			<hr>

			<!-- Perl -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_perl"></a><strong>Basic Perl Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;perl&rsqb;sample&lsqb;/perl&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[perl]sample[/perl]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic Perl</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;perl&rsqb;CODE_HERE&lsqb;/perl&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[perl]#!/usr/bin/perl
#
# The traditional first program.

# Strict and warnings are recommended.
use strict;
use warnings;

# Print a message.
print "Just another sample test";[/perl]'))); ?></p>
			<hr>

			<!-- ColdFusion -->
			<span class="top-hover top pull-right"></span>
			<h4><a id="basic_cold_fusion"></a><strong>Basic ColdFusion Sample</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;cf&rsqb;sample&lsqb;/cf&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes('[cf]sample[/cf]')); ?></p>

			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><strong>Basic ColdFusion</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;cf&rsqb;CODE_HERE&lsqb;/cf&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[cf]<CFSET AnotherTest = \'Just another sample test\'> 
<CFOUTPUT>#AnotherTest#</CFOUTPUT>[/cf]'))); ?></p>

			<!-- Miscellaneous -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<h2><a id="miscellaneous"></a>Miscellaneous</h2>

			<!-- Logo -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="logo"></a><strong>Logo</strong></h3>
			<hr>
			<p>By having the keyword <strong>logo</strong> in between a <strong>{</strong> and a <strong>}</strong>. It will display the <strong>Britta Logo</strong>.</p>
			<hr>
			<p><?php
$code = '[code]&lcub;logo&rcub;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('{logo}'))); ?></p>

			<!-- Toggle -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="toggle"></a><strong>Toggle</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;toggle&rsqb;TEXT_HERE&lsqb;/toggle&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[toggle]Hello! You\'ve found the secret message![/toggle]'))); ?></p>

			<!-- Comment -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="comment"></a><strong>Comment</strong></h4>
			<hr>
			<p>The use of <strong>comments</strong> is to hide content from the visual point of view. However, if someone views the <strong>Page Source</strong>, they can easily see it. These comments are in between the <strong>&lt;!--</strong> and <strong>--&gt;</strong> tags.</p>
			<hr>
			<p><?php
$code = '[code]&lsqb;comment&rsqb;TEXT_HERE&lsqb;/comment&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[comment]Hello! You\'ve found the secret message![/comment]'))); ?></p>
			<p>View the <strong>Page Source</strong> to see this one.</p>

			<!-- Comment -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="headers"></a><strong>Headers</strong></h4>
			<hr>
			<p>The reason why the <strong>Headers</strong> is listed at this point because <strong>Markdown</strong> only has <strong>1 Header</strong> option which is <pre class="snippet-block"># HEADER_HERE</pre></p>
			<p>So here is <strong>BBCode</strong> along with a custom <strong>Markdown</strong> syntax.</p>
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="bbcode_header"></a><strong>BBCode</strong></h3>

			<!-- Header 1 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="bbcode_header_1"></a><strong>Header 1</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;h1&rsqb;HEADER_HERE&lsqb;/h1&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[h1]Header 1[/h1]'))); ?></p>

			<!-- Header 2 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="bbcode_header_2"></a><strong>Header 2</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;h2&rsqb;HEADER_HERE&lsqb;/h2&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[h2]Header 2[/h2]'))); ?></p>

			<!-- Header 3 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="bbcode_header_3"></a><strong>Header 3</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;h3&rsqb;HEADER_HERE&lsqb;/h3&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[h3]Header 3[/h3]'))); ?></p>

			<!-- Header 4 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="bbcode_header_4"></a><strong>Header 4</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;h4&rsqb;HEADER_HERE&lsqb;/h4&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[h4]Header 4[/h4]'))); ?></p>

			<!-- Header 5 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="bbcode_header_5"></a><strong>Header 5</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;h5&rsqb;HEADER_HERE&lsqb;/h5&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[h5]Header 5[/h5]'))); ?></p>

			<!-- Header 6 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="bbcode_header_6"></a><strong>Header 6</strong></h4>
			<hr>
			<p><?php
$code = '[code]&lsqb;h6&rsqb;HEADER_HERE&lsqb;/h6&rsqb;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('[h6]Header 6[/h6]'))); ?></p>

			<!-- Custom Headers -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h3><a id="custom_headers"></a><strong>Custom Headers</strong></h3>

			<!-- Header 1 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="custom_header_1"></a><strong>Header 1</strong></h4>
			<hr>
			<p><?php
$code = '[code]&ast;&lcub;HEADER_HERE&rcub;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('*{Header 1}*'))); ?></p>

			<!-- Header 2 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="custom_header_2"></a><strong>Header 2</strong></h4>
			<hr>
			<p><?php
$code = '[code]&ast;&ast;&lcub;HEADER_HERE&rcub;&ast;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('**{Header 2}**'))); ?></p>

			<!-- Header 3 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="custom_header_3"></a><strong>Header 3</strong></h4>
			<hr>
			<p><?php
$code = '[code]&ast;&ast;&ast;&lcub;HEADER_HERE&rcub;&ast;&ast;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('***{Header 3}***'))); ?></p>

			<!-- Header 4 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="custom_header_4"></a><strong>Header 4</strong></h4>
			<hr>
			<p><?php
$code = '[code]&ast;&ast;&ast;&ast;&lcub;HEADER_HERE&rcub;&ast;&ast;&ast;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('****{Header 4}****'))); ?></p>

			<!-- Header 5 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="custom_header_5"></a><strong>Header 5</strong></h4>
			<hr>
			<p><?php
$code = '[code]&ast;&ast;&ast;&ast;&ast;&lcub;HEADER_HERE&rcub;&ast;&ast;&ast;&ast;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('*****{Header 5}*****'))); ?></p>

			<!-- Header 6 -->
			<hr>
			<span class="top-hover top pull-right"></span>
			<h4><a id="custom_header_6"></a><strong>Header 6</strong></h4>
			<hr>
			<p><?php
$code = '[code]&ast;&ast;&ast;&ast;&ast;&ast;&lcub;HEADER_HERE&rcub;&ast;&ast;&ast;&ast;&ast;&ast;[/code]';
print($required->functions->codes($code));
?></p>
			<h4><strong>Result</strong></h4>
			<p><?php print($required->functions->codes($required->functions->html_escape('******{Header 6}******'))); ?></p>


			<!-- Last News -->
			<hr>
			<div class="p-t-25"></div>
			<span class="top-hover top pull-right"></span>
			<p>There will be more features to implement in a later time. These are the current public features for now.</p>

		</div>
	</main>

	<div class="main-container-div"></div>

<?php require(ROOT . 'template' . DS . 'footer.php'); ?>

	<script src="//code.jquery.com/jquery.min.js"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'main.js')); ?>"></script>
	<script src="<?php print($required->functions->html_escape($config['URL'] . 'js' . DS . 'jquery.tooltip.js')); ?>"></script>

	<script type="text/javascript">
	jQuery(document).ready(function() {

		$('.top').html('<p><a href="#top"><i class="fa fa-angle-up p-r-10"></i>Go back to top</a></p>');

	});
	</script>

</body>
</html>