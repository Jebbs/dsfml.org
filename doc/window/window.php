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
      <title>DSFML - dsfml.window.window</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.window.window</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Window</u> is the main class of the Window module. It defines an OS window
 that is able to receive an OpenGL rendering.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    A <u>Window</u> can create its own new window, or be embedded into an already
 existing control using the create(handle) function. This can be useful for
 embedding an OpenGL rendering area into a view which is part of a bigger GUI
 with existing windows, controls, etc. It can also serve as embedding an
 OpenGL rendering area into a window created by another (probably richer) GUI
 library like Qt or wxWidgets.
<br><br>
 The <u>Window</u> class provides a simple interface for manipulating the
 window: move, resize, show/hide, control mouse cursor, etc. It also provides
 event handling through its <code class="prettyprint">pollEvent()</code> and <code class="prettyprint">waitEvent()</code> functions.
<br><br>
 Note that OpenGL experts can pass their own parameters (antialiasing level
 bits for the depth and stencil buffers, etc.) to the OpenGL context attached
 to the window, with the <a class="dsfml_link" href="../window/contextsettings.php" title="Structure defining the settings of the OpenGL context attached to a window.">ContextSettings</a> structure which is passed as
 an optional argument when creating the window.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare and create a new window
auto <span class="psymbol">window</span> = new Window(VideoMode(800, 600), "DSFML window");

// Limit the framerate to 60 frames per second (this step is optional)
<span class="psymbol">window</span>.setFramerateLimit(60);

// The main loop - ends as soon as the window is closed
while (<span class="psymbol">window</span>.isOpen())
{
   // Event processing
   Event event;
   while (<span class="psymbol">window</span>.pollEvent(event))
   {
       // Request for closing the window
       if (event.type == Event.EventType.Closed)
           <span class="psymbol">window</span>.close();
   }

   // Activate the window for OpenGL rendering
   <span class="psymbol">window</span>.setActive();

   // OpenGL drawing commands go here...

   // End the current frame and display its contents on screen
   <span class="psymbol">window</span>.display();
}
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window" id="Window">class Window;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Window that serves as a target for OpenGL rendering.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.Style" id="Window.Style">enum Style: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Choices for window style
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.this" id="Window.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.this.2" id="Window.this.2">this(T)(VideoMode mode, immutable(T)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init) if (is(T == dchar) || is(T == wchar) || is(T == char));
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
 behaviour of the window (borders, title bar, resizable, closable, ...).
 If style contains Style::Fullscreen, then mode must be a valid video
 mode.
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
  <code class="prettyprint">immutable(T)[] title</code>
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
      Window style
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.this.3" id="Window.this.3">this(WindowHandle handle, ContextSettings settings = ContextSettings.init);
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
    Use this constructor if you want to create an OpenGL rendering area into
 an already existing control.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.position" id="Window.position">@property Vector2i position(Vector2i newPosition);
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
    Get's or set's the window's position.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function only works for top-level windows (i.e. it will be ignored
 for windows created from the handle of a child window/control).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.size" id="Window.size">@property Vector2u size(Vector2u newSize);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get's or set's the window's size.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setActive" id="Window.setActive">bool setActive(bool active);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Activate or deactivate the window as the current target for OpenGL
 rendering.

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
    <code class="prettyprint">true</code> if operation was successful, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.requestFocus" id="Window.requestFocus">void requestFocus();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request the current window to be made the active foreground window.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.hasFocus" id="Window.hasFocus">const bool hasFocus();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check whether the window has the input focus

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if the window has focus, <code class="prettyprint">false</code> otherwise
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setFramerateLimit" id="Window.setFramerateLimit">void setFramerateLimit(uint limit);
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
 display() to ensure that the current frame lasted long enough to match
 the framerate limit. SFML will try to match the given limit as much as it
 can, but since it internally uses dsfml.system.sleep, whose precision
 depends on the underlying OS, the results may be a little unprecise as
 well (for example, you can get 65 FPS when requesting 60).


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
      Framerate limit, in frames per seconds (use 0 to disable limit).
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setIcon" id="Window.setIcon">void setIcon(uint width, uint height, const(ubyte[]) pixels);
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
      Pointer to the array of pixels in memory
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setJoystickThreshold" id="Window.setJoystickThreshold">void setJoystickThreshold(float threshold);
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
      New threshold, in the range [0, 100].
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setJoystickThreshhold" id="Window.setJoystickThreshhold"><div class="deprecated_decl">deprecated void setJoystickThreshhold(float threshhold)</div>;
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
      New threshold, in the range [0, 100].
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setKeyRepeatEnabled" id="Window.setKeyRepeatEnabled">void setKeyRepeatEnabled(bool enabled);
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
      <code class="prettyprint">true</code> to enable, <code class="prettyprint">false</code> to disable.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setMouseCursorVisible" id="Window.setMouseCursorVisible">void setMouseCursorVisible(bool visible);
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
      <code class="prettyprint">true</code> to show the mouse cursor, <code class="prettyprint">false</code> to hide it.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setTitle" id="Window.setTitle"><div class="deprecated_decl">deprecated void setTitle(const(char)[] newTitle)</div>;
<br>
<div class="deprecated_decl">deprecated void setTitle(const(wchar)[] newTitle)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the title of the window.

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
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the version of setTitle that takes a 'const(dchar)[]'.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setTitle.2" id="Window.setTitle.2">void setTitle(const(dchar)[] newTitle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the title of the window.

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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setVisible" id="Window.setVisible">void setVisible(bool visible);
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.setVerticalSyncEnabled" id="Window.setVerticalSyncEnabled">void setVerticalSyncEnabled(bool enabled);
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.getSettings" id="Window.getSettings">const ContextSettings getSettings();
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
 constructor or the create() function, if one or more settings were not
 supported. In this case, SFML chose the closest match.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Structure containing the OpenGL context settings.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.getSystemHandle" id="Window.getSystemHandle">const WindowHandle getSystemHandle();
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
    The type of the returned handle is sf::WindowHandle, which is a typedef
 to the handle type defined by the OS. You shouldn't need to use this
 function, unless you have very specific stuff to implement that SFML
 doesn't support, or implement a temporary workaround until a bug is
 fixed.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    System handle of the window.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.close" id="Window.close">void close();
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
 can call create() to recreate the window. All other functions such as
 pollEvent() or display() will still work (i.e. you don't have to test
 isOpen() every time), and will have no effect on closed windows.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.create" id="Window.create"><div class="deprecated_decl">deprecated void create(VideoMode mode, const(char)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init)</div>;
<br>
<div class="deprecated_decl">deprecated void create(VideoMode mode, const(wchar)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init)</div>;
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
 Style.Fullscreen, then mode must be a valid video mode.
<br><br>
 The fourth parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc.


  </p>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.create.2" id="Window.create.2">void create(VideoMode mode, const(dchar)[] title, Style style = Style.DefaultStyle, ContextSettings settings = ContextSettings.init);
<br>
void create(WindowHandle handle, ContextSettings settings = ContextSettings.init);
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
 Style.Fullscreen, then mode must be a valid video mode.
<br><br>
 The fourth parameter is an optional structure specifying advanced OpenGL
 context settings such as antialiasing, depth-buffer bits, etc.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.display" id="Window.display">void display();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.isOpen" id="Window.isOpen">const bool isOpen();
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
 hidden window (setVisible(<code class="prettyprint">false</code>)) is open (therefore this function would
 return <code class="prettyprint">true</code>).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if the window is open, <code class="prettyprint">false</code> if it has been closed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Window.pollEvent" id="Window.pollEvent">bool pollEvent(ref Event event);
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
      Event to be returned.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Window.waitEvent" id="Window.waitEvent">bool waitEvent(ref Event event);
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
    False if any error occured.
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