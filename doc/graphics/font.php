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
      <title>DSFML - dsfml.graphics.font</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.font</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Fonts can be loaded from a file, from memory or from a custom stream, and
 supports the most common types of fonts. See the <code class="prettyprint">loadFromFile</code> function for
 the complete list of supported formats.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Once it is loaded, a <u>Font</u> instance provides three types of information
 about the font:
 <ul class="lists"> <li>Global metrics, such as the line spacing</li>
 <li>Per-glyph metrics, such as bounding box or kerning</li>
 <li>Pixel representation of glyphs</li></ul>
<br><br>
 <p class="para"> Fonts alone are not very useful: they hold the font data but cannot make
 anything useful of it. To do so you need to use the <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a> class, which
 is able to properly output text with several options such as character size,
 style, color, position, rotation, etc.
 This separation allows more flexibility and better performances: indeed a
 &amp; <u>Font</u> is a heavy resource, and any operation on it is slow (often too
 slow for real-time applications). On the other side, a <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a> is a
 lightweight object which can combine the glyphs data and metrics of a
 <u>Font</u> to display any text on a render target.
 Note that it is also possible to bind several <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a> instances to the
 same <u>Font</u>.
<br><br>
 It is important to note that the <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a> instance doesn't copy the font
 that it uses, it only keeps a reference to it. Thus, a <u>Font</u> must not be
 destructed while it is used by a <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a>.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Declare a new font
auto <span class="psymbol">font</span> = new Font();

// Load it from a file
if (!<span class="psymbol">font</span>.loadFromFile("arial.ttf"))
{
    // error...
}

// Create a text which uses our font
auto text1 = new Text();
text1.setFont(<span class="psymbol">font</span>);
text1.setCharacterSize(30);
text1.setStyle(Text.Style.Regular);

// Create another text using the same font, but with different parameters
auto text2 = new Text();
text2.setFont(<span class="psymbol">font</span>);
text2.setCharacterSize(50);
text2.setStyle(Text.Style.Italic);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Apart from loading font files, and passing them to instances of
 <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a>, you should normally not have to deal directly with this class.
 However, it may be useful to access the font metrics or rasterized glyphs for
 advanced usage.
<br><br>
 Note that if the font is a bitmap font, it is not scalable, thus not all
 requested sizes will be available to use. This needs to be taken into
 consideration when using <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a>.
 If you need to display text of a certain size, make sure the corresponding
 bitmap font that supports that size is used.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Font" id="Font">class Font;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Class for loading and manipulating character fonts.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.Info" id="Font.Info">struct Info;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Holds various information about a font.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.Info.family" id="Font.Info.family">const(char)[] family;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The font family.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Font.this" id="Font.this">this();
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
<div class="ddoc_description">
  <p class="para">
    Defines an empty font.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.loadFromFile" id="Font.loadFromFile">bool loadFromFile(const(char)[] filename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the font from a file.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported font formats are: TrueType, Type 1, CFF, OpenType, SFNT,
 X11 PCF, Windows FNT, BDF, PFR and Type 42. Note that this function know
 nothing about the standard fonts installed on the user's system, thus you
 can't load them directly.
<br><br>
 DSFML cannot preload all the font data in this function, so the file has
 to remain accessible until the Font object loads a new font or is
 destroyed.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] filename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the font file to load
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.loadFromMemory" id="Font.loadFromMemory">bool loadFromMemory(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the font from a file in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported font formats are: TrueType, Type 1, CFF, OpenType, SFNT,
 X11 PCF, Windows FNT, BDF, PFR and Type 42.
<br><br>
 DSFML cannot preload all the font data in this function, so the buffer
 pointed by data has to remain valid until the Font object loads a new
 font or is destroyed.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(void)[] data</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      data holding the font file
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.loadFromStream" id="Font.loadFromStream">bool loadFromStream(InputStream stream);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the font from a custom stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The supported font formats are: TrueType, Type 1, CFF, OpenType, SFNT,
 X11 PCF, Windows FNT, BDF, PFR and Type 42.
<br><br>
 DSFML cannot preload all the font data in this function, so the contents
 of stream have to remain valid as long as the font is used.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream stream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read from
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
    <code class="prettyprint">true</code> if loading succeeded, <code class="prettyprint">false</code> if it failed.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.getGlyph" id="Font.getGlyph">const Glyph getGlyph(dchar codePoint, uint characterSize, bool bold, float outlineThickness = 0);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Retrieve a glyph of the font.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">dchar codePoint</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Unicode code point of the character ot get
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
      Reference character size
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool bold</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Retrieve the bold version or the regular one?
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float outlineThickness</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Thickness of outline (when != 0 the glyph will not be filled)
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
    The glyph corresponding to codePoint and characterSize.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.getKerning" id="Font.getKerning">const float getKerning(dchar first, dchar second, uint characterSize);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the kerning offset of two glyphs.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The kerning is an extra offset (negative) to apply between two glyphs
 when rendering them, to make the pair look more "natural". For example,
 the pair "AV" have a special kerning to make them closer than other
 characters. Most of the glyphs pairs have a kerning offset of zero,
 though.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">dchar first</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Unicode code point of the first character
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">dchar second</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Unicode code point of the second character
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
      Reference character size
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
    Kerning value for first and second, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.getLineSpacing" id="Font.getLineSpacing">const float getLineSpacing(uint characterSize);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the line spacing.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The spacing is the vertical offset to apply between consecutive lines of
 text.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint characterSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference character size
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
    Line spacing, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.getUnderlinePosition" id="Font.getUnderlinePosition">const float getUnderlinePosition(uint characterSize);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the position of the underline.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Underline position is the vertical offset to apply between the baseline
 and the underline.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint characterSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference character size
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
    Underline position, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.getUnderlineThickness" id="Font.getUnderlineThickness">const float getUnderlineThickness(uint characterSize);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the thickness of the underline.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Underline thickness is the vertical size of the underline.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint characterSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference character size
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
    Underline thickness, in pixels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.getTexture" id="Font.getTexture">const(Texture) getTexture(uint characterSize);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Retrieve the texture containing the loaded glyphs of a certain size.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The contents of the returned texture changes as more glyphs are
 requested, thus it is not very relevant. It is mainly used internally by
 Text.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint characterSize</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference character size
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
    Texture containing the glyphs of the requested size.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Font.dup" id="Font.dup">const @property Font dup();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Performs a deep copy on the font.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The duplicated font.
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