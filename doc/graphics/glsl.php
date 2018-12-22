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
      <title>DSFML - dsfml.graphics.glsl</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.glsl</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The glsl module contains types that match their equivalents in GLSL, the
 OpenGL shading language. These types are exclusively used by the
 <a class="dsfml_link" href="../graphics/shader.php" title="Shader class (vertex and fragment).">Shader</a> class.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Types that already exist in DSFML, such as <a class="dsfml_link" href="../system/vector2.php" title="Utility template struct for manipulating 2-dimensional vectors.">Vector2</a> and
 <a class="dsfml_link" href="../system/vector3.php" title="Utility template struct for manipulating 3-dimensional vectors.">Vector3</a>, are reused as aliases, so you can use the types in this
 module as well as the original ones.
 Others are newly defined, such as <code class="prettyprint">Vec4</code> or <code class="prettyprint">Mat3</code>. Their actual type is an
 implementation detail and should not be used.
<br><br>
 All vector types support a default constructor that initializes every
 component to zero, in addition to a constructor with one parameter for each
 component.
 The components are stored in member variables called <code class="prettyprint">x</code>, <code class="prettyprint">y</code>, <code class="prettyprint">z</code>, and <code class="prettyprint">w</code>.
<br><br>
 All matrix types support a constructor with a <code class="prettyprint">float[]</code> parameter of the
 appropriate size (that is, 9 in a 3x3 matrix, 16 in a 4x4 matrix).
 Furthermore, they can be converted from <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a> objects.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vec2" id="Vec2">alias Vec2 = dsfml.system.vector2.Vector2!float.Vector2;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2D float vector (vec2 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Ivec2" id="Ivec2">alias Ivec2 = dsfml.system.vector2.Vector2!int.Vector2;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2D int vector (ivec2 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Bvec2" id="Bvec2">alias Bvec2 = dsfml.system.vector2.Vector2!bool.Vector2;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2D bool vector (bvec2 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vec3" id="Vec3">alias Vec3 = dsfml.system.vector3.Vector3!float.Vector3;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    3D float vector (vec3 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Ivec3" id="Ivec3">alias Ivec3 = dsfml.system.vector3.Vector3!int.Vector3;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    3D int vector (ivec3 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Bvec3" id="Bvec3">alias Bvec3 = dsfml.system.vector3.Vector3!bool.Vector3;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    3D bool vector (bvec3 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vec4" id="Vec4">alias Vec4 = Vector4!float.Vector4;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4D float vector (vec4 in GLSL)

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     4D float vectors can be converted from sf::Color instances. Each color
 channel is normalized from integers in [0, 255] to floating point values
 in [0, 1].

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint"><span class="psymbol">Vec4</span> zeroVector;
auto vector = <span class="psymbol">Vec4</span>(1.f, 2.f, 3.f, 4.f);
auto color = <span class="psymbol">Vec4</span>(Color.Cyan);
</code></pre>
  </div>
</section>

  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Ivec4" id="Ivec4">alias Ivec4 = Vector4!int.Vector4;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4D int vector ( ivec4 in GLSL)

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     4D int vectors can be converted from sf::Color instances. Each color channel
 remains unchanged inside the integer interval [0, 255].
 <li>test</li>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint"><span class="psymbol">Ivec4</span> zeroVector;
auto vector = <span class="psymbol">Ivec4</span>(1, 2, 3, 4);
auto color = <span class="psymbol">Ivec4</span>(Color.Cyan);
</code></pre>
  </div>
</section>

  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Bvec4" id="Bvec4">alias Bvec4 = Vector4!bool.Vector4;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4D bool vector (bvec4 in GLSL)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Mat3" id="Mat3">alias Mat3 = Matrix!(3u, 3u).Matrix;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    3x3 float matrix (mat3 in GLSL)

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     The matrix can be constructed from an array with 3x3 elements, aligned in
 column-major order. For example,a translation by (x, y) looks as follows:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">float[9] array =
[
    1, 0, 0,
    0, 1, 0,
    x, y, 1
];

auto matrix = <span class="psymbol">Mat3</span>(array);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Mat4 can also be converted from a <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a>.</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">Transform transform;
auto matrix = <span class="psymbol">Mat3</span>(transform);
</code></pre>
  </div>
</section>

  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Mat4" id="Mat4">alias Mat4 = Matrix!(4u, 4u).Matrix;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4x4 float matrix (mat4 in GLSL)

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     The matrix can be constructed from an array with 4x4 elements, aligned in
 column-major order. For example, a translation by (x, y, z) looks as follows:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">float array[16] =
{
    1, 0, 0, 0,
    0, 1, 0, 0,
    0, 0, 1, 0,
    x, y, z, 1
};

auto matrix = <span class="psymbol">Mat4</span>(array);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Mat4 can also be converted from a <a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a>.</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">Transform transform;
auto matrix = <span class="psymbol">Mat4</span>(transform);
</code></pre>
  </div>
</section>

  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4" id="Vector4">struct Vector4(T) if (isNumeric!T || is(T == bool));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4D vector type, used to set uniforms in GLSL.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.x" id="Vector4.x">T x;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    1st component (X) of the 4D vector
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.y" id="Vector4.y">T y;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2nd component (Y) of the 4D vector
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.z" id="Vector4.z">T z;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    3rd component (Z) of the 4D vector
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.w" id="Vector4.w">T w;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    4th component (W) of the 4D vector
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.this" id="Vector4.this">this(T X, T Y, T Z, T W);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct from 4 vector components

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T X</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Component of the 4D vector
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T Y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Component of the 4D vector
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T Z</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Component of the 4D vector
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T W</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Component of the 4D vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.this.2" id="Vector4.this.2">this(U)(Vector!U other);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Conversion constructor

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector!U other</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      4D vector of different type
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vector4.this.3" id="Vector4.this.3">this(Color source);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct vector from color.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The vector values are normalized to [0, 1] for floats, and left as-is for
 ints.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color source</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The Color instance to create the vector from
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
        <code class="prettyprint"><a class="decl_anchor" href="#Matrix" id="Matrix">struct Matrix(uint C, uint R);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Matrix type, used to set uniforms in GLSL.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Matrix.array" id="Matrix.array">float[C * R] array;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Array holding matrix data.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Matrix.this" id="Matrix.this">this(ref const(Transform) source);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct from DSFML transform.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This constructor is only supported for 3x3 and 4x4 matrices.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Transform) source</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      A DSFML Transform
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
        <code class="prettyprint"><a class="decl_anchor" href="#Matrix.this.2" id="Matrix.this.2">this(const(float)[] source);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct from raw data.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The elements in source are copied to the instance.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(float)[] source</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      An array that has the size of the matrix.
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