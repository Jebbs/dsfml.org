<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - User Data Streams</title>
    </head>
<body>
    <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
            <h1>User Data Streams<h1>
            <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
            <p class="para">
            DSFML has several resource classes: images, fonts, sounds, etc. In
            most programs, these resources will be loaded from files, with the
            help of their <code class="cl">loadFromFile()</code> method. In a
            few other situations, resources will be packed directly into the
            executable or in a big data file, and loaded from memory with
            <code class="cl">loadFromMemory()</code>. These methods cover almost
            all the possible use cases -- but they are not without their limits.
            </p>
            <p class="para">
            Sometimes you want to load files from unusual places, such as a
            compressed/encrypted archive, or a remote network location for
            example. For these special situations, DSFML provides a third loading
            function: <code class="cl">loadFromStream()</code>. This function
            reads data using an abstract <a class="link" href="/doc/2_4/system/inputstream.php">InputStream</a>
            interface, which allows you to provide your own implementation of a
            stream class that works with DSFML.
            </p>
            <p class="para">
                In this tutorial you'll learn how to write and use your own
                derived input stream.
            </p>

            <h2 id="inputstream"><a class ="anchor" href="#inputstream">InputStream</a></h2>
            <p class="para">
                The <a class="link" href="/doc/2_4/system/inputstream.php">InputStream</a>
                interface declares four methods:
            </p>
            <pre><code class="prettyprint">
interface InputStream
{
    long read(void[] data);

    long seek(long position);

    long tell();

    long getSize();
}</code></pre>
            <p></p>
            <p class="para">
            <code class="cl">read()</code> must extract size bytes of data from
            the stream, and copy them to the supplied data address; it returns
            the number of bytes read, or -1 on error.
            </p>
            <p class="para">
            <code class="cl">seek()</code> must change the current reading
            position in the stream; its position argument is the absolute byte
            offset to jump to (so it is relative to the beginning of the data,
            not to the current position); it returns the new position, or -1 on
            error.
            </p>
            <p class="para">
            <code class="cl">tell()</code> must return the current reading
            position (in bytes) in the stream, or -1 on error.
            </p>
            <p class="para">
            <code class="cl">getSize()</code> must return the total size (in
            bytes) of the data which is contained in the stream, or -1 on error.
            </p>
            <p class="para">
            To create your own working stream, you must implement all of these
            four methods according to their requirements.
            </p>

            <h2 id="using-an-inputstream"><a class ="anchor" href="#using-an-inputstream">Using an InputStream</a></h2>
            <p class="para">
                Using a custom stream class is straight-forward: instantiate it,
                and pass it to the loadFromStream (or openFromStream) function
                of the object that you want to load.
            </p>
            <pre><code class="prettyprint">
auto stream = new FileStream();
stream.open("image.png");

auto texture = new Texture();;
texture.loadFromStream(stream);</code></pre>
            <h2 id="examples"><a class="anchor" href="#examples">Examples</a></h2>
            <p class="para">
                If you need a demonstration that helps you focus on how the code
                works, and not get lost in implementation details, you could
                take a look at the unit tests for <a class="link" href="/doc/2_4/system/inputstream.php">InputStream</a>,
                which includes a simple file based stream implementation.
            </p>
            <p class="para">
                Don't forget to check SFML's forum and wiki. Chances are that
                another user already wrote an sf::InputStream class that suits
                your needs, and it should be easily translatable to D. And if
                you write a new one and feel like it could be useful to other
                people as well, don't hesitate to share!
            </p>
            <h2 id="common-mistakes"><a class="anchor" href="#common-mistakes">Common mistakes</a></h2>
            <p class="para">
                Some resource classes are not loaded completely after <code class="cl">loadFromStream</code>
                has been called. Instead, they continue to read from their data
                source as long as they are used. This is the case for <a class="link" href="/doc/2_4/audio/music.php">Music</a>,
                which streams audio samples as they are played, and for <a class="link" href="/doc/2_4/graphics/font.php">Font</a>,
                which loads glyphs on the fly depending on the text that is
                displayed.
            </p>
            <p class="para">
                As a consequence, the stream instance that you used to load a
                music or a font, as well as its data source, must remain alive
                as long as the resource uses it. If it is destroyed while still
                being used, it results in undefined behavior (can be a crash,
                corrupt data, or nothing visible). This is usually not something
                to worry about when using the GC, but it is something to keep in
                mind.
            </p>
            <p class="para">
                Another common mistake is to return whatever the internal
                functions return directly, but sometimes it doesn't match what
                SFML expects. For example, when writing a <code class="cl">FILE*</code>
                based implementation one might be tempted to write the seek
                function as follows:
            </p>
            <pre><code class="prettyprint">
long seek(long position)
{
    return fseek(m_file, position, SEEK_SET);
}</code></pre>
<p></p>
            <p class="para">
                This code is wrong, because <code class="cl">fseek</code>
                returns zero on success, whereas SFML expects the new position
                to be returned.
            </p>
        </div>
    </div>
    <?php include '../../footer.php'?>
</body>
</html>