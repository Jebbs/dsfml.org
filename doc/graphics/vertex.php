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
      <title>DSFML - dsfml.graphics.vertex</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.vertex</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A vertex is an improved point. It has a position and other extra attributes
 that will be used for drawing: in DSFML, vertices also have a color and a
 pair of texture coordinates.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The vertex is the building block of drawing. Everything which is visible on
 screen is made of vertices. They are grouped as 2D primitives (triangles,
 quads, ...), and these primitives are grouped to create even more complex 2D
 entities such as sprites, texts, etc.
<br><br>
 If you use the graphical entities of DSFML (sprite, text, shape) you won't
 have to deal with vertices directly. But if you want to define your own 2D
 entities, such as tiled maps or particle systems, using vertices will allow
 you to get maximum performances.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// define a 100x100 square, red, with a 10x10 texture mapped on it
sf::Vertex vertices[] =
[
    Vertex(Vector2f(  0,   0), Color.Red, Vector2f( 0,  0)),
    Vertex(Vector2f(  0, 100), Color.Red, Vector2f( 0, 10)),
    Vertex(Vector2f(100, 100), Color.Red, Vector2f(10, 10)),
    Vertex(Vector2f(100,   0), Color.Red, Vector2f(10,  0))
];

// draw it
window.draw(vertices, 4, PrimitiveType.Quads);
</code></pre>
  </div>
</section>
<br><br>
 <p class="para"><b>Note</b>: although texture coordinates are supposed to be an integer
 amount of pixels, their type is float because of some buggy graphics drivers
 that are not able to process integer coordinates correctly.</p>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/vertexarray.php" title="Define a set of one or more 2D primitives.">VertexArray</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex" id="Vertex">struct Vertex;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define a point with color and texture coordinates.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.position" id="Vertex.position">Vector2f position;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2D position of the vertex
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.color" id="Vertex.color">Color color;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Color of the vertex. Default is White.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.texCoords" id="Vertex.texCoords">Vector2f texCoords;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    2D coordinates of the texture's pixel map to the vertex.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.this" id="Vertex.this">this(Vector2f thePosition);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the vertex from its position

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The vertex color is white and texture coordinates are (0, 0).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f thePosition</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex position
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.this.2" id="Vertex.this.2">this(Vector2f thePosition, Color theColor);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the vertex from its position and color

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The texture coordinates are (0, 0).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f thePosition</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex position
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color theColor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex color
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.this.3" id="Vertex.this.3">this(Vector2f thePosition, Vector2f theTexCoords);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the vertex from its position and texture coordinates

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The vertex color is white.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f thePosition</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex position
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f theTexCoords</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex texture coordinates
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
        <code class="prettyprint"><a class="decl_anchor" href="#Vertex.this.4" id="Vertex.this.4">this(Vector2f thePosition, Color theColor, Vector2f theTexCoords);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the vertex from its position, color and texture coordinates

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f thePosition</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex position
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Color theColor</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex color
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Vector2f theTexCoords</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Vertex texture coordinates
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