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
      <title>DSFML - dsfml.graphics.renderwindow</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.renderwindow</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>RenderWindow</u> is the main class of the Graphics package. It defines an OS
 window that can be painted using the other classes of the graphics module.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     <u>RenderWindow</u> is derived from <a class="dsfml_link" href="../window/window.php" title="Window that serves as a target for OpenGL rendering.">Window</a>, thus it inherits all its
 features : events, window management, OpenGL rendering, etc. See the
 documentation of <a class="dsfml_link" href="../window/window.php" title="Window that serves as a target for OpenGL rendering.">Window</a> for a more complete description of all these
 features, as well as code examples.
<br><br>
 On top of that, <u>RenderWindow</u> adds more features related to 2D drawing
 with the graphics module (see its base class <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a> for more
 details).
<br><br>
 Here is a typical rendering and event loop with a <u>RenderWindow</u>:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare and create a new render-window
auto window = new RenderWindow(VideoMode(800, 600), "DSFML window");

// Limit the framerate to 60 frames per second (this step is optional)
window.setFramerateLimit(60);

// The main loop - ends as soon as the window is closed
while (window.isOpen())
{
   // Event processing
   Event event;
   while (window.pollEvent(event))
   {
       // Request for closing the window
       if (event.type == Event.EventType.Closed)
           window.close();
   }

   // Clear the whole window before rendering a new frame
   window.clear();

   // Draw some graphical entities
   window.draw(sprite);
   window.draw(circle);
   window.draw(text);

   // End the current frame and display its contents on screen
   window.display();
}
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Like <a class="dsfml_link" href="../window/window.php" title="Window that serves as a target for OpenGL rendering.">Window</a>, <u>RenderWindow</u> is still able to render direct
 OpenGL stuff. It is even possible to mix together OpenGL calls and regular
 DSFML drawing commands.</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Create the render window
auto window = new RenderWindow(VideoMode(800, 600), "DSFML OpenGL");

// Create a sprite and a text to display
auto sprite = new Sprite();
auto text = new Text();
...

// Perform OpenGL initializations
glMatrixMode(GL_PROJECTION);
...

// Start the rendering loop
while (window.isOpen())
{
    // Process events
    ...

    // Draw a background sprite
    window.pushGLStates();
    window.draw(sprite);
    window.popGLStates();

    // Draw a 3D object using OpenGL
    glBegin(GL_QUADS);
        glVertex3f(...);
        ...
    glEnd();

    // Draw text on top of the 3D object
    window.pushGLStates();
    window.draw(text);
    window.popGLStates();

    // Finally, display the rendered frame on screen
    window.display();
}
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../window/window.php" title="Window that serves as a target for OpenGL rendering.">Window</a>, <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a>, <a class="dsfml_link" href="../graphics/rendertexture.php" title="Target for off-screen 2D rendering into a texture.">RenderTexture</a>, <a class="dsfml_link" href="../graphics/view.php" title="2D camera that defines what region is shown on screen.">View</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow" id="RenderWindow">class RenderWindow: <span class="ddoc_psuper_symbol">dsfml.window.window.Window</span>, <span class="ddoc_psuper_symbol">dsfml.graphics.rendertarget.RenderTarget</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Window that can serve as a target for 2D drawing.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.this" id="RenderWindow.this">this();
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
<div class="ddoc_description">
  <p class="para">
    This constructor doesn't actually create the window, use the other
 constructors or call <code class="prettyprint">create()</code> to do so.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.this.2" id="RenderWindow.this.2">this(T)(VideoMode mode, const(T)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init) if (is(T == wchar) || is(T == char));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a new window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This constructor creates the window with the size and pixel depth defined
 in mode. An optional style can be passed to customize the look and
 behavior of the window (borders, title bar, resizable, closable, ...).
<br><br>
 The fourth parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc. You
 shouldn't care about these parameters for a regular usage of the graphics
 module.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">VideoMode mode</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Video mode to use (defines the width, height and depth of the
 			  rendering area of the window)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(T)[] title</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Title of the window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Style style</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window style, a bitwise OR combination of Style enumerators
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ContextSettings settings</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Additional settings for the underlying OpenGL context
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the constructor that takes a 'const(dchar)[]' instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.this.3" id="RenderWindow.this.3">this(T)(VideoMode mode, const(dchar)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a new window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This constructor creates the window with the size and pixel depth defined
 in mode. An optional style can be passed to customize the look and
 behavior of the window (borders, title bar, resizable, closable, ...).
<br><br>
 The fourth parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc. You
 shouldn't care about these parameters for a regular usage of the graphics
 module.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">VideoMode mode</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Video mode to use (defines the width, height and depth of the
 			  rendering area of the window)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(dchar)[] title</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Title of the window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Style style</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window style, a bitwise OR combination of Style enumerators
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ContextSettings settings</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Additional settings for the underlying OpenGL context
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.this.4" id="RenderWindow.this.4">this(WindowHandle handle, ContextSettings settings = ContextSettings.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the window from an existing control.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Use this constructor if you want to create an DSFML rendering area into
 an already existing control.
<br><br>
 The second parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc. You
 shouldn't care about these parameters for a regular usage of the graphics
 module.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">WindowHandle handle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Platform-specific handle of the control
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ContextSettings settings</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Additional settings for the underlying OpenGL context
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.position" id="RenderWindow.position">@property Vector2i position(Vector2i newPosition);
<br>
const @property Vector2i position();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the position of the window on screen.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This property only works for top-level windows (i.e. it will be
 ignored for windows created from the handle of a child
 window/control).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.size" id="RenderWindow.size">@property Vector2u size(Vector2u newSize);
<br>
const @property Vector2u size();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The size of the rendering region of the window.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.view" id="RenderWindow.view">@property View view(View newView);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.getDefaultView" id="RenderWindow.getDefaultView">const View getDefaultView();
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.getSettings" id="RenderWindow.getSettings">const ContextSettings getSettings();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the settings of the OpenGL context of the window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Note that these settings may be different from what was passed to the
 constructor or the <code class="prettyprint">create()</code> function, if one or more settings were not
 supported. In this case, DSFML chose the closest match.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Structure containing the OpenGL context settings
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.getSize" id="RenderWindow.getSize">const Vector2u getSize();
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
    Size in pixels
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.getSystemHandle" id="RenderWindow.getSystemHandle">const WindowHandle getSystemHandle();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the OS-specific handle of the window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The type of the returned handle is WindowHandle, which is a typedef to
 the handle type defined by the OS. You shouldn't need to use this
 function, unless you have very specific stuff to implement that SFML
 doesn't support, or implement a temporary workaround until a bug is
 fixed.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    System handle of the window
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setActive" id="RenderWindow.setActive">bool setActive(bool active);
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
    A window is active only on the current thread, if you want to make it
 active on another thread you have to deactivate it on the previous thread
 first if it was active. Only one window can be active on a thread at a
 time, thus the window previously active (if any) automatically gets
 deactivated.


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
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if operation was successful, <code class="prettyprint">false</code> otherwise
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setFramerateLimit" id="RenderWindow.setFramerateLimit">void setFramerateLimit(uint limit);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Limit the framerate to a maximum fixed frequency.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If a limit is set, the window will use a small delay after each call to
 <code class="prettyprint">display()</code> to ensure that the current frame lasted long enough to match
 the framerate limit.
<br><br>
 DSFML will try to match the given limit as much as it can, but since it
 internally uses sleep, whose precision depends on the underlying OS, the
 results may be a little unprecise as well (for example, you can get 65
 FPS when requesting 60).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint limit</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Framerate limit, in frames per seconds (use 0 to disable limit)
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setIcon" id="RenderWindow.setIcon">void setIcon(uint width, uint height, const(ubyte[]) pixels);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the window's icon.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    pixels must be an array of width x height pixels in 32-bits RGBA format.
<br><br>
 The OS default icon is used by default.


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
      Icon's width, in pixels
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
      Icon's height, in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(ubyte[]) pixels</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Icon pixel array to load from
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setJoystickThreshold" id="RenderWindow.setJoystickThreshold">void setJoystickThreshold(float threshold);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the joystick threshold.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The joystick threshold is the value below which no JoystickMoved event
 will be generated.
<br><br>
 The threshold value is 0.1 by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float threshold</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New threshold, in the range [0, 100]
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setJoystickThreshhold" id="RenderWindow.setJoystickThreshhold"><div class="deprecated_decl">deprecated void setJoystickThreshhold(float threshhold)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the joystick threshold.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The joystick threshold is the value below which no JoystickMoved event
 will be generated.
<br><br>
 The threshold value is 0.1 by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float threshhold</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New threshold, in the range [0, 100]
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use set <code class="prettyprint">setJoystickThreshold</code> instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setKeyRepeatEnabled" id="RenderWindow.setKeyRepeatEnabled">void setKeyRepeatEnabled(bool enabled);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enable or disable automatic key-repeat.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If key repeat is enabled, you will receive repeated KeyPressed events
 while keeping a key pressed. If it is disabled, you will only get a
 single event when the key is pressed.
<br><br>
 Key repeat is enabled by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool enabled</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to enable, <code class="prettyprint">false</code> to disable
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setMouseCursorVisible" id="RenderWindow.setMouseCursorVisible">void setMouseCursorVisible(bool visible);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Show or hide the mouse cursor.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The mouse cursor is visible by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool visible</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> show the mouse cursor, <code class="prettyprint">false</code> to hide it
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setTitle" id="RenderWindow.setTitle">void setTitle(const(char)[] newTitle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the title of the window

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] newTitle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New title
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setTitle.2" id="RenderWindow.setTitle.2">void setTitle(const(wchar)[] newTitle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the title of the window

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(wchar)[] newTitle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New title
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setTitle.3" id="RenderWindow.setTitle.3">void setTitle(const(dchar)[] newTitle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the title of the window

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(dchar)[] newTitle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New title
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setVerticalSyncEnabled" id="RenderWindow.setVerticalSyncEnabled">void setVerticalSyncEnabled(bool enabled);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enable or disable vertical synchronization.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Activating vertical synchronization will limit the number of frames
 displayed to the refresh rate of the monitor. This can avoid some visual
 artifacts, and limit the framerate to a good value (but not constant
 across different computers).
<br><br>
 Vertical synchronization is disabled by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool enabled</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to enable v-sync, <code class="prettyprint">false</code> to deactivate it
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.setVisible" id="RenderWindow.setVisible">void setVisible(bool visible);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Show or hide the window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The window is shown by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool visible</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to show the window, <code class="prettyprint">false</code> to hide it
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.clear" id="RenderWindow.clear">void clear(Color color = Color.Black);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.close" id="RenderWindow.close">void close();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Close the window and destroy all the attached resources.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    After calling this function, the Window instance remains valid and you
 can call <code class="prettyprint">create()</code> to recreate the window. All other functions such as
 <code class="prettyprint">pollEvent()</code> or <code class="prettyprint">display()</code> will still work (i.e. you don't have to test
 <code class="prettyprint">isOpen()</code> every time), and will have no effect on closed windows.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.create" id="RenderWindow.create"><div class="deprecated_decl">deprecated void create(VideoMode mode, const(char)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init)</div>;
<br>
void create(VideoMode mode, const(wchar)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create (or recreate) the window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the window was already created, it closes it first. If style contains
 Window.Style.Fullscreen, then mode must be a valid video mode.
<br><br>
 The fourth parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">VideoMode mode</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Video mode to use (defines the width, height and depth of the
 rendering area of the window)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] title</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Title of the window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Style style</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window style, a bitwise OR combination of Style enumerators
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ContextSettings settings</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Additional settings for the underlying OpenGL context
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the version of create that takes a 'const(dchar)[]'.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.create.2" id="RenderWindow.create.2">void create(VideoMode mode, const(dchar)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create (or recreate) the window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the window was already created, it closes it first. If style contains
 Window.Style.Fullscreen, then mode must be a valid video mode.
<br><br>
 The fourth parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">VideoMode mode</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Video mode to use (defines the width, height and depth of the
 rendering area of the window)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(dchar)[] title</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Title of the window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Style style</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window style, a bitwise OR combination of Style enumerators
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ContextSettings settings</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Additional settings for the underlying OpenGL context
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.create.3" id="RenderWindow.create.3">void create(WindowHandle handle, ContextSettings settings = ContextSettings.init);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create (or recreate) the window from an existing control.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Use this function if you want to create an OpenGL rendering area into an
 already existing control. If the window was already created, it closes it
 first.
<br><br>
 The second parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">WindowHandle handle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Platform-specific handle of the control
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ContextSettings settings</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Additional settings for the underlying OpenGL context
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.capture" id="RenderWindow.capture"><div class="deprecated_decl">deprecated Image capture()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Copy the current contents of the window to an image

  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use a <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> and its <code class="prettyprint">Texture.update()</code> function and
 copy its contents into an <a class="dsfml_link" href="../graphics/image.php" title="Class for loading, manipulating and saving images.">Image</a> instead.
<br><br>
 This is a slow operation, whose main purpose is to make screenshots of
 the application. If you want to update an image with the contents of the
 window and then use it for drawing, you should rather use a
 <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> and its <code class="prettyprint">update()</code> function. You can also draw
 things directly to a texture with the <a class="dsfml_link" href="../graphics/rendertexture.php" title="Target for off-screen 2D rendering into a texture.">RenderTexture</a>
 class.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    An Image containing the captured contents.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.display" id="RenderWindow.display">void display();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Display on screen what has been rendered to the window so far.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is typically called after all OpenGL rendering has been
 done for the current frame, in order to show it on screen.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.draw" id="RenderWindow.draw">void draw(Drawable drawable, RenderStates states = RenderStates.init);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.draw.2" id="RenderWindow.draw.2">void draw(const(Vertex)[] vertices, PrimitiveType type, RenderStates states = RenderStates.init);
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.isOpen" id="RenderWindow.isOpen">const bool isOpen();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether or not the window is open.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns whether or not the window exists. Note that a
 hidden window (<code class="prettyprint">setVisible(false)</code>) is open (therefore this function would
 return <code class="prettyprint">true</code>).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if the window is open, <code class="prettyprint">false</code> if it has been closed
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.popGLStates" id="RenderWindow.popGLStates">void popGLStates();
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.pushGLStates" id="RenderWindow.pushGLStates">void pushGLStates();
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.resetGLStates" id="RenderWindow.resetGLStates">void resetGLStates();
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
 makes sure that all OpenGL states needed by DSFML are set, so that
 subsequent <code class="prettyprint">draw()</code> calls will work as expected.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.pollEvent" id="RenderWindow.pollEvent">bool pollEvent(ref Event event);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Pop the event on top of the event queue, if any, and return it.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is not blocking: if there's no pending event then it will
 return <code class="prettyprint">false</code> and leave event unmodified. Note that more than one event
 may be present in the event queue, thus you should always call this
 function in a loop to make sure that you process every pending event.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Event event</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Event to be returned
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
    <code class="prettyprint">true</code> if an event was returned, or <code class="prettyprint">false</code> if the event queue was
 empty.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderWindow.waitEvent" id="RenderWindow.waitEvent">bool waitEvent(ref Event event);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Wait for an event and return it.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is blocking: if there's no pending event then it will wait
 until an event is received. After this function returns (and no error
 occured), the event object is always valid and filled properly. This
 function is typically used when you have a thread that is dedicated to
 events handling: you want to make this thread sleep as long as no new
 event is received.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Event event</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Event to be returned
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
    <code class="prettyprint">false</code> if any error occurred.
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