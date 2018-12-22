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
      <title>DSFML - dsfml.graphics.view</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.view</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>View</u> defines a camera in the 2D scene. This is a very powerful concept:
 you can scroll, rotate or zoom the entire scene without altering the way that
 your drawable objects are drawn.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    A view is composed of a source rectangle, which defines what part of the 2D
 scene is shown, and a target viewport, which defines where the contents of
 the source rectangle will be displayed on the render target (window or
 texture).
<br><br>
 The viewport allows to map the scene to a custom part of the render target,
 and can be used for split-screen or for displaying a minimap, for example.
 If the source rectangle has not the same size as the viewport, its contents
 will be stretched to fit in.
<br><br>
 To apply a view, you have to assign it to the render target. Then, every
 objects drawn in this render target will be affected by the view until you
 use another view.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto window = RenderWindow();
auto <span class="psymbol">view</span> = View();

// Initialize the view to a rectangle at (100, 100) and a size of 400x200
<span class="psymbol">view</span>.reset(FloatRect(100, 100, 400, 200));

// Rotate it by 45 degrees
<span class="psymbol">view</span>.rotate(45);

// Set its target viewport to be half of the window
<span class="psymbol">view</span>.setViewport(FloatRect(0.f, 0.f, 0.5f, 1.f));

// Apply it
window.<span class="psymbol">view</span> = <span class="psymbol">view</span>;

// Render stuff
window.draw(someSprite);

// Set the default view back
window.<span class="psymbol">view</span> = window.getDefaultView();

// Render stuff not affected by the view
window.draw(someText);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">See also the note on coordinates and undistorted rendering in
 <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/renderwindow.php" title="Window that can serve as a target for 2D drawing.">RenderWindow</a>, <a class="dsfml_link" href="../graphics/rendertexture.php" title="Target for off-screen 2D rendering into a texture.">RenderTexture</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#View" id="View">struct View;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2D camera that defines what region is shown on screen.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#View.this" id="View.this">this(FloatRect rectangle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the view from a rectangle

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">FloatRect rectangle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rectangle defining the zone to display
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
        <code class="prettyprint"><a class="decl_anchor" href="#View.this.2" id="View.this.2">this(Vector2f center, Vector2f size);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the view from its center and size

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f center</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Center of the zone to display
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f size</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Size of zone to display
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
        <code class="prettyprint"><a class="decl_anchor" href="#View.center" id="View.center">@property Vector2f center(Vector2f newCenter);
<br>
const @property Vector2f center();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The center of the view.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#View.rotation" id="View.rotation">@property float rotation(float newRotation);
<br>
const @property float rotation();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The orientation of the view, in degrees. The default rotation is 0
 degrees.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#View.size" id="View.size">@property Vector2f size(Vector2f newSize);
<br>
const @property Vector2f size();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The size of the view. The default size is (1, 1).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#View.viewport" id="View.viewport">@property FloatRect viewport(FloatRect newTarget);
<br>
const @property FloatRect viewport();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The target viewpoirt.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The viewport is the rectangle into which the contents of the view are
 displayed, expressed as a factor (between 0 and 1) of the size of the
 RenderTarget to which the view is applied. For example, a view which
 takes the left side of the target would be defined with
 <code class="prettyprint">View.setViewport(FloatRect(0, 0, 0.5, 1))</code>. By default, a view has a
 viewport which covers the entire target.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#View.move" id="View.move">void move(Vector2f offset);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Move the view relatively to its current position.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f offset</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Move offset
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
        <code class="prettyprint"><a class="decl_anchor" href="#View.reset" id="View.reset">void reset(FloatRect rectangle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Reset the view to the given rectangle.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Note that this function resets the rotation angle to 0.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">FloatRect rectangle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rectangle defining the zone to display.
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
        <code class="prettyprint"><a class="decl_anchor" href="#View.zoom" id="View.zoom">void zoom(float factor);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Resize the view rectangle relatively to its current size.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Resizing the view simulates a zoom, as the zone displayed on screen grows
 or shrinks. factor is a multiplier:
 <ul class="lists"> <li><code class="prettyprint">1</code> keeps the size unchanged.</li>
 <li><code class="prettyprint">&gt; 1</code> makes the view bigger (objects appear smaller).</li>
 <li><code class="prettyprint">&lt; 1</code> makes the view smaller (objects appear bigger).</li></ul>


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float factor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Zoom factor to apply
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
        <code class="prettyprint"><a class="decl_anchor" href="#View.getTransform" id="View.getTransform">Transform getTransform();
<br>
const Transform getTransform();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the projection transform of the view.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is meant for internal use only.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Projection transform defining the view.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#View.getInverseTransform" id="View.getInverseTransform">Transform getInverseTransform();
<br>
const Transform getInverseTransform();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the inverse projection transform of the view.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is meant for internal use only.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Inverse of the projection transform defining the view.
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