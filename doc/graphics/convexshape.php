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
      <title>DSFML - dsfml.graphics.convexshape</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.convexshape</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    This class inherits all the functions of <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a> (position,
 rotation, scale, bounds, ...) as well as the functions of <a class="dsfml_link" href="../graphics/shape.php" title="Base class for textured shapes with outline.">Shape</a>
 (outline, color, texture, ...).

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It is important to keep in mind that a convex shape must always be... convex,
 otherwise it may not be drawn correctly. Moreover, the points must be defined
 in order; using a random order would result in an incorrect shape.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto polygon = new ConvexShape();
polygon.pointCount = 3;
polygon.setPoint(0, Vector2f(0, 0));
polygon.setPoint(1, Vector2f(0, 10));
polygon.setPoint(2, Vector2f(25, 5));
polygon.outlineColor = Color.Red;
polygon.outlineThickness = 5;
polygon.position = Vector2f(10, 20);
...
window.draw(polygon);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/shape.php" title="Base class for textured shapes with outline.">Shape</a>, <a class="dsfml_link" href="../graphics/rectangleshape.php" title="Specialized shape representing a rectangle.">RectangleShape</a>, <a class="dsfml_link" href="../graphics/circleshape.php" title="Specialized shape representing a circle.">CircleShape</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#ConvexShape" id="ConvexShape">class ConvexShape: <span class="ddoc_psuper_symbol">dsfml.graphics.shape.Shape</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specialized shape representing a convex polygon.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ConvexShape.this" id="ConvexShape.this">this(uint thePointCount = 0);
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
  <code class="prettyprint">uint thePointCount</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Number of points on the polygon
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
        <code class="prettyprint"><a class="decl_anchor" href="#ConvexShape.pointCount" id="ConvexShape.pointCount">@property uint pointCount(uint newPointCount);
<br>
const @property uint pointCount();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The number of points on the polygon
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#ConvexShape.getPoint" id="ConvexShape.getPoint">const Vector2f getPoint(uint index);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the position of a point.

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
      Index of the point to get, in range [0 .. <code class="prettyprint">pointCount</code> - 1]
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
        <code class="prettyprint"><a class="decl_anchor" href="#ConvexShape.setPoint" id="ConvexShape.setPoint">void setPoint(uint index, Vector2f point);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the position of a point.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Don't forget that the polygon must remain convex, and the points need to
 stay ordered! <code class="prettyprint">pointCount</code> must be changed first in order to set the total
 number of points. The result is undefined if index is out of the valid
range.


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
      Index of the point to change, in range
                    [0 .. <code class="prettyprint">pointCount</code> - 1]
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New position of the point
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
        <code class="prettyprint"><a class="decl_anchor" href="#ConvexShape.addPoint" id="ConvexShape.addPoint">void addPoint(Vector2f point);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Add a point to the polygon.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Don't forget that the polygon must remain convex, and the points need to
 stay ordered!


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Position of the new point.
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