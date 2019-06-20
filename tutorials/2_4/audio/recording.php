<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Recording audio");
section("Recording to a sound buffer");
paragraph(
"The most common use for captured audio data is for it to be saved to a sound
buffer ($SOUNDBUFFER) so that it can either be played or saved to a file."
);
paragraph(
"This can be achieved with the very simple interface of the $SOUNDBUFFERRECORDER
class:"
);
code("
// first check if an input audio device is available on the system
if (!SoundBufferRecorder.isAvailable())
{
    // error: audio capture is not available on this system
    ...
}

// create the recorder
auto recorder = new SoundBufferRecorder();

// start the capture
recorder.start();

// wait...

// stop the capture
recorder.stop();

// retrieve the buffer that contains the captured audio data
const(SoundBuffer) buffer = recorder.getBuffer();
");
paragraph(
"The ".cl("SoundBufferRecorderisAvailable")." static function checks if audio
recording is supported by the system. It if returns false, you won't be able to
use the $SOUNDBUFFERRECORDER class at all."
);
paragraph(
"The ".cl("start")." and ".cl("stop")." functions are self-explanatory. The
capture runs in its own thread, which means that you can do whatever you want
between start and stop. After the end of the capture, the recorded audio data is
available in a sound buffer that you can get with the ".cl("getBuffer").
" function."
);
paragraph(
"With the recorded data, you can then:"
);
ul(array(
    "Save it to a file"
));
code('
buffer.saveToFile("my_record.ogg");
');
ul(array(
    "Play it directly"
));
code('
Sound sound = new Sound(buffer);
sound.play();
');
ul(array(
    "Access the raw audio data and analyze it, transform it, etc."
));
code('
const(short[]) samples = buffer.getSamples();
doSomething(samples);
');
important(
"If you want to use the captured audio data after the recorder is destroyed or
restarted, don't forget to make a ".em("copy")." of the buffer."
);

section("Selecting the input device");
paragraph(
"If you have multiple sound input devices connected to your computer (for
example a microphone, a sound interface (external soundcard) or a webcam 
microphone) you can specify the device that is used for recording. A sound input
device is identified by its name. A ".cl("string[]")." containing the names of
all connected devices is available through the static ".
cl("SoundBufferRecorder::getAvailableDevices()")." function. You can then select
a device from the list for recording, by passing the chosen device name to the
".cl("setDevice()")." method. It is even possible to change the device on the
fly (i.e. while recording)."
);
paragraph(
"The name of the currently used device can be obtained by calling ".
cl("getDevice()").". If you don't choose a device yourself, the default device
will be used. Its name can be obtained through the static ".
cl("SoundBufferRecorder.getDefaultDevice()")." function."
);
paragraph(
"Here is a small example of how to set the input device:"
);
code("
// get the available sound input device names
auto availableDevices = SoundRecorder.getAvailableDevices();

// choose a device
string inputDevice = availableDevices[0];

// create the recorder
sf::SoundBufferRecorder recorder;

// set the device
if (!recorder.setDevice(inputDevice))
{
    // error: device selection failed
    ...
}

// use recorder as usual
");

section("Custom recording");
paragraph(
"If storing the captured data in a sound buffer is not what you want, you can
write your own recorder. Doing so will allow you to process the audio data while
it is captured, (almost) directly from the recording device. This way you can,
for example, stream the captured audio over the network, perform real-time
analysis on it, etc."
);
paragraph(
"To write your own recorder, you must inherit from the $SOUNDRECORDER abstract
base class. In fact, $SOUNDBUFFERRECORDER is just a built-in specialization of
this class."
);
paragraph(
"You only have a single virtual function to override in your derived class:
".cl("onProcessSamples").". It is called every time a new chunk of audio samples
is captured, so this is where you implement your specific stuff."
);
paragraph(
"By default Audio samples are provided to the ".cl("onProcessSamples")." method
every 100 ms. You can change the interval by using the ".
cl("setProcessingInterval")." method. You may want to use a smaller interval if
you want to process the recorded data in real time, for example. Note that this
is only a hint and that the actual period may vary, so don't rely on it to
implement precise timing."
);
paragraph(
"There are also two additional virtual functions that you can optionally
override: ".cl("onStart")." and ".cl("onStop").". They are called when the
capture starts/stops respectively. They are useful for initialization/cleanup
tasks."
);
paragraph(
"Here is the skeleton of a complete derived class:"
);
code("
class MyRecorder : SoundRecorder
{
    override bool onStart() // optional
    {
        // initialize whatever has to be done before the capture starts
        ...

        // return true to start the capture, or false to cancel it
        return true;
    }

    override bool onProcessSamples(const(short)[] samples)
    {
        // do something useful with the new chunk of samples
        ...

        // return true to continue the capture, or false to stop it
        return true;
    }

    override void onStop() // optional
    {
        // clean up whatever has to be done after the capture is finished
        ...
    }
}
");
paragraph(
"The ".cl("isAvailable")."/".cl("start")."/".cl("stop")." functions are defined
in the $SOUNDRECORDER base, and thus inherited in every derived classes. This
means that you can use any recorder class exactly the same way as the 
$SOUNDBUFFERRECORDER class above."
);
code("
if (!MyRecorder.isAvailable())
{
    // error...
}

auto recorder = new MyRecorder();
recorder.start();
...
recorder.stop();
");

section("Threading issues");
paragraph(
"Since recording is done in a separate thread, it is important to know what
exactly happens, and where."
);
paragraph(
cl("onStart")." will be called directly by the ".cl("start")." function, so it
is executed in the same thread that called it. However, ".cl("onProcessSample").
" and ".cl("onStop")." will always be called from the internal recording thread
that DSFML creates."
);
paragraph(
"If your recorder uses data that may be accessed ".em("concurrently")." in both
the caller thread and in the recording thread, you have to protect it (with a
mutex for example) in order to avoid concurrent access, which may cause
undefined behavior -- corrupt data being recorded, crashes, etc."
);
paragraph(
"If you're not familiar enough with threading in D, Ali Çehreli has some
excellent tutorials on the subject: ".lnk("http://ddili.org/ders/d.en/concurrency.html", "here").
" and ".lnk("http://ddili.org/ders/d.en/concurrency_shared.html", "here")."."
);
foot();
?>