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
      <title>DSFML - dsfml.graphics.color</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.color</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Color</u> is a simple color structure composed of 4 components:
 <ul class="lists"> <li>Red</li>
 <li>Green</li>
 <li>Blue</li>
 <li>Alpha (opacity)</li></ul>

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     Each component is a public member, an unsigned integer in the range [0, 255].
 Thus, colors can be constructed and manipulated very easily:
<br><br>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto <span class="psymbol">color</span> = Color(255, 0, 0); // red
<span class="psymbol">color</span>.r = 0;                // make it black
<span class="psymbol">color</span>.b = 128;              // make it dark blue
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">The fourth component of colors, named "alpha", represents the opacity
 of the color. A color with an alpha value of 255 will be fully opaque, while
 an alpha value of 0 will make a color fully transparent, whatever the value
 of the other components is.
<br><br>
 The most common colors are already defined as static variables:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto black       = Color.Black;
auto white       = Color.White;
auto red         = Color.Red;
auto green       = Color.Green;
auto blue        = Color.Blue;
auto yellow      = Color.Yellow;
auto magenta     = Color.Magenta;
auto cyan        = Color.Cyan;
auto transparent = Color.Transparent;
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Colors can also be added and modulated (multiplied) using the
 overloaded operators <code class="prettyprint">+</code> and <code class="prettyprint">*</code>.</p>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Color" id="Color">struct Color;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Color is a utility struct for manipulating 32-bits RGBA colors.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.r" id="Color.r">ubyte r;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Red component
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.g" id="Color.g">ubyte g;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Green component
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.b" id="Color.b">ubyte b;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Blue component
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.a" id="Color.a">ubyte a;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Alpha component
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.toString" id="Color.toString">const string toString();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the string representation of the Color.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.opBinary" id="Color.opBinary">const Color opBinary(string op)(Color otherColor) if (op == "+" || op == "-" || op == "*");
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overlolad of the <code class="prettyprint">+</code>, <code class="prettyprint">-</code>, and <code class="prettyprint">*</code> operators.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This operator returns the component-wise sum, subtraction, or
 multiplication (also called"modulation") of two colors.
<br><br>
 For addition and subtraction, components that exceed 255 are clamped to
 255 and those below 0 are clamped to 0. For multiplication, are divided
 by 255 so that the result is still in the range [0, 255].


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color otherColor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The Color to be added to/subtracted from/bultiplied by this
              one
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
    The addition, subtraction, or multiplication between this Color and the
 other.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.opBinary.2" id="Color.opBinary.2">const Color opBinary(string op, E)(E num) if (isNumeric!E &amp;&amp; (op == "*" || op == "/"));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overlolad of the <code class="prettyprint">*</code> and <code class="prettyprint">/</code> operators.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This operator returns the component-wise multiplicaton or division of a
 color and a scalar.
 Components that exceed 255 are clamped to 255 and those below 0 are
 clamped to 0.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">E num</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      the scalar to multiply/divide the Color.
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
    The multiplication or division of this Color by the scalar.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.opOpAssign" id="Color.opOpAssign">ref Color opOpAssign(string op)(Color otherColor) if (op == "+" || op == "-" || op == "*");
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overlolad of the <code class="prettyprint">+=, </code>-=<code class="prettyprint">, and </code>*=` operators.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This operation computes the component-wise sum, subtraction, or
 multiplication (also called"modulation") of two colors and assigns it to
 the left operand.
 Components that exceed 255 are clamped to 255 and those below 0 are
 clamped to 0. For multiplication, are divided
 by 255 so that the result is still in the range [0, 255].


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color otherColor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The Color to be added to/subtracted from/bultiplied by this
              one
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
    A reference to this color after performing the addition, subtraction, or
 multiplication.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.opOpAssign.2" id="Color.opOpAssign.2">ref Color opOpAssign(string op, E)(E num) if (isNumeric!E &amp;&amp; (op == "*" || op == "/"));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overlolad of the <code class="prettyprint">*=</code> and <code class="prettyprint">/=</code> operators.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This operation computers the component-wise multiplicaton or division of
 a color and a scalar, then assignes it to the color.
 Components that exceed 255 are clamped to 255 and those below 0 are
 clamped to 0.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">E num</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      the scalar to multiply/divide the Color
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
    A reference to this color after performing the multiplication or
 division.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Color.opEquals" id="Color.opEquals">const bool opEquals(Color otherColor);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overload of the <code class="prettyprint">==</code> and <code class="prettyprint">!=</code> operators.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This operator compares two colors and check if they are equal.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color otherColor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      the Color to be compared with
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
    <code class="prettyprint">true</code> if colors are equal, <code class="prettyprint">false</code> if they are different.
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