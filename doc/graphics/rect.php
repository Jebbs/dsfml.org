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
      <title>DSFML - dsfml.graphics.rect</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.rect</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A rectangle is defined by its top-left corner and its size. It is a very
 simple structure defined for convenience, so its member variables (<code class="prettyprint">left</code>,
 <code class="prettyprint">top</code>, <code class="prettyprint">width</code>, and <code class="prettyprint">height</code>) are public and can be accessed directly, just
 like the vector structures (<a class="dsfml_link" href="../system/vector2.php" title="Utility template struct for manipulating 2-dimensional vectors.">Vector2</a> and <a class="dsfml_link" href="../system/vector3.php" title="Utility template struct for manipulating 3-dimensional vectors.">Vector3</a>).

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    To keep things simple, <u>Rect</u> doesn't define functions to emulate the
 properties that are not directly members (such as right, bottom, center,
 etc.), it rather only provides intersection functions.
<br><br>
 Rect uses the usual rules for its boundaries:
 <ul class="lists"> <li>The let and top edges are included in the rectangle's area</li>
 <li>The right (left + width) and bottom (top + height) edges are excluded
 from the rectangle's area</li></ul>
<br><br>
 <p class="para">This means that <code class="prettyprint">IntRect(0, 0, 1, 1)</code> and <code class="prettyprint">IntRect(1, 1, 1, 1)</code> don't
 intersect.
<br><br>
 <u>Rect</u> is a template and may be used with any numeric type, but for
 simplicity the instanciations used by SFML are aliased:</p>
 <ul class="lists"> <li>Rect!(int) is IntRect</li>
 <li>Rect!(float) is FloatRect</li></ul>
<br><br>
 <p class="para">This is so you don't have to care about the template syntax.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Define a rectangle, located at (0, 0) with a size of 20x5
auto r1 = IntRect(0, 0, 20, 5);

// Define another rectangle, located at (4, 2) with a size of 18x10
auto position = Vector2i(4, 2);
auto size = Vector2i(18, 10);
auto r2 = IntRect(position, size);

// Test intersections with the point (3, 1)
bool b1 = r1.contains(3, 1); // true
bool b2 = r2.contains(3, 1); // false

// Test the intersection between r1 and r2
IntRect result;
bool b3 = r1.intersects(r2, result); // true
// result == IntRect(4, 2, 16, 3)
</code></pre>
  </div>
</section>

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
        <code class="prettyprint"><a class="decl_anchor" href="#Rect" id="Rect">struct Rect(T) if (isNumeric!T);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Utility structure for manipulating 2D axis aligned rectangles.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.left" id="Rect.left">T left;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Left coordinate of the rectangle.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.top" id="Rect.top">T top;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Top coordinate of the rectangle.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.width" id="Rect.width">T width;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Width of the rectangle.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.height" id="Rect.height">T height;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Height of the rectangle.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.this" id="Rect.this">this(T rectLeft, T rectTop, T rectWidth, T rectHeight);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the rectangle from its coordinates

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Be careful, the last two parameters are the width
 and height, not the right and bottom coordinates!


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T rectLeft</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Left coordinate of the rectangle
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T rectTop</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Top coordinate of the rectangle
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T rectWidth</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Width of the rectangle
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">T rectHeight</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Height of the rectangle
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
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.this.2" id="Rect.this.2">this(Vector2!T position, Vector2!T size);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the rectangle from position and size

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Be careful, the last parameter is the size,
 not the bottom-right corner!


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2!T position</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Position of the top-left corner of the rectangle
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2!T size</code>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.contains" id="Rect.contains">const bool contains(E)(E x, E y) if (isNumeric!E);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check if a point is inside the rectangle's area.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">E x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      X coordinate of the point to test
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">E y</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Y coordinate of the point to test
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
    <code class="prettyprint">true</code> if the point is inside, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.contains.2" id="Rect.contains.2">const bool contains(E)(Vector2!E point) if (isNumeric!E);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check if a point is inside the rectangle's area.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2!E point</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Point to test
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
    <code class="prettyprint">true</code> if the point is inside, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.intersects" id="Rect.intersects">const bool intersects(E)(Rect!E rectangle) if (isNumeric!E);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check the intersection between two rectangles.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Rect!E rectangle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rectangle to test
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
    <code class="prettyprint">true</code> if rectangles overlap, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.intersects.2" id="Rect.intersects.2">const bool intersects(E, O)(Rect!E rectangle, out Rect!O intersection) if (isNumeric!E &amp;&amp; isNumeric!O);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Check the intersection between two rectangles.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This overload returns the overlapped rectangle in the intersection
 parameter.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Rect!E rectangle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rectangle to test
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Rect!O intersection</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Rectangle to be filled with the intersection
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
    <code class="prettyprint">true</code> if rectangles overlap, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.opEquals" id="Rect.opEquals">const bool opEquals(E)(const Rect!E otherRect) if (isNumeric!E);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Compare two rectangles for equality.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Rect.toString" id="Rect.toString">const string toString();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Output the string representation of the Rect.
  </p>
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
        <code class="prettyprint"><a class="decl_anchor" href="#IntRect" id="IntRect">alias IntRect = Rect!int.Rect;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Definition of a Rect using integers.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#FloatRect" id="FloatRect">alias FloatRect = Rect!float.Rect;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Definition of a Rect using floats.
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