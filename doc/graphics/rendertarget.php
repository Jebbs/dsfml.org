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
      <title>DSFML - dsfml.graphics.rendertarget</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.rendertarget</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>RenderTarget</u> defines the common behaviour of all the 2D render targets
 usable in the graphics module. It makes it possible to draw 2D entities like
 sprites, shapes, text without using any OpenGL command directly.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    A <u>RenderTarget</u> is also able to use views which are a kind of 2D cameras.
 With views you can globally scroll, rotate or zoom everything that is drawn,
 without having to transform every single entity.
<br><br>
 On top of that, render targets are still able to render direct OpenGL stuff.
 It is even possible to mix together OpenGL calls and regular DSFML drawing
 commands. When doing so, make sure that OpenGL states are not messed up by
 calling the <code class="prettyprint">pushGLStates</code>/<code class="prettyprint">popGLStates</code> functions.


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/renderwindow.php" title="Window that can serve as a target for 2D drawing.">RenderWindow</a>, <a class="dsfml_link" href="../graphics/rendertexture.php" title="Target for off-screen 2D rendering into a texture.">RenderTexture</a>, <a class="dsfml_link" href="../graphics/view.php" title="2D camera that defines what region is shown on screen.">View</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget" id="RenderTarget">interface RenderTarget;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Base interface for all render targets (window, texture, ...).
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.view" id="RenderTarget.view">abstract @property View view(View newView);
<br>
abstract const @property View view();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The current active view.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The view is like a 2D camera, it controls which part of the 2D scene
 is visible, and how it is viewed in the render-target. The new view
 will affect everything that is drawn, until another view is set.
<br><br>
 The render target keeps its own copy of the view object, so it is not
 necessary to keep the original one alive after calling this function.
 To restore the original view of the target, you can pass the result
 of <code class="prettyprint">getDefaultView()</code> to this function.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.getDefaultView" id="RenderTarget.getDefaultView">abstract const View getDefaultView();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the default view of the render target.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The default view has the initial size of the render target, and never
 changes after the target has been created.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The default view of the render target.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.getSize" id="RenderTarget.getSize">abstract const Vector2u getSize();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the size of the rendering region of the target.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Size in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.getViewport" id="RenderTarget.getViewport">final const IntRect getViewport(View view);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the viewport of a view, applied to this render target.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The viewport is defined in the view as a ratio, this function simply
 applies this ratio to the current dimensions of the render target to
 calculate the pixels rectangle that the viewport actually covers in the
 target.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">View view</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The view for which we want to compute the viewport
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
    Viewport rectangle, expressed in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.clear" id="RenderTarget.clear">abstract void clear(Color color = Color.Black);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Clear the entire target with a single color.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is usually called once every frame, to clear the previous
 contents of the target.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color color</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Fill color to use to clear the render target
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.draw" id="RenderTarget.draw">abstract void draw(Drawable drawable, RenderStates states = RenderStates.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Draw a drawable object to the render target.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Drawable drawable</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Object to draw
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">RenderStates states</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Render states to use for drawing
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.draw.2" id="RenderTarget.draw.2">abstract void draw(const(Vertex)[] vertices, PrimitiveType type, RenderStates states = RenderStates.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Draw primitives defined by an array of vertices.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vertex)[] vertices</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of vertices to draw
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">PrimitiveType type</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Type of primitives to draw
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">RenderStates states</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Render states to use for drawing
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.mapPixelToCoords" id="RenderTarget.mapPixelToCoords">final inout Vector2f mapPixelToCoords(Vector2i point);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Convert a point fom target coordinates to world coordinates, using the
 current view.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is an overload of the mapPixelToCoords function that
 implicitely uses the current view.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2i point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Pixel to convert
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
    The converted point, in "world" coordinates.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.mapPixelToCoords.2" id="RenderTarget.mapPixelToCoords.2">final inout Vector2f mapPixelToCoords(Vector2i point, View theView);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Convert a point from target coordinates to world coordinates.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function finds the 2D position that matches the given pixel of the
 render-target. In other words, it does the inverse of what the graphics
 card does, to find the initial position of a rendered pixel.
<br><br>
 Initially, both coordinate systems (world units and target pixels) match
 perfectly. But if you define a custom view or resize your render-target,
 this assertion is not <code class="prettyprint">true</code> anymore, ie. a point located at (10, 50) in
 your render-target may map to the point (150, 75) in your 2D world – if
 the view is translated by (140, 25).
<br><br>
 For render-windows, this function is typically used to find which point
 (or object) is located below the mouse cursor.
<br><br>
 This version uses a custom view for calculations, see the other overload
 of the function if you want to use the current view of the render-target.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2i point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Pixel to convert
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">View theView</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The view to use for converting the point
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
    The converted point, in "world" coordinates.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.mapCoordsToPixel" id="RenderTarget.mapCoordsToPixel">final inout Vector2i mapCoordsToPixel(Vector2f point);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Convert a point from target coordinates to world coordinates, using the
 curtheView.view.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is an overload of the mapPixelToCoords function that
 implicitely uses the current view.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Point to convert
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
    The converted point, in "world" coordinates.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.mapCoordsToPixel.2" id="RenderTarget.mapCoordsToPixel.2">final inout Vector2i mapCoordsToPixel(Vector2f point, View theView);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Convert a point from world coordinates to target coordinates.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function finds the pixel of the render-target that matches the given
 2D point. In other words, it goes through the same process as the
 graphics card, to compute the final position of a rendered point.
<br><br>
 Initially, both coordinate systems (world units and target pixels) match
 perfectly. But if you define a custom view or resize your render-target,
 this assertion is not <code class="prettyprint">true</code> anymore, ie. a point located at (150, 75) in
 your 2D world may map to the pixel (10, 50) of your render-target – if
 the view is translated by (140, 25).
<br><br>
 This version uses a custom view for calculations, see the other overload
 of the function if you want to use the current view of the render-target.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Point to convert
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">View theView</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The view to use for converting the point
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
    The converted point, in target coordinates (pixels).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.popGLStates" id="RenderTarget.popGLStates">abstract void popGLStates();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Restore the previously saved OpenGL render states and matrices.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    See the description of <code class="prettyprint">pushGLStates</code> to get a detailed description of
 these functions.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.pushGLStates" id="RenderTarget.pushGLStates">abstract void pushGLStates();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Save the current OpenGL render states and matrices.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function can be used when you mix SFML drawing and direct OpenGL
 rendering. Combined with PopGLStates, it ensures that:
 <ul class="lists"> <li>DSFML's internal states are not messed up by your OpenGL code</li>
 <li>your OpenGL states are not modified by a call to an SFML function</li></ul>
<br><br>
 <p class="para">More specifically, it must be used around the code that calls
 <code class="prettyprint">draw</code> functions.
<br><br>
 Note that this function is quite expensive: it saves all the possible
 OpenGL states and matrices, even the ones you don't care about.Therefore
 it should be used wisely. It is provided for convenience, but the best
 results will be achieved if you handle OpenGL states yourself (because
 you know which states have really changed, and need to be saved and
 restored). Take a look at the <code class="prettyprint">resetGLStates</code> function if you do so.</p>
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTarget.resetGLStates" id="RenderTarget.resetGLStates">abstract void resetGLStates();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Reset the internal OpenGL states so that the target is ready for drawing.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function can be used when you mix SFML drawing and direct OpenGL
 rendering, if you choose not to use <code class="prettyprint">pushGLStates</code>/<code class="prettyprint">popGLStates</code>. It
 makes sure that all OpenGL states needed by SFML are set, so that
 subsequent <code class="prettyprint">draw()</code> calls will work as expected.
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