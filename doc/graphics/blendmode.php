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
      <title>DSFML - dsfml.graphics.blendmode</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.blendmode</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>BlendMode</u> is a structure that represents a blend mode. A blend mode
 determines how the colors of an object you draw are mixed with the colors
 that are already in the buffer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     The structure is composed of 6 components, each of which has its
 own public member variable:
 <ul class="lists"> <li>Color Source Factor (colorSrcFactor)</li>
 <li>Color Destination Factor (colorDstFactor)</li>
 <li>Color Blend Equation (colorEquation)</li>
 <li>Alpha Source Factor (alphaSrcFactor)</li>
 <li>Alpha Destination Factor (alphaDstFactor)</li>
 <li>Alpha Blend Equation (alphaEquation)</li></ul>
 <p class="para"> The source factor specifies how the pixel you are drawing contributes to the
 final color. The destination factor specifies how the pixel already drawn in
 the buffer contributes to the final color.
<br><br>
 The color channels RGB (red, green, blue; simply referred to as color) and A
 (alpha; the transparency) can be treated separately. This separation can be
 useful for specific blend modes, but most often you won't need it and will
 simply treat the color as a single unit.
<br><br>
 The blend factors and equations correspond to their OpenGL equivalents. In
 general, the color of the resulting pixel is calculated according to the
 following formula (<i>src</i> is the color of the source pixel, <i>dst</i> the
 color of the destination pixel, the other variables correspond to the
 public members, with the equations being <code class="prettyprint">+</code> or <code class="prettyprint">-</code> operators):</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">dst.rgb = colorSrcFactor * src.rgb (colorEquation) colorDstFactor * dst.rgb
dst.a   = alphaSrcFactor * src.a   (alphaEquation) alphaDstFactor * dst.a
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">All factors and colors are represented as floating point numbers
 between 0 and 1. Where necessary, the result is clamped to fit in that range.
<br><br>
 The most common blending modes are defined as constants inside of
 <u>BlendMode</u>:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto alphaBlending          = BlendMode.Alpha;
auto additiveBlending       = BlendMode.Add;
auto multiplicativeBlending = BlendMode.Multiply;
auto noBlending             = BlendMode.None;
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">In DSFML, a blend mode can be specified every time you draw a Drawable
 object to a render target. It is part of the RenderStates compound
 that is passed to the member function RenderTarget::draw().</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/renderstates.php" title="Define the states used for drawing to a RenderTarget.">RenderStates</a>, <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode" id="BlendMode">struct BlendMode;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Blending modes for drawing.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor" id="BlendMode.Factor">enum Factor: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enumeration of the blending factors.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The factors are mapped directly to their OpenGL equivalents,
 specified by <code class="prettyprint">glBlendFunc()</code> or <code class="prettyprint">glBlendFuncSeparate()</code>.
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.Zero" id="BlendMode.Factor.Zero">Zero</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (0, 0, 0, 0)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.One" id="BlendMode.Factor.One">One</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (1, 1, 1, 1)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.SrcColor" id="BlendMode.Factor.SrcColor">SrcColor</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (src.r, src.g, src.b, src.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.OneMinunSrcColor" id="BlendMode.Factor.OneMinunSrcColor">OneMinunSrcColor</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (1, 1, 1, 1) - (src.r, src.g, src.b, src.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.DstColor" id="BlendMode.Factor.DstColor">DstColor</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (dst.r, dst.g, dst.b, dst.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.OneMinusDstColor" id="BlendMode.Factor.OneMinusDstColor">OneMinusDstColor</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (1, 1, 1, 1) - (dst.r, dst.g, dst.b, dst.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.SrcAlpha" id="BlendMode.Factor.SrcAlpha">SrcAlpha</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (src.a, src.a, src.a, src.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.OneMinusSrcAlpha" id="BlendMode.Factor.OneMinusSrcAlpha">OneMinusSrcAlpha</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (1, 1, 1, 1) - (src.a, src.a, src.a, src.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.DstAlpha" id="BlendMode.Factor.DstAlpha">DstAlpha</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (dst.a, dst.a, dst.a, dst.a)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Factor.OneMinusDstAlpha" id="BlendMode.Factor.OneMinusDstAlpha">OneMinusDstAlpha</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    (1, 1, 1, 1) - (dst.a, dst.a, dst.a, dst.a)
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
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Equation" id="BlendMode.Equation">enum Equation: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enumeration of the blending equations

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The equations are mapped directly to their OpenGL equivalents,
 specified by glBlendEquation() or glBlendEquationSeparate().
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Equation.Add" id="BlendMode.Equation.Add">Add</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Pixel = Src * SrcFactor + Dst * DstFactor
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Equation.Subtract" id="BlendMode.Equation.Subtract">Subtract</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Pixel = Src * SrcFactor - Dst * DstFactor
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Equation.ReverseSubtract" id="BlendMode.Equation.ReverseSubtract">ReverseSubtract</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Pixel = Dst * DstFactor - Src * SrcFactor
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
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Alpha" id="BlendMode.Alpha">enum BlendMode Alpha;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Blend source and dest according to dest alpha.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Add" id="BlendMode.Add">enum BlendMode Add;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Add source to dest.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.Multiply" id="BlendMode.Multiply">enum BlendMode Multiply;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Multiply source and dest.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.None" id="BlendMode.None">enum BlendMode None;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Overwrite dest with source.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.colorSrcFactor" id="BlendMode.colorSrcFactor">Factor colorSrcFactor;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Source blending factor for the color channels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.colorDstFactor" id="BlendMode.colorDstFactor">Factor colorDstFactor;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Destination blending factor for the color channels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.colorEquation" id="BlendMode.colorEquation">Equation colorEquation;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Blending equation for the color channels.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.alphaSrcFactor" id="BlendMode.alphaSrcFactor">Factor alphaSrcFactor;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Source blending factor for the alpha channel.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.alphaDstFactor" id="BlendMode.alphaDstFactor">Factor alphaDstFactor;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Destination blending factor for the alpha channel.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.alphaEquation" id="BlendMode.alphaEquation">Equation alphaEquation;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Blending equation for the alpha channel.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.this" id="BlendMode.this">this(Factor sourceFactor, Factor destinationFactor, Equation blendEquation = Equation.Add);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the blend mode given the factors and equation.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This constructor uses the same factors and equation for both
 color and alpha components. It also defaults to the Add equation.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Factor sourceFactor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to compute the source factor for the
                           color and alpha channels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Factor destinationFactor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to compute the destination factor for
                           the color and alpha channels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Equation blendEquation</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to combine the source and destination
                           colors and alpha
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
        <code class="prettyprint"><a class="decl_anchor" href="#BlendMode.this.2" id="BlendMode.this.2">this(Factor colorSourceFactor, Factor colorDestinationFactor, Equation colorBlendEquation, Factor alphaSourceFactor, Factor alphaDestinationFactor, Equation alphaBlendEquation);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the blend mode given the factors and equation.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Factor colorSourceFactor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to compute the source factor for
                                the color channels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Factor colorDestinationFactor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to compute the destination factor
                                for the color channels
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Equation colorBlendEquation</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to combine the source and
                                destination colors
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Factor alphaSourceFactor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to compute the source factor
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Factor alphaDestinationFactor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to compute the destination factor
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Equation alphaBlendEquation</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Specifies how to combine the source and
                                destination alphas
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