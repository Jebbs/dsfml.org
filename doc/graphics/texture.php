<!DOCTYPE HTML>
  <html>
    <head>
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
      <meta name="theme-color" content="#ffffff">
      <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
      <link rel="stylesheet" type="text/css" href="/styles.css">
      <title>DSFML - dsfml.graphics.texture</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.texture</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Texture</u> stores pixels that can be drawn, with a sprite for example. A
 texture lives in the graphics card memory, therefore it is very fast to draw
 a texture to a render target, or copy a render target to a texture (the
 graphics card can access both directly).

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Being stored in the graphics card memory has some drawbacks. A texture cannot
 be manipulated as freely as a <a class="dsfml_link" href="../graphics/image.php" title="Class for loading, manipulating and saving images.">Image</a>, you need to prepare the pixels
 first and then upload them to the texture in a single operation (see
 <code class="prettyprint">Texture.update</code>).
<br><br>
 <u>Texture</u> makes it easy to convert from/to Image, but keep in mind that
 these calls require transfers between the graphics card and the central
 memory, therefore they are slow operations.
<br><br>
 A texture can be loaded from an image, but also directly from a
 file/memory/stream. The necessary shortcuts are defined so that you don't
 need an image first for the most common cases. However, if you want to
 perform some modifications on the pixels before creating the final texture,
 you can load your file to a <a class="dsfml_link" href="../graphics/image.php" title="Class for loading, manipulating and saving images.">Image</a>, do whatever you need with the
 pixels, and then call <code class="prettyprint">Texture.loadFromImage</code>.
<br><br>
 Since they live in the graphics card memory, the pixels of a texture cannot
 be accessed without a slow copy first. And they cannot be accessed
 individually. Therefore, if you need to read the texture's pixels (like for
 pixel-perfect collisions), it is recommended to store the collision
 information separately, for example in an array of booleans.
<br><br>
 Like <a class="dsfml_link" href="../graphics/image.php" title="Class for loading, manipulating and saving images.">Image</a>, <u>Texture</u> can handle a unique internal representation
 of pixels, which is RGBA 32 bits. This means that a pixel must be composed of
 8 bits red, green, blue and alpha channels – just like a <a class="dsfml_link" href="../graphics/color.php" title="Color is a utility struct for manipulating 32-bits RGBA colors.">Color</a>.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// This example shows the most common use of Texture:
// drawing a sprite

// Load a texture from a file
auto <span class="psymbol">texture</span> = new Texture();
if (!<span class="psymbol">texture</span>.loadFromFile("texture.png"))
    return -1;

// Assign it to a sprite
auto sprite = new Sprite();
sprite.setTexture(<span class="psymbol">texture</span>);

// Draw the textured sprite
window.draw(sprite);
</code></pre>
  </div>
</section>
<br><br>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// This example shows another common use of Texture:
// streaming real-time data, like video frames

// Create an empty texture
auto <span class="psymbol">texture</span> = new Texture();
if (!<span class="psymbol">texture</span>.create(640, 480))
    return -1;

// Create a sprite that will display the texture
auto sprite = new Sprite(<span class="psymbol">texture</span>);

while (...) // the main loop
{
    ...

    // update the texture

    // get a fresh chunk of pixels (the next frame of a movie, for example)
    ubyte[] pixels = ...;
    <span class="psymbol">texture</span>.update(pixels);

    // draw it
    window.draw(sprite);

    ...
}

</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Like <a class="dsfml_link" href="../graphics/shader.php" title="Shader class (vertex and fragment).">Shader</a> that can be used as a raw OpenGL shader,
 <u>Texture</u> can also be used directly as a raw texture for custom OpenGL
 geometry.</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">Texture.bind(<span class="psymbol">texture</span>);
... render OpenGL geometry ...
Texture.bind(null);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/sprite.php" title="Drawable representation of a texture, with its own transformations, color, etc.">Sprite</a>, <a class="dsfml_link" href="../graphics/image.php" title="Class for loading, manipulating and saving images.">Image</a>, <a class="dsfml_link" href="../graphics/rendertexture.php" title="Target for off-screen 2D rendering into a texture.">RenderTexture</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture" id="Texture">class Texture;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Image living on the graphics card that can be used for drawing.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.this" id="Texture.this">this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Default constructor

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Creates an empty texture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.loadFromFile" id="Texture.loadFromFile">bool loadFromFile(const(char)[] filename, IntRect area = IntRect());
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the texture from a file on disk.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The area argument can be used to load only a sub-rectangle of the whole
 image. If you want the entire image then leave the default value (which
 is an empty IntRect). If the area rectangle crosses the bounds of the
 image, it is adjusted to fit the image size.
<br><br>
 The maximum size for a texture depends on the graphics driver and can be
 retrieved with the getMaximumSize function.
<br><br>
 If this function fails, the texture is left unchanged.


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
      Path of the image file to load
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IntRect area</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Area of the image to load
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
    <code class="prettyprint">true</code> if loading was successful, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.loadFromMemory" id="Texture.loadFromMemory">bool loadFromMemory(const(void)[] data, IntRect area = IntRect());
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the texture from a file in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The area argument can be used to load only a sub-rectangle of the whole
 image. If you want the entire image then leave the default value (which
 is an empty IntRect). If the area rectangle crosses the bounds of the
 image, it is adjusted to fit the image size.
<br><br>
 The maximum size for a texture depends on the graphics driver and can be
 retrieved with the getMaximumSize function.
<br><br>
 If this function fails, the texture is left unchanged.


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
      Image in memory
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IntRect area</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Area of the image to load
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
    <code class="prettyprint">true</code> if loading was successful, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.loadFromStream" id="Texture.loadFromStream">bool loadFromStream(InputStream stream, IntRect area = IntRect());
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the texture from a custom stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The area argument can be used to load only a sub-rectangle of the whole
 image. If you want the entire image then leave the default value (which
 is an empty IntRect). If the area rectangle crosses the bounds of the
 image, it is adjusted to fit the image size.
<br><br>
 The maximum size for a texture depends on the graphics driver and can be
 retrieved with the getMaximumSize function.
<br><br>
 If this function fails, the texture is left unchanged.


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
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IntRect area</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Area of the image to load
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
    <code class="prettyprint">true</code> if loading was successful, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.loadFromImage" id="Texture.loadFromImage">bool loadFromImage(Image image, IntRect area = IntRect());
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the texture from an image.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The area argument can be used to load only a sub-rectangle of the whole
 image. If you want the entire image then leave the default value (which
 is an empty IntRect). If the area rectangle crosses the bounds of the
 image, it is adjusted to fit the image size.
<br><br>
 The maximum size for a texture depends on the graphics driver and can be
 retrieved with the getMaximumSize function.
<br><br>
 If this function fails, the texture is left unchanged.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Image image</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Image to load into the texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IntRect area</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Area of the image to load
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
    <code class="prettyprint">true</code> if loading was successful, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.getMaximumSize" id="Texture.getMaximumSize">static uint getMaximumSize();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the maximum texture size allowed.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This Maximum size is defined by the graphics driver. You can expect a
 value of 512 pixels for low-end graphics card, and up to 8192 pixels or
 more for newer hardware.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Maximum size allowed for textures, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.getSize" id="Texture.getSize">const Vector2u getSize();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the size of the texture.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Size in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.setSmooth" id="Texture.setSmooth">void setSmooth(bool smooth);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enable or disable the smooth filter.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    When the filter is activated, the texture appears smoother so that pixels
 are less noticeable. However if you want the texture to look exactly the
 same as its source file, you should leave it disabled. The smooth filter
 is disabled by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool smooth</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to enable smoothing, <code class="prettyprint">false</code> to disable it
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.setRepeated" id="Texture.setRepeated">void setRepeated(bool repeated);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enable or disable repeating.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Repeating is involved when using texture coordinates outside the texture
 rectangle [0, 0, width, height]. In this case, if repeat mode is enabled,
 the whole texture will be repeated as many times as needed to reach the
 coordinate (for example, if the X texture coordinate is 3 * width, the
 texture will be repeated 3 times).
<br><br>
 If repeat mode is disabled, the "extra space" will instead be filled with
 border pixels. Warning: on very old graphics cards, white pixels may
 appear when the texture is repeated. With such cards, repeat mode can be
 used reliably only if the texture has power-of-two dimensions
 (such as 256x128). Repeating is disabled by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool repeated</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to repeat the texture, <code class="prettyprint">false</code> to disable repeating
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.bind" id="Texture.bind">static void bind(Texture texture);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Bind a texture for rendering.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is not part of the graphics API, it mustn't be used when
 drawing DSFML entities. It must be used only if you mix Texture with
 OpenGL code.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Texture texture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The texture to bind. Can be <code class="prettyprint">null</code> to use no texture
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.create" id="Texture.create">bool create(uint width, uint height);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create the texture.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If this function fails, the texture is left unchanged.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint width</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Width of the texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint height</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Height of the texture
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
    <code class="prettyprint">true</code> if creation was successful, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.copyToImage" id="Texture.copyToImage">const Image copyToImage();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Copy the texture pixels to an image.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function performs a slow operation that downloads the texture's
 pixels from the graphics card and copies them to a new image, potentially
 applying transformations to pixels if necessary (texture may be padded or
 flipped).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Image containing the texture's pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.dup" id="Texture.dup">const @property Texture dup();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Creates a new texture from the same data (this means copying the entire
 set of pixels).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.isRepeated" id="Texture.isRepeated">const bool isRepeated();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether the texture is repeated or not.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if repeat mode is enabled, <code class="prettyprint">false</code> if it is disabled.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.isSmooth" id="Texture.isSmooth">const bool isSmooth();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether the smooth filter is enabled or not.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if something is enabled, <code class="prettyprint">false</code> if it is disabled.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.update" id="Texture.update">void update(const(ubyte)[] pixels);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update the whole texture from an array of pixels.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The pixel array is assumed to have the same size as
 the area rectangle, and to contain 32-bits RGBA pixels.
<br><br>
 No additional check is performed on the size of the pixel
 array, passing invalid arguments will lead to an undefined
 behavior.
<br><br>
 This function does nothing if pixels is empty or if the
 texture was not previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(ubyte)[] pixels</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of pixels to copy to the texture.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.update.2" id="Texture.update.2">void update(const(ubyte)[] pixels, uint width, uint height, uint x, uint y);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update part of the texture from an array of pixels.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The size of the pixel array must match the width and height arguments,
 and it must contain 32-bits RGBA pixels.
<br><br>
 No additional check is performed on the size of the pixel array or the
 bounds of the area to update, passing invalid arguments will lead to an
 undefined behaviour.
<br><br>
 This function does nothing if pixels is empty or if the texture was not
 previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(ubyte)[] pixels</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of pixels to copy to the texture.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint width</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Width of the pixel region contained in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint height</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Height of the pixel region contained in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source pixels
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.update.3" id="Texture.update.3">void update(const(Image) image);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update the texture from an image.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Although the source image can be smaller than the texture, this function
 is usually used for updating the whole texture. The other overload, which
 has (x, y) additional arguments, is more convenient for updating a
 sub-area of the texture.
<br><br>
 No additional check is performed on the size of the image, passing an
 image bigger than the texture will lead to an undefined behaviour.
<br><br>
 This function does nothing if the texture was not previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Image) image</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Image to copy to the texture.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.update.4" id="Texture.update.4">void update(const(Image) image, uint x, uint y);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update the texture from an image.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    No additional check is performed on the size of the image, passing an
 invalid combination of image size and offset will lead to an undefined
 behavior.
<br><br>
 This function does nothing if the texture was not previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Image) image</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Image to copy to the texture.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source image.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source image.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.update.5" id="Texture.update.5">void update(T)(const(T) window) if (is(T == Window) || is(T == RenderWindow));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update the texture from the contents of a window

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Although the source window can be smaller than the texture, this function
 is usually used for updating the whole texture. The other overload, which
 has (x, y) additional arguments, is more convenient for updating a
 sub-area of the texture.
<br><br>
 No additional check is performed on the size of the window, passing a
 window bigger than the texture will lead to an undefined behavior.
<br><br>
 This function does nothing if either the texture or the window
 was not previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(T) window</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window to copy to the texture
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.update.6" id="Texture.update.6">void update(T)(const(T) window, uint x, uint y) if (is(T == Window) || is(T == RenderWindow));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update a part of the texture from the contents of a window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    No additional check is performed on the size of the window, passing an
 invalid combination of window size and offset will lead to an undefined
 behavior.
<br><br>
 This function does nothing if either the texture or the window was not
 previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(T) window</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window to copy to the texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source window
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.updateFromImage" id="Texture.updateFromImage"><div class="deprecated_decl">deprecated void updateFromImage(Image image, uint x, uint y)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update the texture from an image.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Although the source image can be smaller than the texture, this function
 is usually used for updating the whole texture. The other overload, which
 has (x, y) additional arguments, is more convenient for updating a
 sub-area of the texture.
<br><br>
 No additional check is performed on the size of the image, passing an
 image bigger than the texture will lead to an undefined behaviour.
<br><br>
 This function does nothing if the texture was not previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Image image</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Image to copy to the texture.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source image.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source image.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.updateFromPixels" id="Texture.updateFromPixels"><div class="deprecated_decl">deprecated void updateFromPixels(const(ubyte)[] pixels, uint width, uint height, uint x, uint y)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update part of the texture from an array of pixels.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The size of the pixel array must match the width and height arguments,
 and it must contain 32-bits RGBA pixels.
<br><br>
 No additional check is performed on the size of the pixel array or the
 bounds of the area to update, passing invalid arguments will lead to an
 undefined behaviour.
<br><br>
 This function does nothing if pixels is <code class="prettyprint">null</code> or if the texture was not
 previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(ubyte)[] pixels</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of pixels to copy to the texture.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint width</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Width of the pixel region contained in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint height</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Height of the pixel region contained in pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source pixels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source pixels
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.updateFromWindow" id="Texture.updateFromWindow"><div class="deprecated_decl">deprecated void updateFromWindow(Window window, uint x, uint y)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update a part of the texture from the contents of a window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    No additional check is performed on the size of the window, passing an
 invalid combination of window size and offset will lead to an undefined
 behaviour.
<br><br>
 This function does nothing if either the texture or the window was not
 previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Window window</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window to copy to the texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source window
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
        <code class="prettyprint"><a class="decl_anchor" href="#Texture.updateFromWindow.2" id="Texture.updateFromWindow.2"><div class="deprecated_decl">deprecated void updateFromWindow(RenderWindow window, uint x, uint y)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Update a part of the texture from the contents of a window.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    No additional check is performed on the size of the window, passing an
 invalid combination of window size and offset will lead to an undefined
 behaviour.
<br><br>
 This function does nothing if either the texture or the window was not
 previously created.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">RenderWindow window</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Window to copy to the texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X offset in the texture where to copy the source window
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y offset in the texture where to copy the source window
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