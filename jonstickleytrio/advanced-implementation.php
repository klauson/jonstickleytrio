<?php include('inc/header.php'); ?>
<div class="advanced-implementation m-scene" id="main">

    	
	<div class="m-page scene_element scene_element--fadein">
			<div class="right-panel_top">
				<div class="m-header">
					<div class="m-breadcrumb" itemprop="breadcrumb">
						<a class="breadcrumb_link" href="index.php">Home</a> →
						<h1 class="m-type-display-1">
							Boost site your site's performance
						</h1>
					</div>
					<p class="m-type-sub-heading-1">A demo that delves into how we can use smoothState.js to improve the performance of our site.</p>
				</div>
			</div>
			
		<div class="m-segment">
			<h2 class="m-type-heading-1">Quicker response times</h2>
			<div class="segment_content">
				<p>smoothState.js doesn't wait until the user has the contents of a url before calling the <code>onStart</code> function. This allows us to animate an out the elements we wont need and provide the user with immediate feedback after they’ve activated a link. This site uses this technique. Layout elements will start to slide out of view even before the page has fully loaded. There are three main callbacks:</p>
		        <ol>
		            <li><code>onStart</code> - Run when a link has been activated</li>
		            <li><code>onProgress</code> - Run if the page request is still loading and onStart has finished animating</li>
		            <li><code>onEnd</code> - Run when requested content is ready to be injected into the page</li>
		        </ol>
			</div>
		</div>


		<div class="m-segment">
			<h2 class="m-type-heading-1">Prefetch content</h2>
			<div class="segment_content">
				<p>There is a 200ms to 300ms delay between the time that a user hovers over a link and the time they click it. On touch screens, the delay between the <code>touchstart</code> and <code>touchend</code> is even greater. If the <code>prefetch</code> option is set to true, smoothState will begin to preload the contents of the url between that delay.</p>

				<p>This technique will dramatically increase the speed of your website.</p>
		<pre><code class="m-code javascript"><span class="nx">$</span><span class="p">(</span><span class="s1">'#main'</span><span class="p">).</span><span class="nx">smoothState</span><span class="p">({</span> <span class="na">prefetch</span><span class="p">:</span> <span class="kc">true</span> <span class="p">});</span>
		</code></pre>
			</div>
		</div>



		<div class="m-segment">
			<h2 class="m-type-heading-1">Caching content</h2>
			<div class="segment_content">
				<p>smoothState.js will store pages in memory if <code>pageCacheSize</code> is set to anything greater than 0. This allows a user to avoid having to request pages more than once. Pages that are stored in memory will load instantaneously.</p>
		<pre><code class="m-code javascript"><span class="nx">$</span><span class="p">(</span><span class="s1">'#main'</span><span class="p">).</span><span class="nx">smoothState</span><span class="p">({</span> <span class="na">pageCacheSize</span><span class="p">:</span> <span class="mi">4</span> <span class="p">});</span>
		</code></pre>
			</div>
		</div>



		<div class="m-segment">
			<h2 class="m-type-heading-1">Demo and code</h2>
			<div class="segment_content">
				This site already uses the techniques described above. Here's the code:
		<pre><code class="m-code javascript"><span class="p">;(</span><span class="kd">function</span> <span class="p">(</span><span class="nx">$</span><span class="p">)</span> <span class="p">{</span>
		    <span class="s1">'use strict'</span><span class="p">;</span>
		    <span class="kd">var</span> <span class="nx">$body</span>    <span class="o">=</span> <span class="nx">$</span><span class="p">(</span><span class="s1">'html, body'</span><span class="p">),</span>
		        <span class="nx">content</span>  <span class="o">=</span> <span class="nx">$</span><span class="p">(</span><span class="s1">'#main'</span><span class="p">).</span><span class="nx">smoothState</span><span class="p">({</span>
		            <span class="na">prefetch</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
		            <span class="na">pageCacheSize</span><span class="p">:</span> <span class="mi">4</span><span class="p">,</span>
		            <span class="na">onStart</span><span class="p">:</span> <span class="p">{</span>
		                <span class="na">duration</span><span class="p">:</span> <span class="mi">250</span><span class="p">,</span>
		                <span class="na">render</span><span class="p">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">url</span><span class="p">,</span> <span class="nx">$container</span><span class="p">)</span> <span class="p">{</span>
		                    <span class="nx">content</span><span class="p">.</span><span class="nx">toggleAnimationClass</span><span class="p">(</span><span class="s1">'is-exiting'</span><span class="p">);</span>
		                    <span class="nx">$body</span><span class="p">.</span><span class="nx">animate</span><span class="p">({</span>
		                        <span class="na">scrollTop</span><span class="p">:</span> <span class="mi">0</span>
		                    <span class="p">});</span>
		                <span class="p">}</span>
		            <span class="p">}</span>
		        <span class="p">}).</span><span class="nx">data</span><span class="p">(</span><span class="s1">'smoothState'</span><span class="p">);</span>
		<span class="p">})(</span><span class="nx">jQuery</span><span class="p">);</span>
		</code></pre>

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


