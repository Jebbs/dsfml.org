<!DOCTYPE HTML>
  <html>
    <head>
      <meta name="theme-color" content="#333333">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.audio.soundrecorder</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.audio.soundrecorder</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>SoundRecorder</u> provides a simple interface to access the audio recording
 capabilities of the computer (the microphone).

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    As an abstract base class, it only cares about capturing sound samples, the
 task of making something useful with them is left to the derived class. Note
 that DSFML provides a built-in specialization for saving the captured data to
 a sound buffer (see <a class="dsfml_link" href="../audio/soundbufferrecorder.php" title="Specialized SoundRecorder which stores the captured audio data into a sound buffer.">SoundBufferRecorder</a>).
<br><br>
 A derived class has only one virtual function to override:
 <ul class="lists"><li>onProcessSamples provides the new chunks of audio samples while the
 capture happens</li></ul>
<br><br>
 <p class="para">Moreover, two additionnal virtual functions can be overriden as well
 if necessary:</p>
 <ul class="lists"> <li>onStart is called before the capture happens, to perform custom
 initializations</li>
 <li>onStop is called after the capture ends, to perform custom cleanup</li></ul>
<br><br>
 <p class="para"> A derived class can also control the frequency of the onProcessSamples calls,
 with the setProcessingInterval protected function. The default interval is
 chosen so that recording thread doesn't consume too much CPU, but it can be
 changed to a smaller value if you need to process the recorded data in real
 time, for example.
<br><br>
 The audio capture feature may not be supported or activated on every
 platform, thus it is recommended to check its availability with the
 <code class="prettyprint">isAvailable()</code> function. If it returns <code class="prettyprint">false</code>, then any attempt to use an
 audio recorder will fail.
<br><br>
 If you have multiple sound input devices connected to your  computer (for
 example: microphone, external soundcard, webcam mic, ...) you can get a list
 of all available devices through the <code class="prettyprint">getAvailableDevices()</code> function. You
 can then select a device by calling <code class="prettyprint">setDevice()</code> with the appropriate
 device. Otherwise the default capturing device will be used.
<br><br>
 By default the recording is in 16-bit mono. Using the setChannelCount method
 you can change the number of channels used by the audio capture device to
 record. Note that you have to decide whether you want to record in mono or
 stereo before starting the recording.
<br><br>
 It is important to note that the audio capture happens in a separate thread,
 so that it doesn't block the rest of the program. In particular, the
 <code class="prettyprint">onProcessSamples</code> and <code class="prettyprint">onStop</code> virtual functions (but not <code class="prettyprint">onStart</code>) will be
 called from this separate thread. It is important to keep this in mind,
 because you may have to take care of synchronization issues if you share data
 between threads.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">class CustomRecorder : SoundRecorder
{
    ~this()
    {
        // Make sure to stop the recording thread
        stop();
    }

    override bool onStart() // optional
    {
        // Initialize whatever has to be done before the capture starts
        ...

        // Return true to start playing
        return true;
    }

    bool onProcessSamples(const(short)[] samples)
    {
        // Do something with the new chunk of samples (store them, send them, ...)
        ...

        // Return true to continue playing
        return true;
    }

    override void onStop() // optional
    {
        // Clean up whatever has to be done after the capture ends
        ...
    }
}

// Usage
if (CustomRecorder.isAvailable())
{
    auto recorder = new CustomRecorder();

    if (!recorder.start())
        return -1;

    ...
    recorder.stop();
}
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../audio/soundbufferrecorder.php" title="Specialized SoundRecorder which stores the captured audio data into a sound buffer.">SoundBufferRecorder</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder" id="SoundRecorder">abstract class SoundRecorder;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Abstract base class for capturing sound data.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.this" id="SoundRecorder.this">protected this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.start" id="SoundRecorder.start">void start(uint theSampleRate = 44100);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Start the capture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The sampleRate parameter defines the number of audio samples captured per
 second. The higher, the better the quality (for example, 44100
 samples/sec is CD quality). This function uses its own thread so that it
 doesn't block the rest of the program while the capture runs. Please note
 that only one capture can happen at the same time.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint theSampleRate</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Desired capture rate, in number of samples per second
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.stop" id="SoundRecorder.stop">void stop();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Stop the capture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.sampleRate" id="SoundRecorder.sampleRate">const @property uint sampleRate();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the sample rate in samples per second.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The sample rate defines the number of audio samples captured per second.
 The higher, the better the quality (for example, 44100 samples/sec is CD
 quality).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.getDevice" id="SoundRecorder.getDevice">const string getDevice();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the name of the current audio capture device.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The name of the current audio capture device.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.setDevice" id="SoundRecorder.setDevice">bool setDevice(const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the audio capture device.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function sets the audio capture device to the device with the given
 name. It can be called on the fly (i.e: while recording). If you do so
 while recording and opening the device fails, it stops the recording.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the audio capture device
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
    <code class="prettyprint">true</code>, if it was able to set the requested device.


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <code class="prettyprint">getAvailableDevices</code>, <code class="prettyprint">getDefaultDevice</code>
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.getAvailableDevices" id="SoundRecorder.getAvailableDevices">static const(string)[] getAvailableDevices();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a list of the names of all available audio capture devices.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns an array of strings, containing the names of all
 available audio capture devices.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    An array of strings containing the names.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.getDefaultDevice" id="SoundRecorder.getDefaultDevice">static string getDefaultDevice();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the name of the default audio capture device.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns the name of the default audio capture device. If
 none is available, an empty string is returned.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The name of the default audio capture device.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.isAvailable" id="SoundRecorder.isAvailable">static bool isAvailable();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check if the system supports audio capture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function should always be called before using the audio capture
 features. If it returns <code class="prettyprint">false</code>, then any attempt to use SoundRecorder or
 one of its derived classes will fail.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if audio capture is supported, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.setProcessingInterval" id="SoundRecorder.setProcessingInterval">protected void setProcessingInterval(Duration interval);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the processing interval.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The processing interval controls the period between calls to the
 onProcessSamples function. You may want to use a small interval if
 you want to process the recorded data in real time, for example.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Note:</span>
this is only a hint, the actual period may vary. So don't rely
 on this parameter to implement precise timing.
<br><br>
 The default processing interval is 100 ms.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Duration interval</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Processing interval
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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.onStart" id="SoundRecorder.onStart">protected bool onStart();
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
<div class="ddoc_description">
  <p class="para">
    This virtual function may be overriden by a derived class if
 something has to be done every time a new capture starts. If not,
 this function can be ignored; the default implementation does
 nothing.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> to the start the capture, or <code class="prettyprint">false</code> to abort it.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.onProcessSamples" id="SoundRecorder.onProcessSamples">protected abstract bool onProcessSamples(const(short)[] samples);
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
<div class="ddoc_description">
  <p class="para">
    This virtual function is called every time a new chunk of recorded
 data is available. The derived class can then do whatever it wants
 with it (storing it, playing it, sending it over the network, etc.).


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
        <code class="prettyprint"><a class="decl_anchor" href="#SoundRecorder.onStop" id="SoundRecorder.onStop">protected void onStop();
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
<div class="ddoc_description">
  <p class="para">
    This virtual function may be overriden by a derived class if
 something has to be done every time the capture ends. If not, this
 function can be ignored; the default implementation does nothing.
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