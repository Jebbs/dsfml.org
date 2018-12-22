<!DOCTYPE HTML>
  <html>
    <head>
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="theme-color" content="#ffffff">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.window.videomode</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.window.videomode</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A video mode is defined by a width and a height (in pixels) and a depth (in
 bits per pixel). Video modes are used to setup windows (<a class="dsfml_link" href="../window/window.php" title="Window that serves as a target for OpenGL rendering.">Window</a>) at
 creation time.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The main usage of video modes is for fullscreen mode: indeed you must use one
 of the valid video modes allowed by the OS (which are defined by what the
 monitor and the graphics card support), otherwise your window creation will
<br><br>
 <u>VideoMode</u> provides a static function for retrieving the list of all the
 video modes supported by the system: <code class="prettyprint">getFullscreenModes()</code>.
<br><br>
 A custom video mode can also be checked directly for fullscreen compatibility
 with its <code class="prettyprint">isValid()</code> function.
<br><br>
 Additionnally, <u>VideoMode</u> provides a static function to get the mode
 currently used by the desktop: <code class="prettyprint">getDesktopMode()</code>. This allows to build
 windows with the same size or pixel depth as the current resolution.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Display the list of all the video modes available for fullscreen
auto modes = VideoMode.getFullscreenModes();
for (size_t i = 0; i &lt; modes.length; ++i)
{
    VideoMode mode = modes[i];
    writeln("Mode #", i, ": ",
	           mode.width, "x", mode.height, " - ",
            mode.bitsPerPixel, " bpp");
}

// Create a window with the same pixel depth as the desktop
VideoMode desktop = VideoMode.getDesktopMode();
window.create(VideoMode(1024, 768, desktop.bitsPerPixel), "DSFML window");
</code></pre>
  </div>
</section>

  </p>
</div>

</section>
<section class="section ddoc_module_members_section">
  <div class="ddoc_module_members">
    <ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode" id="VideoMode">struct VideoMode;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    VideoMode defines a video mode (width, height, bpp).
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.width" id="VideoMode.width">uint width;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Video mode width, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.height" id="VideoMode.height">uint height;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Video mode height, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.bitsPerPixel" id="VideoMode.bitsPerPixel">uint bitsPerPixel;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Video mode pixel depth, in bits per pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.this" id="VideoMode.this">this(uint modeWidth, uint modeHeight, uint modeBitsPerPixel = 32);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the video mode with its attributes.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint modeWidth</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Width in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint modeHeight</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Height in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint modeBitsPerPixel</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Pixel depths in bits per pixel
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.getDesktopMode" id="VideoMode.getDesktopMode">static VideoMode getDesktopMode();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the current desktop video mode.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Current desktop video mode.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.getFullscreenModes" id="VideoMode.getFullscreenModes">static VideoMode[] getFullscreenModes();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Retrieve all the video modes supported in fullscreen mode.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    When creating a fullscreen window, the video mode is restricted to be
 compatible with what the graphics driver and monitor support. This
 function returns the complete list of all video modes that can be used in
 fullscreen mode. The returned array is sorted from best to worst, so that
 the first element will always give the best mode (higher width, height
 and bits-per-pixel).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Array containing all the supported fullscreen modes.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.isValid" id="VideoMode.isValid">const bool isValid();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether or not the video mode is valid.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The validity of video modes is only relevant when using fullscreen
 windows; otherwise any video mode can be used with no restriction.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if the video mode is valid for fullscreen mode.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#VideoMode.toString" id="VideoMode.toString">const string toString();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Returns a string representation of the video mode.
  </p>
</div>

</section>

</div>

</li>
</ul>

</div>

</li>
</ul>
  </div>
</section>
</section>
          </article>
        </div>
      </div>
      <?php include '../../footer.php'?>
        <script>
        var elements = document.getElementsByClassName("ddoc_decl");
        for (var i = 0; i < elements.length; ++i) {
        elements[i].innerHTML = elements[i].innerHTML.replace(/;/g,'');
        }
        var elements = document.getElementsByClassName("deprecated_decl");
        for (var i = 0; i < elements.length; ++i) {
        elements[i].innerHTML = elements[i].innerHTML.replace(/deprecated/g,'<span class="dep_kwd">deprecated</span>');
        }
        </script>
    </body>
  </html>