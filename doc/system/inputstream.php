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
      <title>DSFML - dsfml.system.inputstream</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.system.inputstream</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    This interface allows users to define their own file input sources from which
 DSFML can load resources.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     DSFML resource classes like <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> and <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a> provide
 <code class="prettyprint">loadFromFile</code> and <code class="prettyprint">loadFromMemory</code> functions, which read data from
 conventional sources. However, if you have data coming from a different source
 (over a network, embedded, encrypted, compressed, etc) you can derive your own
 class from <u>InputStream</u> and load DSFML resources with their
 <code class="prettyprint">loadFromStream</code> function.
<br><br>
 Usage example:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// custom stream class that reads from inside a zip file
class ZipStream : InputStream
{
public:

    ZipStream(string archive);

    bool open(string filename);

    long read(void[] data);

    long seek(long position);

    long tell();

    long getSize();

private:

    ...
};

// now you can load textures...
auto texture = new Texture();
auto stream = new ZipStream("resources.zip");
stream.open("images/img.png");
texture.loadFromStream(stream);

// musics...
auto music = new Music();
auto stream = new ZipStream("resources.zip");
stream.open("musics/msc.ogg");
music.openFromStream(stream);

// etc.
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
        <code class="prettyprint"><a class="decl_anchor" href="#InputStream" id="InputStream">interface InputStream;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Interface for custom file input streams.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputStream.read" id="InputStream.read">abstract long read(void[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Read data from the stream.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">void[] data</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Buffer where to copy the read data
 			and sized to the amount of bytes to be read
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
    The number of bytes actually read, or -1 on error.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputStream.seek" id="InputStream.seek">abstract long seek(long position);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the current reading position.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">long position</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The position to seek to, from the beginning
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
    The position actually sought to, or -1 on error.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputStream.tell" id="InputStream.tell">abstract long tell();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the current reading position in the stream.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The current position, or -1 on error.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputStream.getSize" id="InputStream.getSize">abstract long getSize();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the size of the stream.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Total number of bytes available in the stream, or -1 on error.
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