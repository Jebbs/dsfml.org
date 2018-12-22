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
      <title>DSFML - dsfml.graphics.drawable</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.graphics.drawable</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>Drawable</u> is a very simple base interface that allows objects of derived
 classes to be drawn to a RenderTarget.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    All you have to do in your derived class is to override the draw virtual
 function.
<br><br>
 Note that inheriting from <a class="dsfml_link" href="../graphics/drawable.php" title="Interface for objects that can be drawn to a render target.">Drawable</a> is not mandatory, but it allows
 this nice syntax <code class="prettyprint">window.draw(object)</code> rather than <code class="prettyprint">object.draw(window)</code>,
 which is more consistent with other DSFML classes.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">class MyDrawable : Drawable
{
public:

    this()
    {
        m_sprite = Sprite();
        m_texture = Texture();
        m_vertices = VertexArray();

        // additional setup
    }
   ...

    void draw(RenderTarget target, RenderStates states) const
    {
        // You can draw other high-level objects
        target.draw(m_sprite, states);

        // ... or use the low-level API
        states.texture = m_texture;
        target.draw(m_vertices, states);

        // ... or draw with OpenGL directly
        glBegin(GL_QUADS);
        ...
        glEnd();
    }

private:
    Sprite m_sprite;
    Texture m_texture;
    VertexArray m_vertices;
}
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../graphics/rendertarget.php" title="Base interface for all render targets (window, texture, ...).">RenderTarget</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Drawable" id="Drawable">interface Drawable;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Interface for objects that can be drawn to a render target.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Drawable.draw" id="Drawable.draw">abstract void draw(RenderTarget renderTarget, RenderStates renderStates);
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