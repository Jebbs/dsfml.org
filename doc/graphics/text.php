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
      <title>DSFML - dsfml.graphics.text</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.text</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Text</u> is a drawable class that allows one to easily display some text
 with a custom style and color on a render target.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     It inherits all the functions from <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>: position, rotation,
 scale, origin. It also adds text-specific properties such as the font to use,
 the character size, the font style (bold, italic, underlined), the global
 color and the text to display of course. It also provides convenience
 functions to calculate the graphical size of the text, or to get the global
 position of a given character.
<br><br>
 <u>Text</u> works in combination with the <a class="dsfml_link" href="../graphics/font.php" title="Class for loading and manipulating character fonts.">Font</a> class, which loads and
 provides the glyphs (visual characters) of a given font.
<br><br>
 The separation of <a class="dsfml_link" href="../graphics/font.php" title="Class for loading and manipulating character fonts.">Font</a> and <u>Text</u> allows more flexibility and
 better performances: indeed a <a class="dsfml_link" href="../graphics/font.php" title="Class for loading and manipulating character fonts.">Font</a> is a heavy resource, and any
 operation on it is slow (often too slow for real-time applications). On the
 other side, a <u>Text</u> is a lightweight object which can combine the glyphs
 data and metrics of a <a class="dsfml_link" href="../graphics/font.php" title="Class for loading and manipulating character fonts.">Font</a> to display any text on a render target.
<br><br>
 It is important to note that the <u>Text</u> instance doesn't copy the font
 that it uses, it only keeps a reference to it. Thus, a <a class="dsfml_link" href="../graphics/font.php" title="Class for loading and manipulating character fonts.">Font</a> must not
 be destructed while it is used by a <u>Text</u>.
<br><br>
 See also the note on coordinates and undistorted rendering in
 <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>.
<br><br>
 example:

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare and load a font
auto font = new Font();
font.loadFromFile("arial.ttf");

// Create a text
auto <span class="psymbol">text</span> = new Text("hello", font);
<span class="psymbol">text</span>.setCharacterSize(30);
<span class="psymbol">text</span>.setStyle(Text.Style.Bold);
<span class="psymbol">text</span>.setColor(Color.Red);

// Draw it
window.draw(<span class="psymbol">text</span>);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/font.php" title="Class for loading and manipulating character fonts.">Font</a>, <a class="dsfml_link" href="../graphics/transformable.php" title="Decomposed transform defined by a position, a rotation, and a scale.">Transformable</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Text" id="Text">class Text: <span class="ddoc_psuper_symbol">dsfml.graphics.drawable.Drawable</span>, <span class="ddoc_psuper_symbol">dsfml.graphics.transformable.Transformable</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Graphical text that can be drawn to a render target.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.Style" id="Text.Style">enum Style: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enumeration of the string drawing styles.
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.Style.Regular" id="Text.Style.Regular">Regular</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Regular characters, no style
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.Style.Bold" id="Text.Style.Bold">Bold</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Bold characters
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.Style.Italic" id="Text.Style.Italic">Italic</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Italic characters
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.Style.Underlined" id="Text.Style.Underlined">Underlined</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Underlined characters
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.Style.StrikeThrough" id="Text.Style.StrikeThrough">StrikeThrough</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Strike through characters
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
        <code class="prettyprint"><a class="decl_anchor" href="#Text.this" id="Text.this">this();
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
    Creates an empty text.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.this.2" id="Text.this.2">this(T)(const(T)[] text, Font font, uint characterSize = 30) if (is(T == dchar) || is(T == wchar) || is(T == char));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the text from a string, font and size

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Note that if the used font is a bitmap font, it is not scalable, thus not
 all requested sizes will be available to use. This needs to be taken into
 consideration when setting the character size. If you need to display
 text of a certain size, make sure the corresponding bitmap font that
 supports that size is used.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(T)[] text</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Text assigned to the string
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Font font</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Font used to draw the string
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint characterSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Base size of characters, in pixels
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the constructor that takes a 'const(dchar)[]' instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.this.3" id="Text.this.3">this(T)(const(dchar)[] text, Font font, uint characterSize = 30);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the text from a string, font and size

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Note that if the used font is a bitmap font, it is not scalable, thus not
 all requested sizes will be available to use. This needs to be taken into
 consideration when setting the character size. If you need to display
 text of a certain size, make sure the corresponding bitmap font that
 supports that size is used.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(dchar)[] text</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Text assigned to the string
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Font font</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Font used to draw the string
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint characterSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Base size of characters, in pixels
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
        <code class="prettyprint"><a class="decl_anchor" href="#Text.characterSize" id="Text.characterSize">@property uint characterSize(uint size);
<br>
const @property uint characterSize();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The character size in pixels.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The default size is 30.
<br><br>
 Note that if the used font is a bitmap font, it is not scalable, thus
 not all requested sizes will be available to use. This needs to be
 taken into consideration when setting the character size. If you need
 to display text of a certain size, make sure the corresponding bitmap
 font that supports that size is used.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.setCharacterSize" id="Text.setCharacterSize"><div class="deprecated_decl">deprecated void setCharacterSize(uint size)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the character size.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The default size is 30.
<br><br>
 Note that if the used font is a bitmap font, it is not scalable, thus
 not all requested sizes will be available to use. This needs to be
 taken into consideration when setting the character size. If you need
 to display text of a certain size, make sure the corresponding bitmap
 font that supports that size is used.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint size</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New character size, in pixels.
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'characterSize' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getCharacterSize" id="Text.getCharacterSize"><div class="deprecated_decl">deprecated const uint getCharacterSize()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the character size.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Size of the characters, in pixels.


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'characterSize' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.setColor" id="Text.setColor"><div class="deprecated_decl">deprecated void setColor(Color color)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the fill color of the text.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    By default, the text's color is opaque white.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color color</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New color of the text.
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'fillColor' or 'outlineColor' properties instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getColor" id="Text.getColor"><div class="deprecated_decl">deprecated const Color getColor()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the fill color of the text.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Fill color of the text.


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'fillColor' or 'outlineColor' properties instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.fillColor" id="Text.fillColor">@property Color fillColor(Color color);
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
    The fill color of the text.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    By default, the text's fill color is opaque white. Setting the fill
 color to a transparent color with an outline will cause the outline to
 be displayed in the fill area of the text.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.outlineColor" id="Text.outlineColor">@property Color outlineColor(Color color);
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
    The outline color of the text.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    By default, the text's outline color is opaque black.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.outlineThickness" id="Text.outlineThickness">@property float outlineThickness(float thickness);
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
    The outline color of the text.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    By default, the text's outline color is opaque black.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.font" id="Text.font">@property const(Font) font(Font newFont);
<br>
const @property const(Font) font();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The text's font.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.setFont" id="Text.setFont"><div class="deprecated_decl">deprecated void setFont(Font newFont)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the text's font.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Font newFont</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New font
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'font' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getFont" id="Text.getFont"><div class="deprecated_decl">deprecated const const(Font) getFont()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get thet text's font.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Text's font.


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'font' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.globalBounds" id="Text.globalBounds">@property FloatRect globalBounds();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getGlobalBounds" id="Text.getGlobalBounds"><div class="deprecated_decl">deprecated FloatRect getGlobalBounds()</div>;
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
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'globalBounds' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.localBounds" id="Text.localBounds">const @property FloatRect localBounds();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getLocalBounds" id="Text.getLocalBounds"><div class="deprecated_decl">deprecated const FloatRect getLocalBounds()</div>;
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
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'globalBounds' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.style" id="Text.style">@property Style style(Style newStyle);
<br>
const @property Style style();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The text's style.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    You can pass a combination of one or more styles, for example
 Style.Bold | Text.Italic.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.setStyle" id="Text.setStyle"><div class="deprecated_decl">deprecated void setStyle(Style newStyle)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the text's style.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    You can pass a combination of one or more styles, for example
 Style.Bold | Text.Italic.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Style newStyle</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New style
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'style' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getStyle" id="Text.getStyle"><div class="deprecated_decl">deprecated const Style getStyle()</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the text's style.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Text's style.


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'style' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.string" id="Text.string">@property const(dchar)[] string(const(dchar)[] str);
<br>
const @property const(dchar)[] string();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The text's string.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    A text's string is empty by default.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.setString" id="Text.setString">void setString(T)(const(T)[] text) if (is(T == dchar) || is(T == wchar) || is(T == char));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the text's string.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    A text's string is empty by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(T)[] text</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      New string
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'string' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.getString" id="Text.getString">const const(T)[] getString(T = char)() if (is(T == dchar) || is(T == wchar) || is(T == char));
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a copy of the text's string.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    a copy of the text's string.


  </p>
</div>
<div class="ddoc_deprecated">
  <p class="para">
    <b>Deprecated:</b> Use the 'string' property instead.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Text.draw" id="Text.draw">void draw(RenderTarget renderTarget, RenderStates renderStates);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Draw the object to a render target.

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
      Render target to draw to
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
        <code class="prettyprint"><a class="decl_anchor" href="#Text.findCharacterPos" id="Text.findCharacterPos">Vector2f findCharacterPos(size_t index);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Return the position of the index-th character.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function computes the visual position of a character from its index
 in the string. The returned position is in global coordinates
 (translation, rotation, scale and origin are applied). If index is out of
 range, the position of the end of the string is returned.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">size_t index</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Index of the character
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
    Position of the character.
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