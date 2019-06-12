<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Drawing 2D stuff</title>
    </head>
<body>
    <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <h1>Drawing 2D stuff</h1>
          <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
          <p class="para">
          As you learned in the previous tutorials, DSFML's window module
          provides an easy way to open an OpenGL window and handle its events,
          but it doesn't help when it comes to drawing something. The only
          option which is left to you is to use the powerful, yet complex and
          low level OpenGL API.
          </p>
          <p class="para">
          Fortunately, DSFML provides a graphics module which will help you draw
          2D entities in a much simpler way than with OpenGL.
          </p>
          <h2 id="the-drawing-window"><a class ="anchor" href="#the-drawing-window">The drawing window</a></h2>
          <p class="para">
          To draw the entities provided by the graphics module, you must use a
          specialized window class: <a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>.
          This class is derived from <a class="link" href="/doc/2_4/window/window.php">Window</a>,
          and inherits all its functions. Everything that you've learnt about
          <a class="link" href="/doc/2_4/window/window.php">Window</a> (creation,
          event handling, controlling the framerate, mixing with OpenGL, etc.)
          is applicable to <a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>
          as well.
          </p>
          <p class="para">
          On top of that, <a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>
          adds high-level functions to help you draw things easily. In this
          tutorial we'll focus on two of these functions: <code class="cl">clear</code>
          and <code class="cl">draw</code>. They are as simple as their name
          implies: <code class="cl">clear</code> clears the whole window with
          the chosen color, and <code class="cl">draw</code> draws whatever
          object you pass to it.
          </p>
          <p class="para">
          Here is what a typical main loop looks like with a render window:
          </p>
          <pre><code class="prettyprint">
import dsfml.graphics;

void main()
{
    // create the window
    auto window = new RenderWindow(VideoMode(800, 600), "My window");

    // run the program as long as the window is open
    while (window.isOpen())
    {
        // check all the window's events that were triggered since the last iteration
        Event event;
        while (window.pollEvent(event))
        {
            // "close requested" event: we close the window
            if (event.type == Event.EventType.Closed)
                window.close();
        }

        // clear the window with black color
        window.clear(Color.Black);

        // draw everything here...
        // window.draw(...);

        // end the current frame
        window.display();
    }
}</code></pre><p></p>
          <p class="para">
          Calling <code class="cl">clear</code> before drawing anything is
          mandatory, otherwise the contents from previous frames will be present
          behind anything you draw. The only exception is when you cover the
          entire window with what you draw, so that no pixel is not drawn to.
          In this case you can avoid calling <code class="cl">clear</code>
          (although it won't have a noticeable impact on performance).
          </p>
          <p class="para">
          Calling <code class="cl">display</code> is also mandatory, it takes
          what was drawn since the last call to display and displays it on the
          window. Indeed, things are not drawn directly to the window, but to a
          hidden buffer. This buffer is then copied to the window when you call
          <code class="cl">display</code> -- this is called <em>double-buffering</em>.
          </p>
          <p class="important">
          This clear/draw/display cycle is the only good way to draw things.
          Don't try other strategies, such as keeping pixels from the previous
          frame, "erasing" pixels, or drawing once and calling display multiple
          times. You'll get strange results due to double-buffering.<br>
          Modern graphics hardware and APIs are really made for repeated
          clear/draw/display cycles where everything is completely refreshed at
          each iteration of the main loop. Don't be scared to draw 1000 sprites
          60 times per second, you're far below the millions of triangles that
          your computer can handle.
          </p>
          <h2 id="what-can-i-draw-now"><a class ="anchor" href="#what-can-i-draw-now">What can I draw now?</a></h2>
          <p class="para">
          Now that you have a main loop which is ready to draw, let's see what,
          and how, you can actually draw there.
          </p>
          <p class="para">
          DSFML provides four kinds of drawable entities: three of them are
          ready to be used (<em>sprites</em>, <em>text</em> and <em>shapes</em>),
          the last one is the building block that will help you create your own
          drawable entities (<em>vertex arrays</em>).
          </p>
          <p class="para">
          Although they share some common properties, each of these entities
          come with their own nuances and are therefore explained in dedicated
          tutorials:
          </p>
          <ul>
              <li><a class="link" href="tutorials/2_4/sprites.php">Sprite tutorial</a></li>
              <li><a class="link" href="tutorials/2_4/text.php">Text tutorial</a></li>
              <li><a class="link" href="tutorials/2_4/shapes.php">Shape tutorial</a></li>
              <li><a class="link" href="tutorials/2_4/vertex-arrays.php">Vertex array tutorial </a></li>
          </ul>


          <h2 id="off-screen-drawing"><a class ="anchor" href="#off-screen-drawing">Off-screen drawing</a></h2>
          <p class="para">
          DSFML also provides a way to draw to a texture instead of directly to
          a window. To do so, use a <a class="link" href="/doc/2_4/graphics/rendertexture.php">RenderTexture</a>
          instead of a <a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>.
          It has the same functions for drawing, inherited from their common
          base: <a class="link" href="/doc/2_4/graphics/rendertarget.php">RenderTarget</a>.
          </p>
          <pre><code class="prettyprint">
// create a 500x500 render-texture
RenderTexture renderTexture = new RenderTexture();
if (!renderTexture.create(500, 500))
{
    // error...
}

// drawing uses the same functions
renderTexture.clear();
renderTexture.draw(sprite); // or any other drawable
renderTexture.display();

// get the target texture (where the stuff has been drawn)
Texture texture = renderTexture.getTexture();

// draw it to the window
Sprite sprite = new Sprite(texture);
window.draw(sprite);
</code></pre><p></p>
          <p class="para">
          The <code class="cl">getTexture()</code> function returns a read-only
          texture, which means that you can only use it, not modify it. If you
          need to modify it before using it, you can copy it to your own
          <a class="link" href="/doc/2_4/graphics/texture.php">Texture</a>
          instance.
          </p>
          <p class="para">
          <a class="link" href="/doc/2_4/graphics/rendertexture.php">RenderTexture</a>
          also has the same functions as <a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>
          for handling views and OpenGL (see the corresponding tutorials for
          more details). If you use OpenGL to draw to the render-texture, you
          can request creation of a depth buffer by using the third optional
          argument of the create function.
          </p>
          <pre><code class="prettyprint">
renderTexture.create(500, 500, true); // enable depth buffer
</code></pre><p></p>
          <h2 id="drawing-from-threads"><a class ="anchor" href="#drawing-from-threads">Drawing from threads</a></h2>
          <p class="para">
          DSFML supports multi-threaded drawing, and you don't even have to do
          anything to make it work. The only thing to remember is to deactivate
          a window before using it in another thread. That's because a window
          (more precisely its OpenGL context) cannot be active in more than one
          thread at the same time.
          </p>
          <pre><code class="prettyprint">
// global variable to be accessed by the thread
shared(RenderWindow) window;

void renderingThread()
{
    // the rendering loop
    while (window->isOpen())
    {
        // draw...

        // end the current frame
        window->display();
    }
}

int main()
{
    // create the window (remember: it's safer to create it in the main thread
    // due to OS limitations)
    window = new RenderWindow(VideoMode(800, 600), "OpenGL");

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
          <p class="para">
          As you can see, you don't even need to bother with the activation of
          the window in the rendering thread, SFML does it automatically for you
          whenever it needs to be done.
          </p>
          <p class="para">
          Remember to always create the window and handle its events in the main
          thread for maximum portability. This is explained in the
          <a class="link" href="/tutorials/2_4/window.php">window tutorial</a>.
          </p>



          
        </div>
    </div>
    <?php include '../../footer.php'?>
</body>
</html>