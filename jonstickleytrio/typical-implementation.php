<?php include('inc/header.php'); ?>
<div class="typical-implementation m-scene" id="main">

  <div class="m-page scene_element scene_element--fadein">
      <div class="right-panel_top">
        <div class="m-header">
          <div class="m-breadcrumb" itemprop="breadcrumb">
            <a class="breadcrumb_link" href="index.php">Home</a> →
            <h1 class="m-type-display-1">
              Typical Implementation
            </h1>
          </div>
          <p class="m-type-sub-heading-1">A demo that delves into how we can use smoothState.js to improve the performance of our site.</p>
        </div>
      </div>
			
			<div class="m-segment">
	<h2 class="m-type-heading-1">What makes this a 'typical' example?</h2>
	<div class="segment_content">
		<p>Animations take a lot of time to perfect. Each layout demands a careful choreography of how elements on the page appear and disappear. A simple fade effect, however, is the perfect way to add a slick finish to any site with little effort.</p>
	</div>
</div>
<div class="m-segment">
	<h2 class="m-type-heading-1">Adding page transitions</h2>
	<div class="segment_content">
		<p>smoothState.js was built to allow you to achieve really neat page transitions on your site, such as what you might see on <a href="http://tympanus.net/codrops/2013/05/07/a-collection-of-page-transitions/">Codrops</a> or <a href="http://aprilzero.com/">AprilZero</a>. In order to add these types of transitions, we'll have to override the default callbacks that handle how the content gets injected into the page.</p>
    
    <p>For the purpose of this example, we'll only override "<code>onStart</code>".</p>

		<h3>The HTML</h3>
<pre><code class="m-code html"><span class="cp">&lt;!doctype html&gt;</span>
<span class="nt">&lt;html&gt;</span>
  <span class="nt">&lt;head&gt;</span>
    <span class="nt">&lt;meta</span> <span class="na">charset=</span><span class="s">"utf-8"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;meta</span> <span class="na">http-equiv=</span><span class="s">"X-UA-Compatible"</span> <span class="na">content=</span><span class="s">"IE=edge"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;title&gt;</span>Home - My Site<span class="nt">&lt;/title&gt;</span>
    <span class="nt">&lt;link</span> <span class="na">href=</span><span class="s">"keyframes.css"</span><span class="nt">&gt;</span>
    <span class="nt">&lt;link</span> <span class="na">href=</span><span class="s">"pageTransitions.css"</span><span class="nt">&gt;</span>
  <span class="nt">&lt;/head&gt;</span>
  <span class="nt">&lt;body&gt;</span>
    <span class="c">&lt;!-- Animation class --&gt;</span>
    <span class="nt">&lt;div</span> <span class="na">id=</span><span class="s">"main"</span> <span class="na">class=</span><span class="s">"m-scene"</span><span class="nt">&gt;</span>
      <span class="c">&lt;!-- Classes that define elment animations --&gt;</span>
      <span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"scene_element scene_element--fadein"</span><span class="nt">&gt;</span>
        <span class="c">&lt;!-- contents... --&gt;</span>
      <span class="nt">&lt;/div&gt;</span>
    <span class="nt">&lt;/div&gt;</span>
    <span class="c">&lt;!-- Scripts --&gt;</span>
    <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"jquery.js"</span><span class="nt">&gt;&lt;/script&gt;</span>
    <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"jquery.smoothState.js"</span><span class="nt">&gt;&lt;/script&gt;</span>
    <span class="nt">&lt;script </span><span class="na">src=</span><span class="s">"functions.js"</span><span class="nt">&gt;&lt;/script&gt;</span>
  <span class="nt">&lt;/body&gt;</span>
<span class="nt">&lt;/html&gt;</span>
</code></pre>
		<h3>The CSS</h3>
<pre><code class="m-code css"><span class="c">/*
 * CSS Animations
 * Don't forget to add vendor prefixes!
 */</span>
<span class="nc">.m-scene</span> <span class="nc">.scene_element</span> <span class="p">{</span>
  <span class="nl">animation-duration</span><span class="p">:</span> <span class="m">0.25s</span><span class="p">;</span>
  <span class="nl">transition-timing-function</span><span class="p">:</span> <span class="n">ease-in</span><span class="p">;</span>
  <span class="nl">animation-fill-mode</span><span class="p">:</span> <span class="nb">both</span><span class="p">;</span>
<span class="p">}</span>

<span class="nc">.m-scene</span> <span class="nc">.scene_element--fadein</span> <span class="p">{</span>
  <span class="nl">animation-name</span><span class="p">:</span> <span class="n">fadeIn</span><span class="p">;</span>
<span class="p">}</span>

<span class="nc">.m-scene.is-exiting</span> <span class="nc">.scene_element</span> <span class="p">{</span>
  <span class="nl">animation-direction</span><span class="p">:</span> <span class="n">alternate-reverse</span><span class="p">;</span>
<span class="p">}</span>

<span class="c">/*
 * Keyframes
 */</span>
<span class="k">@keyframes</span> <span class="n">fadeIn</span> <span class="p">{</span>
  <span class="nt">0</span><span class="o">%</span> <span class="p">{</span> <span class="nl">opacity</span><span class="p">:</span> <span class="m">0</span><span class="p">;</span> <span class="p">}</span>
  <span class="nt">100</span><span class="o">%</span> <span class="p">{</span> <span class="nl">opacity</span><span class="p">:</span> <span class="m">1</span><span class="p">;</span> <span class="p">}</span>
<span class="p">}</span>

</code></pre>
		<h3>The JS</h3>
<pre><code class="m-code javascript"><span class="c1">// Contents of functions.js</span>
<span class="p">;(</span><span class="kd">function</span><span class="p">(</span><span class="nx">$</span><span class="p">)</span> <span class="p">{</span>
  <span class="s1">'use strict'</span><span class="p">;</span>
  <span class="kd">var</span> <span class="nx">$body</span> <span class="o">=</span> <span class="nx">$</span><span class="p">(</span><span class="s1">'html, body'</span><span class="p">),</span>
      <span class="nx">content</span> <span class="o">=</span> <span class="nx">$</span><span class="p">(</span><span class="s1">'#main'</span><span class="p">).</span><span class="nx">smoothState</span><span class="p">({</span>
        <span class="c1">// Runs when a link has been activated</span>
        <span class="na">onStart</span><span class="p">:</span> <span class="p">{</span>
          <span class="na">duration</span><span class="p">:</span> <span class="mi">250</span><span class="p">,</span> <span class="c1">// Duration of our animation</span>
          <span class="na">render</span><span class="p">:</span> <span class="kd">function</span> <span class="p">(</span><span class="nx">url</span><span class="p">,</span> <span class="nx">$container</span><span class="p">)</span> <span class="p">{</span>
            <span class="c1">// toggleAnimationClass() is a public method</span>
            <span class="c1">// for restarting css animations with a class</span>
            <span class="nx">content</span><span class="p">.</span><span class="nx">toggleAnimationClass</span><span class="p">(</span><span class="s1">'is-exiting'</span><span class="p">);</span>
            <span class="c1">// Scroll user to the top</span>
            <span class="nx">$body</span><span class="p">.</span><span class="nx">animate</span><span class="p">({</span>
              <span class="na">scrollTop</span><span class="p">:</span> <span class="mi">0</span>
            <span class="p">});</span>
          <span class="p">}</span>
        <span class="p">}</span>
      <span class="p">}).</span><span class="nx">data</span><span class="p">(</span><span class="s1">'smoothState'</span><span class="p">);</span>
      <span class="c1">//.data('smoothState') makes public methods available</span>
<span class="p">})(</span><span class="nx">jQuery</span><span class="p">);</span>
</code></pre>
		Play with the <a target="_blank" href="demos/typical/">demo</a>.
	</div>
</div>

<div class="m-segment">
    <h2 class="m-type-heading-1">Other animation effects</h2>
    <div class="segment_content">
        <p>smoothState.js allows for more complex animations, such as what you see on this site. To achieve this, you'll need to define <code>@keyframes</code> that describe the animations we want. <a href="https://twitter.com/_dte">Daniel Eden</a> has written up a small library of predefined css animations we can use called <a href="http://daneden.github.io/animate.css/">animate.css</a>.</p>
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

