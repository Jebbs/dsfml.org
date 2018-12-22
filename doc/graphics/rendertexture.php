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
      <title>DSFML - dsfml.graphics.rendertexture</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.rendertexture</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>RenderTexture</u> is the little brother of <a class="dsfml_link" href="../graphics/renderwindow.php" title="Window that can serve as a target for 2D drawing.">RenderWindow</a>. It
 implements the same 2D drawing and OpenGL-related functions (see their base
 class <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a> for more details), the difference is that the
 result is stored in an off-screen texture rather than being show in a window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Rendering to a texture can be useful in a variety of situations:
 <ul class="lists"> <li>precomputing a complex static texture (like a level's background from
   multiple tiles)</li>
 <li>applying post-effects to the whole scene with shaders</li>
 <li>creating a sprite from a 3D object rendered with OpenGL</li>
 <li>etc.</li></ul>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Create a new render-window
auto window = new RenderWindow(VideoMode(800, 600), "DSFML window");

// Create a new render-texture
auto texture = new RenderTexture();
if (!texture.create(500, 500))
    return -1;

// The main loop
while (window.isOpen())
{
   // Event processing
   // ...

   // Clear the whole texture with red color
   texture.clear(Color.Red);

   // Draw stuff to the texture
   texture.draw(sprite);
   texture.draw(shape);
   texture.draw(text);

   // We're done drawing to the texture
   texture.display();

   // Now we start rendering to the window, clear it first
   window.clear();

   // Draw the texture
   auto sprite = new Sprite(texture.getTexture());
   window.draw(sprite);

   // End the current frame and display its contents on screen
   window.display();
}
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Like <a class="dsfml_link" href="../graphics/renderwindow.php" title="Window that can serve as a target for 2D drawing.">RenderWindow</a>, <u>RenderTexture</u> is still able to render
 direct OpenGL stuff. It is even possible to mix together OpenGL calls and
 regular DSFML drawing commands. If you need a depth buffer for 3D rendering,
 don't forget to request it when calling <code class="prettyprint">RenderTexture.create</code>.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a>, <a class="dsfml_link" href="../graphics/renderwindow.php" title="Window that can serve as a target for 2D drawing.">RenderWindow</a>, <a class="dsfml_link" href="../graphics/view.php" title="2D camera that defines what region is shown on screen.">View</a>, <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture" id="RenderTexture">class RenderTexture: <span class="ddoc_psuper_symbol">dsfml.graphics.rendertarget.RenderTarget</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Target for off-screen 2D rendering into a texture.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.this" id="RenderTexture.this">this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Default constructor.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.create" id="RenderTexture.create">bool create(uint width, uint height, bool depthBuffer = false);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create the render-texture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Before calling this function, the render-texture is in an invalid state,
 thus it is mandatory to call it before doing anything with the
 render-texture.
<br><br>
 The last parameter, depthBuffer, is useful if you want to use the
 render-texture for 3D OpenGL rendering that requires a depth-buffer.
 Otherwise it is unnecessary, and you should leave this parameter to <code class="prettyprint">false</code>
 (which is its default value).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint width</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Width of the render-texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint height</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Height of the render-texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool depthBuffer</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Do you want this render-texture to have a depth buffer?
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
    True if creation has been successful.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.smooth" id="RenderTexture.smooth">@property bool smooth(bool newSmooth);
<br>
const @property bool smooth();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enable or disable texture smoothing.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.view" id="RenderTexture.view">@property View view(View newView);
<br>
const @property View view();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the current active view.

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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.getDefaultView" id="RenderTexture.getDefaultView">const View getDefaultView();
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.getSize" id="RenderTexture.getSize">const Vector2u getSize();
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.getTexture" id="RenderTexture.getTexture">const const(Texture) getTexture();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a read-only reference to the target texture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    After drawing to the render-texture and calling Display, you can retrieve
 the updated texture using this function, and draw it using a sprite
 (for example).
<br><br>
 The internal Texture of a render-texture is always the same instance, so
 that it is possible to call this function once and keep a reference to
 the texture even after it is modified.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Const reference to the texture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.setActive" id="RenderTexture.setActive">void setActive(bool active = true);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Activate or deactivate the render-texture for rendering.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function makes the render-texture's context current for future
 OpenGL rendering operations (so you shouldn't care about it if you're not
 doing direct OpenGL stuff).
<br><br>
 Only one context can be current in a thread, so if you want to draw
 OpenGL geometry to another render target (like a <a class="dsfml_link" href="../graphics/renderwindow.php" title="Window that can serve as a target for 2D drawing.">RenderWindow</a>)
 don't forget to activate it again.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool active</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to activate, <code class="prettyprint">false</code> to deactivate
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.clear" id="RenderTexture.clear">void clear(Color color = Color.Black);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.display" id="RenderTexture.display">void display();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update the contents of the target texture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function updates the target texture with what has been drawn so far.
 Like for windows, calling this function is mandatory at the end of
 rendering. Not calling it may leave the texture in an undefined state.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.draw" id="RenderTexture.draw">void draw(Drawable drawable, RenderStates states = RenderStates.init);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.draw.2" id="RenderTexture.draw.2">void draw(const(Vertex)[] vertices, PrimitiveType type, RenderStates states = RenderStates.init);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.popGLStates" id="RenderTexture.popGLStates">void popGLStates();
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
    See the description of pushGLStates to get a detailed description of
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.pushGLStates" id="RenderTexture.pushGLStates">void pushGLStates();
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderTexture.resetGLStates" id="RenderTexture.resetGLStates">void resetGLStates();
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
    This function can be used when you mix DSFML drawing and direct OpenGL
 rendering, if you choose not to use pushGLStates/popGLStates. It makes
 sure that all OpenGL states needed by DSFML are set, so that subsequent
 <code class="prettyprint">draw()</code> calls will work as expected.
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