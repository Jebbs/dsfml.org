<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.inputsoundfile</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.inputsoundfile</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>InputSoundFile</u> decodes audio samples from a sound file. It is used
 internally by higher-level classes such as <a class="dsfml_link" href="../audio/soundbuffer.php" title="Storage for audio samples defining a sound.">SoundBuffer</a> and
 <a class="dsfml_link" href="../audio/music.php" title="Streamed music played from an audio file.">Music</a>, but can also be useful if you want to process or analyze audio
 files without playing them, or if you want to implement your own version of
 <a class="dsfml_link" href="../audio/music.php" title="Streamed music played from an audio file.">Music</a> with more specific features.

  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Open a sound file
auto file = new InputSoundFile();
if (!file.openFromFile("music.ogg"))
{
     //error
}

// Print the sound attributes
writeln("duration: ", file.getDuration().total!"seconds");
writeln("channels: ", file.getChannelCount());
writeln("sample rate: ", file.getSampleRate());
writeln("sample count: ", file.getSampleCount());

// Read and process batches of samples until the end of file is reached
short samples[1024];
long count;
do
{
    count = file.read(samples, 1024);

    // process, analyze, play, convert, or whatever
    // you want to do with the samples...
}
while (count &gt; 0);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/outputsoundfile.php" title="Provide write access to sound files.">OutputSoundFile</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile" id="InputSoundFile">class InputSoundFile;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Provide read access to sound files.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.this" id="InputSoundFile.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.openFromFile" id="InputSoundFile.openFromFile">bool openFromFile(const(char)[] filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Open a sound file from the disk for reading.

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
    <code class="prettyprint">true</code> if the file was successfully opened.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.openFromMemory" id="InputSoundFile.openFromMemory">bool openFromMemory(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Open a sound file in memory for reading.

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
      file data in memory
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
    <code class="prettyprint">true</code> if the file was successfully opened.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.openFromStream" id="InputSoundFile.openFromStream">bool openFromStream(InputStream stream);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Open a sound file from a custom stream for reading.

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
    <code class="prettyprint">true</code> if the file was successfully opened.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.read" id="InputSoundFile.read">long read(short[] samples);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Read audio samples from the open file.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">short[] samples</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of samples to fill
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
    Number of samples actually read (may be less samples.length)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.seek" id="InputSoundFile.seek">void seek(long sampleOffset);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the current read position to the given sample offset.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function takes a sample offset to provide maximum precision. If you
 need to jump to a given time, use the other overload.
<br><br>
 The sample offset takes the channels into account. Offsets can be
 calculated like this: sampleNumber * sampleRate * channelCount.
 If the given offset exceeds to total number of samples, this function
 jumps to the end of the sound file.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">long sampleOffset</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Index of the sample to jump to, relative to the beginning
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
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.seek.2" id="InputSoundFile.seek.2">void seek(Time timeOffset);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the current read position to the given time offset.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Using a time offset is handy but imprecise. If you need an accurate
 result, consider using the overload which takes a sample offset.
<br><br>
 If the given time exceeds to total duration, this function jumps to the
 end of the sound file.


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
      Time to jump to, relative to the beginning
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
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.getSampleCount" id="InputSoundFile.getSampleCount">const long getSampleCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the total number of audio samples in the file

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Number of samples.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.getSampleRate" id="InputSoundFile.getSampleRate">const uint getSampleRate();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the sample rate of the sound

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Sample rate, in samples per second.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#InputSoundFile.getChannelCount" id="InputSoundFile.getChannelCount">const uint getChannelCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the number of channels used by the sound

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Number of channels (1 = mono, 2 = stereo).
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