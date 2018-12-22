<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.soundbuffer</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.soundbuffer</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A sound buffer holds the data of a sound, which is an array of audio samples.
 A sample is a 16 bits signed integer that defines the amplitude of the sound
 at a given time. The sound is then restituted by playing these samples at a
 high rate (for example, 44100 samples per second is the standard rate used
 for playing CDs). In short, audio samples are like texture pixels, and a
 SoundBuffer is similar to a Texture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    A sound buffer can be loaded from a file (see <code class="prettyprint">loadFromFile()</code> for the
 complete list of supported formats), from memory, from a custom stream
 (see <a class="dsfml_link" href="../system/inputstream.php" title="Interface for custom file input streams.">InputStream</a>) or directly from an array of samples. It can also
 be saved back to a file.
<br><br>
 Sound buffers alone are not very useful: they hold the audio data but cannot
 be played. To do so, you need to use the <a class="dsfml_link" href="../audio/sound.php" title="Regular sound that can be played in the audio environment.">Sound</a> class, which provides
 functions to play/pause/stop the sound as well as changing the way it is
 outputted (volume, pitch, 3D position, ...).
<br><br>
 This separation allows more flexibility and better performances: indeed a
 <u>SoundBuffer</u> is a heavy resource, and any operation on it is slow (often
 too slow for real-time applications). On the other side, a <a class="dsfml_link" href="../audio/sound.php" title="Regular sound that can be played in the audio environment.">Sound</a> is a
 lightweight object, which can use the audio data of a sound buffer and change
 the way it is played without actually modifying that data. Note that it is
 also possible to bind several <a class="dsfml_link" href="../audio/sound.php" title="Regular sound that can be played in the audio environment.">Sound</a> instances to the same
 <u>SoundBuffer</u>.
<br><br>
 It is important to note that the Sound instance doesn't copy the buffer that
 it uses, it only keeps a reference to it. Thus, a <u>SoundBuffer</u> must not
 be destructed while it is used by a Sound (i.e. never write a function that
 uses a local <u>SoundBuffer</u> instance for loading a sound).


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare a new sound buffer
auto buffer = SoundBuffer();

// Load it from a file
if (!buffer.loadFromFile("sound.wav"))
{
    // error...
}

// Create a sound source and bind it to the buffer
auto sound1 = new Sound();
sound1.setBuffer(buffer);

// Play the sound
sound1.play();

// Create another sound source bound to the same buffer
auto sound2 = new Sound();
sound2.setBuffer(buffer);

// Play it with a higher pitch -- the first sound remains unchanged
sound2.pitch = 2;
sound2.play();
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/sound.php" title="Regular sound that can be played in the audio environment.">Sound</a>, <a class="dsfml_link" href="../audio/soundbufferrecorder.php" title="Specialized SoundRecorder which stores the captured audio data into a sound buffer.">SoundBufferRecorder</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer" id="SoundBuffer">class SoundBuffer;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Storage for audio samples defining a sound.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.this" id="SoundBuffer.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.getSamples" id="SoundBuffer.getSamples">const const(short[]) getSamples();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the array of audio samples stored in the buffer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The format of the returned samples is 16 bits signed integer (short).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Read-only array of sound samples.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.getSampleRate" id="SoundBuffer.getSampleRate">const uint getSampleRate();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the sample rate of the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The sample rate is the number of samples played per second. The higher,
 the better the quality (for example, 44100 samples/s is CD quality).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Sample rate (number of samples per second).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.getChannelCount" id="SoundBuffer.getChannelCount">const uint getChannelCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the number of channels used by the sound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the sound is mono then the number of channels will be 1, 2 for stereo,
 etc.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Number of channels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.getDuration" id="SoundBuffer.getDuration">const Time getDuration();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the total duration of the sound.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Sound duration.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.loadFromFile" id="SoundBuffer.loadFromFile">bool loadFromFile(const(char)[] filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the sound buffer from a file.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
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
  <code class="prettyprint">const(char)[] filename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the sound file to load
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.loadFromMemory" id="SoundBuffer.loadFromMemory">bool loadFromMemory(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the sound buffer from a file in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.loadFromSamples" id="SoundBuffer.loadFromSamples">bool loadFromSamples(const(short[]) samples, uint channelCount, uint sampleRate);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the sound buffer from an array of audio samples.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The assumed format of the audio samples is 16 bits signed integer
 (short).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(short[]) samples</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of samples in memory
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint channelCount</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Number of channels (1 = mono, 2 = stereo, ...)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint sampleRate</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Sample rate (number of samples to play per second)
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBuffer.saveToFile" id="SoundBuffer.saveToFile">const bool saveToFile(const(char)[] filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Save the sound buffer to an audio file.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported audio formats are: WAV, OGG/Vorbis, FLAC.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] filename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the sound file to write
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
    <code class="prettyprint">true</code> if saving succeeded, <code class="prettyprint">false</code> if it failed.
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