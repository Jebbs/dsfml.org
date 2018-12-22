<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.soundbufferrecorder</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.soundbufferrecorder</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>SoundBufferRecorder</u> allows to access a recorded sound through a
 <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a>, so that it can be played, saved to a file, etc.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It has the same simple interface as its base class (<code class="prettyprint">start()</code>, <code class="prettyprint">stop()</code>) and
 adds a function to retrieve the recorded sound buffer (<code class="prettyprint">getBuffer()</code>).
<br><br>
 As usual, don't forget to call the <code class="prettyprint">isAvailable()</code> function before using this
 class (see <a class="dsfml_link" href="../audio/soundrecorder.php" title="Abstract base class for capturing sound data.">SoundRecorder</a> for more details about this).


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">if (SoundBufferRecorder.isAvailable())
{
    // Record some audio data
    auto recorder = SoundBufferRecorder();
    recorder.start();
    ...
    recorder.stop();

    // Get the buffer containing the captured audio data
    auto buffer = recorder.getBuffer();

    // Save it to a file (for example...)
    buffer.saveToFile("my_record.ogg");
}
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/soundrecorder.php" title="Abstract base class for capturing sound data.">SoundRecorder</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBufferRecorder" id="SoundBufferRecorder">class SoundBufferRecorder: <span class="ddoc_psuper_symbol">dsfml.audio.soundrecorder.SoundRecorder</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specialized SoundRecorder which stores the captured audio data into a sound
 buffer.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBufferRecorder.this" id="SoundBufferRecorder.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBufferRecorder.getBuffer" id="SoundBufferRecorder.getBuffer">const const(SoundBuffer) getBuffer();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the sound buffer containing the captured audio data.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The sound buffer is valid only after the capture has ended. This function
 provides a read-only access to the internal sound buffer, but it can be
 copied if you need to make any modification to it.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Read-only access to the sound buffer.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBufferRecorder.onStart" id="SoundBufferRecorder.onStart">protected bool onStart();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Start capturing audio data.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> to start the capture, or <code class="prettyprint">false</code> to abort it.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBufferRecorder.onProcessSamples" id="SoundBufferRecorder.onProcessSamples">protected bool onProcessSamples(const(short)[] samples);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Process a new chunk of recorded samples.

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
      Array of the new chunk of recorded samples
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
    <code class="prettyprint">true</code> to continue the capture, or <code class="prettyprint">false</code> to stop it.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundBufferRecorder.onStop" id="SoundBufferRecorder.onStop">protected void onStop();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Stop capturing audio data.
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