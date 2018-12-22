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
      <title>DSFML - dsfml.graphics.image</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.image</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Image</u> is an abstraction to manipulate images as bidimensional arrays of
 pixels. The class provides functions to load, read, write and save pixels, as
 well as many other useful functions.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    <u>Image</u> can handle a unique internal representation of pixels, which is
 RGBA 32 bits. This means that a pixel must be composed of 8 bits red, green,
 blue and alpha channels – just like a <a class="dsfml_link" href="../graphics/color.php" title="Color is a utility struct for manipulating 32-bits RGBA colors.">Color</a>. All the functions that
 return an array of pixels follow this rule, and all parameters that you pass
 to <u>Image</u> functions (such as <code class="prettyprint">loadFromPixels</code>) must use this
 representation as well.
<br><br>
 An <u>Image</u> can be copied, but it is a heavy resource and if possible you
 should always use <code class="prettyprint">const</code> references to pass or return them to avoid useless
 copies.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Load an image file from a file
auto background = new Image();
if (!background.loadFromFile("background.jpg"))
    return -1;

// Create a 20x20 image filled with black color
auto <span class="psymbol">image</span> = new Image();
<span class="psymbol">image</span>.create(20, 20, Color.Black);

// Copy image1 on image2 at position (10, 10)
<span class="psymbol">image</span>.copy(background, 10, 10);

// Make the top-left pixel transparent
auto color = <span class="psymbol">image</span>.getPixel(0, 0);
color.a = 0;
<span class="psymbol">image</span>.setPixel(0, 0, color);

// Save the image to a file
if (!<span class="psymbol">image</span>.saveToFile("result.png"))
    return -1;
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image" id="Image">class Image;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Class for loading, manipulating and saving images.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.this" id="Image.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image.create" id="Image.create">void create(uint width, uint height, Color color);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create the image and fill it with a unique color.

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
      Width of the image
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
      Height of the image
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color color</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Fill color
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image.create.2" id="Image.create.2">void create(uint width, uint height, const(ubyte)[] pixels);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create the image from an array of pixels.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The pixel array is assumed to contain 32-bits RGBA pixels, and have the
 given width and height. If not, this is an undefined behaviour. If pixels
 is <code class="prettyprint">null</code>, an empty image is created.


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
      Width of the image
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
      Height of the image
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(ubyte)[] pixels</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array of pixels to copy to the image
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image.loadFromFile" id="Image.loadFromFile">bool loadFromFile(const(char)[] filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the image from a file on disk.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported image formats are bmp, png, tga, jpg, gif, psd, hdr and
 pic. Some format options are not supported, like progressive jpeg. If
 this function fails, the image is left unchanged.


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

    </tbody>
  </table>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.loadFromMemory" id="Image.loadFromMemory">bool loadFromMemory(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the image from a file in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported image formats are bmp, png, tga, jpg, gif, psd, hdr and
 pic. Some format options are not supported, like progressive jpeg. If
 this function fails, the image is left unchanged.


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
      Data file in memory to load
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.loadFromStream" id="Image.loadFromStream">bool loadFromStream(InputStream stream);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the image from a custom stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported image formats are bmp, png, tga, jpg, gif, psd, hdr and
 pic. Some format options are not supported, like progressive jpeg. If
 this function fails, the image is left unchanged.


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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.getPixel" id="Image.getPixel">const Color getPixel(uint x, uint y);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the color of a pixel

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't check the validity of the pixel coordinates; using
 out-of-range values will result in an undefined behaviour.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of the pixel to get
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
      Y coordinate of the pixel to get
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
    Color of the pixel at coordinates (x, y)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.getPixelArray" id="Image.getPixelArray">const const(ubyte)[] getPixelArray();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the read-only array of pixels that make up the image.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The returned value points to an array of RGBA pixels made of 8 bits
 integers components. The size of the array is:
 <code class="prettyprint">width * height * 4 (getSize().x * getSize().y * 4)</code>.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Warning:</span>
the returned slice may become invalid if you modify the image,
 so you should never store it for too long.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Read-only array of pixels that make up the image.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.getSize" id="Image.getSize">const Vector2u getSize();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the size (width and height) of the image.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Size of the image, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.setPixel" id="Image.setPixel">void setPixel(uint x, uint y, Color color);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the color of a pixel.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't check the validity of the pixel coordinates, using
 out-of-range values will result in an undefined behaviour.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of pixel to change
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
      Y coordinate of pixel to change
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color color</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New color of the pixel
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image.copyImage" id="Image.copyImage">void copyImage(const(Image) source, uint destX, uint destY, IntRect sourceRect = IntRect(0, 0, 0, 0), bool applyAlpha = false);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Copy pixels from another image onto this one.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function does a slow pixel copy and should not be used intensively.
 It can be used to prepare a complex static image from several others, but
 if you need this kind of feature in real-time you'd better use
 RenderTexture.
<br><br>
 If sourceRect is empty, the whole image is copied. If applyAlpha is set
 to <code class="prettyprint">true</code>, the transparency of source pixels is applied. If it is <code class="prettyprint">false</code>,
 the pixels are copied unchanged with their alpha value.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Image) source</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source image to copy
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint destX</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of the destination position
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint destY</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y coordinate of the destination position
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IntRect sourceRect</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Sub-rectangle of the source image to copy
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool applyAlpha</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Should the copy take the source transparency into account?
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image.createMaskFromColor" id="Image.createMaskFromColor">void createMaskFromColor(Color maskColor, ubyte alpha = 0);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create a transparency mask from a specified color-key.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function sets the alpha value of every pixel matching the given
 color to alpha (0 by default) so that they become transparent.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color maskColor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Color to make transparent
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ubyte alpha</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Alpha value to assign to transparent pixels
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
        <code class="prettyprint"><a class="decl_anchor" href="#Image.dup" id="Image.dup">const @property Image dup();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create a copy of the Image.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.flipHorizontally" id="Image.flipHorizontally">void flipHorizontally();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Flip the image horizontally (left &lt;-&gt; right)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.flipVertically" id="Image.flipVertically">void flipVertically();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Flip the image vertically (top &lt;-&gt; bottom)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Image.saveToFile" id="Image.saveToFile">const bool saveToFile(const(char)[] filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Save the image to a file on disk.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The format of the image is automatically deduced from the extension. The
 supported image formats are bmp, png, tga and jpg. The destination file
 is overwritten if it already exists. This function fails if the image is
 empty.


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
      Path of the file to save
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
    <code class="prettyprint">true</code> if saving was successful
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