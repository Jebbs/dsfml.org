<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Building From Source</title>
    </head>
<body>
    <div class="main">
        <?php include '../header.php'?>
        <div class="inner" class="content">
            <h3>Site under construction!</h3>
            <h1> Building From Source<h1>
            <h2 id="introduction">Introduction</h2>
            <p class="para">
                This tutorial outlines how to build DSFML from source. Building
                DSFML produces a set of static libraries which combine the C++
                binding and the D wrapper code. If you plan on using
                <a href="https://code.dlang.org/" title="D's package and build management system.">DUB</a>,
                you don't need to build DSFML directly and can jump to
                <a href="/tutorials/firstprogram.php">Building Your First DSFML Program</a>.
            </p>
            <p class="para">Prerequisites:</p>
            <ul>
                <li>A D compiler of your choice</li>
                <li>A C++ compiler - MSVC on Windows or GNU on Linux/OSX</li>
                <li>Git</li>
                <li>CMake</li>
            </ul>
            <h2 id="building-dsfml">Building DSFML</h2>
            <h3>build.d</h3>
            <p class="para">
                For convenience, DSFML comes with a build script
                (<code>build.d</code>) to automate the building process. Given
                that you have all the prerequesites listed above, building DSFML
                is mot much more complicated than cloning the DSFML repository
                and running the script.
            </p>
            <p class="para">
                To run the script, build it with your D compiler of choice and
                run the produced executable in the top level directory of the
                cloned repository. After completing, you'll see a newly created
                <code>lib</code> directory with static libraries. The build
                script will use the same compilerit was built with to build
                DSFML.
            </p>
            <h3>Examples</h3>
            <p class="para">
            In the examples below, it is assumed that your D and C++ compilers
            are accessable from the command line. Please be aware that on
            Windows only MSVC is supported as the C++ compiler and the build
            script will default to building x64 libraries.
            </p>
            <p><u>Windows and DMD</u></p>
            <pre><code>git clone -b v2.4.0-rc.1 https://github.com/jebbs/dsfml
                       cd dsfml
                       dmd build
                       build
                       </code></pre>
            <p><u>Linux and GDC</u></p>
            <pre><code>git clone -b v2.4.0-rc.1 https://github.com/jebbs/dsfml
                       cd dsfml
                       gdc build.d -obuild
                       ./build
            </code></pre>
            <p><u>Any OS and rdmd</u></p>
            <pre><code>git clone -b v2.4.0-rc.1 https://github.com/jebbs/dsfml
                       cd dsfml
                       rdmd build
            </code></pre>
            <p></p>
            <p class="para">
                For more information about what the script can do, pass the
                executable <code>--help</code> or <code>-h</code>.
            </p>
        </div>
    </div>
    <?php include '../footer.php'?>
</body>
</html>