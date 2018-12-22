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
      <title>DSFML - dsfml.graphics.shape</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.shape</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Shape</u> is a drawable class that allows to define and display a custom
 convex shape on a render target.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It's only an abstract base, it needs to be specialized for concrete types of
 shapes (circle, rectangle, convex polygon, star, ...).
<br><br>
 In addition to the attributes provided by the specialized shape classes, a
 shape always has the following attributes:
 <ul class="lists"> <li>a texture</li>
 <li>a texture rectangle</li>
 <li>a fill color</li>
 <li>an outline color</li>
 <li>an outline thickness</li></ul>
<br><br>
 <p class="para">Each feature is optional, and can be disabled easily:</p>
 <ul class="lists"> <li>the texture can be <code class="prettyprint">null</code></li>
 <li>the fill/outline colors can be Color.Transparent</li>
 <li>the outline thickness can be zero</li></ul>
<br><br>
 <p class="para">You can write your own derived shape class, there are only two
 abstract functions to override:</p>
 <ul class="lists"> <li><code class="prettyprint">getPointCount</code> must return the number of points of the shape</li>
 <li><code class="prettyprint">getPoint</code> must return the points of the shape</li></ul>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/rectangleshape.php" title="Specialized shape representing a rectangle.">RectangleShape</a>, <a class="dsfml_link" href="../graphics/circleshape.php" title="Specialized shape representing a circle.">CircleShape</a>, <a class="dsfml_link" href="../graphics/convexshape.php" title="Specialized shape representing a convex polygon.">ConvexShape</a>,
 <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shape" id="Shape">abstract class Shape: <span class="ddoc_psuper_symbol">dsfml.graphics.drawable.Drawable</span>, <span class="ddoc_psuper_symbol">dsfml.graphics.transformable.Transformable</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Base class for textured shapes with outline.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.textureRect" id="Shape.textureRect">@property IntRect textureRect(IntRect rect);
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
    The sub-rectangle of the texture that the shape will display.

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
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.fillColor" id="Shape.fillColor">@property Color fillColor(Color color);
<br>
const @property Color fillColor();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The fill color of the shape.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This color is modulated (multiplied) with the shape's texture if any.
 It can be used to colorize the shape, or change its global opacity.
 You can use <code class="prettyprint">Color.Transparent</code> to make the inside of the shape
 transparent, and have the outline alone. By default, the shape's fill
 color is opaque white.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.outlineColor" id="Shape.outlineColor">@property Color outlineColor(Color color);
<br>
const @property Color outlineColor();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The outline color of the shape.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    By default, the shape's outline color is opaque white.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.outlineThickness" id="Shape.outlineThickness">@property float outlineThickness(float thickness);
<br>
const @property float outlineThickness();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The thickness of the shape's outline.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Note that negative values are allowed (so that the outline expands
 towards the center of the shape), and using zero disables the
 outline. By default, the outline thickness is 0.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.pointCount" id="Shape.pointCount">abstract const @property uint pointCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The total number of points in the shape.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.getGlobalBounds" id="Shape.getGlobalBounds">FloatRect getGlobalBounds();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.getLocalBounds" id="Shape.getLocalBounds">const FloatRect getLocalBounds();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.getPoint" id="Shape.getPoint">abstract const Vector2f getPoint(uint index);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a point of the shape.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The result is undefined if index is out of the valid range.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint index</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Index of the point to get, in range [0 .. getPointCount() - 1]
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
    Index-th point of the shape.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.getTexture" id="Shape.getTexture">const const(Texture) getTexture();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the source texture of the shape.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the shape has no source texture, a NULL pointer is returned. The
 returned pointer is const, which means that you can't modify the texture
 when you retrieve it with this function.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The shape's texture.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.setTexture" id="Shape.setTexture">void setTexture(const(Texture) texture, bool resetRect = false);
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
 shape uses it. Indeed, the shape doesn't store its own copy of the
 texture, but rather keeps a pointer to the one that you passed to this
 function. If the source texture is destroyed and the shape tries to use
 it, the behaviour is undefined. texture can be NULL to disable texturing.
<br><br>
 If resetRect is <code class="prettyprint">true</code>, the TextureRect property of the shape is
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
  <code class="prettyprint">bool resetRect</code>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.draw" id="Shape.draw">void draw(RenderTarget renderTarget, RenderStates renderStates);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Draw the shape to a render target.

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
        <code class="prettyprint"><a class="decl_anchor" href="#Shape.update" id="Shape.update">protected void update();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Recompute the internal geometry of the shape.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function must be called by the derived class everytime the shape's
 points change (ie. the result of either <code class="prettyprint">getPointCount</code> or <code class="prettyprint">getPoint</code> is
 different).
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