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
      <title>DSFML - dsfml.graphics.renderstates</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.renderstates</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    There are four global states that can be applied to the drawn objects:
 <ul class="lists"> <li>the blend mode: how pixels of the object are blended with the
 background</li>
 <li>the transform: how the object is positioned/rotated/scaled</li>
 <li>the texture: what image is mapped to the object</li>
 <li>the shader: what custom effect is applied to the object</li></ul>

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     High-level objects such as sprites or text force some of these states when
 they are drawn. For example, a sprite will set its own texture, so that you
 don't have to care about it when drawing the sprite.
<br><br>
 The transform is a special case: sprites, texts and shapes (and it's a good
 idea to do it with your own drawable classes too) combine their transform
 with the one that is passed in the RenderStates structure. So that you can
 use a "global" transform on top of each object's transform.
<br><br>
 Most objects, especially high-level drawables, can be drawn directly without
 defining render states explicitely – the default set of states is ok in most
 cases.

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">RenderWindow window;
Sprite sprite;

...

window.draw(sprite);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">If you want to use a single specific render state, for example a
 shader, you can construct a <u>RenderStates</u> object from it:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">auto states = RenderStates(shader)
window.draw(sprite, states);

//or
window.draw(sprite, RenderStates(shader));
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">When you're inside the <code class="prettyprint">draw</code> function of a drawable object (inherited
 from <a class="dsfml_link" href="../graphics/drawable.php" title="Interface for objects that can be drawn to a render target.">Drawable</a>), you can either pass the render states unmodified, or
 change some of them. For example, a transformable object will combine the
 current transform with its own transform. A sprite will set its texture.
 Etc.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a>, <a class="dsfml_link" href="../graphics/drawable.php" title="Interface for objects that can be drawn to a render target.">Drawable</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates" id="RenderStates">struct RenderStates;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define the states used for drawing to a RenderTarget.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.blendMode" id="RenderStates.blendMode">BlendMode blendMode;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The blending mode.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.transform" id="RenderStates.transform">Transform transform;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The transform.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.this" id="RenderStates.this">this(BlendMode theBlendMode);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a default set of render states with a custom blend mode.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">BlendMode theBlendMode</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Blend mode to use
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.this.2" id="RenderStates.this.2">this(Transform theTransform);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a default set of render states with a custom transform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Transform theTransform</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Transform to use
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.this.3" id="RenderStates.this.3">this(const(Texture) theTexture);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a default set of render states with a custom texture

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Texture) theTexture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Texture to use
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.this.4" id="RenderStates.this.4">this(const(Shader) theShader);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a default set of render states with a custom shader

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Shader) theShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Shader to use
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.this.5" id="RenderStates.this.5">this(BlendMode theBlendMode, Transform theTransform, const(Texture) theTexture, const(Shader) theShader);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct a set of render states with all its attributes

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">BlendMode theBlendMode</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Blend mode to use
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Transform theTransform</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Transform to use
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Texture) theTexture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Texture to use
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Shader) theShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Shader to use
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
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.shader" id="RenderStates.shader">@property const(Shader) shader(const(Shader) theShader);
<br>
const @property const(Shader) shader();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The shader to apply while rendering.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#RenderStates.texture" id="RenderStates.texture">@property const(Texture) texture(const(Texture) theTexture);
<br>
const @property const(Texture) texture();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The texture to apply while rendering.
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