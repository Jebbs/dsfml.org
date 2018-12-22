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
      <title>DSFML - dsfml.window.touch</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.window.touch</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Touch provides an interface to the state of the touches.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It only contains static functions, so it's not meant to be instantiated.
<br><br>
 This class allows users to query the touches state at any time and directly,
 without having to deal with a window and its events. Compared to the
 <code class="prettyprint">TouchBegan</code>, <code class="prettyprint">TouchMoved</code> and <code class="prettyprint">TouchEnded</code> events, Touch can retrieve the
 state of  the touches at any time (you don't need to store and update a
 boolean on your side in order to know if a touch is down), and you always get
 the real state of the touches, even if they happen when your window is out of
 focus and no event is triggered.
<br><br>
 The <code class="prettyprint">getPosition</code> function can be used to retrieve the current position of a
 touch. There are two versions: one that operates in global coordinates
 (relative to the desktop) and one that operates in window coordinates
 (relative to a specific window).
<br><br>
 Touches are identified by an index (the "finger"), so that in multi-touch
 events, individual touches can be tracked correctly. As long as a finger
 touches the screen, it will keep the same index even if other fingers start
 or stop touching the screen in the meantime. As a consequence, active touch
 indices may not always be sequential (i.e. touch number 0 may be released
 while touch number 1 is still down).


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">if (Touch.isDown(0))
{
    // touch 0 is down
}

// get global position of touch 1
Vector2i globalPos = Touch.getPosition(1);

// get position of touch 1 relative to a window
Vector2i relativePos = Touch.getPosition(1, window);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../window/joystick.php" title="Give access to the real-time state of the joysticks.">Joystick</a>, <a class="dsfml_link" href="../window/keyboard.php" title="">Keyboard</a>, <a class="dsfml_link" href="../window/mouse.php" title="Give access to the real-time state of the mouse.">Mouse</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Touch" id="Touch">abstract class Touch;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Give access to the real-time state of the touches.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Touch.isDown" id="Touch.isDown">static bool isDown(uint finger);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check if a touch event is currently down.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint finger</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Finger index
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if finger is currently touching the screen, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Touch.getPosition" id="Touch.getPosition">static Vector2i getPosition(uint finger);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the current position of a touch in desktop coordinates.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns the current touch position in global (desktop)
 coordinates.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint finger</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Finger index
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Current position of finger, or undefined if it's not down.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Touch.getPosition.2" id="Touch.getPosition.2">static Vector2i getPosition(uint finger, const(Window) relativeTo);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the current position of a touch in window coordinates.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns the current touch position in relative (window)
 coordinates.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint finger</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Finger index
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Window) relativeTo</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference window
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Current position of finger, or undefined if it's not down
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