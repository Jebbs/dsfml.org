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
      <title>DSFML - dsfml.graphics.sprite</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.sprite</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Sprite</u> is a drawable class that allows to easily display a texture (or a
 part of it) on a render target.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     It inherits all the functions from <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>: position, rotation,
 scale, origin. It also adds sprite-specific properties such as the texture to
 use, the part of it to display, and some convenience functions to change the
 overall color of the sprite, or to get its bounding rectangle.
<br><br>
 <u>Sprite</u> works in combination with the <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> class, which loads
 and provides the pixel data of a given texture.
<br><br>
 The separation of <u>Sprite</u> and <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> allows more flexibility and
 better performances: indeed a <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> is a heavy resource, and any
 operation on it is slow (often too slow for real-time applications). On the
 other side, a <u>Sprite</u> is a lightweight object which can use the pixel
 data of a <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> and draw it with its own
 transformation/color/blending attributes.
<br><br>
 It is important to note that the <u>Sprite</u> instance doesn't copy the
 texture that it uses, it only keeps a reference to it. Thus, a
 <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> must not be destroyed while it is used by a <u>Sprite</u>
 (i.e. never write a function that uses a local Texture instance for creating
 a sprite).
<br><br>
 See also the note on coordinates and undistorted rendering in
 <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>.
<br><br>
 example:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare and load a texture
auto texture = new Texture();
texture.loadFromFile("texture.png");

// Create a sprite
auto <span class="psymbol">sprite</span> = new Sprite();
<span class="psymbol">sprite</span>.setTexture(texture);
<span class="psymbol">sprite</span>.textureRect = IntRect(10, 10, 50, 30);
<span class="psymbol">sprite</span>.color = Color(255, 255, 255, 200);
<span class="psymbol">sprite</span>.position = Vector2f(100, 25);

// Draw it
window.draw(<span class="psymbol">sprite</span>);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a>, <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite" id="Sprite">class Sprite: <span class="ddoc_psuper_symbol">dsfml.graphics.drawable.Drawable</span>, <span class="ddoc_psuper_symbol">dsfml.graphics.transformable.Transformable</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Drawable representation of a texture, with its own transformations, color,
 etc.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.this" id="Sprite.this">this();
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
    Creates an empty sprite with no source texture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.this.2" id="Sprite.this.2">this(const(Texture) texture);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the sprite from a source texture

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Texture) texture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source texture
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.textureRect" id="Sprite.textureRect">@property IntRect textureRect(IntRect rect);
<br>
const @property IntRect textureRect();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The sub-rectangle of the texture that the sprite will display.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The texture rect is useful when you don't want to display the whole
 texture, but rather a part of it. By default, the texture rect covers
 the entire texture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.color" id="Sprite.color">@property Color color(Color newColor);
<br>
const @property Color color();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The global color of the sprite.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This color is modulated (multiplied) with the sprite's texture. It can be
 used to colorize the sprite, or change its global opacity. By default,
 the sprite's color is opaque white.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.getGlobalBounds" id="Sprite.getGlobalBounds">FloatRect getGlobalBounds();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the global bounding rectangle of the entity.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The returned rectangle is in global coordinates, which means that it
 takes in account the transformations (translation, rotation, scale, ...)
 that are applied to the entity. In other words, this function returns the
 bounds of the sprite in the global 2D world's coordinate system.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Global bounding rectangle of the entity.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.getLocalBounds" id="Sprite.getLocalBounds">const FloatRect getLocalBounds();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the local bounding rectangle of the entity.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The returned rectangle is in local coordinates, which means that it
 ignores the transformations (translation, rotation, scale, ...) that are
 applied to the entity. In other words, this function returns the bounds
 of the entity in the entity's coordinate system.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Local bounding rectangle of the entity.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.getTexture" id="Sprite.getTexture">const const(Texture) getTexture();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the source texture of the sprite.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the sprite has no source texture, a NULL pointer is returned. The
 returned pointer is const, which means that you can't modify the texture
 when you retrieve it with this function.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The sprite's texture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.setTexture" id="Sprite.setTexture">void setTexture(const(Texture) texture, bool rectReset = false);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change the source texture of the shape.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The texture argument refers to a texture that must exist as long as the
 sprite uses it. Indeed, the sprite doesn't store its own copy of the
 texture, but rather keeps a pointer to the one that you passed to this
 function. If the source texture is destroyed and the sprite tries to use
 it, the behaviour is undefined. texture can be NULL to disable texturing.
<br><br>
 If resetRect is <code class="prettyprint">true</code>, the TextureRect property of the sprite is
 automatically adjusted to the size of the new texture. If it is <code class="prettyprint">false</code>,
 the texture rect is left unchanged.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Texture) texture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New texture
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool rectReset</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Should the texture rect be reset to the size of the new
              texture?
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.draw" id="Sprite.draw">void draw(RenderTarget renderTarget, RenderStates renderStates);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Draw the sprite to a render target.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">RenderTarget renderTarget</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Target to draw to
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">RenderStates renderStates</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Current render states
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
        <code class="prettyprint"><a class="decl_anchor" href="#Sprite.dup" id="Sprite.dup">const @property Sprite dup();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create a new Sprite with the same data. Note that the texture is not
 copied, only its reference.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    A new Sprite object with the same data.
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