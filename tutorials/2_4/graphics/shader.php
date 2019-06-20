<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Adding special effects with shaders");

section("Introduction");
paragraph(
"A shader is a small program that is executed on the graphics card. It provides
the programmer with more control over the drawing process and in a more flexible
and simple way than using the fixed set of states and operations provided by
OpenGL. With this additional flexibility, shaders are used to create effects that
would be too complicated, if not impossible, to describe with regular OpenGL
functions: Per-pixel lighting, shadows, etc. Today's graphics cards and newer
versions of OpenGL are already entirely shader-based, and the fixed set of
states and functions (which is called the \"fixed pipeline\") that you might
know of has been deprecated and will likely be removed in the future."
);
paragraph(
"Shaders are written in GLSL (".em("OpenGL Shading Language")."), which is very
similar to the C programming language."
);
paragraph(
"There are two types of shaders: vertex shaders and fragment (or pixel) shaders.
Vertex shaders are run for each vertex, while fragment shaders are run for every
generated fragment (pixel). Depending on what kind of effect you want to achieve,
you can provide a vertex shader, a fragment shader, or both."
);
paragraph(
"To understand what shaders do and how to use them efficiently, it is important
to understand the basics of the rendering pipeline. You must also learn how to
write GLSL programs and find good tutorials and examples to get started. You can
also have a look at the \"Shader\" example that comes with the SFML SDK."
);
paragraph(
"This tutorial will only focus on the DSFML specific part: Loading and applying
your shaders -- not writing them."
);

section("Loading Shaders");
paragraph(
"In DSFML, shaders are represented by the $SHADER class. It handles both the
vertex and fragment shaders: A $SHADER object is a combination of both (or
only one, if the other is not provided)."
);
paragraph(
"Even though shaders have become commonplace, there are still old graphics cards
that might not support them. The first thing you should do in your program is
check if shaders are available on the system:"
);
code("
if (!Shader.isAvailable())
{
    // shaders are not available...
}
");
paragraph(
"Any attempt to use the $SHADER class will fail if ".cl("Shader.isAvailable()").
" returns false."
);
paragraph(
"The most common way of loading a shader is from a file on disk, which is done
with the ".cl("loadFromFile")." function."
);
code('
Shader shader = new Shader();

// load only the vertex shader
if (!shader.loadFromFile("vertex_shader.vert", Shader.Type.Vertex))
{
    // error...
}

// load only the fragment shader
if (!shader.loadFromFile("fragment_shader.frag", Shader.Type.Fragment))
{
    // error...
}

// load both shaders
if (!shader.loadFromFile("vertex_shader.vert", "fragment_shader.frag"))
{
    // error...
}
');
paragraph(
'Shader source is contained in simple text files (like your C++ code). Their
extension doesn\'t really matter, it can be anything you want, you can even omit
it. ".vert" and ".frag" are just examples of possible extensions.'
);
important(
'The '.cl("loadFromFile").' function can sometimes fail with no obvious reason.
First, check the error message that DSFML prints to the standard output (check
the console). If the message is "'.em("unable to open file").'", make sure that
the '.em("working directory").' (which is the directory that any file path will
be interpreted relative to) is what you think it is: When you run the
application from your desktop environment, the working directory is the
executable folder. However, when you launch your program from your IDE (Visual
Studio, Code::Blocks, ...) the working directory might sometimes be set to the '.
em("project directory").' instead. This can usually be changed quite easily in
the project settings.'
);
paragraph(
"Shaders can also be loaded directly from strings, with the ".
cl("loadFromMemory")." function. This can be useful if you want to embed the
shader source directly into your program."
);
code("
string vertexShader =
`void main()
{
    ...
}`;

string fragmentShader =
`void main()
{
    ...
}`;

// load only the vertex shader
if (!shader.loadFromMemory(vertexShader, Shader.Type.Vertex))
{
    // error...
}

// load only the fragment shader
if (!shader.loadFromMemory(fragmentShader, Shader.Type.Fragment))
{
    // error...
}

// load both shaders
if (!shader.loadFromMemory(vertexShader, fragmentShader))
{
    // error...
}
");
paragraph(
"And finally, like all other DSFML resources, shaders can also be loaded from a
custom input stream with the ".cl("loadFromStream")." function."
);
paragraph(
"If loading fails, don't forget to check the standard error output (the console)
to see a detailed report from the GLSL compiler."
);

section("Using a shader");
paragraph(
"Using a shader is simple, just pass it to the draw function using a
$RENDERSTATES object."
);
code("
RenderStates states;
states.shader = myShader;
window.draw(whatever, states);
");

section("Passing variables to a shader");
paragraph(
"Like any other program, a shader can take parameters so that it is able to
behave differently from one draw to another. These parameters are declared as
global variables known as ".cl("uniforms")." in the shader."
);
code("
uniform float myvar;

void main()
{
    // use myvar...
}
");
paragraph(
"Uniforms can be set by the C++ program, using the various overloads of the ".
cl("setUniform")." function in the $SHADER class."
);
paragraph(
cl("setUniform")."'s overloads support all the types provided by DSFML:"
);
ul(array(
    cl("float")." (GLSL type ".cl("float").")",
    "2 ".cl("floats").", ".cl("Vector2f")." (GLSL type ".cl("vec2").")",
    "3 ".cl("floats").", ".cl("Vector3f")." (GLSL type ".cl("vec3").")",
    "4 ".cl("floats")." (GLSL type ".cl("vec4").")",
    cl("Color")." (GLSL type ".cl("vec4").")",
    cl("Transform")." (GLSL type ".cl("mat4").")",
    cl("Texture")." (GLSL type ".cl("sampler2D").")"
));
important(
'The GLSL compiler optimizes out unused variables (here, "unused" means "not
involved in the calculation of the final vertex/pixel"). So don\'t be surprised
if you get error messages such as '.em('Failed to find variable "xxx" in shader"').
' when you call '.cl("setUniform").' during your tests.'
);

section("Minimal shaders");
paragraph(
"You won't learn how to write GLSL shaders here, but it is essential that you
know what input DSFML provides to the shaders and what it expects you to do with
it."
);
subsection("Vertex shader");
paragraph(
"DSFML has a fixed vertex format which is described by the $VERTEX structure. An
DSFML vertex contains a 2D position, a color, and 2D texture coordinates. This
is the exact input that you will get in the vertex shader, stored in the
built-in ".cl("gl_Vertex").", ".cl("gl_Color")." and ".cl("gl_MultiTexCoord0").
" variables (you don't need to declare them)."
);
code("
void main()
{
    // transform the vertex position
    gl_Position = gl_ModelViewProjectionMatrix * gl_Vertex;

    // transform the texture coordinates
    gl_TexCoord[0] = gl_TextureMatrix[0] * gl_MultiTexCoord0;

    // forward the vertex color
    gl_FrontColor = gl_Color;
}
");
paragraph(
"The position usually needs to be transformed by the model-view and projection
matrices, which contain the entity transform combined with the current view. The
texture coordinates need to be transformed by the texture matrix (this matrix
likely doesn't mean anything to you, it is just an SFML implementation detail).
And finally, the color just needs to be forwarded. Of course, you can ignore the
texture coordinates and/or the color if you don't make use of them.<br> 
All these variables will then be interpolated over the primitive by the graphics
card, and passed to the fragment shader."
);
subsection("Fragment shader");
paragraph(
"The fragment shader functions quite similarly: It receives the texture
coordinates and the color of a generated fragment. There's no position any more,
at this point the graphics card has already computed the final raster position
of the fragment. However if you deal with textured entities, you'll also need
the current texture."
);
code("
uniform sampler2D texture;

void main()
{
    // lookup the pixel in the texture
    vec4 pixel = texture2D(texture, gl_TexCoord[0].xy);

    // multiply it by the color
    gl_FragColor = gl_Color * pixel;
}
");
paragraph(
"The current texture is not automatic, you need to treat it like you do the
other input variables, and explicitly set it from your C++ program. Since each
entity can have a different texture, and worse, there might be no way for you to
get it and pass it to the shader, DSFML provides a special overload of the ".
cl("setUniform")." function that does this job for you."
);
code('
shader.setParameter("texture", Shader.CurrentTexture);
');
paragraph(
"This special parameter automatically sets the texture of the entity being drawn
to the shader variable with the given name. Every time you draw a new entity,
DSFML will update the shader texture variable accordingly."
);
paragraph(
"If you want to see nice examples of shaders in action, you can have a look at
the Shader example in the SFML SDK."
);

section("Using DSFML's Shader with OpenGL code");
paragraph(
"If you're using OpenGL rather than the graphics entities of DSFML, you can
still use $SHADER as a wrapper around an OpenGL program object and use it within
your OpenGL code."
);
paragraph(
"To activate a $SHADER for drawing (the equivalent of ".cl("glUseProgram")."),
you have to call the ".cl("bind")." static function:"
);
code("
auto shader = new Shader (...);
...

// bind the shader
Shader.bind(shader);

// draw your OpenGL entity here...

// bind no shader
Shader.bind(null);
");
foot();
?>