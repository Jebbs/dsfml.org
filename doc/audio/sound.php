<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.sound</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.sound</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Sound</u> is the class used to play sounds.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It provides:
 <ul class="lists"> <li>Control (play, pause, stop)</li>
 <li>Ability to modify output parameters in real-time (pitch, volume, ...)</li>
 <li>3D spatial features (position, attenuation, ...)</li></ul>
<br><br>
 <p class="para"> <u>Sound</u> is perfect for playing short sounds that can fit in memory and
 require no latency, like foot steps or gun shots. For longer sounds, like
 background musics or long speeches, rather see <a class="dsfml_link" href="../audio/music.php" title="Streamed music played from an audio file.">Music</a> (which is based
 on streaming).
<br><br>
 In order to work, a sound must be given a buffer of audio data to play. Audio
 data (samples) is stored <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a>, and attached to a sound with
 the <code class="prettyprint">setBuffer()</code> function. The buffer object attached to a sound must remain
 alive as long as the sound uses it. Note that multiple sounds can use the
 same sound buffer at the same time.
</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto buffer = new SoundBuffer();
buffer.loadFromFile("sound.wav");

auto <span class="psymbol">sound</span> = new Sound();
<span class="psymbol">sound</span>.setBuffer(buffer);
<span class="psymbol">sound</span>.play();
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a>, <a class="dsfml_link" href="../audio/music.php" title="Streamed music played from an audio file.">Music</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sound" id="Sound">class Sound: <span class="ddoc_psuper_symbol">dsfml.audio.soundsource.SoundSource</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Regular sound that can be played in the audio environment.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.this" id="Sound.this">this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Default constructor.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.this.2" id="Sound.this.2">this(const(SoundBuffer) buffer);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the sound with a buffer.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(SoundBuffer) buffer</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Sound buffer containing the audio data to play with the sound
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.isLooping" id="Sound.isLooping">@property void isLooping(bool loop);
<br>
const @property bool isLooping();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Whether or not the sound should loop after reaching the end.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If set, the sound will restart from beginning after reaching the end and
 so on, until it is stopped or setLoop(<code class="prettyprint">false</code>) is called.
<br><br>
 The default looping state for sound is <code class="prettyprint">false</code>.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.playingOffset" id="Sound.playingOffset">@property void playingOffset(Time offset);
<br>
const @property Time playingOffset();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the current playing position (from the beginning) of the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The playing position can be changed when the sound is either paused or
 playing.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.status" id="Sound.status">const @property Status status();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the current status of the sound (stopped, paused, playing).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.pitch" id="Sound.pitch">@property void pitch(float newPitch);
<br>
const @property float pitch();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.volume" id="Sound.volume">@property void volume(float newVolume);
<br>
const @property float volume();
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
    The volume is a value between 0 (mute) and 100 (full volume). The
 default value for the volume is 100.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.position" id="Sound.position">@property void position(Vector3f newPosition);
<br>
const @property Vector3f position();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.relativeToListener" id="Sound.relativeToListener">@property void relativeToListener(bool relative);
<br>
const @property bool relativeToListener();
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
 listener, or sounds attached to it. The default value is <code class="prettyprint">false</code>
 (position is absolute).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.minDistance" id="Sound.minDistance">@property void minDistance(float distance);
<br>
const @property float minDistance();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.attenuation" id="Sound.attenuation">@property void attenuation(float newAttenuation);
<br>
const @property float attenuation();
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

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.pause" id="Sound.pause">void pause();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Pause the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function pauses the sound if it was playing, otherwise
 (sound already paused or stopped) it has no effect.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.play" id="Sound.play">void play();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Start or resume playing the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function starts the stream if it was stopped, resumes it if it was
 paused, and restarts it from beginning if it was it already playing.
<br><br>
 This function uses its own thread so that it doesn't block the rest of
 the program while the sound is played.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sound.stop" id="Sound.stop">void stop();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Stop playing the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function stops the sound if it was playing or paused, and does
 nothing if it was already stopped. It also resets the playing position
 (unlike <code class="prettyprint">pause()</code>).
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