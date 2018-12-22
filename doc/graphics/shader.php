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
      <title>DSFML - dsfml.graphics.shader</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.shader</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Shaders are programs written using a specific language, executed directly by
 the graphics card and allowing one to apply real-time operations to the
 rendered entities.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
     There are three kinds of shaders:
 <ul class="lists"> <li>Vertex shaders, that process vertices</li>
 <li>Geometry shaders, that process primitives</li>
 <li>Fragment (pixel) shaders, that process pixels</li></ul>
<br><br>
 <p class="para"> A <u>Shader</u> can be composed of either a vertex shader alone, a geometry
 shader alone, a fragment shader alone, or any combination of them. (see the
 variants of the load functions).
<br><br>
 Shaders are written in GLSL, which is a C-like language dedicated to OpenGL
 shaders. You'll probably need to learn its basics before writing your own
 shaders for DSFML.
<br><br>
 Like any D/C/C++ program, a GLSL shader has its own variables called uniforms
 that you can set from your D application. <u>Shader</u> handles different types
 of uniforms:</p>
 <ul class="lists"> <li>scalars: float, int, bool</li>
 <li>vectors (2, 3 or 4 components)</li>
 <li>matrices (3x3 or 4x4)</li>
 <li>samplers (textures)</li></ul>
<br><br>
 <p class="para">Some DSFML-specific types can be converted:</p>
  <ul class="lists"> <li><a class="dsfml_link" href="../graphics/color.php" title="Color is a utility struct for manipulating 32-bits RGBA colors.">Color</a> as a 4D vector (<code class="prettyprint">vec4</code>)</li>
 <li><a class="dsfml_link" href="../graphics/transform.php" title="Define a 3x3 transform matrix.">Transform</a> as matrices (<code class="prettyprint">mat3</code> or <code class="prettyprint">mat4</code>)</li></ul>
<br><br>
 <p class="para">Every uniform variable in a shader can be set through one of the
 <code class="prettyprint">setUniform()</code> or <code class="prettyprint">setUniformArray()</code> overloads. For example, if you have a
 shader with the following uniforms:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">uniform float offset;
uniform vec3 point;
uniform vec4 color;
uniform mat4 matrix;
uniform sampler2D overlay;
uniform sampler2D current;
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">You can set their values from D code as follows, using the types
 defined in the <code class="prettyprint">dsfml.graphics.glsl</code> module:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint"><span class="psymbol">shader</span>.setUniform("offset", 2.f);
<span class="psymbol">shader</span>.setUniform("point", Vector3f(0.5f, 0.8f, 0.3f));
<span class="psymbol">shader</span>.setUniform("color", Vec4(color));
<span class="psymbol">shader</span>.setUniform("matrix", Mat4(transform));
<span class="psymbol">shader</span>.setUniform("overlay", texture);
<span class="psymbol">shader</span>.setUniform("current", Shader.CurrentTexture);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">The old <code class="prettyprint">setParameter()</code> overloads are deprecated and will be removed
 in a future version. You should use their <code class="prettyprint">setUniform()</code> equivalents instead.
<br><br>
 It is also worth noting that DSFML supports index overloads for
 setting uniforms:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint"><span class="psymbol">shader</span>["offset"] = 2.f;
<span class="psymbol">shader</span>["point"] = Vector3f(0.5f, 0.8f, 0.3f);
<span class="psymbol">shader</span>["color"] = Vec4(color);
<span class="psymbol">shader</span>["matrix"] = Mat4(transform);
<span class="psymbol">shader</span>["overlay"] = texture;
<span class="psymbol">shader</span>["current"] = Shader.CurrentTexture;
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">The special <code class="prettyprint">Shader.CurrentTexture</code> argument maps the given
 <code class="prettyprint">sampler2D</code> uniform to the current texture of the object being drawn (which
 cannot be known in advance).
<br><br>
 To apply a shader to a drawable, you must pass it as part of an additional
 parameter to the <code class="prettyprint">Window.draw()</code> function:</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">RenderStates states;
states.<span class="psymbol">shader</span> = <span class="psymbol">shader</span>;
window.draw(sprite, states);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">In the code above we pass a reference to the shader, because it may be
 <code class="prettyprint">null</code> (which means "no shader").
<br><br>
 Shaders can be used on any drawable, but some combinations are not
 interesting. For example, using a vertex shader on a <a class="dsfml_link" href="../graphics/sprite.php" title="Drawable representation of a texture, with its own transformations, color, etc.">Sprite</a> is
 limited because there are only 4 vertices, the sprite would have to be
 subdivided in order to apply wave effects.
 Another bad example is a fragment shader with <a class="dsfml_link" href="../graphics/text.php" title="Graphical text that can be drawn to a render target.">Text</a>: the texture of
 the text is not the actual text that you see on screen, it is a big texture
 containing all the characters of the font in an arbitrary order; thus,
 texture lookups on pixels other than the current one may not give you the
 expected result.
<br><br>
 Shaders can also be used to apply global post-effects to the current contents
 of the target. This can be done in two different ways:</p>
 <ul class="lists"> <li>draw everything to a <a class="dsfml_link" href="../graphics/rendertexture.php" title="Target for off-screen 2D rendering into a texture.">RenderTexture</a>, then draw it to the main
        target using the shader</li>
 <li>draw everything directly to the main target, then use <code class="prettyprint">Texture.update</code>
        to copy its contents to a texture and draw it to the main target using
        the shader</li></ul>
<br><br>
 <p class="para">The first technique is more optimized because it doesn't involve
 retrieving the target's pixels to system memory, but the second one doesn't
 impact the rendering process and can be easily inserted anywhere without
 impacting all the code.
<br><br>
 Like <a class="dsfml_link" href="../graphics/texture.php" title="Image living on the graphics card that can be used for drawing.">Texture</a> that can be used as a raw OpenGL texture, <u>Shader</u>
 can also be used directly as a raw shader for custom OpenGL geometry.</p>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">Shader.bind(<span class="psymbol">shader</span>);
... render OpenGL geometry ...
Shader.bind(null);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/glsl.php" title="The module containing GLSL types.">Glsl</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader" id="Shader">class Shader;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Shader class (vertex and fragment).
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.Type" id="Shader.Type">enum Type: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Types of shaders.
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.Type.Vertex" id="Shader.Type.Vertex">Vertex</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Vertex shader
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.Type.Geometry" id="Shader.Type.Geometry">Geometry</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Geometry shader
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.Type.Fragment" id="Shader.Type.Fragment">Fragment</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Fragment (pixel) shader.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.CurrentTextureType" id="Shader.CurrentTextureType">struct CurrentTextureType;
<br>
<a class="decl_anchor" href="#Shader.CurrentTexture" id="Shader.CurrentTexture">static CurrentTextureType CurrentTexture;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Special type/value that can be passed to <code class="prettyprint">setParameter</code>, and that
 represents the texture of the object being drawn.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.this" id="Shader.this">this();
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

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromFile" id="Shader.loadFromFile">bool loadFromFile(const(char)[] filename, Type type);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the vertex, geometry, or fragment shader from a file.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads a single shader, vertex, geometry, or fragment,
 identified by the second argument. The source must be a text file
 containing a valid shader in GLSL language. GLSL is a C-like language
 dedicated to OpenGL shaders; you'll probably need to read a good
 documentation for it before writing your own shaders.


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
      Path of the vertex, geometry, or fragment shader file to load
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Type type</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Type of shader (vertex geometry, or fragment)
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromFile.2" id="Shader.loadFromFile.2">bool loadFromFile(const(char)[] vertexShaderFilename, const(char)[] fragmentShaderFilename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load both the vertex and fragment shaders from files.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads both the vertex and the fragment shaders. If one of
 them fails to load, the shader is left empty (the valid shader is
 unloaded). The sources must be text files containing valid shaders in
 GLSL language. GLSL is a C-like language dedicated to OpenGL shaders;
 you'll probably need to read a good documentation for it before writing
 your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] vertexShaderFilename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the vertex shader file to load
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] fragmentShaderFilename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the fragment shader file to load
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromFile.3" id="Shader.loadFromFile.3">bool loadFromFile(const(char)[] vertexShaderFilename, const(char)[] geometryShaderFilename, const(char)[] fragmentShaderFilename);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the vertex, geometry, and fragment shaders from files.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads the vertex, geometry and the fragment shaders. If one
 of them fails to load, the shader is left empty (the valid shader is
 unloaded). The sources must be text files containing valid shaders in
 GLSL language. GLSL is a C-like language dedicated to OpenGL shaders;
 you'll probably need to read a good documentation for it before writing
 your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] vertexShaderFilename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the vertex shader file to load
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] geometryShaderFilename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the geometry shader file to load
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] fragmentShaderFilename</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Path of the fragment shader file to load
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromMemory" id="Shader.loadFromMemory">bool loadFromMemory(const(char)[] shader, Type type);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the vertex, geometry, or fragment shader from a source code in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads a single shader, vertex, geometry, or fragment,
 identified by the second argument. The source code must be a valid shader
 in GLSL language. GLSL is a C-like language dedicated to OpenGL shaders;
 you'll probably need to read a good documentation for it before writing
 your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] shader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      String containing the source code of the shader
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Type type</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Type of shader (vertex geometry, or fragment)
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromMemory.2" id="Shader.loadFromMemory.2">bool loadFromMemory(const(char)[] vertexShader, const(char)[] fragmentShader);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load both the vertex and fragment shaders from source codes in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads both the vertex and the fragment shaders. If one of
 them fails to load, the shader is left empty (the valid shader is
 unloaded). The sources must be valid shaders in GLSL language. GLSL is a
 C-like language dedicated to OpenGL shaders; you'll probably need to read
 a good documentation for it before writing your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] vertexShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      String containing the source code of the vertex shader
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] fragmentShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      String containing the source code of the fragment
                         shader
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromMemory.3" id="Shader.loadFromMemory.3">bool loadFromMemory(const(char)[] vertexShader, const(char)[] geometryShader, const(char)[] fragmentShader);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the vertex, geometry and fragment shaders from source codes in memory.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads the vertex, geometry and the fragment shaders. If one of
 them fails to load, the shader is left empty (the valid shader is
 unloaded). The sources must be valid shaders in GLSL language. GLSL is a
 C-like language dedicated to OpenGL shaders; you'll probably need to read
 a good documentation for it before writing your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] vertexShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      String containing the source code of the vertex shader
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] geometryShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      String containing the source code of the geometry shader
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] fragmentShader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      String containing the source code of the fragment
                         shader
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromStream" id="Shader.loadFromStream">bool loadFromStream(InputStream stream, Type type);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the vertex, geometry or fragment shader from a custom stream.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads a single shader, either vertex, geometry or fragment,
 identified by the second argument. The source code must be a valid shader
 in GLSL language. GLSL is a C-like language dedicated to OpenGL shaders;
 you'll probably need to read a good documentation for it before writing
 your own shaders.


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
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Type type</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Type of shader (vertex, geometry or fragment)
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromStream.2" id="Shader.loadFromStream.2">bool loadFromStream(InputStream vertexShaderStream, InputStream fragmentShaderStream);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load both the vertex and fragment shaders from custom streams.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads a single shader, either vertex or fragment,
 identified by the second argument. The source code must be a valid shader
 in GLSL language. GLSL is a C-like language dedicated to OpenGL shaders;
 you'll probably need to read a good documentation for it before writing
 your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream vertexShaderStream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read the vertex shader from
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream fragmentShaderStream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read the fragment shader from
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.loadFromStream.3" id="Shader.loadFromStream.3">bool loadFromStream(InputStream vertexShaderStream, InputStream geometryShaderStream, InputStream fragmentShaderStream);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Load the vertex, geometry and fragment shaders from custom streams.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function loads a single shader, either vertex, geometry or fragment,
 identified by the second argument. The source code must be a valid shader
 in GLSL language. GLSL is a C-like language dedicated to OpenGL shaders;
 you'll probably need to read a good documentation for it before writing
 your own shaders.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream vertexShaderStream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read the vertex shader from
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream geometryShaderStream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read the geometry shader from
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">InputStream fragmentShaderStream</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Source stream to read the fragment shader from
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform" id="Shader.setUniform">void setUniform(const(char)[] name, float x);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign" id="Shader.opIndexAssign">void opIndexAssign(float x, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for float uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the float scalar
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.2" id="Shader.setUniform.2">void setUniform(const(char)[] name, ref const(Vec2) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.2" id="Shader.opIndexAssign.2">void opIndexAssign(ref const(Vec2) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for vec2 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vec2) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the vec2 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.3" id="Shader.setUniform.3">void setUniform(const(char)[] name, ref const(Vec3) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.3" id="Shader.opIndexAssign.3">void opIndexAssign(ref const(Vec3) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for vec3 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vec3) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the vec3 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.4" id="Shader.setUniform.4">void setUniform(const(char)[] name, ref const(Vec4) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.4" id="Shader.opIndexAssign.4">void opIndexAssign(ref const(Vec4) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for vec4 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vec4) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the vec4 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.5" id="Shader.setUniform.5">void setUniform(const(char)[] name, int x);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.5" id="Shader.opIndexAssign.5">void opIndexAssign(int x, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for int uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">int x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the int scalar
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.6" id="Shader.setUniform.6">void setUniform(const(char)[] name, ref const(Ivec2) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.6" id="Shader.opIndexAssign.6">void opIndexAssign(ref const(Ivec2) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for ivec2 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Ivec2) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the ivec2 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.7" id="Shader.setUniform.7">void setUniform(const(char)[] name, ref const(Ivec3) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.7" id="Shader.opIndexAssign.7">void opIndexAssign(ref const(Ivec3) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for ivec3 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Ivec3) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the ivec3 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.8" id="Shader.setUniform.8">void setUniform(const(char)[] name, ref const(Ivec4) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.8" id="Shader.opIndexAssign.8">void opIndexAssign(ref const(Ivec4) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for ivec4 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Ivec4) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the ivec4 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.9" id="Shader.setUniform.9">void setUniform(const(char)[] name, bool x);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.9" id="Shader.opIndexAssign.9">void opIndexAssign(bool x, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for bool uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the bool scalar
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.10" id="Shader.setUniform.10">void setUniform(const(char)[] name, ref const(Bvec2) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.10" id="Shader.opIndexAssign.10">void opIndexAssign(ref const(Bvec2) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for bvec2 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Bvec2) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the bvec2 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.11" id="Shader.setUniform.11">void setUniform(const(char)[] name, ref const(Bvec3) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.11" id="Shader.opIndexAssign.11">void opIndexAssign(ref const(Bvec3) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for bvec3 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Bvec3) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the bvec3 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.12" id="Shader.setUniform.12">void setUniform(const(char)[] name, ref const(Bvec4) vector);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.12" id="Shader.opIndexAssign.12">void opIndexAssign(ref const(Bvec4) vector, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for bvec4 uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Bvec4) vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the bvec4 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.13" id="Shader.setUniform.13">void setUniform(const(char)[] name, ref const(Mat3) matrix);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.13" id="Shader.opIndexAssign.13">void opIndexAssign(ref const(Mat3) matrix, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for mat3 matrix.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Mat3) matrix</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the mat3 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.14" id="Shader.setUniform.14">void setUniform(const(char)[] name, ref const(Mat4) matrix);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.14" id="Shader.opIndexAssign.14">void opIndexAssign(ref const(Mat4) matrix, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify value for mat4 matrix.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Mat4) matrix</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the mat4 vector
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.15" id="Shader.setUniform.15">void setUniform(const(char)[] name, const(Texture) texture);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.15" id="Shader.opIndexAssign.15">void opIndexAssign(const(Texture) texture, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify a texture as sampler2D uniform.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    'name' is the name of the variable to change in the shader. The
 corresponding parameter in the shader must be a 2D texture (sampler2D
 GLSL type).
<br><br>
 It is important to note that texture must remain alive as long as the
 shader uses it, no copy is made internally.
<br><br>
 To use the texture of the object being drawn, which cannot be known in
 advance, you can pass the special value CurrentTexture.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the texture in the shader
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Texture) texture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Texture to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniform.16" id="Shader.setUniform.16">void setUniform(const(char)[] name, CurrentTextureType);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.16" id="Shader.opIndexAssign.16">void opIndexAssign(CurrentTextureType, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify current texture as sampler2D uniform.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This overload maps a shader texture variable to the texture of the object
 being drawn, which cannot be known in advance. The second argument must
 be CurrentTexture. The corresponding parameter in the shader must be a 2D
 texture (sampler2D GLSL type).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the texture in the shader
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniformArray" id="Shader.setUniformArray">void setUniformArray(const(char)[] name, const(float)[] scalarArray);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.17" id="Shader.opIndexAssign.17">void opIndexAssign(const(float)[] scalars, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify values for float[] array uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(float)[] scalarArray</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of float values
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniformArray.2" id="Shader.setUniformArray.2">void setUniformArray(const(char)[] name, const(Vec2)[] vectorArray);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.18" id="Shader.opIndexAssign.18">void opIndexAssign(const(Vec2)[] vectors, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify values for vec2[] array uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vec2)[] vectorArray</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of vec2 values
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniformArray.3" id="Shader.setUniformArray.3">void setUniformArray(const(char)[] name, const(Vec3)[] vectorArray);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.19" id="Shader.opIndexAssign.19">void opIndexAssign(const(Vec3)[] vectors, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify values for vec3[] array uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vec3)[] vectorArray</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of vec3 values
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniformArray.4" id="Shader.setUniformArray.4">void setUniformArray(const(char)[] name, const(Vec4)[] vectorArray);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.20" id="Shader.opIndexAssign.20">void opIndexAssign(const(Vec4)[] vectors, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify values for vec4[] array uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Vec4)[] vectorArray</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of vec4 values
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniformArray.5" id="Shader.setUniformArray.5">void setUniformArray(const(char)[] name, const(Mat3)[] matrixArray);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.21" id="Shader.opIndexAssign.21">void opIndexAssign(const(Mat3)[] matrices, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify values for mat3[] array uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Mat3)[] matrixArray</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of mat3 values
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setUniformArray.6" id="Shader.setUniformArray.6">void setUniformArray(const(char)[] name, const(Mat4)[] matrixArray);
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.22" id="Shader.opIndexAssign.22">void opIndexAssign(const(Mat4)[] matrices, const(char)[] name);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specify values for mat4[] array uniform.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the uniform variable in GLSL
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Mat4)[] matrixArray</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      array of mat4 values
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter" id="Shader.setParameter"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, float x)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a float parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The corresponding parameter in the shader must be a float (float GLSL type).
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.2" id="Shader.setParameter.2"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, float x, float y)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a 2-components vector parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The corresponding parameter in the shader must be a 2x1 vector (vec2 GLSL type).
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      First component of the value to assign
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
      Second component of the value to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.3" id="Shader.setParameter.3"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, float x, float y, float z)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a 3-components vector parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The corresponding parameter in the shader must be a 3x1 vector (vec3 GLSL type).
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      First component of the value to assign
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
      Second component of the value to assign
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float z</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Third component of the value to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.4" id="Shader.setParameter.4"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, float x, float y, float z, float w)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a 4-components vector parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The corresponding parameter in the shader must be a 4x1 vector (vec4 GLSL type).
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float x</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      First component of the value to assign
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
      Second component of the value to assign
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float z</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Third component of the value to assign
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">float w</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Fourth component of the value to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.5" id="Shader.setParameter.5"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, Vector2f vector)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a 2-components vector parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The corresponding parameter in the shader must be a 2x1 vector (vec2 GLSL type).
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vector to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.6" id="Shader.setParameter.6"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, Vector3f vector)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a 3-components vector parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader.
                The corresponding parameter in the shader must be a 3x1
                      vector (vec3 GLSL type)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector3f vector</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vector to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.7" id="Shader.setParameter.7"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, Color color)</div>;
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.23" id="Shader.opIndexAssign.23"><div class="deprecated_decl">deprecated void opIndexAssign(Color color, const(char)[] name)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a color vector parameter of the shader.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It is important to note that the components of the color are normalized
 before being passed to the shader. Therefore, they are converted from
 range [0 .. 255] to range [0 .. 1]. For example, a
 Color(255, 125, 0, 255) will be transformed to a vec4(1.0, 0.5, 0.0, 1.0)
 in the shader.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The
                corresponding parameter in the shader must be a 4x1 vector
                (vec4 GLSL type).
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color color</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Color to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.8" id="Shader.setParameter.8"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, Transform transform)</div>;
<br>
<a class="decl_anchor" href="#Shader.opIndexAssign.24" id="Shader.opIndexAssign.24"><div class="deprecated_decl">deprecated void opIndexAssign(Transform transform, const(char)[] name)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a matrix parameter of the shader.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The
                    corresponding parameter in the shader must be a 4x4
                          matrix (mat4 GLSL type)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Transform transform</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Transform to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.9" id="Shader.setParameter.9"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, const(Texture) texture)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a texture parameter of the shader.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It is important to note that the texture parameter must remain alive as
 long as the shader uses it - no copoy is made internally.
<br><br>
 To use the texture of the object being draw, which cannot be known in
 advance, you can pass the special value Shader.CurrentTexture.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader. The
                corresponding parameter in the shader must be a 2D texture
                (sampler2D GLSL type)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(Texture) texture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Texture to assign
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.setParameter.10" id="Shader.setParameter.10"><div class="deprecated_decl">deprecated void setParameter(const(char)[] name, CurrentTextureType currentTexture)</div>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Change a texture parameter of the shader.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This overload maps a shader texture variable to the texture of the object
 being drawn, which cannot be known in advance. The second argument must
 be Shader.CurrentTexture.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] name</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      The name of the variable to change in the shader.
                The corresponding parameter in the shader must be a 2D texture
                (sampler2D GLSL type)
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">CurrentTextureType currentTexture</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Dummy variable to denote the texture of the object
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.bind" id="Shader.bind">static void bind(Shader shader);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Bind a shader for rendering.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is not part of the graphics API, it mustn't be used when drawing SFML entities. It must be used only if you mix Shader with OpenGL code.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Shader shader</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Shader to bind. Can be <code class="prettyprint">null</code> to use no shader.
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
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.isAvailable" id="Shader.isAvailable">static bool isAvailable();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether or not the system supports shaders.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function should always be called before using the shader features.
 If it returns <code class="prettyprint">false</code>, then any attempt to use DSFML Shader will fail.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if shaders are supported, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Shader.isGeometryAvailable" id="Shader.isGeometryAvailable">static bool isGeometryAvailable();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether or not the system supports geometry shaders.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if geometry shaders are supported, <code class="prettyprint">false</code> otherwise.
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