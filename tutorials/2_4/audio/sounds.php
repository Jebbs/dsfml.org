<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Playing sounds and music");

section("Sound or music?");
paragraph(
"DSFML provides two classes for playing audio: $SOUND and $MUSIC. They both
provide more or less the same features, the main difference is how they work."
);
paragraph(
"$SOUND is a lightweight object that plays loaded audio data from a 
$SOUNDBUFFER. It should be used for small sounds that can fit in memory and
should suffer no lag when they are played. Examples are gun shots, foot steps,
etc."
);
paragraph(
"$MUSIC doesn't load all the audio data into memory, instead it streams it on
the fly from the source file. It is typically used to play compressed music that
lasts several minutes, and would otherwise take many seconds to load and eat
hundreds of MB in memory."
);

section("Loading and playing a sound");
paragraph(
"As mentioned above, the sound data is not stored directly in $SOUND but in a
separate class named $SOUNDBUFFER. This class encapsulates the audio data, which
is basically an array of 16-bit signed integers (called \"audio samples\"). A
sample is the amplitude of the sound signal at a given point in time, and an
array of samples therefore represents a full sound."
);
important(
"In fact, the $SOUND/$SOUNDBUFFER classes work the same way as $SPRITE/$TEXTURE
from the graphics module. So if you understand how sprites and textures work
together, you can apply the same concept to sounds and sound buffers."
);
paragraph(
"You can load a sound buffer from a file on disk with its ".cl("loadFromFile").
" function:"
);
code('
import dsfml.audio;

int main()
{
    SoundBuffer buffer = new SoundBuffer();
    if (!buffer.loadFromFile("sound.wav"))
        return -1;

    ...

    return 0;
}
');
paragraph(
"As with everything else, you can also load an audio file from memory (".
cl("loadFromMemory").") or from a custom input stream (".cl("loadFromStream").
")."
);
paragraph(
"DSFML supports the audio file formats WAV, OGG/Vorbis and FLAC. Due to
licensing issues MP3 is not supported."
);
paragraph(
"You can also load a sound buffer directly from an array of samples, in the case
they originate from another source:"
);
code("
short[] samples = ...;
buffer.loadFromSamples(samples, 2, 44100);
");
paragraph(
"Since ".cl("loadFromSamples")." loads a raw array of samples rather than an
audio file, it requires additional arguments in order to have a complete
description of the sound. The first one (second argument) is the number of
channels; 1 channel defines a mono sound, 2 channels define a stereo sound, etc.
The second additional attribute (third argument) is the sample rate; it defines
how many samples must be played per second in order to reconstruct the original
sound."
);
paragraph(
"Now that the audio data is loaded, we can play it with a $SOUND instance."
);
code("
SoundBuffer buffer = new SoundBuffer();
// load something into the sound buffer...

Sound sound = new Sound();
sound.setBuffer(buffer);
sound.play();
");
paragraph(
"The cool thing is that you can assign the same sound buffer to multiple sounds
if you want. You can even play them together without any issues."
);
important(
"Sounds (and music) are played in a separate thread. This means that you are
free to do whatever you want after calling ".cl("play()")." (except destroying
the sound or its data, of course), the sound will continue to play until it's
finished or explicitly stopped."
);

section("Playing a music");
paragraph(
"Unlike $SOUND, $MUSIC doesn't pre-load the audio data, instead it streams the
data directly from the source. The initialization of music is thus more direct:"
);
code('
Music music = new Music();
if (!music.openFromFile("music.ogg"))
    return -1; // error
music.play();
');
paragraph(
"It is important to note that, unlike all other DSFML resources, the loading
function is named ".cl("openFromFile")."  instead of ".cl("loadFromFile")." .
This is because the music is not really loaded, this function merely opens it.
The data is only loaded later, when the music is played. It also helps to keep
in mind that the audio file has to remain available as long as it is played.<br>
The other loading functions of $MUSIC follow the same convention: 
".cl("openFromMemory").", ".cl("openFromStream")."."
);

section("What's next?");
paragraph(
"Now that you are able to load and play a sound or music, let's see what you can
do with it."
);
paragraph(
"To control playback, the following functions are available:"
);
ul(array(
cl("play")." starts or resumes playback",
cl("pause")." pauses playback",
cl("stop")." stops playback and rewind",
cl("setPlayingOffset")." changes the current playing position"
));
paragraph(
"Example:"
);
code("
// start playback
sound.play();

// advance to 2 seconds
sound.playingOffset = seconds(2);

// pause playback
sound.pause();

// resume playback
sound.play();

// stop playback and rewind
sound.stop();
");
paragraph(
"The ".cl("getStatus")." function returns the current status of a sound or
music, you can use it to know whether it is stopped, playing or paused."
);
paragraph(
"Sound and music playback is also controlled by a few attributes which can be
changed at any moment."
);
paragraph(
"The ".cl("pitch")." is a factor that changes the perceived frequency of the
sound: greater than 1 plays the sound at a higher pitch, less than 1 plays the
sound at a lower pitch, and 1 leaves it unchanged. Changing the pitch has a side
effect: it impacts the playing speed"
);
code("
sound.pitch = 1.2;
");
paragraph(
"The ".cl("volume")." is... the volume. The value ranges from 0 (mute) to 100
(full volume). The default value is 100, which means that you can't make a
sound louder than its initial volume."
);
code("
sound.volume = 50;
");
paragraph(
"The ".cl("loop")." property controls whether the sound/music automatically
loops or not. If it loops, it will restart playing from the beginning when it's
finished, again and again until you explicitly call stop. If not set to loop, it
will stop automatically when it's finished."
);
code("
sound.loop = true;
");
paragraph(
"More attributes are available, but they are related to spatialization and are
explained in the ".spatialization_link("corresponding tutorial")."."
);

section("Common mistakes");
subsection("Too many sounds");
paragraph(
"Another source of error is when you try to create a huge number of sounds.
DSFML internally has a limit; it can vary depending on the OS, but you should
never exceed 256. This limit is the number of $SOUND and $MUSIC instances that
can exist simultaneously. A good way to stay below the limit is to destroy (or
recycle) unused sounds when they are no longer needed. This only applies if you
have to manage a really large amount of sounds and music, of course."
);
subsection("Destroying the music source while it plays");
paragraph(
"Remember that a music needs its source as long as it is played. A music file on
your disk probably won't be deleted or moved while your application plays it,
however things get more complicated when you play a music from a file in memory,
or from a custom input stream:"
);
code('
// we start with a music file in memory (imagine that we extracted it from a zip archive)
void[] fileData = ...;

// we play it
auto music = new Music();
music.openFromMemory(fileData);
music.play();

// "ok, it seems that we don\'t need the source file any longer"
fileData.length = 0;

// ERROR: the music was still streaming the contents of fileData!
// The behavior is now undefined!
');
foot();
?>