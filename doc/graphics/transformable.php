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
      <title>DSFML - dsfml.graphics.transformable</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.transformable</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The interface and template are provided for convenience, on top of
 <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a>.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a>, as a low-level class, offers a great level of flexibility
 but it is not always convenient to manage. Indeed, one can easily combine any
 kind of operation, such as a translation followed by a rotation followed by a
 scaling, but once the result transform is built, there's no way to go
 backward and, let's say, change only the rotation without modifying the
 translation and scaling.
<br><br>
 The entire transform must be recomputed, which means that you need to
 retrieve the initial translation and scale factors as well, and combine them
 the same way you did before updating the rotation. This is a tedious
 operation, and it requires to store all the individual components of the
 final transform.
<br><br>
 That's exactly what <u>Transformable</u> and <u>NormalTransformable</u> were
 written for: they hides these variables and the composed transform behind an
 easy to use interface. You can set or get any of the individual components
 without worrying about the others. It also provides the composed transform
 (as a <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a>), and keeps it up-to-date.
<br><br>
 In addition to the position, rotation and scale, <u>Transformable</u> provides
 an "origin" component, which represents the local origin of the three other
 components. Let's take an example with a 10x10 pixels sprite. By default, the
 sprite is positioned/rotated/scaled relatively to its top-left corner,
 because it is the local point (0, 0). But if we change the origin to be
 (5, 5), the sprite will be positioned/rotated/scaled around its center
 instead. And if we set the origin to (10, 10), it will be transformed around
 its bottom-right corner.
<br><br>
 To keep <u>Transformable</u> and <u>NormalTransformable</u> simple, there's only
 one origin for all the components. You cannot position the sprite relatively
 to its top-left corner while rotating it around its center, for example. To
 do such things, use <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a> directly.
<br><br>
 <u>Transformable</u> is meant to be used as a base for other classes. It is
 often combined with <a class="dsfml_link" href="../graphics/drawable.php" title="Interface for objects that can be drawn to a render target.">Drawable</a> -- that's what DSFML's sprites, texts
 and shapes do.

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">class MyEntity : Transformable, Drawable
{
    //generates the boilerplate code for Transformable
    mixin NormalTransformable;

    void draw(RenderTarget target, RenderStates states) const
    {
        states.transform *= getTransform();
        target.draw(..., states);
    }
}

auto entity = new MyEntity();
entity.position = Vector2f(10, 20);
entity.rotation = 45;
window.draw(entity);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">If you don't want to use the API directly (because you don't need all
 the functions, or you have different naming conventions for example), you can
 have a <u>TransformableMember</u> as a member variable.</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">class MyEntity
{
    this()
    {
        myTransform = new TransformableMember();
    }

    void setPosition(MyVector v)
    {
        myTransform.setPosition(v.x, v.y);
    }

    void draw(RenderTarget target, RenderStates states) const
    {
        states.transform *= myTransform.getTransform();
        target.draw(..., states);
    }

private TransformableMember myTransform;
}
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">A note on coordinates and undistorted rendering:
 By default, DSFML (or more exactly, OpenGL) may interpolate drawable objects
 such as sprites or texts when rendering. While this allows transitions like
 slow movements or rotations to appear smoothly, it can lead to unwanted
 results in some cases, for example blurred or distorted objects. In order to
 render a <a class="dsfml_link" href="../graphics/drawable.php" title="Interface for objects that can be drawn to a render target.">Drawable</a> object pixel-perfectly, make sure the involved
 coordinates allow a 1:1 mapping of pixels in the window to texels (pixels in
 the texture). More specifically, this means:</p>
 <ul class="lists"> <li>The object's position, origin and scale have no fractional part</li>
 <li>The object's and the view's rotation are a multiple of 90 degrees</li>
 <li>The view's center and size have no fractional part</li></ul>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable" id="Transformable">interface Transformable;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Decomposed transform defined by a position, a rotation, and a scale.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.origin" id="Transformable.origin">abstract @property Vector2f origin(Vector2f newOrigin);
<br>
abstract const @property Vector2f origin();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The local origin of the object.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The origin of an object defines the center point for all
 transformations (position, scale, ratation).
<br><br>
 The coordinates of this point must be relative to the top-left corner
 of the object, and ignore all transformations (position, scale,
 rotation).
<br><br>
 The default origin of a transformable object is (0, 0).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.position" id="Transformable.position">abstract @property Vector2f position(Vector2f newPosition);
<br>
abstract const @property Vector2f position();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The position of the object. The default is (0, 0).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.rotation" id="Transformable.rotation">abstract @property float rotation(float newRotation);
<br>
abstract const @property float rotation();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The orientation of the object, in degrees. The default is 0 degrees.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.scale" id="Transformable.scale">abstract @property Vector2f scale(Vector2f newScale);
<br>
abstract const @property Vector2f scale();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The scale factors of the object. The default is (1, 1).
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.getTransform" id="Transformable.getTransform">abstract const(Transform) getTransform();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the inverse of the combined transform of the object.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Inverse of the combined transformations applied to the object.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.getInverseTransform" id="Transformable.getInverseTransform">abstract const(Transform) getInverseTransform();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the combined transform of the object.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Transform combining the position/rotation/scale/origin of the
 object.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transformable.move" id="Transformable.move">abstract void move(Vector2f offset);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Move the object by a given offset.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function adds to the current position of the object, unlike the
 position property which overwrites it.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f offset</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The offset
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

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#NormalTransformable" id="NormalTransformable">template NormalTransformable()</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Mixin template that generates the boilerplate code for the <u>Transformable</u>
 interface.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This template is provided for convenience, so that you don't have to add the
 properties and functions manually.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TransformableMember" id="TransformableMember">class TransformableMember: <span class="ddoc_psuper_symbol">dsfml.graphics.transformable.Transformable</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Concrete class that implements the <u>Transformable</u> interface.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This class is provided for convenience, so that a <u>Transformable</u> object
 can be used as a member of a class instead of inheriting from
 <u>Transformable</u>.
  </p>
</div>

</section>

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