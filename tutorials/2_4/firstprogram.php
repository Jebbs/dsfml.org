<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Building Your First Program</title>
    </head>
<body>
    <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
            <h3>Site under construction!</h3>
            <h1>Building Your First Program</h1>
            <h2 id="introduction">Introduction</h2>
            <p class="para">
                This tutorial outlines how to build a DSFML program.
            </p>
            <p class="para">Prerequisites:</p>
            <ul>
                <li>A D compiler of your choice</li>
                <li>DSFML source files</li>
                <li>SFML 2.4</li>
                <li>DSFML static libraries (if you don't use DUB)</li>
            </ul>
            <br>
            <p class="para">
                For the sake of brevity, this tutorial will use DMD.
            </p>
            <h2 id="installing-sfml">Installing SFML</h2>
            <p class="para">
                As DSFML is a binding to SFML, we will need this library to make
                our programs compile and work. If you don't already have this
                library installed, please visit
                <a href="https://www.sfml-dev.org/">https://www.sfml-dev.org/<a>
                for more information.
            </p>
            <p class="para">
                While it isn't a requirement to do so, this tutorial assumes
                that you'll be linking to the shared library version of SFML.
            </p>
            <h2 id="building-dsfml">Building DSFML (Optional)</h2>
            <p class="para">
                If you don't plan on using DUB to build your projects, you will
                need to have DSFML static libraries to link with. If you haven't
                already, see the tutorial on <a href="/tutorials/2_4/buildingfromsource.php">
                building from source<a>. If you <i>do</i> plan on using DUB, you
                can skip that tutorial as DUB will handle building DSFML for you.
            </p>
            <h2>Example Code</h2>
            <p class="para">
            If we're going to build a program, we're going to need some code.
            The following code segement is what we'll use, and we'll name it
            <code class="cl">app.d</code>.
            </p>
            <pre><code class="prettyprint">
module main;
import dsfml.graphics;

void main(string[] args)
{
    auto window = new RenderWindow(VideoMode(800,600),"Hello DSFML!");

    auto head = new CircleShape(100);
    head.fillColor = Color.Green;
    head.position = Vector2f(300,100);

    auto leftEye = new CircleShape(10);
    leftEye.fillColor = Color.Blue;
    leftEye.position = Vector2f(350,150);

    auto rightEye = new CircleShape(10);
    rightEye.fillColor = Color.Blue;
    rightEye.position = Vector2f(430,150);

    auto smile = new CircleShape(30);
    smile.fillColor = Color.Red;
    smile.position = Vector2f(368,200);

    auto smileCover = new RectangleShape(Vector2f(60,30));
    smileCover.fillColor = Color.Green;
    smileCover.position = Vector2f(368,200);

    while (window.isOpen())
    {
        Event evt;

        while(window.pollEvent(evt))
        {
            if(evt.type == evt.EventType.Closed)
            {
                window.close();
            }
        }

        window.clear();

        window.draw(head);
        window.draw(leftEye);
        window.draw(rightEye);
        window.draw(smile);
        window.draw(smileCover);

        window.display();
    }
}
</code></pre>
            <h2 id="compiling-cl">Compiling - Command Line</h2>
            <p class="para">
                To compile the test program, you'll need to know the path to
                three locations:
                <ul>
                    <li>the DSFML source files</li>
                    <li>the DSFML static libraries</li>
                    <li>the SFML shared libraries</li>
                </ul>
            </p>
            <p class="para">
                In this section we'll refer to these as <code class="cl">DSFML/src</code>,
                <code class="cl">DSFML/lib</code>, and <code class="cl">SFML/lib</code>
                respectively.
            </p>
            <h3>Windows - 32 bit</h3>
            <pre class="cl"><code>
            dmd app.d -m32mscoff -IDSFML\src\ -L/LIBPATH:DSFMLC\lib\ -L/LIBPATH:DSFML\lib\ dsfml-graphics.lib dsfml-window.lib dsfml-system.lib sfml-graphics.lib sfml-window.lib sfml-system.lib
            </code></pre>
            <h3>Windows - 64 bit</h3>
            <pre class="cl"><code>            
            dmd app.d -m64 -IDSFML\src\ -L/LIBPATH:DSFMLC\lib\ -L/LIBPATH:DSFML\lib\ dsfml-graphics.lib dsfml-window.lib dsfml-system.lib sfml-graphics.lib sfml-window.lib sfml-system.lib</code></pre>
            <h3>Linux/macOS</h3>
            <pre class="cl"><code>
            dmd app.d -IDSFML\src\ -L-LDSFMLC\lib\ -L-LDSFML\lib\ -L-ldsfml-graphics -L-ldsfml-window -L-ldsfml-system -L-lsfml-graphics -L-lsfml-window -L-lsfml-system</code></pre>
            <h2 id="compiling-dub">Compiling - DUB</h2>
            <p class="para">
            Using <a href="https://code.dlang.org/" title="D's package and build management system.">DUB</a>
            to build your project simplifies a lot of things. All you need to
            know is location of the SFML shared libraries. For this section,
            we'll refer to to this location as <code class="cl">SFML/lib</code>.
            </p>
            <p class="para">
            Follow the instruction for setting up your project <a href="https://code.dlang.org/getting_started">here</a>.
            Once you have a <code class="cl">package.json</code> or <code class="cl">package.sdl</code>
            file created, add the <code class="cl">SFML/lib</code> directory to
            the <code class="cl">lflags</code> setting using the correct linker
            flag for your toolchain. For example, on Windows you will probably
            add <code class="cl">/LIBPATH:SFML\\lib\\</code>, while on Linux
            or macOS you'll probably add <code class="cl">-LSFML/lib</code>.
            </p>
            <p class="para">
            Next, add DSFML as a dependency by adding <code class="cl">"dsfml:graphics": "~>2.4"</code> to your DUB
            <code class="cl">dependency</code> list.
            </p>
            <p class="para">
            Finally, envoke DUB on the command line to build your project.
            </p>
            <pre class="cl"><code>
            dub build
            </code></pre>
            <h2>Expected Output</h2>
            <p class="para">
            If everything was done correctly, you will see a weird green
            smiling face.
            </p>
            <img src="http://i.imgur.com/hbt1IBH.png" alt="FACE!">
            </p>
            <p class="para">
            That should take care of the basics of setting up a DSFML project.
            Check out the other tutorials on the specifics of using DSFML.
            </p>

        </div>
    </div>
    <?php include '../../footer.php'?>
</body>
</html>

