<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Text and fonts</title>
    </head>
<body>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'?>
        <div class="inner" class="content">
          <h1>Text and fonts</h1>
          <h2 id="loading-a-font"><a class ="anchor" href="#loading-a-font">Loading a font</a></h2>
          <p class="para">
          Before drawing any text, you need to have an available font, just like
          any other program that prints text. Fonts are encapsulated in the
          <a class="link" href="/doc/2_4/graphics/font.php">Font</a> class,
          which provides three main features: loading a font, getting glyphs
          (i.e. visual characters) from it, and reading its attributes. In a
          typical program, you'll only have to make use of the first feature,
          loading the font, so let's focus on that first.
          </p>
          <p class="para">
          The most common way of loading a font is from a file on disk, which is
          done with the <code class="cl">loadFromFile</code> function.
          </p>
          <pre><code class="prettyprint">
Font font = new Font();
if (!font.loadFromFile("arial.ttf"))
{
    // error...
}</code></pre><p></p>
          <p class="para">
          Note that DSFML won't load your system fonts automatically, i.e.
          <code class="cl">font.loadFromFile("Courier New")</code> won't work.
          Firstly, because DSFML requires file names, not font names, and
          secondly because DSFML doesn't have magical access to your system's
          font folder. If you want to load a font, you will need to include the
          font file with your application, just like every other resource
          (images, sounds, ...).
          </p>
          <p class="important">The <code>loadFromFile</code> function can
          sometimes fail with no obvious reason. First, check the error message
          that DSFML prints to the standard output (check the console). If the
          message is <em>'unable to open file'</em>, make sure that the working
          directory (which is the directory that any file path will be
          interpreted relative to) is what you think it is: When you run the
          application from your desktop environment, the working directory is
          the executable folder. However, when you launch your program from your
          IDE (Visual Studio, Code::Blocks, ...) the working directory might
          sometimes be set to the <em>project</em> directory instead. This can
          usually be changed quite easily in the project settings.
          </p>
          <p class="para">
          You can also load a font file from memory (<code class="cl">loadFromMemory</code>),
          or from a <a class="link" href="/tutorials/2_4/system/streams.php">custom input stream</a>
          (<code class="cl">loadFromStream</code>).
          </p>
          <p class="para">
          DSFML supports most common font formats. The full list is available in
          the API documentation.
          </p>
          <p class="para">
          That's all you need to do. Once your font is loaded, you can start
          drawing text.
          </p>
          <h2 id="drawing-text"><a class ="anchor" href="#drawing-text">Drawing text</a></h2>
          <p class="para">
          To draw text, you will be using the
          <a class="link" href="/doc/2_4/graphics/text.php">Text</a> class. It's
          very simple to use:
          </p>
          <pre><code class="prettyprint">
auto text = new Text();

// select the font
text.font = myFont; // myFont is a Font

// set the string to display
text.string = "Hello world";

// set the character size
text.characterSize = 24; // in pixels, not points!

// set the color
text.color = Color.Red;

// set the text style
text.style = (Text.Bold | Text.Underlined);

...

// inside the main loop, between window.clear() and window.display()
window.draw(text);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-text-draw.png" title="Drawing text"><p></p>
          <p class="para">
          Text can also be transformed: They have a position, an orientation and
          a scale. The functions involved are the same as for the <a class="link" href="/doc/2_4/graphics/sprite.php">Sprite</a>
          class and other DSFML entities. They are explained in the
          <a class="link" href="tutorials/2_4/graphics/transform.php">Transforming entities</a>
          tutorial.
          </p>
          <h2 id="using-non-ascii-characters"><a class ="anchor" href="#using-non-ascii-characters">Using non-ASCII characters</a></h2>
          <p class="para">
          Handling non-ASCII characters (such as accented European, Arabic, or
          Chinese characters) is easy to do in DSFML. The string of text stored
          by the <a class="link" href="/doc/2_4/graphics/text.php">Text</a>
          class uses utf-32, which will be able to handle any character set.
          Using non-ASCII characters is as simple as providing them to the
          <a class="link" href="/doc/2_4/graphics/text.php">Text</a>'s string 
          property.
          </p>
          <pre><code class="prettyprint">
text.string = "יטאח";
</code></pre><p></p>
          <h2 id="making-your-own-text-class"><a class ="anchor" href="#making-your-own-text-class">Making your own text class</a></h2>
          <p class="para">
          If <a class="link" href="/doc/2_4/graphics/text.php">Text</a> is too
          limited, or if you want to do something else with pre-rendered glyphs,
          <a class="link" href="/doc/2_4/graphics/font.php">Font</a> provides
          everything that you need.
          </p>
          <p class="para">
          You can retrieve the texture which contains all the pre-rendered
          glyphs of a certain size:
          </p>
          <pre><code class="prettyprint">
auto texture = font.getTexture(characterSize);
</code></pre><p></p>
          <p class="para">
          It is important to note that glyphs are added to the texture when they
          are requested. There are so many characters (remember, more than
          100000) that they can't all be generated when you load the font.
          Instead, they are rendered on the fly when you call the
          <code class="cl">getGlyph</code> function (see below).
          </p>
          <p class="para">
          To do something meaningful with the font texture, you must get the
          texture coordinates of glyphs that are contained in it:
          </p>
          <pre><code class="prettyprint">
auto glyph = font.getGlyph(character, characterSize, bold);
</code></pre><p></p>
          <p class="para">
          <code class="cl">character</code> is the UTF-32 code of the character
          whose glyph that you want to get. You must also specify the character
          size, and whether you want the bold or the regular version of the
          glyph.
          </p>
          <p class="para">
          The <a class="link" href="/doc/2_4/graphics/glyph.php">Glyph</a>
          structure contains three members:
          </p>
          <ul>
          <li><code class="cl">textureRect</code> contains the texture coordinates of the glyph within the texture</li>
          <li><code class="cl">bounds</code> contains the bounding rectangle of the glyph, which helps position it relative to the baseline of the text</li>
          <li><code class="cl">advance</code> is the horizontal offset to apply to get the starting position of the next glyph in the text</li>
          </ul><p></p>
          <p class="para">
          You can also get some of the font's other metrics, such as the kerning
          between two characters or the line spacing (always for a certain
          character size):
          </p>
          <pre><code class="prettyprint">
int lineHeight = font.getLineHeight(characterSize);

int kerning = font.getKerning(character1, character2, characterSize);
</code></pre><p></p>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'?>
</body>
</html>
