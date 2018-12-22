<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.soundsource</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.soundsource</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>SoundSource</u> is not meant to be used directly, it only serves as a common
 base for all audio objects that can live in the audio environment.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It defines several properties for the sound: pitch, volume, position,
 attenuation, etc. All of them can be changed at any time with no impact on
 performances.


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/sound.php" title="Regular sound that can be played in the audio environment.">Sound</a>, <a class="dsfml_link" href="../audio/soundstream.php" title="Abstract base class for streamed audio sources.">SoundStream</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource" id="SoundSource">interface SoundSource;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Interface defining a sound's properties.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.Status" id="SoundSource.Status">enum Status: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enumeration of the sound source states.
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.Status.Stopped" id="SoundSource.Status.Stopped">Stopped</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Sound is not playing.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.Status.Paused" id="SoundSource.Status.Paused">Paused</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Sound is paused.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.Status.Playing" id="SoundSource.Status.Playing">Playing</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Sound is playing.
  </p>
</div>

</section>

</div>

</li>
</ul>
</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.pitch" id="SoundSource.pitch">abstract @property void pitch(float newPitch);
<br>
abstract @property float pitch();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The pitch of the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The pitch represents the perceived fundamental frequency of a sound; thus
 you can make a sound more acute or grave by changing its pitch. A side
 effect of changing the pitch is to modify the playing speed of the sound
 as well. The default value for the pitch is 1.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.volume" id="SoundSource.volume">abstract @property void volume(float newVolume);
<br>
abstract @property float volume();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The volume of the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The volume is a vlue between 0 (mute) and 100 (full volume). The default
 value for the volume is 100.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.position" id="SoundSource.position">abstract @property void position(Vector3f newPosition);
<br>
abstract @property Vector3f position();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The 3D position of the sound in the audio scene.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Only sounds with one channel (mono sounds) can be spatialized. The
 default position of a sound is (0, 0, 0).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.relativeToListener" id="SoundSource.relativeToListener">abstract @property void relativeToListener(bool relative);
<br>
abstract @property bool relativeToListener();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Make the sound's position relative to the listener (<code class="prettyprint">true</code>) or absolute
 (<code class="prettyprint">false</code>).

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Making a sound relative to the listener will ensure that it will always
 be played the same way regardless the position of the listener.  This can
 be useful for non-spatialized sounds, sounds that are produced by the
 listener, or sounds attached to it. The default value is <code class="prettyprint">false</code> (position
 is absolute).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.minDistance" id="SoundSource.minDistance">abstract @property void minDistance(float distance);
<br>
abstract @property float minDistance();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The minimum distance of the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The "minimum distance" of a sound is the maximum distance at which it is
 heard at its maximum volume. Further than the minimum distance, it will
 start to fade out according to its attenuation factor. A value of 0
 ("inside the head of the listener") is an invalid value and is forbidden.
 The default value of the minimum distance is 1.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundSource.attenuation" id="SoundSource.attenuation">abstract @property void attenuation(float newAttenuation);
<br>
abstract @property float attenuation();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The attenuation factor of the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The attenuation is a multiplicative factor which makes the sound more or
 less loud according to its distance from the listener. An attenuation of
 0 will produce a non-attenuated sound, i.e. its volume will always be the
 same whether it is heard from near or from far.
<br><br>
 On the other hand, an attenuation value such as 100 will make the sound
 fade out very quickly as it gets further from the listener. The default
 value of the attenuation is 1.
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