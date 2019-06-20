<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Keyboard, mouse and joystick</title>
    </head>
<body>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'?>
        <div class="inner" class="content">
            <h1>Keyboard, mouse and joystick</h1>
            <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
            <p class="para">
            This tutorial explains how to access global input devices: keyboard,
            mouse and joysticks. This must not be confused with events.
            Real-time input allows you to query the global state of keyboard,
            mouse and joysticks at any time ("<em>is this button currently pressed?</em>",
            "<em>where is the mouse currently?</em>") while events notify you
            when something happens ("<em>this button was pressed</em>", "<em>the mouse has moved</em>").
            </p>
            <h2 id="keyboard"><a class ="anchor" href="#keyboard">Keyboard</a></h2>
            <p class="para">
            The class that provides access to the keyboard state is
            <a class="link" href="/doc/2_4/window/keyboard.php">Keyboard</a>. It
            only contains one function, <code class="cl">isKeyPressed</code>,
            which checks the current state of a key (pressed or released). It is
            a static function, so you don't need to instantiate
            <a class="link" href="/doc/2_4/window/keyboard.php">Keyboard</a> to
            use it.
            </p>
            <p class="para">
            This function directly reads the keyboard state, ignoring the focus
            state of your window. This means that <code class="cl">isKeyPressed</code>
            may return true even if your window is inactive.
            </p>
            <pre><code class="prettyprint lang-java">
if (Keyboard.isKeyPressed(Keyboard.Key.Left))
{
    // left key is pressed: move our character
    character.move(1, 0);
}</code></pre><p></p>
        <p class="para">
        Key codes are defined in the <code class="cl">Keyboard.Key</code> enum.
        </p>
        <p class="important">
        Depending on your operating system and keyboard layout, some key codes
        might be missing or interpreted incorrectly. This is something that will
        be improved in a future version of DSFML.
        </p>
        <h2 id="mouse"><a class ="anchor" href="#mouse">Mouse</a></h2>
        <p class="para">
        The class that provides access to the mouse state is <a class="link" href="/doc/2_4/window/mouse.php">Mouse</a>.
        Like its friend <a class="link" href="/doc/2_4/window/keyboard.php">Keyboard</a>,
        <a class="link" href="/doc/2_4/window/mouse.php">Mouse</a> only contains
        static functions and is not meant to be instantiated (DSFML only handles
        a single mouse for the time being).
        </p>
        <p class="para">
        You can check if buttons are pressed:
        </p>
        <pre><code class="prettyprint lang-java">
if (Mouse.isButtonPressed(Mouse.Button.Left))
{
    // left mouse button is pressed: shoot
    gun.fire();
}</code></pre><p></p>
        <p class="para">
        Mouse button codes are defined in the <code class="cl">Mouse.Button</code>
        enum. DSFML supports up to 5 buttons: left, right, middle (wheel),
        and two additional buttons whatever they may be.
        </p>
        <p class="para">
        You can also get and set the current position of the mouse, either
        relative to the desktop or to a window:
        </p>
        <pre><code class="prettyprint lang-java">
// get the global mouse position (relatively to the desktop)
Vector2i globalPosition = Mouse.getPosition();

// get the local mouse position (relatively to a window)
Vector2i localPosition = Mouse.getPosition(window); // window is a Window</code></pre><p></p>
<pre><code class="prettyprint lang-java">
// set the mouse position globally (relatively to the desktop)
Mouse.setPosition(Vector2i(10, 50));

// set the mouse position locally (relatively to a window)
Mouse.setPosition(Vector2i(10, 50), window); // window is a Window</code></pre><p></p>
        <p class="para">
        There is no function for reading the current state of the mouse wheel.
        Since the wheel can only be moved relatively, it has no absolute state
        that can be queried. By looking at a key you can tell whether it's
        pressed or released. By looking at the mouse cursor you can tell where
        it is located on the screen. However, looking at the mouse wheel doesn't
        tell you which "tick" it is on. You can only be notified when it moves
        (<code class="cl">MouseWheelScrolled</code> event).
        </p>
        <h2 id="joystick"><a class ="anchor" href="#joystick">Joystick</a></h2>
        <p class="para">
        The class that provides access to the joysticks' states is
        <a class="link" href="/doc/2_4/window/joystick.php">Joystick</a>. Like
        the other classes in this tutorial, it only contains static functions.
        </p>
        <p class="para">
        Joysticks are identified by their index (0 to 7, since DSFML supports up
        to 8 joysticks). Therefore, the first argument of every function of
        <h2 id="joystick"><a class ="anchor" href="#joystick">Joystick</a></h2>
        is the index of the joystick that you want to query.
        </p>
        <p class="para">
        You can check whether a joystick is connected or not:
        </p>
        <pre><code class="prettyprint lang-java">
if (Joystick.isConnected(0))
{
    // joystick number 0 is connected
    ...
}</code></pre><p></p>
        <p class="para">
        You can also get the capabilities of a connected joystick:
        </p>
        <pre><code class="prettyprint lang-java">
// check how many buttons joystick number 0 has
uint buttonCount = Joystick.getButtonCount(0);

// check if joystick number 0 has a Z axis
bool hasZ = Joystick.hasAxis(0, Joystick.Axis.Z);</code></pre><p></p>
        <p class="para">
        Joystick axes are defined in the <code class="cl">Joystick.Axis</code>
        enum. Since buttons have no special meaning, they are simply numbered
        from 0 to 31.
        </p>
        <p class="para">
        Finally, you can query the state of a joystick's axes and buttons as
        well:
        </p>
        <pre><code class="prettyprint lang-java">
// check how many buttons joystick number 0 has
uint buttonCount = Joystick.getButtonCount(0);

// check if joystick number 0 has a Z axis
bool hasZ = Joystick.hasAxis(0, Joystick.Axis.Z);</code></pre><p></p>
        <p class="important">
        Joystick states are automatically updated when you check for events. If
        you don't check for events, or need to query a joystick state (for
        example, checking which joysticks are connected) before starting your
        game loop, you'll have to manually call the <code>Joystick.update()</code>
        function yourself to make sure that the joystick states are up to date.
        </p>

        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'?>
</body>
</html>