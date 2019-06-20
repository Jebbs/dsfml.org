<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Events explained</title>
    </head>
<body>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'?>
        <div class="inner" class="content">
            <h1>Events explained</h1>
            <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
            <p class="para">
            This tutorial is a detailed list of window events. It describes
            them, and shows how to (and how not to) use them.
            </p>
            <h2 id="the-event-type"><a class ="anchor" href="#the-event-type">The Event type</a></h2>
            <p class="para">
            Before dealing with events, it is important to understand what the
            <a class="link" href="/doc/2_4/window/event.php">Event</a> type is,
            and how to correctly use it. <a class="link" href="/doc/2_4/window/event.php">Event</a>
            is a <em>union</em>, which means that only one of its members is
            valid at a time (remember your C/C++/D lessons: all the members of a
            union share the same memory space). The valid member is the one that
            matches the event type, for example <code class="cl">event.key</code>
            for a <code class="cl">KeyPressed</code> event. Trying to read any
            other member will result in an undefined behavior (most likely:
            random or invalid values). It it important to never try to use an
            event member that doesn't match its type.
            </p>
            <p class="para">
            <a class="link" href="/doc/2_4/window/event.php">Event</a>
            instances are filled by the <code class="cl">pollEvent</code>
            (or <code class="cl">waitEvent</code>) function of the
            <a class="link" href="/doc/2_4/window/window.php">Window</a>
            class. Only these two functions can produce valid events, any
            attempt to use an <a class="link" href="/doc/2_4/window/event.php">Event</a>
            which was not returned by successful call to <code class="cl">pollEvent</code>
            (or <code class="cl">waitEvent</code>) will result in the same
            undefined behavior that was mentioned above.
            </p>
            <p class="para">
            To be clear, here is what a typical event loop looks like:
            </p>
            <pre><code class="prettyprint lang-java">
Event event;

while(window.pollEvent(event))
{

    // check the type of the event
    switch(event.type)
    {
        // window closed
        case Event.EventType.Closed:
            window.close();
            break;

        // key pressed
        case Event.EventType.KeyPressed:
            ...
            break;

        // we don't process other types of events
        default:
            break;
    }
}</code></pre>
        <p class="important">
        Read the above paragraph once again and make sure that you fully
        understand it, the <a class="link" href="/doc/2_4/window/event.php">Event</a>
        union is the cause of many problems for inexperienced programmers.
        </p>
        <p class="para">
        Alright, now we can see what events DSFML supports, what they mean and
        how to use them properly.
        </p>
        <h2 id="the-closed-event"><a class ="anchor" href="#the-closed-event">The Closed event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.Closed</code> event is triggered
        when the user wants to close the window, through any of the possible
        methods the window manager provides ("close" button, keyboard shortcut,
        etc.). This event only represents a close request, the window is not yet
        closed when the event is received.
        </p>
        <p class="para">
        Typical code will just call <code class="cl">window.close()</code> in
        reaction to this event, to actually close the window. However, you may
        also want to do something else first, like saving the current
        application state or asking the user what to do. If you don't do
        anything, the window remains open.
        </p>
        <p class="para">
        There's no member associated with this event in the <a class="link" href="/doc/2_4/window/event.php">Event</a>
        union.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.Closed)
window.close();</code></pre><p></p>
        <h2 id="the-resized-event"><a class ="anchor" href="#the-resized-event">The Resized event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.Resized</code> event is triggered
        when the window is resized, either through user action or
        programmatically by calling <code class="cl">window.setSize</code>.
        </p>
        <p class="para">
        You can use this event to adjust the rendering settings: the viewport if
        you use OpenGL directly, or the current view if you use dsfml-graphics.
        </p>
        <p class="para">
        The member associated with this event is <code class="cl">event.size</code>,
        it contains the new size of the window.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.Resized)
{
    writeln("new width: ", event.size.width);
    writeln("new height: ", event.size.height);
}</code></pre><p></p>
        <h2 id="the-lostfocus-and-gainedfocus-events"><a class ="anchor" href="#the-lostfocus-and-gainedfocus-events">The LostFocus and GainedFocus events</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.Resized</code> event is triggered
        when the window is resized, either through user action or
        programmatically by calling <code class="cl">window.setSize</code>.
        The <code class="cl">Event.EventType.LostFocus</code> and
        <code class="cl">Event.EventType.GainedFocus</code> events are triggered
        when the window loses/gains focus, which happens when the user switches
        the currently active window. When the window is out of focus, it doesn't
        receive keyboard events.
        </p>
        <p class="para">
        This event can be used e.g. if you want to pause your game when the
        window is inactive.
        </p>
        <p class="para">
        There's no member associated with this event in the <a class="link" href="/doc/2_4/window/event.php">Event</a>
        union.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.LostFocus)
    myGame.pause();

if (event.type == Event.EventType.GainedFocus)
    myGame.resume();</code></pre><p></p>
        <h2 id="the-textentered-event"><a class ="anchor" href="#the-textentered-event">The TextEntered event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.TextEntered</code> event is
        triggered when a character is typed. This must not be confused with the
        <code class="cl">KeyPressed</code> event: <code class="cl">TextEntered</code>
        interprets the user input and produces the appropriate printable
        character. For example, pressing '^' then 'e' on a French keyboard will
        produce two <code class="cl">KeyPressed</code> events, but a single
        <code class="cl">TextEntered</code> event containing the 'ê' character.
        It works with all the input methods provided by the operating system,
        even the most specific or complex ones.
        </p>
        <p class="para">
        This event is typically used to catch user input in a text field.
        </p>
        <p class="para">
        The member associated with this event is <code class="cl">event.text</code>,
        it contains the Unicode value of the entered character as a <code class="cl">dchar</code>.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.TextEntered)
{
    writeln("Character typed: ", event.text.unicode);
}</code></pre><p></p>
        <p class="para">
        Note that, since they are part of the Unicode standard, some
        non-printable characters such as backspace are generated by this event.
        In most cases you'll need to filter them out.
        </p>
        <p class="important">
        Many programmers use the <code class="cl">KeyPressed</code> event to get
        user input, and start to implement crazy algorithms that try to
        interpret all the possible key combinations to produce correct
        characters. Don't do that!
        </p>
        <h2 id="the-keypressed-and-keyreleased-events"><a class ="anchor" href="#the-keypressed-and-keyreleased-events">The KeyPressed and KeyReleased events</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.KeyPressed</code> and
        <code class="cl">Event.EventType.KeyReleased</code> events are triggered
        when a keyboard key is pressed/released.
        </p>
        <p class="para">
        If a key is held, multiple <code class="cl">KeyPressed</code> events
        will be generated, at the default operating system delay (ie. the same
        delay that applies when you hold a letter in a text editor). To disable
        repeated <code class="cl">KeyPressed</code> events, you can call
        <code class="cl">window.setKeyRepeatEnabled(false)</code>. On the flip
        side, it is obvious that <code class="cl">KeyReleased</code> events can
        never be repeated.
        </p>
        <p class="para">
        This event is the one to use if you want to trigger an action exactly
        once when a key is pressed or released, like making a character jump
        with space, or exiting something with escape.
        </p>
        <p class="important">
        Sometimes, people try to react to <code class="cl">KeyPressed</code>
        events directly to implement smooth movement. Doing so will not produce
        the expected effect, because when you hold a key you only get a few
        events (remember, the repeat delay). To achieve smooth movement with
        events, you must use a boolean that you set on <code class="cl">KeyPressed</code>
        and clear on <code class="cl">KeyReleased</code>; you can then move
        (independently of events) as long as the boolean is set.<br>
        The other (easier) solution to produce smooth movement is to use
        real-time keyboard input with <a class="link" href="/doc/2_4/window/keyboard.php">Keyboard</a>
        (see the <a class="link" href="/tutorials/2_4/window/inputs.php">dedicated tutorial<a>).
        </p>
        <p class="para">
        The member associated with these events is <code class="cl">event.key</code>,
        it contains the code of the pressed/released key, as well as the current
        state of the modifier keys (alt, control, shift, system).
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.KeyPressed)
{
    if (event.key.code == Keyboard.Key.Escape)
    {
        writeln("the escape key was pressed");
        writeln("control:", event.key.control);
        writeln("alt:", event.key.alt);
        writeln("shift:", event.key.shift);
        writeln("system:", event.key.system);
    }
}</code></pre><p></p>
        <p class="para">
        Note that some keys have a special meaning for the operating system, and
        will lead to unexpected behavior. An example is the F10 key on Windows,
        which "steals" the focus, or the F12 key which starts the debugger when
        using Visual Studio. This will probably be solved in a future version of
        SFML, which will fix it in DSFML.
        </p>
        <h2 id="the-mousewheelmoved-event"><a class ="anchor" href="#the-mousewheelmoved-event">The MouseWheelMoved event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.MouseWheelMoved</code> event is
        <strong>deprecated</strong> since SFML 2.3, use the
        <code class="cl">MouseWheelScrolled</code> event instead.
        </p>
        <h2 id="the-mousewheelscrolled-event"><a class ="anchor" href="#the-mousewheelscrolled-event">The MouseWheelScrolled event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.MouseWheelScrolled</code> event is
        triggered when a mouse wheel moves up or down, but also laterally if the
        mouse supports it.
        </p>
        <p class="para">
        The member associated with this event is <code class="cl">event.mouseWheelScroll</code>,
        it contains the number of ticks the wheel has moved, what the
        orientation of the wheel is and the current position of the mouse
        cursor.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.MouseWheelScrolled)
{
    if (event.mouseWheelScroll.wheel == Mouse.Wheel.VerticalWheel)
        writeln("wheel type: vertical");
    else if (event.mouseWheelScroll.wheel == Mouse.Wheel.HorizontalWheel)
        writeln("wheel type: horizontal");
    else
        writeln("wheel type: unknown");
        writeln("wheel movement: ", event.mouseWheelScroll.delta);
        writeln("mouse x: ", event.mouseWheelScroll.x);
        writeln("mouse y: ", event.mouseWheelScroll.y);
}</code></pre><p></p>
        <h2 id="the-mousebuttonpressed-and-mousebuttonreleased-events"><a class ="anchor" href="#the-mousebuttonpressed-and-mousebuttonreleased-events">The MouseButtonPressed and MouseButtonReleased events</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.MouseButtonPressed</code> and
        <code class="cl">Event.EventType.MouseButtonReleased</code> events are
        triggered when a mouse button is pressed/released.
        </p>
        <p class="para">
        DSFML supports 5 mouse buttons: left, right, middle (wheel), extra #1
        and extra #2 (side buttons).
        </p>
        <p class="para">
        The member associated with these events is <code class="cl">event.mouseButton</code>, it
        contains the code of the pressed/released button, as well as the current
        position of the mouse cursor.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.MouseButtonPressed)
{
    if (event.mouseButton.button == Mouse.Button.Right)
    {
        writeln("the right button was pressed");
        writeln("mouse x: ", event.mouseButton.x);
        writeln("mouse y: ", event.mouseButton.y);
    }
}</code></pre><p></p>
        <h2 id="the-mousemoved-event"><a class ="anchor" href="#the-mousemoved-event">The MouseMoved event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.MouseMoved</code> event is
        triggered when the mouse moves within the window.
        </p>
        <p class="para">
        This event is triggered even if the window isn't focused. However, it is
        triggered only when the mouse moves within the inner area of the window,
        not when it moves over the title bar or borders.
        </p>
        <p class="para">
        The member associated with this event is <code class="cl">event.mouseMove</code>,
        it contains the current position of the mouse cursor relative to the
        window.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.MouseMoved)
{
    writeln("new mouse x: ", event.mouseMove.x);
    writeln("new mouse y: ", event.mouseMove.y);
}</code></pre><p></p>
        <h2 id="the-mouseentered-and-mouseleft-events"><a class ="anchor" href="#the-mouseentered-and-mouseleft-events">The MouseEntered and MouseLeft events</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.MouseEntered</code> and
        <code class="cl">Event.EventType.MouseLeft</code> events are triggered
        when the mouse cursor enters/leaves the window.
        </p>
        <p class="para">
        There's no member associated with these events in the
        <a class="link" href="/doc/2_4/window/event.php">Event</a> union.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.MouseEntered)
    writeln("the mouse cursor has entered the window");

if (event.type == Event.EventType.MouseLeft)
    writeln("the mouse cursor has left the window");</code></pre><p></p>
        <h2 id="the-joystickbuttonpressed-and-joystickbuttonreleased-events"><a class ="anchor" href="#the-joystickbuttonpressed-and-joystickbuttonreleased-events">The JoystickButtonPressed and JoystickButtonReleased events</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.JoystickButtonPressed</code> and
        <code class="cl">Event.EventType.JoystickButtonReleased</code> events
        are triggered when a joystick button is pressed/released.
        </p>
        <p class="para">
        DSFML supports up to 8 joysticks and 32 buttons.
        </p>
        <p class="para">
        The member associated with these events is <code class="cl">event.joystickButton</code>,
        it contains the identifier of the joystick and the index of the
        pressed/released button.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.JoystickButtonPressed)
{
    writeln("joystick button pressed!");
    writeln("joystick id: ", event.joystickButton.joystickId);
    writeln("button: ", event.joystickButton.button);
}</code></pre><p></p>
        <h2 id="the-joystickmoved-event"><a class ="anchor" href="#the-joystickmoved-event">The JoystickMoved event</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.JoystickMoved</code> event is
        triggered when a joystick axis moves.
        </p>
        <p class="para">
        Joystick axes are typically very sensitive, that's why DSFML uses a
        detection threshold to avoid spamming your event loop with tons of
        <code class="cl">JoystickMoved</code> events. This threshold can be
        changed with the <code class="cl">Window::setJoystickThreshold</code>
        function, in case you want to receive more or less joystick move events.
        </p>
        <p class="para">
        DSFML supports 8 joystick axes: X, Y, Z, R, U, V, POV X and POV Y. How
        they map to your joystick depends on its driver.
        </p>
        <p class="para">
        The member associated with this event is <code class="cl">event.joystickMove</code>,
        it contains the identifier of the joystick, the name of the axis, and
        its current position (in the range [-100, 100]).
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.JoystickMoved)
{
    if (event.joystickMove.axis == Joystick.X)
    {
        writeln("X axis moved!");
        writeln("joystick id: ", event.joystickMove.joystickId);
        writeln("new position: ", event.joystickMove.position);
    }
}</code></pre><p></p>
        <h2 id="the-joystickconnected-and-joystickdisconnected-events"><a class ="anchor" href="#the-joystickconnected-and-joystickdisconnected-events">The JoystickConnected and JoystickDisconnected events</a></h2>
        <p class="para">
        The <code class="cl">Event.EventType.JoystickConnected</code> and 
        <code class="cl">Event.EventType.JoystickDisconnected</code> events are
        triggered when a joystick is connected/disconnected.
        </p>
        <p class="para">
        The member associated with this event is <code class="cl">event.joystickConnect</code>,
        it contains the identifier of the connected/disconnected joystick.
        </p>
        <pre><code class="prettyprint lang-java">
if (event.type == Event.EventType.JoystickConnected)
    writeln("joystick connected: ", event.joystickConnect.joystickId);

if (event.type == Event.EventType.JoystickDisconnected)
    writeln("joystick disconnected: ", event.joystickConnect.joystickId);</code></pre><p></p>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'?>
</body>
</html>