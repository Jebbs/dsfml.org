<?php
if(count(get_included_files()) ==1) exit("Direct access not permitted.");
/*
 * This file contains helper functions and variables for constructing the
 * tutorial pages. The are intended to be easier and faster to use than raw
 * HTML when copy+pasting content from the existing SFML tutorials.
 * 
 * The expected usage is something like this:
 * 
 * <?php
 * include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
 * head("Page Title");
 * 
 * //content goes here
 * 
 * foot();
 * ?>
 */

function head($title)
{
    echo
    '<!DOCTYPE html>
<html>
<head>
<meta name="theme-color" content="#333333">
<script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
<link rel="stylesheet" href="/styles.css">
<title>DSFML - '.$title.'</title>
</head>
<body>
<div class="main">', PHP_EOL;

    include $_SERVER['DOCUMENT_ROOT'].'/header.php';
    echo
    '<div class="inner" class="content">
    <h1>'.$title.'</h1>', PHP_EOL;
}

function foot()
{
    echo
    '</div>
</div>
<footer></footer>
</body>
</html>';
}

function section($name)
{
    $id = preg_replace("/[^A-Za-z0-9\- ]/", '', str_replace(" ","-",strtolower($name)));
    echo "<h2 id=\"$id\"><a class =\"anchor\" href=\"#$id\">$name</a></h2>", PHP_EOL;
}

function subsection($name)
{
    echo "<h3>$name</h3>", PHP_EOL;
}

function paragraph($text)
{
    echo "<p class=\"para\">\n$text\n</p>", PHP_EOL;
}

function important($text)
{
    echo "<p class=\"important\">\n$text\n</p>", PHP_EOL;
}

function code($code)
{
    echo "<pre><code class=\"prettyprint\">$code</code></pre><p></p>", PHP_EOL;
}

function pre($code)
{
    echo "<pre><code>$code</code></pre><p></p>", PHP_EOL;
}
function ul($bullets)
{
    echo "<ul>";
    for($i = 0; $i < count($bullets); $i++)
    {
        echo "<li>$bullets[$i]</li>", PHP_EOL;
    }
    echo "</ul><p></p>", PHP_EOL;
}

function img($link, $text)
{
    echo "<img src=\"$link\" alt=\"$text\"><p></p>", PHP_EOL;
}

// inline
function cl($command): string
{
    return "<code class=\"cl\">$command</code>";
}

function em($text): string
{
    return "<em>$text</em>";
}

function bold($text): string
{
    return "<strong>$text</strong>";
}

function lnk($link,$text): string
{
    return '<a class="link" href="'.$link.'">'.$text.'</a>';
}


// Class reference links (added as required)
$DRAWABLE = '<a class="link" href="/doc/2_4/graphics/drawable.php">Drawable</a>';
$SPRITE = '<a class="link" href="/doc/2_4/graphics/sprite.php">Sprite</a>';
$SHAPE = '<a class="link" href="/doc/2_4/graphics/shape.php">Shape</a>';
$TEXT = '<a class="link" href="/doc/2_4/graphics/text.php">Text</a>';
$VERTEX = '<a class="link" href="/doc/2_4/graphics/vertex.php">Vertex</a>';
$VIEW = '<a class="link" href="/doc/2_4/graphics/view.php">View</a>';
$VERTEXARRAY = '<a class="link" href="/doc/2_4/graphics/vertexarray.php">VertexArray</a>';
$RENDERSTATES = '<a class="link" href="/doc/2_4/graphics/renderstates.php">RenderStates</a>';
$RENDERWINDOW = '<a class="link" href="/doc/2_4/graphics/renderwindow.php">RenderWindow</a>';
$RENDERTEXTURE = '<a class="link" href="/doc/2_4/graphics/rendertexture.php">RenderTexture</a>';
$TRANSFORM = '<a class="link" href="/doc/2_4/graphics/transform.php">Transform</a>';
$TRANSFORMABLE = '<a class="link" href="/doc/2_4/graphics/transformable.php">Transformable</a>';
$TEXTURE = '<a class="link" href="/doc/2_4/graphics/texture.php">Texture</a>';

$LISTENER = '<a class="link" href="/doc/2_4/audio/listener.php">Listener</a>';
$MUSIC = '<a class="link" href="/doc/2_4/audio/music.php">Music</a>';
$SOUND = '<a class="link" href="/doc/2_4/audio/sound.php">Sound</a>';
$SOUNDBUFFER = '<a class="link" href="/doc/2_4/audio/soundbuffer.php">SoundBuffer</a>';
$SOUNDBUFFERRECORDER = '<a class="link" href="/doc/2_4/audio/soundbufferrecorder.php">SoundBufferRecorder</a>';
$SOUNDRECORDER = '<a class="link" href="/doc/2_4/audio/soundrecorder.php">SoundRecorder</a>';
$SOUNDSTREAM = '<a class="link" href="/doc/2_4/audio/soundstream.php">SoundStream</a>';

$TCPSOCKET = '<a class="link" href="/doc/2_4/network/tcpsocket.php">TcpSocket</a>';
$UDPSOCKET = '<a class="link" href="/doc/2_4/network/udpsocket.php">UdpSocket</a>';
$TCPLISTENER = '<a class="link" href="/doc/2_4/network/tcplistener.php">TcpListener</a>';
$IPADDRESS = '<a class="link" href="/doc/2_4/network/ipaddress.php">IpAddress</a>';
$PACKET = '<a class="link" href="/doc/2_4/network/packet.php">Packet</a>';
$SOCKETSELECTOR = '<a class="link" href="/doc/2_4/network/socketselector.php">SocketSelector</a>';
$HTTP = '<a class="link" href="/doc/2_4/network/http.php">Http</a>';
$HTTPREQUEST = '<a class="link" href="/doc/2_4/network/http.php#Http.Request">Http.Request</a>';
$HTTPRESPONSE = '<a class="link" href="/doc/2_4/network/http.php#Http.Response">Http.Response</a>';
$FTP = '<a class="link" href="/doc/2_4/network/ftp.php">Ftp</a>';
$FTPRESPONSE = '<a class="link" href="/doc/2_4/network/ftp.php#Ftp.Response">Ftp.Response</a>';
$FTPDIRECTORYRESPONSE = '<a class="link" href="/doc/2_4/network/ftp.php#Ftp.DirectoryResponse">Ftp.DirectoryResponse</a>';
$FTPLISTINGRESPONSE = '<a class="link" href="/doc/2_4/network/ftp.php#Ftp.ListingResponse">Ftp.ListingResponse</a>';



// Tutorial links
function transform_link($text): string
{
    return '<a class="link" href="tutorials/2_4/graphics/transform.php">'.$text.'</a>';
}

function spatialization_link($text): string
{
    return '<a class="link" href="tutorials/2_4/audio/spatialization.php">'.$text.'</a>';
}

function music_link($text): string
{
    return '<a class="link" href="tutorials/2_4/audio/sounds.php">'.$text.'</a>';
}

function packet_link($text): string
{
    return '<a class="link" href="tutorials/2_4/network/packet.php">'.$text.'</a>';
}


?>