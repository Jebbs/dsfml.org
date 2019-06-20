<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Sprites and textures</title>
    </head>
<body>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'?>
        <div class="inner" class="content">
          <h1>Sprites and textures</h1>
          <h2 id="vocabulary"><a class ="anchor" href="#vocabulary">Vocabulary</a></h2>
          <p class="para">
          Most (if not all) of you are already familiar with these two very
          common objects, so let's define them very briefly.
          </p>
          <p class="para">
          A texture is an image. But we call it "texture" because it has a very
          specific role: being mapped to a 2D entity.
          </p>
          <p class="para">
          A sprite is nothing more than a textured rectangle.
          </p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-sprites-definition.png" title="Rectangular entity + texture = sprite!">
          <p></p>
          <p class="para">
          Ok, that was short but if you really don't understand what sprites and
          textures are, then you'll find a much better description on Wikipedia.
          </p>
          <h2 id="loading-a-texture"><a class ="anchor" href="#loading-a-texture">Loading a texture</a></h2>
          <p class="para">
          Before creating any sprite, we need a valid texture. The class that
          encapsulates textures in DSFML is, surprisingly,
          <a class="link" href="/doc/2_4/graphics/texture.php">Texture</a>.
          Since the only role of a texture is to be loaded and mapped to
          graphical entities, almost all its functions are about loading and
          updating it.
          </p>
          <p class="para">
          The most common way of loading a texture is from an image file on
          disk, which is done with the <code class="cl">loadFromFile</code>
          function.
          </p>
          <pre><code class="prettyprint">
auto texture = new Texture();
if (!texture.loadFromFile("image.png"))
{
    // error...
}</code></pre><p></p>
          <p class="important">
          The <code>loadFromFile</code> function can sometimes fail with no
          obvious reason. First, check the error message that DSFML prints to
          the standard output (check the console). If the message is <em>"unable
          to open file"</em>, make sure that the <em>working directory</em>
          (which is the directory that any file path will be interpreted
          relative to) is what you think it is: When you run the application
          from your desktop environment, the working directory is the executable
          folder. However, when you launch your program from your IDE (Visual
          Studio, Code::Blocks, ...) the working directory might sometimes be
          set to the project directory instead. This can usually be changed
          quite easily in the project settings.</p>
          <p class="para">
          You can also load an image file from memory
          (<code class="cl">loadFromMemory</code>), from a custom input stream
          (<code class="cl">loadFromStream</code>), or from an image that has
          already been loaded (<code class="cl">loadFromImage</code>). The
          latter loads the texture from an <a class="link" href="/doc/2_4/graphics/image.php">Image</a>,
          which is a utility class that helps store and manipulate image data
          (modify pixels, create transparency channel, etc.). The pixels of an
          <a class="link" href="/doc/2_4/graphics/image.php">Image</a> stay in
          system memory, which ensures that operations on them will be as fast
          as possible, in contrast to the pixels of a texture which reside in
          video memory and are therefore slow to retrieve or update but very
          fast to draw.
          </p>
          <p class="para">
          DSFML supports most common image file formats. The full list is
          available in the API documentation.
          </p>
          <p class="para">
          All these loading functions have an optional argument, which can be
          used if you want to load a smaller part of the image.
          </p>
          <pre><code class="prettyprint">
// load a 32x32 rectangle that starts at (10, 10)
if (!texture.loadFromFile("image.png", IntRect(10, 10, 32, 32)))
{
    // error...
}</code></pre><p></p>
          <p class="para">
          The <a class="link" href="/doc/2_4/graphics/rect.php">IntRect</a>
          structure is a simple utility type that represents a rectangle and is
          merely an alias for <code class="cl">Rect!(int)</code>. Its
          constructor takes the coordinates of the top-left corner, and the size
          of the rectangle.
          </p>
          <p class="para">
          If you don't want to load a texture from an image, but instead want to
          update it directly from an array of pixels, you can create it empty
          and update it later:
          </p>
          <pre><code class="prettyprint">
// create an empty 200x200 texture
if (!texture.create(200, 200))
{
    // error...
}</code></pre><p></p>
          <p class="para">
          Note that the contents of the texture are undefined at this point.
          </p>
          <p class="para">
          To update the pixels of an existing texture, you have to use the
          <code class="cl">update</code>. function. It has overloads for many
          kinds of data sources:
          </p>
          <pre><code class="prettyprint">
// update a texture from an array of pixels
ubyte[] pixels pixels = new ubyte[width * height * 4]; // pixels have 4 components (RGBA)
...
texture.update(pixels);

// update a texture from a Image
Image image = new Image();
...
texture.update(image);

// update the texture from the current contents of the window
RenderWindow window;
...
texture.update(window);</code></pre><p></p>
          <p class="para">
          These examples all assume that the source is of the same size as the
          texture. If this is not the case, i.e. if you want to update only a
          part of the texture, you can specify the coordinates of the
          sub-rectangle that you want to update. You can refer to the
          documentation for further details.
          </p>
          <p class="para">
          Additionally, a texture has two properties that change how it is
          rendered.
          </p>
          <p class="para">
          The first property allows one to smooth the texture. Smoothing a
          texture makes pixel boundaries less visible (but the image a little
          more blurry), which can be desirable if it is up-scaled.
          </p>
          <pre><code class="prettyprint">
texture.setSmooth(true);</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-sprites-smooth.png" title="Smooth vs not smooth">
          <p></p>
          <p class="important">
          Since smoothing samples from adjacent pixels in the texture as well,
          it can lead to the unwanted side effect of factoring in pixels outside
          the selected texture area. This can happen when your sprite is located
          at non-integer coordinates.
          </p>
          <p class="para">
          The second property allows a texture to be repeatedly tiled within a
          single sprite.
          </p>
          <pre><code class="prettyprint">
texture.setRepeated(true);</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-sprites-repeated.png" title="Repeated vs not repeated">
          <p></p>
          <p class="para">This only works if your sprite is configured to show a rectangle which is larger than the texture, otherwise this property has no effect.</p>
          <h2 id="ok-can-I-have-my-sprite-now"><a class ="anchor" href="#ok-can-I-have-my-sprite-now">Ok, can I have my sprite now?</a></h2>
          <p class="para">
          Yes, you can now create your sprite.
          </p>
          <pre><code class="prettyprint">
auto sprite = new Sprite();
sprite.setTexture(texture);</code></pre><p></p>
          <p class="para">
          ... and finally draw it.
          </p>
          <pre><code class="prettyprint">
// inside the main loop, between window.clear() and window.display()
window.draw(sprite);</code></pre><p></p>
          <p class="para">
          If you don't want your sprite to use the entire texture, you can set
          its texture rectangle.
          </p>
          <pre><code class="prettyprint">
sprite.setTextureRect(IntRect(10, 10, 32, 32));</code></pre><p></p>
          <p class="para">
          You can also change the color of a sprite. The color that you set is
          modulated (multiplied) with the texture of the sprite. This can also
          be used to change the global transparency (alpha) of the sprite.
          </p>
          <pre><code class="prettyprint">
sprite.setColor(Color(0, 255, 0)); // green
sprite.setColor(Color(255, 255, 255, 128)); // half transparent</code></pre><p></p>
          <p class="para">
          These sprites all use the same texture, but have a different color:
          </p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-sprites-color.png" title="Coloring sprites">
          <p></p>
          <p class="para">
          Sprites can also be transformed: They have a position, an orientation
          and a scale.
          </p>
          <pre><code class="prettyprint">
// position
sprite.position = Vector2f(10, 50); // absolute position
sprite.position = sprite.position + Vector2f(5, 10); // offset relative to the current position

// rotation
sprite.rotation = 90; // absolute angle
sprite.rotation = sprite.rotation + 15; // offset relative to the current angle

// scale
sprite.scale = Vector2f(0.5f, 2.f); // absolute scale factor
sprite.scale = sprite.scale + Vector2f(1.5f, 3.f); // factor relative to the current scale</code></pre><p></p>
          <p class="para">
          By default, the origin for these three transformations is the top-left
          corner of the sprite. If you want to set the origin to a different
          point (for example the center of the sprite, or another corner),
          you can use the <code class="cl">setOrigin</code> function.
          </p>
          <pre><code class="prettyprint">
sprite.origin = Vector2f(25, 25);</code></pre><p></p>
          <p class="para">
          Since transformation functions are common to all DSFML entities, they
          are explained in a separate tutorial:
          <a class="link" href="tutorials/2_4/graphics/transforms.php">Transforming entities</a>.
          </p>
          <h2 id="the-white-square-problem"><a class ="anchor" href="#the-white-square-problem">The white square problem</a></h2>
          <p class="para">
          You successfully loaded a texture, constructed a sprite correctly,
          and... all you see on your screen now is a white square. What
          happened?
          </p>
          <p class="para">
          This is a common mistake. When you set the texture of a sprite, all it
          does internally is store a pointer to the texture instance. Therefore,
          if the texture is destroyed or moves elsewhere in memory, the sprite
          ends up with an invalid texture pointer.
          </p>
          <p class="para">
          This is less of a problem in D where class instances are reference
          types, but it is still important to know. The lifetime of your
          textures must be correctly managed to make sure that they live as long
          as they are used by any sprite.
          </p>
          <h2 id="The-importance-of-using-as-few-textures-as-possible"><a class ="anchor" href="#The-importance-of-using-as-few-textures-as-possible">The importance of using as few textures as possible</a></h2>
          <p class="para">
          Using as few textures as possible is a good strategy, and the
          reason is simple: Changing the current texture is an expensive
          operation for the graphics card. Drawing many sprites that use the
          same texture will yield the best performance.
          </p>
          <p class="para">
          Additionally, using a single texture allows you to group static
          geometry into a single entity (you can only use one texture per
          <code class="cl">draw</code> call), which will be much faster to draw
          than a set of many entities. Batching static geometry involves other
          classes and is therefore beyond the scope of this tutorial, for
          further details see the 
          <a class="link" href="tutorials/2_4/graphics/vertex-arrays.php">vertex array</a>
          tutorial.
          </p>
          <p class="para">
          Try to keep this in mind when you create your animation sheets or your
          tilesets: Use as little textures as possible.
          </p>
          <h2 id="using-dsfmls-texture-with-opengl-code"><a class ="anchor" href="#using-dsfmls-texture-with-opengl-code">Using DSFML's Texture with OpenGL code</a></h2>
          <p class="para">
          If you're using OpenGL rather than the graphics entities of DSFML, you
          can still use <a class="link" href="/doc/2_4/graphics/texture.php">Texture</a>
          as a wrapper around an OpenGL texture object and use it along with the
          rest of your OpenGL code.
          </p>
          <p class="para">
          To bind a <a class="link" href="/doc/2_4/graphics/texture.php">Texture</a>
          for drawing (basically <code class="cl">glBindTexture</code>), you
          call the <code class="cl">bind</code> static function:
          </p>
          <pre><code class="prettyprint">
Texture texture;
...

// bind the texture
Texture.bind(&texture);

// draw your textured OpenGL entity here...

// bind no texture
Texture.bind(null);</code></pre><p></p>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'?>
</body>
</html>
