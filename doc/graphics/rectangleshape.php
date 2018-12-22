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
      <title>DSFML - dsfml.graphics.rectangleshape</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.rectangleshape</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    This class inherits all the functions of <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a> (position,
 rotation, scale, bounds, ...) as well as the functions of <a class="dsfml_link" href="../graphics/shape.php" title="Base class for textured shapes with outline.">Shape</a>
 (outline, color, texture, ...).

  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto rectangle = new RectangleShape();
rectangle.size = Vector2f(100, 50);
rectangle.outlineColor = Color.Red;
rectangle.outlineThickness = 5;
rectangle.position = Vector2f(10, 20);
...
window.draw(rectangle);
</code></pre>
  </div>
</section>

  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/shape.php" title="Base class for textured shapes with outline.">Shape</a>, <a class="dsfml_link" href="../graphics/circleshape.php" title="Specialized shape representing a circle.">CircleShape</a>, <a class="dsfml_link" href="../graphics/convexshape.php" title="Specialized shape representing a convex polygon.">ConvexShape</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#RectangleShape" id="RectangleShape">class RectangleShape: <span class="ddoc_psuper_symbol">dsfml.graphics.shape.Shape</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specialized shape representing a rectangle.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RectangleShape.this" id="RectangleShape.this">this(Vector2f theSize = Vector2f(0, 0));
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
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f theSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Size of the rectangle
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
        <code class="prettyprint"><a class="decl_anchor" href="#RectangleShape.pointCount" id="RectangleShape.pointCount">const @property uint pointCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The point count for a rectangle is always 4.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RectangleShape.size" id="RectangleShape.size">@property Vector2f size(Vector2f theSize);
<br>
@property Vector2f size();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The size of the rectangle.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RectangleShape.getPoint" id="RectangleShape.getPoint">const Vector2f getPoint(uint index);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a point of the rectangle.

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
      Index of the point to get, in range [0 .. pointCount - 1]
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