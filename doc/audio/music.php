<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.music</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.music</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Musics are sounds that are streamed rather than completely loaded in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This is especially useful for compressed musics that usually take hundreds of
 MB when they are uncompressed: by streaming it instead of loading it
 entirely, you avoid saturating the memory and have almost no loading delay.
<br><br>
 Apart from that, a <u>Music</u> has almost the same features as the
 <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a>/<a class="dsfml_link" href="../audio/sound.php" title="Regular sound that can be played in the audio environment.">Sound</a> pair: you can play/pause/stop it, request
 its parameters (channels, sample rate), change the way it is played (pitch,
 volume, 3D position, ...), etc.
<br><br>
 As a sound stream, a music is played in its own thread in order not to block
 the rest of the program. This means that you can leave the music alone after
 calling <code class="prettyprint">play()</code>, it will manage itself very well.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare a new music
auto <span class="psymbol">music</span> = new Music();

// Open it from an audio file
if (!<span class="psymbol">music</span>.openFromFile("music.ogg"))
{
    // error...
}

// change its 3D position
<span class="psymbol">music</span>.position = Vector3f(0, 1, 10);

// increase the pitch
<span class="psymbol">music</span>.pitch = 2;

// reduce the volume
<span class="psymbol">music</span>.volume = 50;

// make it loop
<span class="psymbol">music</span>.loop = true;

// Play it
<span class="psymbol">music</span>.play();
</code></pre>
  </div>
</section>


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
        <code class="prettyprint"><a class="decl_anchor" href="#Music" id="Music">class Music: <span class="ddoc_psuper_symbol">dsfml.audio.soundstream.SoundStream</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Streamed music played from an audio file.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Music.this" id="Music.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Music.openFromFile" id="Music.openFromFile">bool openFromFile(string filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Open a music from an audio file.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't start playing the music (call <code class="prettyprint">play()</code> to do so).
<br><br>
 The supported audio formats are: WAV (PCM only), OGG/Vorbis, FLAC. The
 supported sample sizes for FLAC and WAV are 8, 16, 24 and 32 bit.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">string filename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the music file to open
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Music.openFromMemory" id="Music.openFromMemory">bool openFromMemory(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Open a music from an audio file in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't start playing the music (call <code class="prettyprint">play()</code> to do so).
<br><br>
 The supported audio formats are: WAV (PCM only), OGG/Vorbis, FLAC. The
 supported sample sizes for FLAC and WAV are 8, 16, 24 and 32 bit.
<br><br>
 Since the music is not loaded completely but rather streamed
 continuously, the data must remain available as long as the music is
 playing (ie. you can't deallocate it right after calling this function).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(void)[] data</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The array of data
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Music.openFromStream" id="Music.openFromStream">bool openFromStream(InputStream stream);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Open a music from an audio file in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't start playing the music (call <code class="prettyprint">play()</code> to do so).
<br><br>
 The supported audio formats are: WAV (PCM only), OGG/Vorbis, FLAC. The
 supported sample sizes for FLAC and WAV are 8, 16, 24 and 32 bit.
<br><br>
 Since the music is not loaded completely but rather streamed
 continuously, the stream must remain available as long as the music is
 playing (ie. you can't deallocate it right after calling this function).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream stream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read from
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Music.getDuration" id="Music.getDuration">const Time getDuration();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the total duration of the music.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Music duration
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Music.onGetData" id="Music.onGetData">protected bool onGetData(ref const(short)[] samples);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request a new chunk of audio samples from the stream source.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function fills the chunk from the next samples to read from the
 audio file.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(short)[] samples</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of samples to fill
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
    <code class="prettyprint">true</code> to continue playback, <code class="prettyprint">false</code> to stop.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Music.onSeek" id="Music.onSeek">protected void onSeek(Time timeOffset);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the current playing position in the stream source.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Time timeOffset</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New playing position, from the start of the music
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
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