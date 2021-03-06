<?php include('inc/header.php'); ?>
<div class="getting-started m-scene" id="main">

	<div class="m-page scene_element scene_element--fadeindown">
			<div class="right-panel_top">
				<div class="m-header">
					<div class="m-breadcrumb" itemprop="breadcrumb">
						<a class="breadcrumb_link" href="index.php">Home</a> →
						<h1 class="m-type-display-1">
							Lets Get Started
						</h1>
					</div>
					<p class="m-type-sub-heading-1">A demo that delves into how we can use smoothState.js to improve the performance of our site.</p>
				</div>
			</div>
			
			<div class="m-segment">
	<h2 class="m-type-heading-1">Why use smoothState.js?</h2>
	<div class="segment_content">
		<p>Hard cuts and white flashes break user focus and create confusion as layouts change or elements rearrange. <strong>We’ve accepted the jankiness of page loads as a personality quirk of the web</strong>, even though there is no technical reason it must exist. We don't need to treat the web like a native app's ugly cousin.</p>

		<p>Javascript <a href="http://en.wikipedia.org/wiki/Single-page_application">SPA frameworks</a>, sometimes referred to as MVC frameworks, are a common way to solve this issue. However, <strong>these frameworks often lose the benefits of unobtrusive code</strong>, such as resilience to errors, performance, and accessibility. smoothState.js lets you start adding transitions that eliminate the hard cuts of page loads to improve the beauty of the experience. It does this with:</p>

		<ul>
			<li><strong>Progressive enhancement</strong> - a technique that exemplifies the principles universal design</li>
			<li><strong>jQuery</strong> - a library a great many of us are familiar with</li>
			<li><strong>history.pushState()</strong> - a method that lets us maintain browsing expectations</li>
			<li><strong>Ajax</strong> - a way for us to  request and store pages on the user's device without refreshing the page</li>
		</ul>

		<p>smoothState.js will <a href="http://en.wikipedia.org/wiki/Unobtrusive_JavaScript">unobtrusively enhance</a> your website's page loads to behave more like a single-page application framework. This allows you to add page transitions and create a nicer experince for your users.</p>
	</div>
</div>
<div class="m-segment">
	<h2 class="m-type-heading-1">Requirements</h2>
	<div class="segment_content">
		<p>smoothState.js is initialized on containers, not links. The containers can be thought of like small window objects within the page, similar to how you would describe an iframe.</p>

		<ol>
			<li><strong>Every container needs to have an id</strong> - a unique hook to tell the smoothState.js what to update on the page</li>
			<li><strong>Every link should return a full layout</strong> - not just an HTML fragment</li>
		</ol>

		<p>This requirement makes the website more resilient since it allows us to abort and redirect the user if an error occurs. Making each link return a fully qualified page also ensures our page transitions are unobtrusive.</p>

		<p>There may be a rare case when returning a full layout is not desired. smoothState.js will still function properly as long as the container being updated is present in the response from the server. If you're having issues with this, turn on <a href="https://github.com/miguel-perez/jquery.smoothState.js#development">development mode</a> and watch the console for useful warnings.</p>
	</div>
</div>
<div class="m-segment">
	<h2 class="m-type-heading-1">A barebones example</h2>
	<div class="segment_content">
		<p>All we need to get started is:</p>
		<ol>
			<li>Include a copy of <a href="http://jquery.com/download/">jQuery</a> and <a href="https://github.com/miguel-perez/jquery.smoothState.js">jQuery.smoothState.js</a> on your page</li>
			<li>Create a new js file and run <code>$('#main').smoothState()</code></li>
			<li>Add container with an id of "<code>#main</code>" and include some links inside of it</li>
		</ol>

	<h3>The HTML</h3>
<pre><code class="m-code html"><span class="cp">&lt;!doctype html&gt;</span>
<span class="nt">&lt;html&gt;</span>
  <span class="nt">&lt;head&gt;</span>
    <span class="nt">&lt;meta</span> <span class="na">charset=</span><span class="s">"utf-8"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;meta</span> <span class="na">http-equiv=</span><span class="s">"X-UA-Compatible"</span> <span class="na">content=</span><span class="s">"IE=edge"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;title&gt;</span>Home - My Site<span class="nt">&lt;/title&gt;</span>
  <span class="nt">&lt;/head&gt;</span>
  <span class="nt">&lt;body&gt;</span>
    <span class="c">&lt;!-- Every smoothState container needs an id --&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"main"</span><span class="nt">&gt;</span>
      <span class="c">&lt;!-- Every link should return a full layout --&gt;</span>
      <span class="nt">&lt;ul&gt;</span>
        <span class="nt">&lt;li&gt;&lt;a</span> <span class="na">href=</span><span class="s">"index.html"</span><span class="nt">&gt;</span>Home<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
        <span class="nt">&lt;li&gt;&lt;a</span> <span class="na">href=</span><span class="s">"about.html"</span><span class="nt">&gt;</span>About<span class="nt">&lt;/a&gt;&lt;/li&gt;</span>
      <span class="nt">&lt;/ul&gt;</span>
      <span class="c">&lt;!-- Contents of the page... --&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    <span class="c">&lt;!-- Scripts --&gt;</span>
    <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"jquery.js"</span><span class="nt">&gt;&lt;/script&gt;</span> 
    <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"jquery.smoothState.js"</span><span class="nt">&gt;&lt;/script&gt;</span>
    <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"functions.js"</span><span class="nt">&gt;&lt;/script&gt;</span>
  <span class="nt">&lt;/body&gt;</span>
<span class="nt">&lt;/html&gt;</span>
</code></pre>

	<h3>The JS</h3>
<pre><code class="m-code javascript"><span class="c1">// Contents of functions.js</span>
<span class="p">;(</span><span class="kd">function</span> <span class="p">(</span><span class="nx">$</span><span class="p">)</span> <span class="p">{</span>
    <span class="nx">$</span><span class="p">(</span><span class="s1">'#main'</span><span class="p">).</span><span class="nx">smoothState</span><span class="p">();</span>
<span class="p">})(</span><span class="nx">jQuery</span><span class="p">);</span>
</code></pre>

		<p>You can <a target="_blank" href="demos/barebones/">see a demo</a> of the this basic example and interact with the pages. By default, smoothState.js will:
		</p>
		<ul>
			<li>Prevent links from triggering a full page load</li>
			<li>Update the user's URLs and history as to not break browsing expectations</li>
			<li>Use Ajax to request pages and replace the appropiate content</li>
		</ul>
		<p>This default example <strong>will not add page transitions</strong> to your page. See a <a href="typical-implementation.html">typical implementation</a> for an example of how to add a simple fade effect on your site. If you're feeling ambitious, check out an <a href="advanced-implementation.html">advanced example</a> or go read the <a href="https://github.com/miguel-perez/jquery.smoothState.js">documentation</a>.</p>
	</div>
</div>











			<div class="m-footer m-segment">
				<div class="segment_content">
					Created by <a href="http://miguel-perez.com/">Miguel Ángel Pérez</a> and maintained by <a href="https://github.com/miguel-perez/jquery.smoothState.js/graphs/contributors">contributors</a> under the <a href="https://github.com/miguel-perez/jquery.smoothState.js/blob/master/LICENSE.md">MIT License</a>.
				</div>
			</div>
		</div>
	</div>

</div> <!-- /#main -->

<?php include('inc/footer.php'); ?>


