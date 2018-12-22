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
      <title>DSFML - dsfml.graphics.transform</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.transform</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A <u>Transform</u> specifies how to translate, rotate, scale, shear, project,
 whatever things. In mathematical terms, it defines how to transform a
 coordinate system into another.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    For example, if you apply a rotation transform to a sprite, the result will
 be a rotated sprite. And anything that is transformed by this rotation
 transform will be rotated the same way, according to its initial position.
<br><br>
 Transforms are typically used for drawing. But they can also be used for any
 computation that requires to transform points between the local and global
 coordinate systems of an entity (like collision detection).


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// define a translation transform
Transform translation;
translation.translate(20, 50);

// define a rotation transform
Transform rotation;
rotation.rotate(45);

// combine them
Transform <span class="psymbol">transform</span> = translation * rotation;

// use the result to transform stuff...
Vector2f point = <span class="psymbol">transform</span>.transformPoint(Vector2f(10, 20));
FloatRect rect = <span class="psymbol">transform</span>.transformRect(FloatRect(0, 0, 10, 100));
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>, <a class="dsfml_link" href="../graphics/renderstates.php" title="Define the states used for drawing to a RenderTarget.">RenderStates</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Transform" id="Transform">struct Transform;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define a 3x3 transform matrix.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.m_matrix" id="Transform.m_matrix">package float[16] m_matrix;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4x4 matrix defining the transformation.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.this" id="Transform.this">this(float a00, float a01, float a02, float a10, float a11, float a12, float a20, float a21, float a22);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a transform from a 3x3 matrix.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a00</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (0, 0) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a01</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (0, 1) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a02</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (0, 2) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a10</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (1, 0) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a11</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (1, 1) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a12</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (1, 2) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a20</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (2, 0) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a21</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (2, 1) of the matrix
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float a22</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Element (2, 2) of the matrix
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
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.this.2" id="Transform.this.2">this(float[9] matrix);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a transform from a float array describing a 3x3 matrix.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.getInverse" id="Transform.getInverse">const Transform getInverse();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the inverse of the transform.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the inverse cannot be computed, an identity transform is returned.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    A new transform which is the inverse of self.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.getMatrix" id="Transform.getMatrix">const const(float)[] getMatrix();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the transform as a 4x4 matrix.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns a pointer to an array of 16 floats containing the
 transform elements as a 4x4 matrix, which is directly compatible with
 OpenGL functions.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    A 4x4 matrix.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.combine" id="Transform.combine">ref Transform combine(Transform otherTransform);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with another one.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The result is a transform that is equivalent to applying this followed by
 transform. Mathematically, it is equivalent to a matrix multiplication.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Transform otherTransform</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Transform to combine with this one
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
    Reference to this.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.transformPoint" id="Transform.transformPoint">const Vector2f transformPoint(float x, float y);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Transform a 2D point.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of the point to transform
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y coordinate of the point to transform
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
    Transformed point.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.transformPoint.2" id="Transform.transformPoint.2">const Vector2f transformPoint(Vector2f point);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Transform a 2D point.

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
      the point to transform
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
    Transformed point.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.transformRect" id="Transform.transformRect">const FloatRect transformRect(const(FloatRect) rect);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Transform a rectangle.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Since SFML doesn't provide support for oriented rectangles, the result of
 this function is always an axis-aligned rectangle. Which means that if
 the transform contains a rotation, the bounding rectangle of the
 transformed rectangle is returned.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(FloatRect) rect</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rectangle to transform
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
    Transformed rectangle.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.translate" id="Transform.translate">ref Transform translate(Vector2f offset);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a translation.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns a reference to this, so that calls can be chained.


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
      Translation offset to apply
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.translate.2" id="Transform.translate.2">ref Transform translate(float x, float y);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a translation.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Offset to apply on X axis
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Offset to apply on Y axis
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.rotate" id="Transform.rotate">ref Transform rotate(float angle);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a rotation.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float angle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rotation angle, in degrees
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.rotate.2" id="Transform.rotate.2">ref Transform rotate(float angle, float centerX, float centerY);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a rotation.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The center of rotation is provided for convenience as a second argument,
 so that you can build rotations around arbitrary points more easily (and
 efficiently) than the usual
 translate(-center).rotate(angle).translate(center).
<br><br>
 This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float angle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rotation angle, in degrees
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float centerX</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of the center of rotation
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float centerY</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y coordinate of the center of rotation
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.rotate.3" id="Transform.rotate.3">ref Transform rotate(float angle, Vector2f center);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a rotation.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The center of rotation is provided for convenience as a second argument,
 so that you can build rotations around arbitrary points more easily (and
 efficiently) than the usual
 translate(-center).rotate(angle).translate(center).
<br><br>
 This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float angle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rotation angle, in degrees
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f center</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Center of rotation
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.scale" id="Transform.scale">ref Transform scale(float scaleX, float scaleY);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a scaling.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float scaleX</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Scaling factor on the X-axis.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float scaleY</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Scaling factor on the Y-axis.
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.scale.2" id="Transform.scale.2">ref Transform scale(Vector2f factors);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a scaling.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f factors</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Scaling factors
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.scale.3" id="Transform.scale.3">ref Transform scale(float scaleX, float scaleY, float centerX, float centerY);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a scaling.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The center of scaling is provided for convenience as a second argument,
 so that you can build scaling around arbitrary points more easily
 (and efficiently) than the usual
 translate(-center).scale(factors).translate(center).
<br><br>
 This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float scaleX</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Scaling factor on the X-axis
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float scaleY</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Scaling factor on the Y-axis
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float centerX</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of the center of scaling
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float centerY</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y coordinate of the center of scaling
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.scale.4" id="Transform.scale.4">ref Transform scale(Vector2f factors, Vector2f center);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Combine the current transform with a scaling.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The center of scaling is provided for convenience as a second argument,
 so that you can build scaling around arbitrary points more easily
 (and efficiently) than the usual
 translate(-center).scale(factors).translate(center).
<br><br>
 This function returns a reference to this, so that calls can be chained.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f factors</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Scaling factors
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f center</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Center of scaling
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
    this
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.opBinary" id="Transform.opBinary">Transform opBinary(string op)(Transform rhs) if (op == "*");
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overload of binary operator <code class="prettyprint">*</code> to combine two transforms.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     This call is equivalent to:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">Transform combined = transform;
combined.combine(<span class="param">rhs</span>);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Transform rhs</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      the second transform to be combined with the first
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
    New combined transform.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.opOpAssign" id="Transform.opOpAssign">ref Transform opOpAssign(string op)(Transform rhs) if (op == "*");
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overload of assignment operator <code class="prettyprint">*=</code> to combine two transforms.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This call is equivalent to calling <code class="prettyprint">transform.combine(rhs)</code>.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Transform rhs</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      the second transform to be combined with the first
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
    The combined transform.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.opBinary.2" id="Transform.opBinary.2">Vextor2f opBinary(string op)(Vector2f vector) if (op == "*");
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overload of binary operator * to transform a point

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This call is equivalent to calling <code class="prettyprint">transform.transformPoint(vector)</code>.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      the point to transform
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
    New transformed point.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Transform.Identity" id="Transform.Identity">static const const(Transform) Identity;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Indentity transform (does nothing).
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