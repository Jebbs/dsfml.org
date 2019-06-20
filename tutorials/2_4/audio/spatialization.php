<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Spatialization: Sounds in 3D");
section("Introduction");
paragraph(
"By default, sounds and music are played at full volume in each speaker; they
are not ".em("spatialized")."."
);
paragraph(
"If a sound is emitted by an entity which is to the right of the screen, you
would probably want to hear it from the right speaker. If a music is being
played behind the player, you would want to hear it from the rear speakers of
your Dolby 5.1 sound system."
);
paragraph(
"How can this be achieved?"
);

section("Spatialized sounds are mono");
important(
"A sound can be spatialized only if it has a single channel, i.e. if it's a mono
sound.<br>
Spatialization is disabled for sounds with more channels, since they already
explicitly decide how to use the speakers. This is very important to keep in
mind."
);

section("The listener");
paragraph(
"All the sounds and music in your audio environment will be heard by a single
actor: the ".em("listener").". What is output from your speakers is determined
by what the listener hears."
);
paragraph(
"The class which defines the listener's properties is $LISTENER. Since the
listener is unique in the environment, this class only contains static functions
and is not meant to be instantiated."
);
paragraph(
"First, you can set the listener's position in the scene:"
);
code("
Listener.position = Vector3f(10.f, 0.f, 5.f);
");
paragraph(
"If you have a 2D world you can just use the same Y value everywhere, usually
0."
);
paragraph(
"In addition to its position, you can define the listener's orientation:"
);
code("
Listener.direction = Vector3f(1.f, 0.f, 0.f);
");
paragraph(
"Here, the listener is oriented along the +X axis. This means that, for example,
a sound emitted at (15, 0, 5) will be heard from the right speaker."
);
paragraph(
'The "up" vector of the listener is set to (0, 1, 0) by default, in other words,
the top of the listener\'s head is pointing towards +Y. You can change the "up"
vector if you want. It is rarely necessary though.'
);
code("
Listener.upVector(1.f, 1.f, 0.f);
");
paragraph(
"This corresponds to the listener tilting their head towards the right (+X)."
);
paragraph(
"Finally, the listener can adjust the global volume of the scene:"
);
code("
Listener.globalVolume = 50.f;
");
paragraph(
"The value of the volume is in the range [0 .. 100], so setting it to 50 reduces
it to half of the original volume."
);
paragraph(
"Of course, all these are ".cl("@property")." functions so they can be read and
set."
);

section("Audio sources");
paragraph(
"Every audio source provided by DSFML (sounds, music, streams) defines the same
properties for spatialization."
);
paragraph(
"The main property is the position of the audio source."
);
code("
sound.position = Vector3f(2.f, 0.f, -5.f);
");
paragraph(
"This position is absolute by default, but it can be relative to the listener if
needed."
);
code("
sound.relativeToListener = true;
");
paragraph(
"This can be useful for sounds emitted by the listener itself (like a gun shot,
or foot steps). It also has the interesting side-effect of disabling
spatialization if you set the position of the audio source to (0, 0, 0).
Non-spatialized sounds can be required in various situations: GUI sounds
(clicks), ambient music, etc."
);
paragraph(
"You can also set the factor by which audio sources will be attenuated depending
on their distance to the listener."
);
code("
sound.minDistance = 5.f;
sound.attenuation = 10.f;
");
paragraph(
"The ".em("minimum distance")." is the distance under which the sound will be
heard at its maximum volume. As an example, louder sounds such as explosions
should have a higher minimum distance to ensure that they will be heard from far
away. Please note that a minimum distance of 0 (the sound is inside the head of
the listener!) would lead to an incorrect spatialization and result in a
non-attenuated sound. 0 is an invalid value, never use it."
);
paragraph(
"The ".em("attenuation")." is a multiplicative factor. The greater the
attenuation, the less it will be heard when the sound moves away from the
listener. To get a non-attenuated sound, you can use 0. On the other hand, using
a value like 100 will highly attenuate the sound, which means that it will be
heard only if very close to the listener."
);
paragraph(
"Here is the exact attenuation formula, in case you need accurate values:"
);
pre("
".em("MinDistance")."   is the sound's minimum distance, set with setMinDistance
".em("Attenuation")."   is the sound's attenuation, set with setAttenuation
".em("Distance")."      is the distance between the sound and the listener
".em("Volume factor")." is the calculated factor, in range [0 .. 1], that will be applied to the sound's volume

Volume factor = MinDistance / (MinDistance + Attenuation * (max(Distance, MinDistance) - MinDistance))
");
foot();
?>