<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Opening and managing a DSFML window</title>
    </head>
<body>
    <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
            <h1>Opening and managing a DSFML window</h1>
            <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
            <p class="para">
                This tutorial only explains how to open and manage a window.
                Drawing stuff is beyond the scope of the dsfml-window module:
                it is handled by the dsfml-graphics module. However, the window
                management remains exactly the same so reading this tutorial is
                important in any case.
            </p>
            <h2 id="opening-a-window"><a class ="anchor" href="#opening-a-window">Opening a window</a></h2>
            <p class="para">
                Windows in SFML are defined by the <a class="link" href="/doc/2_4/window/window.php">Window</a>
                class. A window can be created and opened directly upon
                construction:
            </p>
            <pre><code class="prettyprint">
import dsfml.window;

int main()
{
    auto window = new Window(VideoMode(800, 600), "My window");

    ...

    return 0;
}</code></pre>
            <p></p>
            <p class="para">
                The first argument, the video mode, defines the size of the
                window (the inner size, without the title bar and borders).
                Here, we create a window with a size of 800x600 pixels. The
                <a class="link" href="/doc/2_4/window/videomode.php">VideoMode</a>
                class has some interesting static functions to get the desktop
                resolution, or the list of valid video modes for fullscreen mode.
                Don't hesitate to have a look at its documentation.
            </p>
            <p class="para">
                The second argument is simply the title of the window.
            </p>
            <p class="para">
                This constructor accepts a third optional argument: a style,
                which allows you to choose which decorations and features you
                want. You can use any combination of the following styles:
            </p>
            <table style="width:100%">
                <tr>
                    <td><code class="cl">Window.Style.None</code></td>
                    <td>No decoration at all (useful for splash screens, for example); this style cannot be combined with others</td>
                </tr>
                <tr>
                    <td><code class="cl">Window.Style.Titlebar</code></td>
                    <td>The window has a titlebar</td>
                </tr>
                <tr>
                    <td><code class="cl">Window.Style.Resize</code></td>
                    <td>The window can be resized and has a maximize button</td>
                </tr>
                <tr>
                    <td><code class="cl">Window.Style.Close</code></td>
                    <td>The window has a close button</td>
                </tr>
                <tr>
                    <td><code class="cl">Window.Style.Fullscreen</code></td>
                    <td>The window is shown in fullscreen mode; this style cannot be combined with others, and requires a valid video mode</td>
                </tr>
                <tr>
                    <td><code class="cl">Window.Style.Default</code></td>
                    <td>The default style, which is a shortcut for <code class="cl">Titlebar | Resize | Close</code></td>
                </tr>
            </table>
            <p></p>
            <p class="para">
                There's also a fourth optional argument, which defines OpenGL
                specific options which are explained in the <a class="link" href="/tutorials/2_4/opengl.php">dedicated OpenGL tutorial</a>.
            </p>
            <p class="para">
                If you want to create the window after the construction of the
                <a class="link" href="/doc/2_4/window/window.php">Window</a>
                instance, or re-create it with a different video mode or title,
                you can use the create function instead. It takes the exact same
                arguments as the constructor.
            </p>
            <pre><code class="prettyprint">
import dsfml.window;

int main()
{
    auto window = new Window();
    window.create(VideoMode(800, 600), "My window");

    ...

    return 0;
}</code></pre>
            <h2 id="bringing-the-window-to-life"><a class="anchor" href="#bringing-the-window-to-life">Bringing the window to life</a></h2>
            <p class="para">
                If you try to execute the code above with nothing in place of
                the "...", you will hardly see something. First, because the
                program ends immediately. Second, because there's no event
                handling -- so even if you added an endless loop to this code,
                you would see a dead window, unable to be moved, resized, or
                closed.
            </p>
            <p class="para">
                Let's add some code to make this program a bit more interesting:
            </p>
            <pre><code class="prettyprint">
import dsfml.window;

int main()
{
    auto window = new Window(VideoMode(800, 600), "My window");

    // run the program as long as the window is open
    while (window.isOpen())
    {
        // check all the window's events that were triggered since the last iteration of the loop
        Event event;
        while (window.pollEvent(event))
        {
            // "close requested" event: we close the window
            if (event.type == Event.EventType.Closed)
                window.close();
        }
    }

    return 0;
}</code></pre>
            <p></p>
            <p class="para">
                The above code will open a window, and terminate when the user
                closes it. Let's see how it works in detail.
            </p>
            <p class="para">
                First, we added a loop that ensures that the application will be
                refreshed/updated until the window is closed. Most (if not all)
                DSFML programs will have this kind of loop, sometimes called the
                main loop or game loop.
            </p>
            <p class="para">
                Then, the first thing that we want to do inside our game loop is
                check for any events that occurred. Note that we use a while
                loop so that all pending events are processed in case there
                were several. The <code class="cl">pollEvent</code> function
                returns <code class="cl">true</code> if an event was pending,
                or <code class="cl">false</code> if there was none.
            </p>
            <p class="para">
                Whenever we get an event, we must check its type (window closed?
                key pressed? mouse moved? joystick connected? ...), and react
                accordingly if we are interested in it. In this case, we only
                care about the <p class="para">Event.EventType.Closed</code>
                event, which is triggered when the user wants to close the
                window. At this point, the window is still open and we have to
                close it explicitly with the close function. This enables you to
                do something before the window is closed, such as saving the
                current state of the application, or displaying a message.
            </p>
            <p class="important">
                A mistake that people often make is to forget the event loop,
                simply because they don't yet care about handling events (they
                use real-time inputs instead). Without an event loop, the window
                will become unresponsive. It is important to note that the event
                loop has two roles: in addition to providing events to the user,
                it gives the window a chance to process its internal events too,
                which is required so that it can react to move or resize user
                actions.
            </p>
            <p class="para">
                After the window has been closed, the main loop exits and the
                program terminates.
            </p>
            <p class="para">
                At this point, you probably noticed that we haven't talked about
                drawing something to the window yet. As stated in the
                introduction, this is not the job of the dsfml-window module,
                and you'll have to jump to the dsfml-graphics tutorials if you
                want to draw things such as sprites, text or shapes.
            </p>
            <p class="para">
                To draw stuff, you can also use OpenGL directly and totally
                ignore the sfml-graphics module. <a class="link" href="/doc/2_4/window/window.php">Window</a>
                internally creates an OpenGL context and is ready to accept your
                OpenGL calls. You can learn more about that in the <a class="link" href="/tutorials/2_4/opengl.php">corresponding tutorial<a>.
            </p>
            <p class="para">
                Don't expect to see something interesting in this window: you
                may see a uniform color (black or white), or the last contents
                of the previous application that used OpenGL, or... something
                else.
            </p>
            <h2 id="playing-with-the-window"><a class="anchor" href="#playing-with-the-window">Playing with the window</a></h2>
            <p class="para">
                Of course, DSFML allows you to play with your windows a bit.
                Basic window operations such as changing the size, position,
                title or icon are supported, but unlike dedicated GUI libraries
                (Qt, wxWidgets), DSFML doesn't provide advanced features. DSFML
                windows are only meant to provide an environment for OpenGL or
                DSFML drawing.
            </p>
            <pre><code class="prettyprint">
// change the position of the window (relatively to the desktop)
window.position = Vector2i(10, 50);

// change the size of the window
window.size = Vector2u(640, 480);

// change the title of the window
window.setTitle("DSFML window");

// get the size of the window
Vector2u size = window.size;
uint width = size.x;
uint height = size.y;

...</code></pre>
<p></p>
            <p class="para">
                You can refer to the API documentation for a complete list of
                <a class="link" href="/doc/2_4/window/window.php">Window</a>'s
                functions.
            </p>
            <p class="para">
                In case you really need advanced features for your window, you
                can create one (or even a full GUI) with another library, and
                embed DSFML into it. To do so, you can use the other
                constructor, or create function, of <a class="link" href="/doc/2_4/window/window.php">Window</a>
                which takes the OS-specific handle of an existing window. In
                this case, DSFML will create a drawing context inside the given
                window and catch all its events without interfering with the
                parent window management.
            </p>
            <pre><code class="prettyprint">
WindowHandle handle = /* specific to what you're doing and the library you're using */;
auto window = new Window(handle);</code></pre>
            <p></p>
            <p class="para">
                If you just want an additional, very specific feature, you can
                also do it the other way round: create a DSFML window, and get
                its OS-specific handle to implement things that DSFML doesn't
                support.
            </p>
            <pre><code class="prettyprint">
auto window = Window(VideoMode(800, 600), "DSFML window");
WindowHandle handle = window.getSystemHandle();

// you can now use the handle with OS specific functions</code></pre>
            <p></p>
            <p class="para">
                Integrating DSFML with other libraries requires some work and
                won't be described here, but you can refer to the dedicated
                tutorials, examples or forum posts.
            </p>
            <h2 id="controlling-the-framerate"><a class ="anchor" href="#controlling-the-framerate">Controlling the framerate</a></h2>
            <p class="para">
                Sometimes, when your application runs fast, you may notice
                visual artifacts such as tearing. The reason is that your
                application's refresh rate is not synchronized with the vertical
                frequency of the monitor, and as a result, the bottom of the
                previous frame is mixed with the top of the next one.

                The solution to this problem is to activate vertical
                synchronization. It is automatically handled by the graphics
                card, and can easily be switched on and off with the
                <code class="cl">setVerticalSyncEnabled</code> function:
            </p>
            <pre><code class="prettyprint">
window.setVerticalSyncEnabled(true); // call it once, after creating the window</code></pre>
            <p></p>
            <p class="para">
                After this call, your application will run at the same frequency
                as the monitor's refresh rate.
            </p>
            <p class="important">
                Sometimes <code>setVerticalSyncEnabled</code> will have no effect: this is
                most likely because vertical synchronization is forced to "off"
                in your graphics driver's settings. It should be set to
                "controlled by application" instead.
            </p>
            <p class="para">
                In other situations, you may also want your application to run
                at a given framerate, instead of the monitor's frequency. This
                can be done by calling <code class="cl">setFramerateLimit</code>:
            </p>
            <pre><code class="prettyprint">
window.setFramerateLimit(60); // call it once, after creating the window</code></pre>
            <p></p>
            <p class="para">
                Unlike <code class="cl">setVerticalSyncEnabled</code>, this
                feature is implemented by DSFML itself, using a combination of
                <a class="link" href="/doc/2_4/system/clock.php">Clock</a> and 
                <a class="link" href="/doc/2_4/system/sleep.php">sleep</a>. An
                important consequence is that it is not 100% reliable,
                especially for high framerates: <a class="link" href="/doc/2_4/system/sleep.php">sleep</a>'s
                resolution depends on the underlying operating system and
                hardware, and can be as high as 10 or 15 milliseconds. Don't
                rely on this feature to implement precise timing.
            </p>
            <p class="important">
                Never use both <code>setVerticalSyncEnabled</code> and
                <code>setFramerateLimit</code> at the same time! They would
                badly mix and make things worse.
            </p>
            <h2 id="things-to-know-about-windows"><a class ="anchor" href="#things-to-know-about-windows">Things to know about windows</a></h2>
            <p class="para">
                Here is a brief list of what you can and cannot do with SFML windows.
            </p>
            <h3>You can create multiple windows</h3>
            <p class="para">
                DSFML allows you to create multiple windows, and to handle them
                either all in the main thread, or each one in its own thread
                (but... see below). In this case, don't forget to have an event
                loop for each window.
            </p>
            <h3>Multiple monitors are not correctly supported yet</h3>
            <p class="para">
                DSFML doesn't explicitly manage multiple monitors. As a
                consequence, you won't be able to choose which monitor a window
                appears on, and you won't be able to create more than one
                fullscreen window. This should be improved in a future version.
            </p>
            <h3>Events must be polled in the window's thread</h3>
            <p class="para">
                This is an important limitation of most operating systems: the
                event loop (more precisely, the <code class="cl">pollEvent</code>
                or <code class="cl">waitEvent</code> function) must be called in
                the same thread that created the window. This means that if you
                want to create a dedicated thread for event handling, you'll
                have to make sure that the window is created in this thread too.
                If you really want to split things between threads, it is more
                convenient to keep event handling in the main thread and move
                the rest (rendering, physics, logic, ...) to a separate thread
                instead. This configuration will also be compatible with the
                other limitation described below.
            </p>
            <h3>On macOS, windows and events must be managed in the main thread</h3>
            <p class="para">
                Yep, that's true; macOS just won't agree if you try to create a
                window or handle events in a thread other than the main one.
            </p>
            <h3>On Windows, a window which is bigger than the desktop will not behave correctly</h3>
            <p class="para">
                For some reason, Windows doesn't like windows that are bigger
                than the desktop. This includes windows created with
                <code class="cl">VideoMode.getDesktopMode()</code>: with the
                window decorations (borders and titlebar) added, you end up with
                a window which is slightly bigger than the desktop.
            </p>
        </div>
    </div>
    <?php include '../../footer.php'?>
</body>
</html>