<?php
///////////////////////////////////////////////////////////////
//
//		BRITTA
//		Author: spaceshiptrooper
//		Copyright: 2017 Britta
//		Version: 0.0.0.1
//		File Last Updated: 8/27/2017 at 3:53 A.M.
//
///////////////////////////////////////////////////////////////

class Functions {

	public $str = NULL;
	public $array = [];
	public $config = [];

	public function __construct($config) {

		$this->config = $config;

		require_once(ROOT . 'vendor' . DS.  'parsedown' . DS . 'Parsedown.php');
		$this->ParseDown = new Parsedown();

	}

	public function html_escape($str) {

		if(version_compare(PHP_VERSION, '5.4') >= 0) {

			return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');

		} else {

			return htmlspecialchars($str, ENT_QUOTES | ENT_HTML401, 'UTF-8');

		}

	}

	// Regex for replacing text
	public function codes($str) {

		// Correct regex syntax for *+bold+*='/\*\+(.*?)\+\*/is'

		// Array with RegExp to recognize the code that must be converted
		$strings = [
			'/\*\*\*\*\*\*\{(.*?)\}\*\*\*\*\*\*/is', // Header 6's regex code
			'/\*\*\*\*\*\{(.*?)\}\*\*\*\*\*/is', // Header 5's regex code
			'/\*\*\*\*\{(.*?)\}\*\*\*\*/is', // Header 4's regex code
			'/\*\*\*\{(.*?)\}\*\*\*/is', // Header 3's regex code
			'/\*\*\{(.*?)\}\*\*/is', // Header 2's regex code
			'/\*\{(.*?)\}\*/is', // Header 1's regex code
			'/\*\+(.*?)\+\*/is', // Bold's regex code
			'/\*\~(.*?)\~\*/is', // Italic's regex code
			'/\*\_(.*?)\_\*/is', // Underline's regex code
			'/\*\-(.*?)\-\*/is', // Strike's regex code
			'/\*\%(.*?)\%\*/is', // Quote's regex code
			'/\*\#(.*?)\#\*/is', // Link's regex code
			'/\*br\*/is', // Line Break's regex code
			'/&lt;br&gt;/is', // Line Break's regex code
			'/&lt;br &gt;/is', // Line Break's regex code
			'/&lt;br \/&gt;/is', // Line Break's regex code
			'/&lt;br\/&gt;/is', // Line Break's regex code
			'/\\[br\]/is', // Line Break's regex code
			'/\\[toggle\](.*?)\\[\/toggle\]/is', // Toggle regex code
			'/\{logo\}/is', // Logo's regex code

			'/\\[p\](.*?)\\[\/p\]/is', // Paragraph regex code
			'/\\[b\](.*?)\\[\/b\]/is', // Bold regex code
			'/\\[i\](.*?)\\[\/i\]/is', // Italic regex code
			'/\\[u\](.*?)\\[\/u\]/is', // Underline regex code
			'/\\[s\](.*?)\\[\/s\]/is', // Strike's regex code

			'/\\[size=1\](.*?)\\[\/size\\]/is', // Font style 1's regex code
			'/\\[size=2\](.*?)\\[\/size\\]/is', // Font style 2's regex code
			'/\\[size=3\](.*?)\\[\/size\\]/is', // Font style 3's regex code
			'/\\[size=4\](.*?)\\[\/size\\]/is', // Font style 4's regex code
			'/\\[size=5\](.*?)\\[\/size\\]/is', // Font style 5's regex code
			'/\\[size=6\](.*?)\\[\/size\\]/is', // Font style 6's regex code

			'/\\[style size=1\](.*?)\\[\/style\\]/is', // Font style 1's regex code
			'/\\[style size=2\](.*?)\\[\/style\\]/is', // Font style 2's regex code
			'/\\[style size=3\](.*?)\\[\/style\\]/is', // Font style 3's regex code
			'/\\[style size=4\](.*?)\\[\/style\\]/is', // Font style 4's regex code
			'/\\[style size=5\](.*?)\\[\/style\\]/is', // Font style 5's regex code
			'/\\[style size=6\](.*?)\\[\/style\\]/is', // Font style 6's regex code

			'/\\[color=(.*?)\](.*?)\\[\/color\\]/is', // Font color's regex code
			'/\\[style color=(.*?)\](.*?)\\[\/style\\]/is', // Font color's regex code

			'/\\[center\\](.*?)\\[\/center\\]/is', // Centered text's regex code
			'/\\[left\\](.*?)\\[\/left\\]/is', // Left aligned text's regex code
			'/\\[right\\](.*?)\\[\/right\\]/is', // Right aligned text's regex code

			'/\\[quote\](.*?)\\[\/quote\]/is', // Quote's regex code
			'/\\[quote=(.*?)\](.*?)\\[\/quote\]/is', // Quote's regex code

			'/\\[url](.*?)\\[\/url\]/is', // Link's regex code
			'/\\[url=(.*?)](.*?)\\[\/url\]/is', // Link's regex code

			'/\\[img](.*?)\\[\/img\]/is', // Image's regex code
			'/\\[img width=(.*?) height=(.*?)](.*?)\\[\/img\]/is', // Image's regex code
			'/\\[img width=(.*?)](.*?)\\[\/img\]/is', // Image's regex code
			'/\\[img height=(.*?)](.*?)\\[\/img\]/is', // Image's regex code
			'/\\[img=(.*?)](.*?)\\[\/img\]/is', // Image's regex code

			'/\\[ul\]\s+\\[li\]\s+(.*?)\s+\\[ul\]\s+\\[li\]\s+(.*?)\s+\\[\/li\]\s+\\[\/ul\]\s+\\[\/li\]\s+\\[\/ul\]/is', // Unordered List's regex code
			'/\\[ul\]\\[li\](.*?)\\[ul\]\\[li\](.*?)\\[\/li\]\\[\/ul\]\\[\/li\]\\[\/ul\]/is', // Unordered List's regex code
			'/\\[ul\]\s+\\[li\]\s+(.*?)\s+\\[\/li\]\s+\\[\/ul\]\s+/is', // Unordered List's regex code
			'/\\[ul\]\\[li\](.*?)\\[\/li\]\\[\/ul\]/is', // Unordered List's regex code
			'/\\[ul\](.*?)\\[\/ul\]/is', // Unordered List's regex code
			'/\\[ol\](.*?)\\[\/ol\]/is', // Ordered List's regex code
			'/\\[list\](.*?)\\[\/list\]/is', // Ordered List's regex code
			'/\\[li\](.*?)\\[\/li\]/is', // List's regex code
			'/\\[\\*\\](.*?)\s+/is', // List's regex code

			'/\\[youtube\\](.*?)\\[\/youtube\\]/is', // Youtube's regex code

			'/\\[strong\](.*?)\\[\/strong\]/is', // Strong's regex code
			'/\\[h1\](.*?)\\[\/h1\]/is', // Header 1's regex code
			'/\\[h2\](.*?)\\[\/h2\]/is', // Header 2's regex code
			'/\\[h3\](.*?)\\[\/h3\]/is', // Header 3's regex code
			'/\\[h4\](.*?)\\[\/h4\]/is', // Header 4's regex code
			'/\\[h5\](.*?)\\[\/h5\]/is', // Header 5's regex code
			'/\\[h6\](.*?)\\[\/h6\]/is', // Header 6's regex code

			'/\\[comment\](.*?)\\[\/comment\]/is', // Comment's regex code

			/* START LOREM IPSUM */

			'/\\[code\]sample\\[\/code\]/is',
			'/\\[pre\]sample\\[\/pre\]/is',
			'/\\[php\]sample\\[\/php\]/is',
			'/\\[hack\]sample\\[\/hack\]/is',
			'/\\[html\]sample\\[\/html\]/is',
			'/\\[css\]sample\\[\/css\]/is',
			'/\\[javascript\]sample\\[\/javascript\]/is',
			'/\\[apache\]sample\\[\/apache\]/is',
			'/\\[htaccess\]sample\\[\/htaccess\]/is',
			'/\\[mysql\]sample\\[\/mysql\]/is',
			'/\\[python\]sample\\[\/python\]/is',
			'/\\[ruby\]sample\\[\/ruby\]/is',
			'/\\[c\]sample\\[\/c\]/is',
			'/\\[c\#\]sample\\[\/c\#\]/is',
			'/\\[c\+\+\]sample\\[\/c\+\+\]/is',
			'/\\[vb\]sample\\[\/vb\]/is',
			'/\\[erlang\]sample\\[\/erlang\]/is',
			'/\\[scala\]sample\\[\/scala\]/is',
			'/\\[swift\]sample\\[\/swift\]/is',
			'/\\[java\]sample\\[\/java\]/is',
			'/\\[go\]sample\\[\/go\]/is',
			'/\\[lua\]sample\\[\/lua\]/is',
			'/\\[prolog\]sample\\[\/prolog\]/is',
			'/\\[perl\]sample\\[\/perl\]/is',
			'/\\[cf\]sample\\[\/cf\]/is',

			/* END LOREM IPSUM */

			// PHP, HTML5, CSS3, and Javascript
			'/\\[code\](.*?)\\[\/code\]/is',
			'/\\[pre\](.*?)\\[\/pre\]/is',
			'/\\[php\](.*?)\\[\/php\]/is',
			'/\\[hack\](.*?)\\[\/hack\]/is',
			'/\\[html\](.*?)\\[\/html\]/is',
			'/\\[css\](.*?)\\[\/css\]/is',
			'/\\[javascript\](.*?)\\[\/javascript\]/is',
			'/\\[apache\](.*?)\\[\/apache\]/is',
			'/\\[htaccess\](.*?)\\[\/htaccess\]/is',
			'/\\[mysql\](.*?)\\[\/mysql\]/is',
			'/\\[python\](.*?)\\[\/python\]/is',
			'/\\[ruby\](.*?)\\[\/ruby\]/is',
			'/\\[c\](.*?)\\[\/c\]/is',
			'/\\[c\#\](.*?)\\[\/c\#\]/is',
			'/\\[c\+\+\](.*?)\\[\/c\+\+\]/is',
			'/\\[vb\](.*?)\\[\/vb\]/is',
			'/\\[erlang\](.*?)\\[\/erlang\]/is',
			'/\\[scala\](.*?)\\[\/scala\]/is',
			'/\\[swift\](.*?)\\[\/swift\]/is',
			'/\\[java\](.*?)\\[\/java\]/is',
			'/\\[go\](.*?)\\[\/go\]/is',
			'/\\[lua\](.*?)\\[\/lua\]/is',
			'/\\[prolog\](.*?)\\[\/prolog\]/is',
			'/\\[perl\](.*?)\\[\/perl\]/is',
			'/\\[cf\](.*?)\\[\/cf\]/is',

			// Markdown Sytanx
			'/\\```(.*?)\\```/is', // Code
			'/\\`(.*?)\`/is', // Code

			// !["TITLE_TEXT_HERE"](IMAGE_URL_HERE "ALT_TEXT_HERE")
			'/\!\[\&quot;(.*?)\&quot;\]\((.*?)\s+\&quot;(.*?)\&quot;\)/is', // Image
			'/\!\[\"(.*?)\"\]\((.*?)\s+\"(.*?)\"\)/is', // Image

			// ![TITLE_TEXT_HERE](IMAGE_URL_HERE "ALT_TEXT_HERE")
			'/\!\[(.*?)\]\((.*?)\s+\&quot;(.*?)\&quot;\)/is', // Image
			'/\!\[(.*?)\]\((.*?)\s+\"(.*?)\"\)/is', // Image

			// !["TITLE_TEXT_HERE"](IMAGE_URL_HERE)
			'/\!\[\&quot;(.*?)\&quot;\]\((.*?)\)/is', // Image
			'/\!\[\"(.*?)\"\]\((.*?)\)/is', // Image

			// ![TITLE_TEXT_HERE](IMAGE_URL_HERE)
			'/\!\[(.*?)\]\((.*?)\)/is', // Image

			// ![](IMAGE_URL_HERE "")
			'/\!\[\]\((.*?)\s+\&quot;(.*?)\&quot;\)/is', // Image
			'/\!\[\]\((.*?)\s+\"(.*?)\"\)/is', // Image

			// ![](IMAGE_URL_HERE)
			'/\!\[\]\((.*?)\)/is', // Image

			'/\\[(.*?)\]\((.*?)\s+&quot;(.*?)&quot;\)/', // Link
			'/\\[(.*?)\]\((.*?)\s+"(.*?)"\)/', // Link
			'/\\[(.*?)\]\((.*?)\)/is', // Link

			'/#\#\#\s+(.*)/is', // Header
			'/\\*\\*(.*?)\\*\\*/is', // Bold
			'/\\*(.*?)\\*/is', // Italic
			'/&gt\\;&gt\\;(.*?)&gt\\;&gt\\;/is', // Italic
			'/\~\~(.*?)\~\~/is', //Strike through
			'/\---/is',
			// '/&gt;\s+(\S+(?:\s\S+)*)/m',
		]; // '/\*\+(.*?)\+\*/is'

		// Array with HTML that will replace the bbcode tags, defined inthe same order
		$html_tags = [
			'<h6>$1</h6>', // Basic header 6
			'<h5>$1</h5>', // Basic header 5
			'<h4>$1</h4>', // Basic header 4
			'<h3>$1</h3>', // Basic header 3
			'<h2>$1</h2>', // Basic header 2
			'<h1>$1</h1>', // Basic header 1
			'<b>$1</b>', // Basic bold
			'<i>$1</i>', // Basic italicized
			'<u>$1</u>', // Basic underline
			'<del>$1</del>', // Basic strike
			'<blockquote><h3>Quote</h3><p>$1</p></blockquote>', // Basic quote
			'<a href="$1" onmousedown="return false;" target="_new">$1</a>', // Basic link
			'<br />', // Basic line break
			'<br />', // Basic line break
			'<br />', // Basic line break
			'<br />', // Basic line break
			'<br />', // Basic line break
			'<br />', // Basic line break
			'<div class="toggle">Toggle</div><div class="toggle-container"><div class="toggle-content">$1</div></div>', // Toggle
			'<span class="logo-250"></span>', // Basic Logo

			'<p>$1</p>', // Basic paragraph
			'<b>$1</b>', // Basic bold
			'<i>$1</i>', // Basic italicized
			'<u>$1</u>', // Basic underline
			'<del>$1</del>', // Basic strike

			'<span style="font-size: 12px;">$1</span>', // Basic font style 1
			'<span style="font-size: 16px;">$1</span>', // Basic font style 2
			'<span style="font-size: 24px;">$1</span>', // Basic font style 3
			'<span style="font-size: 36px;">$1</span>', // Basic font style 4
			'<span style="font-size: 48px;">$1</span>', // Basic font style 5
			'<span style="font-size: 96px;">$1</span>', // Basic font style 6

			'<span style="font-size: 12px;">$1</span>', // Basic font style 1
			'<span style="font-size: 16px;">$1</span>', // Basic font style 2
			'<span style="font-size: 24px;">$1</span>', // Basic font style 3
			'<span style="font-size: 36px;">$1</span>', // Basic font style 4
			'<span style="font-size: 48px;">$1</span>', // Basic font style 5
			'<span style="font-size: 96px;">$1</span>', // Basic font style 6

			'<span style="color: $1;">$2</span>', // Basic font color
			'<span style="color: $1;">$2</span>', // Basic font color

			'<p style="text-align: center;">$1</p>', // Basic centered text
			'<p style="text-align: left;">$1</p>', // Basic left aligned text
			'<p style="text-align: right;">$1</p>', // Basic right aligned text

			'<blockquote><h3>Quote</h3><p>$1</p></blockquote>', // Basic quote
			'<blockquote><h3>$1</h3><p>$2</p></blockquote>', // Basic quote

			'<a href="$1">$1</a>', // Basic Link
			'<a href="$1">$2</a>', // Basic Link

			'<img src="$1" alt="$1" width="100%">', // Basic Image
			'<img src="$3" alt="$3" width="$1" height="$2">', // Basic Image
			'<img src="$2" alt="$2" width="$1">', // Basic Image
			'<img src="$2" alt="$2" width="$1">', // Basic Image
			'<img src="$1" alt="$2" title="$2" width="100%" data-toggle="tooltip" data-placement="top">', // Basic Image

			'<ul><li>$1<ul><li>$2</li></ul></li></ul>', // Basic Unordered List
			'<ul><li>$1<ul><li>$2</li></ul></li></ul>', // Basic Unordered List
			'<ul><li>$1</li></ul>', // Basic Unordered List
			'<ul><li>$1</li></ul>', // Basic Unordered List
			'<ul>$1</ul>', // Basic Unordered List
			'<ol>$1</ol>', // Basic Ordered List
			'<ul>$1</ul>', // Basic Unordered List
			'<li>$1</li>', // Basic List
			'<li>$1</li>', // Basic List

			'<iframe width="560" height="315" src="https://youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', // Basic Youtube video

			'<strong>$1</strong>', // Basic strong
			'<h1>$1</h1>', // Basic header 1
			'<h2>$1</h2>', // Basic header 2
			'<h3>$1</h3>', // Basic header 3
			'<h4>$1</h4>', // Basic header 4
			'<h5>$1</h5>', // Basic header 5
			'<h6>$1</h6>', // Basic header 6

			'<!-- $1 -->',

			/* START LOREM IPSUM */

			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-default">CODE</div></div><pre class="snippet-block snippet-block-default"><div class="p-t-10"></div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-default">CODE</div></div><pre class="snippet-block snippet-block-default"><div class="p-t-10"></div>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-php">PHP</div></div><pre class="snippet-block snippet-block-php"><div class="p-t-10"></div>&lt;?php
print(&#039;Hello World!&#039;);
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-hack">HACK</div></div><pre class="snippet-block snippet-block-hack"><div class="p-t-10"></div>&lt;?hh
print(&#039;Hello World!&#039;);
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-html">HTML</div></div><pre class="snippet-block snippet-block-html"><div class="p-t-10"></div>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Hello World!&lt;/title&gt;
&lt;/head&gt;

&lt;body&gt;
&lt;h1&gt;HELLO WORLD!&lt;/h1&gt;
&lt;p&gt;Welcome! This is my first hello world!&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-css">CSS</div></div><pre class="snippet-block snippet-block-css"><div class="p-t-10"></div>.hello-world:before {
	content: &quot;Hello World!&quot;;
	background-color: #0070BB;
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-javascript">JAVASCRIPT/JQUERY</div></div><pre class="snippet-block snippet-block-javascript"><div class="p-t-10"></div>jQuery(document).ready(function() {
	console.log(&#039;Hello World!&#039;);
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-apache">APACHE</div></div><pre class="snippet-block snippet-block-apache"><div class="p-t-10"></div>RewriteEngine On
RewriteBase /
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-apache">APACHE</div></div><pre class="snippet-block snippet-block-apache"><div class="p-t-10"></div>RewriteEngine On
RewriteBase /
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-mysql">MYSQL</div></div><pre class="snippet-block snippet-block-mysql"><div class="p-t-10"></div>UPDATE cool_table SET cool_column = new_cool_column WHERE cool_row = current_cool_row
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-python">PYTHON</div></div><pre class="snippet-block snippet-block-python"><div class="p-t-10"></div>print(&#039;Hello World!&#039;)
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-ruby">RUBY</div></div><pre class="snippet-block snippet-block-ruby"><div class="p-t-10"></div>puts &#039;Hello World!&#039;
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-c">C</div></div><pre class="snippet-block snippet-block-c"><div class="p-t-10"></div>#include&lt;stdio.h&gt;
main()
{
	printf(&#039;Hello World!&#039;);
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-c-sharp">C#</div></div><pre class="snippet-block snippet-block-c-sharp"><div class="p-t-10"></div>public class Hello
{
	public static void Main()
	{
		System.Console.WriteLine(&quot;Hello World!&quot;);
	}
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-c-plus-plus">C++</div></div><pre class="snippet-block snippet-block-c-plus-plus"><div class="p-t-10"></div>#include &lt;iostream&gt;
int main()
{
	std::cout &lt;&lt; &quot;Hello World!&quot;;
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-visual-basic">VISUAL BASIC</div></div><pre class="snippet-block snippet-block-visual-basic"><div class="p-t-10"></div>MessageBox.Show(&quot;Hello World!&quot;)
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-erlang">ERLANG</div></div><pre class="snippet-block snippet-block-erlang"><div class="p-t-10"></div>-module(hello).
-export([hello_world/0]).

hello_world() -&gt; io:fwrite(&quot;Hello World!&quot;).
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-scala">SCALA</div></div><pre class="snippet-block snippet-block-scala"><div class="p-t-10"></div>println(&quot;Hello World!&quot;);
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-swift">SWIFT</div></div><pre class="snippet-block snippet-block-swift"><div class="p-t-10"></div>println(&quot;Hello World!&quot;)
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-java">JAVA</div></div><pre class="snippet-block snippet-block-java"><div class="p-t-10"></div>public class HelloWorld
{
	public static void main(String[] args) {
		System.out.println(&quot;Hello World!&quot;);
	}
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-go">GO</div></div><pre class="snippet-block snippet-block-go"><div class="p-t-10"></div>package main
import &quot;fmt&quot;

func main() {
	fmt.Println(&quot;Hello World!&quot;)
}
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-lua">LUA</div></div><pre class="snippet-block snippet-block-lua"><div class="p-t-10"></div>print(&quot;Hello World!&quot;)
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-prolog">PROLOG</div></div><pre class="snippet-block snippet-block-prolog"><div class="p-t-10"></div>message(&#039;Hello World!&#039;).
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-perl">PERL</div></div><pre class="snippet-block snippet-block-perl"><div class="p-t-10"></div>#!/usr/bin/perl
#
# The traditional first program.

# Strict and warnings are recommended.
use strict;
use warnings;

# Print a message.
print &quot;Hello, World!\n&quot;;
</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-cold-fusion">COLDFUSION</div></div><pre class="snippet-block snippet-block-cold-fusion"><div class="p-t-10"></div>&lt;CFSET MyWorld = &#039;Hello World!&#039;&gt; 
&lt;CFOUTPUT&gt;#MyWorld#&lt;/CFOUTPUT&gt;
</pre>', // Code

			/* END LOREM IPSUM */

			// PHP, HTML5, CSS3, and Javascript
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-default">CODE</div></div><pre class="snippet-block snippet-block-default"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-default">CODE</div></div><pre class="snippet-block snippet-block-default"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-php">PHP</div></div><pre class="snippet-block snippet-block-php"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-hack">HACK</div></div><pre class="snippet-block snippet-block-hack"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-html">HTML</div></div><pre class="snippet-block snippet-block-html"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-css">CSS</div></div><pre class="snippet-block snippet-block-css"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-javascript">JAVASCRIPT/JQUERY</div></div><pre class="snippet-block snippet-block-javascript"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-apache">APACHE</div></div><pre class="snippet-block snippet-block-apache"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-apache">APACHE</div></div><pre class="snippet-block snippet-block-apache"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-mysql">MYSQL</div></div><pre class="snippet-block snippet-block-mysql"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-python">PYTHON</div></div><pre class="snippet-block snippet-block-python"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-ruby">RUBY</div></div><pre class="snippet-block snippet-block-ruby"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-c">C</div></div><pre class="snippet-block snippet-block-c"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-c-sharp">C#</div></div><pre class="snippet-block snippet-block-c-sharp"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-c-plus-plus">C++</div></div><pre class="snippet-block snippet-block-c-plus-plus"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-visual-basic">VISUAL BASIC</div></div><pre class="snippet-block snippet-block-visual-basic"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-erlang">ERLANG</div></div><pre class="snippet-block snippet-block-erlang"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-scala">SCALA</div></div><pre class="snippet-block snippet-block-scala"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-swift">SWIFT</div></div><pre class="snippet-block snippet-block-swift"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-java">JAVA</div></div><pre class="snippet-block snippet-block-java"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-go">GO</div></div><pre class="snippet-block snippet-block-go"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-lua">LUA</div></div><pre class="snippet-block snippet-block-lua"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-prolog">PROLOG</div></div><pre class="snippet-block snippet-block-prolog"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-perl">PERL</div></div><pre class="snippet-block snippet-block-perl"><div class="p-t-10"></div>$1</pre>', // Code
			'<div class="p-t-20"></div><div class="snippet-legend-container"><div class="snippet-legend snippet-legend-cold-fusion">COLDFUSION</div></div><pre class="snippet-block snippet-block-cold-fusion"><div class="p-t-10"></div>$1</pre>', // Code

			// Markdown Sytanx
			'<pre class="snippet">$1</pre>', // Code
			'<pre class="snippet-block">$1</pre>', // Code

			// !["TITLE_TEXT_HERE"](IMAGE_URL_HERE "ALT_TEXT_HERE")
			'<img src="$2" title="$1" alt="$3" width="100%" data-toggle="tooltip" data-placement="top">', // Image
			'<img src="$2" title="$1" alt="$3" width="100%" data-toggle="tooltip" data-placement="top">', // Image

			// ![TITLE_TEXT_HERE](IMAGE_URL_HERE "ALT_TEXT_HERE")
			'<img src="$2" title="$1" alt="$3" width="100%" data-toggle="tooltip" data-placement="top">', // Image
			'<img src="$2" title="$1" alt="$3" width="100%" data-toggle="tooltip" data-placement="top">', // Image

			// !["TITLE_TEXT_HERE"](IMAGE_URL_HERE)
			'<img src="$2" title="$1" alt="$1" width="100%" data-toggle="tooltip" data-placement="top">', // Image
			'<img src="$2" title="$1" alt="$1" width="100%" data-toggle="tooltip" data-placement="top">', // Image

			// ![TITLE_TEXT_HERE](IMAGE_URL_HERE)
			'<img src="$2" title="$1" alt="$1" width="100%" data-toggle="tooltip" data-placement="top">', // Image

			// ![](IMAGE_URL_HERE "")
			'<img src="$2" title="$2" alt="$2" width="100%" data-toggle="tooltip" data-placement="top">', // Image
			'<img src="$2" title="$2" alt="$2" width="100%" data-toggle="tooltip" data-placement="top">', // Image

			// ![](IMAGE_URL_HERE)
			'<img src="$2" title="$2" alt="$2" width="100%" data-toggle="tooltip" data-placement="top">', // Image

			'<a href="$2" title="$3" onmousedown="return false;" data-toggle="tooltip" data-placement="top">$1</a>', // Link
			'<a href="$2" title="$3" onmousedown="return false;" data-toggle="tooltip" data-placement="top">$1</a>', // Link
			'<a href="$2" title="$1" onmousedown="return false;" data-toggle="tooltip" data-placement="top">$2</a>', // Link
			'<h1>$1</h1>', // Header
			'<b>$1</b>', // Bold
			'<i>$1</i>', // Italic
			'<i>$1</i>', // Italic
			'<del>$1</del>',
			'<hr class="hr-post">',
			// '<blockquote><h3>Quote</h3><p>$1</p></blockquote>', // Basic quote
		];

		$str = preg_replace($strings, $html_tags, $str);

		$str = $this->removeLineBreakFromExtra($str);

		if(strpos($str, '<pre class="snippet-block snippet-block-') !== false AND strpos($str, '&gt;') !== false) {

			$str = strtr($str, [
				'/&gt;' => '/&#62;',
				'=&gt;' => '=&#62;',
				'-&gt;' => '-&#62;',
				'&gt;=' => '&#62;=',
				'&lt;&gt;' => '&#60;&#62;',
				'?&gt;' => '?&#62;',
				'0&gt;' => '0&#62;',
				'1&gt;' => '1&#62;',
				'2&gt;' => '2&#62;',
				'3&gt;' => '3&#62;',
				'4&gt;' => '4&#62;',
				'5&gt;' => '5&#62;',
				'6&gt;' => '6&#62;',
				'7&gt;' => '7&#62;',
				'8&gt;' => '8&#62;',
				'9&gt;' => '9&#62;',
				'0 &gt;' => '0 &#62;',
				'1 &gt;' => '1 &#62;',
				'2 &gt;' => '2 &#62;',
				'3 &gt;' => '3 &#62;',
				'4 &gt;' => '4 &#62;',
				'5 &gt;' => '5 &#62;',
				'6 &gt;' => '6 &#62;',
				'7 &gt;' => '7 &#62;',
				'8 &gt;' => '8 &#62;',
				'9 &gt;' => '9 &#62;',
				'&quot;&gt;' => '&quot;&#62;',
				'&quot; &gt;' => '&quot; &#62;',
				'&apos;&gt;' => '&apos;&#62;',
				'&apos; &gt;' => '&apos; &#62;',
				'&#039;&gt;' => '&#039;&#62;',
				'&#039; &gt;' => '&#039; &#62;',
				'a&gt;' => 'a&#62;',
				'b&gt;' => 'b&#62;',
				'c&gt;' => 'c&#62;',
				'd&gt;' => 'd&#62;',
				'e&gt;' => 'e&#62;',
				'f&gt;' => 'f&#62;',
				'g&gt;' => 'g&#62;',
				'h&gt;' => 'h&#62;',
				'i&gt;' => 'i&#62;',
				'j&gt;' => 'j&#62;',
				'k&gt;' => 'k&#62;',
				'l&gt;' => 'l&#62;',
				'm&gt;' => 'm&#62;',
				'n&gt;' => 'n&#62;',
				'o&gt;' => 'o&#62;',
				'p&gt;' => 'p&#62;',
				'q&gt;' => 'q&#62;',
				'r&gt;' => 'r&#62;',
				's&gt;' => 's&#62;',
				't&gt;' => 't&#62;',
				'u&gt;' => 'u&#62;',
				'v&gt;' => 'v&#62;',
				'w&gt;' => 'w&#62;',
				'x&gt;' => 'x&#62;',
				'y&gt;' => 'y&#62;',
				'z&gt;' => 'z&#62;',
				'a &gt;' => 'a &#62;',
				'b &gt;' => 'b &#62;',
				'c &gt;' => 'c &#62;',
				'd &gt;' => 'd &#62;',
				'e &gt;' => 'e &#62;',
				'f &gt;' => 'f &#62;',
				'g &gt;' => 'g &#62;',
				'h &gt;' => 'h &#62;',
				'i &gt;' => 'i &#62;',
				'j &gt;' => 'j &#62;',
				'k &gt;' => 'k &#62;',
				'l &gt;' => 'l &#62;',
				'm &gt;' => 'm &#62;',
				'n &gt;' => 'n &#62;',
				'o &gt;' => 'o &#62;',
				'p &gt;' => 'p &#62;',
				'q &gt;' => 'q &#62;',
				'r &gt;' => 'r &#62;',
				's &gt;' => 's &#62;',
				't &gt;' => 't &#62;',
				'u &gt;' => 'u &#62;',
				'v &gt;' => 'v &#62;',
				'w &gt;' => 'w &#62;',
				'x &gt;' => 'x &#62;',
				'y &gt;' => 'y &#62;',
				'z &gt;' => 'z &#62;',
				'A&gt;' => 'A&#62;',
				'B&gt;' => 'B&#62;',
				'C&gt;' => 'C&#62;',
				'D&gt;' => 'D&#62;',
				'E&gt;' => 'E&#62;',
				'F&gt;' => 'F&#62;',
				'G&gt;' => 'G&#62;',
				'H&gt;' => 'H&#62;',
				'I&gt;' => 'I&#62;',
				'J&gt;' => 'J&#62;',
				'K&gt;' => 'K&#62;',
				'L&gt;' => 'L&#62;',
				'M&gt;' => 'M&#62;',
				'N&gt;' => 'N&#62;',
				'O&gt;' => 'O&#62;',
				'P&gt;' => 'P&#62;',
				'Q&gt;' => 'Q&#62;',
				'R&gt;' => 'R&#62;',
				'S&gt;' => 'S&#62;',
				'T&gt;' => 'T&#62;',
				'U&gt;' => 'U&#62;',
				'V&gt;' => 'V&#62;',
				'W&gt;' => 'W&#62;',
				'X&gt;' => 'X&#62;',
				'Y&gt;' => 'Y&#62;',
				'Z&gt;' => 'Z&#62;',
				'A &gt;' => 'A &#62;',
				'B &gt;' => 'B &#62;',
				'C &gt;' => 'C &#62;',
				'D &gt;' => 'D &#62;',
				'E &gt;' => 'E &#62;',
				'F &gt;' => 'F &#62;',
				'G &gt;' => 'G &#62;',
				'H &gt;' => 'H &#62;',
				'I &gt;' => 'I &#62;',
				'J &gt;' => 'J &#62;',
				'K &gt;' => 'K &#62;',
				'L &gt;' => 'L &#62;',
				'M &gt;' => 'M &#62;',
				'N &gt;' => 'N &#62;',
				'O &gt;' => 'O &#62;',
				'P &gt;' => 'P &#62;',
				'Q &gt;' => 'Q &#62;',
				'R &gt;' => 'R &#62;',
				'S &gt;' => 'S &#62;',
				'T &gt;' => 'T &#62;',
				'U &gt;' => 'U &#62;',
				'V &gt;' => 'V &#62;',
				'W &gt;' => 'W &#62;',
				'X &gt;' => 'X &#62;',
				'Y &gt;' => 'Y &#62;',
				'Z &gt;' => 'Z &#62;',
			]);

		}

		// Array with RegExp to recognize the code that must be converted
		$strings = [
			'/&gt;\s+(\S+(?:\s\S+)*)/m',
		];

		// Array with HTML that will replace the bbcode tags, defined inthe same order
		$html_tags = [
			'<blockquote><h3>Quote</h3><p>$1</p></blockquote>', // Basic quote
		];

		$str = preg_replace($strings, $html_tags, $str);

		$str = $this->ParseDown->text($str);

		return $str;

	}

	public function removeLineBreakFromExtra($str) {

		$replace = [
			"<pre class=\"snippet-block snippet-block-default\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-default"><div class="p-t-10"></div>', // Default
			"<pre class=\"snippet-block snippet-block-php\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-php"><div class="p-t-10"></div>', // PHP
			"<pre class=\"snippet-block snippet-block-hack\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-hack"><div class="p-t-10"></div>', // Hack
			"<pre class=\"snippet-block snippet-block-html\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-html"><div class="p-t-10"></div>', // HTML
			"<pre class=\"snippet-block snippet-block-css\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-css"><div class="p-t-10"></div>', // CSS
			"<pre class=\"snippet-block snippet-block-javascript\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-javascript"><div class="p-t-10"></div>', // Javascript/Jquery
			"<pre class=\"snippet-block snippet-block-apache\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-apache"><div class="p-t-10"></div>', // Apache
			"<pre class=\"snippet-block snippet-block-mysql\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-mysql"><div class="p-t-10"></div>', // MySQL
			"<pre class=\"snippet-block snippet-block-python\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-python"><div class="p-t-10"></div>', // Python
			"<pre class=\"snippet-block snippet-block-ruby\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-ruby"><div class="p-t-10"></div>', // Ruby
			"<pre class=\"snippet-block snippet-block-c\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-c"><div class="p-t-10"></div>', // C
			"<pre class=\"snippet-block snippet-block-c-sharp\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-c-sharp"><div class="p-t-10"></div>', // C#
			"<pre class=\"snippet-block snippet-block-c-plus-plus\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-c-plus-plus"><div class="p-t-10"></div>', // C++
			"<pre class=\"snippet-block snippet-block-visual-basic\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-visual-basic"><div class="p-t-10"></div>', // Visual Basic
			"<pre class=\"snippet-block snippet-block-erlang\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-erlang"><div class="p-t-10"></div>', // Erlang
			"<pre class=\"snippet-block snippet-block-scala\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-scala"><div class="p-t-10"></div>', // Scala
			"<pre class=\"snippet-block snippet-block-swift\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-swift"><div class="p-t-10"></div>', // Swift
			"<pre class=\"snippet-block snippet-block-java\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-java"><div class="p-t-10"></div>', // Java
			"<pre class=\"snippet-block snippet-block-go\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-go"><div class="p-t-10"></div>', // Go
			"<pre class=\"snippet-block snippet-block-lua\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-lua"><div class="p-t-10"></div>', // Lua
			"<pre class=\"snippet-block snippet-block-prolog\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-prolog"><div class="p-t-10"></div>', // Prolog
			"<pre class=\"snippet-block snippet-block-perl\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-perl"><div class="p-t-10"></div>', // Perl
			"<pre class=\"snippet-block snippet-block-cold-fusion\"><div class=\"p-t-10\"></div>\r\n" => '<pre class="snippet-block snippet-block-cold-fusion"><div class="p-t-10"></div>', // ColdFusion
		];

		$str = strtr($str, $replace);

		return $str;

	}

}