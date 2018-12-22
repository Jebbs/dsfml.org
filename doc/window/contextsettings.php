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
      <title>DSFML - dsfml.window.contextsettings</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.window.contextsettings</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>ContextSettings</u> allows to define several advanced settings of the OpenGL
 context attached to a window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    All these settings have no impact on the regular DSFML rendering
 (graphics module) – except the anti-aliasing level, so you may need to use
 this structure only if you're using SFML as a windowing system for custom
 OpenGL rendering.
<br><br>
 The <code class="prettyprint">depthBits</code> and <code class="prettyprint">stencilBits</code> members define the number of bits per pixel
 requested for the (respectively) depth and stencil buffers.
<br><br>
 antialiasingLevel represents the requested number of multisampling levels for
 anti-aliasing.
<br><br>
 majorVersion and minorVersion define the version of the OpenGL context that
 you want. Only versions greater or equal to 3.0 are relevant; versions lesser
 than 3.0 are all handled the same way (i.e. you can use any version &lt; 3.0 if
 you don't want an OpenGL 3 context).
<br><br>
 When requesting a context with a version greater or equal to 3.2, you have
 the option of specifying whether the context should follow the core or
 compatibility profile of all newer (&gt;= 3.2) OpenGL specifications. For
 versions 3.0 and 3.1 there is only the core profile. By default a
 compatibility context is created. You only need to specify the core flag if
 you want a core profile context to use with your own OpenGL rendering.

  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Warning:</span>
The graphics module will not function if you request a core
 profile context. Make sure the attributes are set to Default if you want to
 use the graphics module.
<br><br>
 Linking with a debug SFML binary will cause a context to be requested with
 additional debugging features enabled. Depending on the system, this might be
 required for advanced OpenGL debugging. OpenGL debugging is disabled by
 default.
<br><br>
 <b>Special Note for OS X:</b>
 Apple only supports choosing between either a legacy context (OpenGL 2.1) or
 a core context (OpenGL version depends on the operating system version but is
 at least 3.2). Compatibility contexts are not supported. Further information
 is available on the <a href=" https://developer.apple.com/opengl/capabilities/index.html"> OpenGL Capabilities Tables</a> page. OS X also currently does not support debug
 contexts.
<br><br>
 Please note that these values are only a hint. No failure will be reported if
 one or more of these values are not supported by the system; instead, SFML
 will try to find the closest valid match. You can then retrieve the settings
 that the window actually used to create its context, with
 <code class="prettyprint">Window.getSettings()</code>.
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
        <code class="prettyprint"><a class="decl_anchor" href="#ContextSettings" id="ContextSettings">struct ContextSettings;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Structure defining the settings of the OpenGL context attached to a window.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ContextSettings.depthBits" id="ContextSettings.depthBits">uint depthBits;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Bits of the depth buffer.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ContextSettings.stencilBits" id="ContextSettings.stencilBits">uint stencilBits;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Bits of the stencil buffer.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ContextSettings.antialiasingLevel" id="ContextSettings.antialiasingLevel">uint antialiasingLevel;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Level of antialiasing.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ContextSettings.majorVersion" id="ContextSettings.majorVersion">uint majorVersion;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Level of antialiasing.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ContextSettings.minorVersion" id="ContextSettings.minorVersion">uint minorVersion;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Minor number of the context version to create.
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