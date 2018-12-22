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
      <title>DSFML - dsfml.window.windowhandle</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.window.windowhandle</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define a low-level window handle type, specific to each platform.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    <table class="para"> <tr><th>Platform</th> <th>Type</th></tr>
 <tr><td>Windows</td> <td><code class="prettyprint">HWND</code></td></tr>
 <tr><td>Linux/FreeBSD</td> <td><code class="prettyprint">Window</code></td></tr>
 <tr><td>Mac OS X</td>
 <td>either <code class="prettyprint">NSWindow*</code> or <code class="prettyprint">NSView*</code>, disguised as <code class="prettyprint">void*</code></td></tr></table>

 

<br><br>
 <p class="para"><b>Mac OS X Specification</b>
<br><br>
 On Mac OS X, a <a class="dsfml_link" href="../window/window.php" title="Window that serves as a target for OpenGL rendering.">Window</a> can be created either from an existing
 <code class="prettyprint">NSWindow*</code> or an <code class="prettyprint">NSView*</code>. When the window is created from a window, DSFML
 will use its content view as the OpenGL area. <code class="prettyprint">Window.getSystemHandle()</code> will
 return the handle that was used to create the window,
 which is a <code class="prettyprint">NSWindow*</code> by default.</p>
  </p>
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