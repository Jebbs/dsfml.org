<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Using OpenGL in a DSFML window</title>
    </head>
<body>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'?>
        <div class="inner" class="content">
          <h1>Using OpenGL in a DSFML window</h1>
          <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
          <p class="para">
          This tutorial is not about OpenGL itself, but rather how to use
          DSFML as an environment for OpenGL, and how to mix them together.
          </p>
          <p class="para">
          As you know, one of the most important features of OpenGL is
          portability. But OpenGL alone won't be enough to create complete
          programs: you need a window, a rendering context, user input, etc.
          You would have no choice but to write OS-specific code to handle
          this stuff on your own. That's where the dsfml-window module comes
          into play. Let's see how it allows you to play with OpenGL.
          </p>
          <h2 id="including-and-linking-opengl-to-your-application"><a class ="anchor" href="#including-and-linking-opengl-to-your-application">Including and linking OpenGL to your application</a></h2>
          <p class="para">
          DSFML does not provide direct access to OpenGL. In order to use
          OpenGL in your DSFML program, you need to use an existing binding
          (like <a class="link" href="https://github.com/DerelictOrg/DerelictGL3">DerelictGL3</a>)
          or you'll need to roll your own.
          </p>
          <p class="para">
          Depending on your approach, you may need to link with the OpenGL
          library, which is depending on the operating system you're using
          ("opengl32" on Windows, "GL" on Linux, etc.).
          </p>
          <p class="para">
          This tutorial does not focus on how to set up OpenGL for use in your
          DSFML program, but will instead assume that this is already taken
          care of and you can call these functions without issue.
          </p>
          <h2 id="creating-an-opengl-window"><a class ="anchor" href="#creating-an-opengl-window">Creating an OpenGL window</a></h2>
          <p class="para">
          Since DSFML is based on OpenGL, its windows are ready for OpenGL calls
          without any extra effort.
          </p>
          <pre><code class="prettyprint lang-java">
auto window = new Window(VideoMode(800, 600), "OpenGL");

// it works out of the box
glEnable(GL_TEXTURE_2D);
...</code></pre><p></p>
          <p class="para">
          In case you think it is <em>too</em> automatic, <a class="link" href="/doc/2_4/window/window.php">Window</a>'s
          constructor has an extra argument that allows you to change the
          settings of the underlying OpenGL context. This argument is an
          instance of the <a class="link" href="/doc/2_4/window/contextsettings.php">ContextSettings</a>
          structure, it provides access to the following settings:
          </p>
          <ul>
                  <li><code class="cl">depthBits</code> is the number of bits per pixel to use for the depth buffer (0 to disable it)</li>
                  <li><code class="cl">stencilBits</code> is the number of bits per pixel to use for the stencil buffer (0 to disable it)</li>
                  <li><code class="cl">antialiasingLevel</code> is the multisampling level</li>
                  <li><code class="cl">majorVersion</code> and <code class="cl">minorVersion</code> comprise the requested version of OpenGL</li>
          </ul><p></p>
          <pre><code class="prettyprint lang-java">
ContextSettings settings;
settings.depthBits = 24;
settings.stencilBits = 8;
settings.antialiasingLevel = 4;
settings.majorVersion = 3;
settings.minorVersion = 0;

auto window = new Window(VideoMode(800, 600), "OpenGL", Window.Style.Default, settings);</code></pre><p></p>
          <p class="para">
          If any of these settings is not supported by the graphics card, DSFML tries to
          find the closest valid match. For example, if 4x anti-aliasing is too high, it
          tries 2x and then falls back to 0.<br>
          In any case, you can check what settings DSFML actually used with the
          <code class="cl">getSettings</code> function:
          </p>
          <pre><code class="prettyprint lang-java">
auto settings = window.getSettings();

writeln("depth bits:", settings.depthBits);
writeln("stencil bits:", settings.stencilBits);
writeln("antialiasing level:", settings.antialiasingLevel);
writeln("version:", settings.majorVersion, ".", settings.minorVersion)</code></pre><p></p>
        <p class="important">
        OpenGL versions above 3.0 are supported by SFML (as long as your
        graphics driver can handle them). Support for selecting the profile of
        3.2+ contexts and whether the context debug flag is set was added in
        SFML 2.3. The forward compatibility flag is not supported. By default,
        DSFML creates 3.2+ contexts using the compatibility profile because the
        graphics module makes use of legacy OpenGL functionality. If you intend
        on using the graphics module, make sure to create your context without
        the core profile setting or the graphics module will not function
        correctly. On OS X, DSFML supports creating OpenGL 3.2+ contexts using
        the core profile only. If you want to use the graphics module on OS X,
        you are limited to using a legacy context which implies OpenGL version
        2.1.
        </p>
        <h2 id="a-typical-opengl-with-dsfml-program"><a class ="anchor" href="#a-typical-opengl-with-dsfml-program">A typical OpenGL-with-DSFML program</a></h2>
        <p class="para">
        Here is what a (mostly) complete OpenGL program would look like with
        DSFML:
        </p>
        <pre><code class="prettyprint lang-java">
import dsfml.window;
// import OpenGL functions

int main()
{
    // create the window
    auto window = new Window(VideoMode(800, 600), "OpenGL",
                             Window.Style.Default, ContextSettings(32));
    window.setVerticalSyncEnabled(true);

    // activate the window
    window.setActive(true);

    // load resources, initialize the OpenGL states, ...

    // run the main loop
    bool running = true;
    while (running)
    {
        // handle events
        Event event;
        while (window.pollEvent(event))
        {
            if (event.type == Event.EventType.Closed)
            {
                // end the program
                running = false;
            }
            else if (event.type == Event.EventType.Resized)
            {
                // adjust the viewport when the window is resized
                glViewport(0, 0, event.size.width, event.size.height);
            }
        }

        // clear the buffers
        glClear(GL_COLOR_BUFFER_BIT | GL_DEPTH_BUFFER_BIT);

        // draw...

        // end the current frame (internally swaps the front and back buffers)
        window.display();
    }

    // release resources...

    return 0;
}</code></pre><p></p>
        <p class="para">
        Here we don't use <code class="cl">window.isOpen()</code> as the
        condition of the main loop, because we need the window to remain open
        until the program ends, so that we still have a valid OpenGL context for
        the last iteration of the loop and the cleanup code.
        </p>
        <p class="para">
        Don't hesitate to have a look at the "OpenGL" and "Window" examples in
        the SFML SDK if you have further problems, they are more complete and
        most likely contain solutions to your problems.
        </p>
        <h2 id="managing-opengl-contexts"><a class ="anchor" href="#managing-opengl-contexts">Managing OpenGL contexts</a></h2>
        <p class="para">
        Every window created in DSFML automatically comes with an OpenGL context.
        When calling any OpenGL functions, they operate on the currently active
        context. It is thus required that a context be active any time OpenGL
        functions are called. If a context is not active when an OpenGL function
        is called, the function call will not result in the desired effects
        since there is no state for it to have an effect on.
        </p>
        <p class="para">
        In order to activate a window's context, use <code class="cl">window.setActive()</code>
        which is the same as <code class="cl">window.setActive(true)</code>.
        Activating a context while another is currently active will result in
        the currently active one being implicitly deactivated before the new one
        is activated. In order to explicitly deactivate a window's context, use
        <code class="cl">window.setActive(false)</code>. This is required if the
        context is to be activated on another thread as explained later on.
        Generally however, it is recommended to simply deactivate the context
        every time you are done with a batch of OpenGL operations. Following
        this advice, each batch of operations would be visibly wrapped between
        activation and deactivation calls. A RAII helper struct can be written
        for this purpose.
        </p>
        <pre><code class="prettyprint">
// activate the window's context
window.setActive(true);

// set up OpenGL states
// clear framebuffers
// draw to the window

// deactivate the window's context
window.setActive(false);</code></pre><p></p>  
          <p class="important">
          When debugging issues with OpenGL in DSFML, the first step is always
          to make sure a context is active when OpenGL functions are called. Do
          not assume that DSFML will implicitly activate a context or that DSFML
          will preserve the currently active context when calling into the
          library. The only guarantee provided is that the context active on the
          current thread will not change between calls to <code class="cl">window.setActive(true)</code>
          and <code class="cl">window.setActive(false)</code> as long as no
          other calls are made into the library in between. In all other cases,
          it has to be assumed that the current context might have changed, so
          explicitly reactivating the previously active context is required to
          guarantee the previously active context is once again active. Also
          ensure that the right context is active when an OpenGL function is
          called. The active context not only provides an execution environment
          for OpenGL operations, it also designates the destination framebuffer
          of any draw commands. Calling OpenGL draw functions while a context
          without a visible framebuffer is active will result in those draw
          commands not producing any visible output. Splitting OpenGL operations
          among multiple contexts will also result in the state changes being
          spread across the contexts. If any subsequent draw operation assumes
          that certain states are set, it will not produce the correct results
          in this case.
          </p>
          <p class="important">
          A highly recommended practice when writing OpenGL code is to always
          check if any OpenGL errors were produced after every OpenGL function
          call. This is done via the <code class="cl">glGetError()</code>
          function. Checking for errors after every function call will help to
          narrow down where a possible error might have occurred and improve
          debugging efficiency significantly.
          </p>
          <p class="para">
          Depending on the version and capabilities of the context available,
          care has to be taken to only call functions that are actually valid
          within the current context. Doing otherwise will often result in the
          <code class="cl">GL_INVALID_OPERATION</code> or
          <code class="cl">GL_INVALID_ENUM</code> errors being generated. To
          query the actual version and capabilities of a context created with a
          window or separately, use <code class="cl">window.getSettings()</code>
          or <code class="cl">context.getSettings()</code> respectively. Be
          aware that these settings might differ from the settings passed during
          creation of the context if the OpenGL implementation was not able to
          meet all the requirements. It is recommended to always check if the
          context created actually provides the functionality required by the
          OpenGL code to be executed. This can become confusing when loading
          OpenGL extensions in a more capable context and trying to use them in
          a less capable context or vice versa.
          </p>
          <h2 id="managing-multiple-opengl-windows"><a class ="anchor" href="#managing-multiple-opengl-windows">Managing multiple OpenGL windows</a></h2>
          <p class="para">
          Managing multiple OpenGL windows is not more complicated than
          managing one, there are just a few things to keep in mind.
          </p>
          <p class="para">
          OpenGL calls are made on the active context (thus the active window).
          Therefore if you want to draw to two different windows within the same
          program, you have to select which window is active before drawing
          something. This can be done with the <code class="cl">setActive</code>
          function:
          </p>
          <pre><code class="prettyprint">
// activate the first window
window1.setActive(true);

// draw to the first window...

// activate the second window
window2.setActive(true);

// draw to the second window...</code></pre><p></p>
          <p class="para">
          Only one context (window) can be active in a thread, so you don't need
          to deactivate a window before activating another one, it is
          deactivated automatically. This is how OpenGL works.
          </p>
          <p class="para">
          Another thing to know is that all the OpenGL contexts created by DSFML
          share their resources. This means that you can create a texture or
          vertex buffer with any context active, and use it with any other. This
          also means that you don't have to reload all your OpenGL resources
          when you recreate your window. Only shareable OpenGL resources can be
          shared among contexts. An example of an unshareable resource is a
          vertex array object.
          </p>
          <h2 id="opengl-without-a-window"><a class ="anchor" href="#opengl-without-a-window">OpenGL without a window</a></h2>
          <p class="para">
          Sometimes it might be necessary to call OpenGL functions without an
          active window, and thus no OpenGL context. For example, when you load
          textures from a separate thread, or before the first window is created.
          DSFML allows you to create window-less contexts with the
          <a class="link" href="/doc/2_4/window/context.php">Context</a> class.
          All you have to do is instantiate it to get a valid context.
          </p>
          <pre><code class="prettyprint">
int main()
{
    auto context = new Context();

    // load OpenGL resources...

    auto window = new Window(VideoMode(800, 600), "OpenGL");

    ...

    return 0;
}</code></pre><p></p>
          <h2 id="rendering-from-threads"><a class ="anchor" href="#rendering-from-threads">Rendering from threads</a></h2>
          <p class="para">
          A typical configuration for a multi-threaded program is to handle the
          window and its events in one thread (the main one), and rendering in
          another one. If you do so, there's an important rule to keep in mind:
          you can't activate a context (window) if it's active in another
          thread. This means that you have to deactivate your window before
          launching the rendering thread.
          </p>
          <pre><code class="prettyprint">
// global variable to be accessed by the thread
shared(Window) window;

void renderingThread()
{
    // activate the window's context
    window.setActive(true);

    // the rendering loop
    while (window.isOpen())
    {
        // draw...

        // end the current frame -- this is a rendering function
        // (it requires the context to be active)
        window.display();
    }
}

int main()
{
    // create the window (remember: it's safer to create it in the main thread
    // due to OS limitations)
    window = new Window(VideoMode(800, 600), "OpenGL");

    // deactivate its OpenGL context
    window.setActive(false);

    // launch the rendering thread
    auto thread = new Thread(&renderingThread);
    thread.start();

    // the event/logic/whatever loop
    while (window.isOpen())
    {
        ...
    }

    return 0;
}</code></pre><p></p>
          <h2 id="using-opengl-together-with-the-graphics-module"><a class ="anchor" href="#using-opengl-together-with-the-graphics-module">Using OpenGL together with the graphics module</a></h2>
          <p class="para">
          This tutorial was about mixing OpenGL with dsfml-window, which is
          fairly easy since it's the only purpose of this module. Mixing with
          the graphics module is a little more complicated: dsfml-graphics uses
          OpenGL too, so extra care must be taken so that DSFML and user states
          don't conflict with each other.
          </p>
          <p class="para">
          If you don't know the graphics module yet, all you have to know is
          that the <a class="link" href="/doc/2_4/window/window.php">Window</a>
          class is replaced with <a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>,
          which inherits all its functions and adds features to draw DSFML
          specific entities.
          </p>
          <p class="para">
          The only way to avoid conflicts between DSFML and your own OpenGL
          states, is to save/restore them every time you switch from OpenGL to
          DSFML.
          </p>
          <pre><code class="prettyprint">
- draw with OpenGL

- save OpenGL states

- draw with SFML

- restore OpenGL states

- draw with OpenGL

...</code></pre><p></p>
          <p class="para">
          The easiest solution is to let SFML do it for you, with the
          <code class="cl">pushGLStates</code>/<code class="cl">popGLStates</code>
          functions:
          </p>
          <pre><code class="prettyprint">
glDraw...

window.pushGLStates();

window.draw(...);

window.popGLStates();

glDraw...</code></pre><p></p>
          <p class="para">
          Since it has no knowledge about your OpenGL code, DSFML can't optimize
          these steps and as a result it saves/restores all available OpenGL
          states and matrices. This may be acceptable for small projects, but it
          might also be too slow for bigger programs that require maximum
          performance. In this case, you can handle saving and restoring the
          OpenGL states yourself, with <code class="cl">glPushAttrib</code>/<code class="cl">glPopAttrib</code>,
          <code class="cl">glPushMatrix</code>/<code class="cl">glPopMatrix</code>,
          etc.
          </p>
          <p class="para">
          If you do this, you'll still need to restore DSFML's own states before
          drawing. This is done with the <code class="cl">resetGLStates</code>
          function.
          </p>
          <pre><code class="prettyprint">
glDraw...

glPush...
window.resetGLStates();

window.draw(...);

glPop...

glDraw...</code></pre><p></p>
          <p class="para">
          By saving and restoring OpenGL states yourself, you can manage only
          the ones that you really need which leads to reducing the number of
          unnecessary driver calls.
          </p>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'?>
</body>
</html>