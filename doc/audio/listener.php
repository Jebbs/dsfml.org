<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.listener</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.listener</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The audio listener defines the global properties of the audio environment, it
 defines where and how sounds and musics are heard.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If <a class="dsfml_link" href="../graphics/view.php" title="2D camera that defines what region is shown on screen.">View</a> is the eyes of the user, then
 <u>Listener</u> is his ears (by the way, they are often linked together – same
 position, orientation, etc.).
<br><br>
 <u>Listener</u> is a simple interface, which allows to setup the listener in
 the 3D audio environment (position and direction), and to adjust the global
 volume.
<br><br>
 Because the listener is unique in the scene, <u>Listener</u> only contains
 static functions and doesn't have to be instanciated.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Move the listener to the position (1, 0, -5)
Listener.position = Vector3f(1, 0, -5);

// Make it face the right axis (1, 0, 0)
Listener.direction = Vector3f(1, 0, 0);

// Reduce the global volume
Listener.globalVolume = 50;
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
        <code class="prettyprint"><a class="decl_anchor" href="#Listener" id="Listener">abstract class Listener;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The audio listener is the point in the scene from where all the sounds are
 heard.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.direction" id="Listener.direction">static @property void direction(Vector3f orientation);
<br>
static @property Vector3f direction();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The orientation of the listener in the scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The orientation defines the 3D axes of the listener (left, up, front)
 in the scene. The orientation vector doesn't have to be normalized.
<br><br>
 The default listener's orientation is (0, 0, -1).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.upVector" id="Listener.upVector">static @property void upVector(Vector3f orientation);
<br>
static @property Vector3f upVector();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The upward vector of the listener in the scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The upward vector defines the 3D axes of the listener (left, up,
 front) in the scene. The upward vector doesn't have to be normalized.
<br><br>
 The default listener's upward vector is (0, 1, 0).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.globalVolume" id="Listener.globalVolume">static @property void globalVolume(float volume);
<br>
static @property float globalVolume();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The global volume of all the sounds and musics.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The volume is a number between 0 and 100; it is combined with the
 individual volume of each sound / music.
<br><br>
 The default value for the volume is 100 (maximum).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.position" id="Listener.position">static @property void position(Vector3f pos);
<br>
static @property Vector3f position();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The position of the listener in the scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The default listener's position is (0, 0, 0).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.Direction" id="Listener.Direction"><div class="deprecated_decl">deprecated static @property void Direction(Vector3f orientation)</div>;
<br>
<div class="deprecated_decl">deprecated static @property Vector3f Direction()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The orientation of the listener in the scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The orientation defines the 3D axes of the listener (left, up, front)
 in the scene. The orientation vector doesn't have to be normalized.
<br><br>
 The default listener's orientation is (0, 0, -1).


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'direction' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.UpVector" id="Listener.UpVector"><div class="deprecated_decl">deprecated static @property void UpVector(Vector3f orientation)</div>;
<br>
<div class="deprecated_decl">deprecated static @property Vector3f UpVector()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The upward vector of the listener in the scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The upward vector defines the 3D axes of the listener (left, up,
 front) in the scene. The upward vector doesn't have to be normalized.
<br><br>
 The default listener's upward vector is (0, 1, 0).


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'upVector' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.GlobalVolume" id="Listener.GlobalVolume"><div class="deprecated_decl">deprecated static @property void GlobalVolume(float volume)</div>;
<br>
<div class="deprecated_decl">deprecated static @property float GlobalVolume()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The global volume of all the sounds and musics. The volume is a
 number between 0 and 100; it is combined with the individual volume
 of each sound / music.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The default value for the volume is 100 (maximum).


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'globalVolume' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Listener.Position" id="Listener.Position"><div class="deprecated_decl">deprecated static @property void Position(Vector3f position)</div>;
<br>
<div class="deprecated_decl">deprecated static @property Vector3f Position()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The position of the listener in the scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The default listener's position is (0, 0, 0).


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'position' property instead.
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