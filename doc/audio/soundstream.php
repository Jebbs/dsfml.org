<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.soundstream</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.soundstream</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Unlike audio buffers (see <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a>), audio streams are never
 completely loaded in memory. Instead, the audio data is acquired continuously
 while the stream is playing. This behaviour allows to play a sound with no
 loading delay, and keeps the memory consumption very low.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Sound sources that need to be streamed are usually big files (compressed
 audio musics that would eat hundreds of MB in memory) or files that would
 take a lot of time to be received (sounds played over the network).
<br><br>
 <u>SoundStream</u> is a base class that doesn't care about the stream source,
 which is left to the derived class. SFML provides a built-in specialization
 for big files (see <a class="dsfml_link" href="../audio/music.php" title="Streamed music played from an audio file.">Music</a>). No network stream source is provided, but
 you can write your own by combining this class with the network module.
<br><br>
 A derived class has to override two virtual functions:
 <ul class="lists"> <li><code class="prettyprint">onGetData</code> fills a new chunk of audio data to be played</li>
 <li><code class="prettyprint">onSeek</code> changes the current playing position in the source</li></ul>
<br><br>
 <p class="para"> It is important to note that each <u>SoundStream</u> is played in its own
 separate thread, so that the streaming loop doesn't block the rest of the
 program. In particular, the <code class="prettyprint">onGetData</code> and <code class="prettyprint">onSeek</code> virtual functions may
 sometimes be called from this separate thread. It is important to keep this
 in mind, because you may have to take care of synchronization issues if you
 share data between threads.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">class CustomStream : SoundStream
{

    bool open(const(char)[] location)
    {
        // Open the source and get audio settings
        ...
        uint channelCount = ...;
        unint sampleRate = ...;

        // Initialize the stream -- important!
        initialize(channelCount, sampleRate);
    }

protected:
    override bool onGetData(ref const(short)[] samples)
    {
        // Fill the chunk with audio data from the stream source
        // (note: must not be empty if you want to continue playing)

        // Return true to continue playing
        return true;
    }

    override void onSeek(Uint32 timeOffset)
    {
        // Change the current position in the stream source
        ...
    }
}

// Usage
auto stream = CustomStream();
stream.open("path/to/stream");
stream.play();
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/music.php" title="Streamed music played from an audio file.">Music</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream" id="SoundStream">abstract class SoundStream: <span class="ddoc_psuper_symbol">dsfml.audio.soundsource.SoundSource</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Abstract base class for streamed audio sources.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.this" id="SoundStream.this">protected this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Internal constructor required to set up callbacks.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.initialize" id="SoundStream.initialize">protected void initialize(uint channelCount, uint sampleRate);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define the audio stream parameters.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function must be called by derived classes as soon as they know the
 audio settings of the stream to play. Any attempt to manipulate the
 stream (<code class="prettyprint">play()</code>, ...) before calling this function will fail. It can be
 called multiple times if the settings of the audio stream change, but
 only when the stream is stopped.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint channelCount</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Number of channels of the stream
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
      Sample rate, in samples per second
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.pitch" id="SoundStream.pitch">@property void pitch(float newPitch);
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.volume" id="SoundStream.volume">@property void volume(float newVolume);
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.position" id="SoundStream.position">@property void position(Vector3f newPosition);
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.isLooping" id="SoundStream.isLooping">@property void isLooping(bool loop);
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
    Whether or not the stream should loop after reaching the end.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If set, the stream will restart from the beginning after reaching the end
 and so on, until it is stopped or looping is set to <code class="prettyprint">false</code>.
<br><br>
 Default looping state for streams is <code class="prettyprint">false</code>.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.playingOffset" id="SoundStream.playingOffset">@property void playingOffset(Time offset);
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
    The current playing position (from the beginning) of the stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The playing position can be changed when the stream is either paused or
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.relativeToListener" id="SoundStream.relativeToListener">@property void relativeToListener(bool relative);
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.minDistance" id="SoundStream.minDistance">@property void minDistance(float distance);
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.attenuation" id="SoundStream.attenuation">@property void attenuation(float newAttenuation);
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.channelCount" id="SoundStream.channelCount">const @property uint channelCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The number of channels of the stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    1 channel means mono sound, 2 means stereo, etc.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.sampleRate" id="SoundStream.sampleRate">const @property uint sampleRate();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The stream sample rate of the stream

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The sample rate is the number of audio samples played per second. The
 higher, the better the quality.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.status" id="SoundStream.status">const @property Status status();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The current status of the stream (stopped, paused, playing)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.play" id="SoundStream.play">void play();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Start or resume playing the audio stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function starts the stream if it was stopped, resumes it if it was
 paused, and restarts it from the beginning if it was already playing. This
 function uses its own thread so that it doesn't block the rest of the
 program while the stream is played.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.pause" id="SoundStream.pause">void pause();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Pause the audio stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function pauses the stream if it was playing, otherwise (stream
 already paused or stopped) it has no effect.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.stop" id="SoundStream.stop">void stop();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Stop playing the audio stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function stops the stream if it was playing or paused, and does
 nothing if it was already stopped. It also resets the playing position
 (unlike pause()).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.onGetData" id="SoundStream.onGetData">protected abstract bool onGetData(ref const(short)[] samples);
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
    This function must be overridden by derived classes to provide the audio
 samples to play. It is called continuously by the streaming loop, in a
 separate thread. The source can choose to stop the streaming loop at any
 time, by returning <code class="prettyprint">false</code> to the caller. If you return <code class="prettyprint">true</code> (i.e. continue
 streaming) it is important that the returned array of samples is not
 empty; this would stop the stream due to an internal limitation.


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

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundStream.onSeek" id="SoundStream.onSeek">protected abstract void onSeek(Time timeOffset);
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
<div class="ddoc_description">
  <p class="para">
    This function must be overridden by derived classes to allow random
 seeking into the stream source.


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
      New playing position, relative to the start of the stream
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