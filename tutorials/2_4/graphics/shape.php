<?php include 'site_builder.php'?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Shapes</title>
    </head>
<body>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/header.php'?>
        <div class="inner" class="content">
          <h1>Shapes</h1>
          <h2 id="introduction"><a class ="anchor" href="#introduction">Introduction</a></h2>
          <p class="para">
          DSFML provides a set of classes that represent simple shape entities.
          Each type of shape is a separate class, but they all derive from the
          same base class so that they have access to the same subset of common
          features. Each class then adds its own specifics: a radius property
          for the circle class, a size for the rectangle class, points for the
          polygon class, etc.
          </p>
          <h2 id="common-shape-properties"><a class ="anchor" href="#common-shape-properties">Common shape properties</a></h2>
          <h3>Transformation (position, rotation, scale)</h3>
          <p class="para">
          These properties are common to all the DSFML graphical classes, so they
          are explained in a separate tutorial:
          <a class="link" href="tutorials/2_4/graphics/transforms.php">Transforming entities</a>.
          </p>
          <h3>Color</h3>
          <p class="para">
          One of the basic properties of a shape is its color. You can change
          with the <code class="cl">fillColor</code> function.
          </p>
          <pre><code class="prettyprint">
auto shape = new CircleShape(50);

// set the shape color to green
shape.fillColor = Color(100, 250, 50);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-color.png" title="A colored shape"><p></p>
          <h3>Outline</h3>
          <p class="para">
          Shapes can have an outline. You can set the thickness and color of the
          outline with the <code class="cl">outlineThickness</code> and
          <code class="cl">outlineColor</code> functions.
          </p>
          <pre><code class="prettyprint">
auto shape = new CircleShape(50);
shape.fillColor = Color(100, 250, 50);

// set a 10-pixel wide orange outline
shape.outlineThickness = 10;
shape.outlineColor = Color(250, 150, 100);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-outline.png" title="An outlined shape"><p></p>
          <p class="para">
          By default, the outline is extruded outwards from the shape (e.g. if
          you have a circle with a radius of 10 and an outline thickness of 5,
          the total radius of the circle will be 15). You can make it extrude
          towards the center of the shape instead, by setting a negative
          thickness.
          </p>
          <p class="para">
          To disable the outline, set its thickness to 0. If you only want the
          outline, you can set the fill color to <code class="cl">Color.Transparent</code>.
          </p>
          <h3>Texture</h3>
          <p class="para">
          Shapes can also be textured, just like sprites. To specify a part of
          the texture to be mapped to the shape, you must use the
          <code class="cl">setTextureRect</code> function. It takes the texture
          rectangle to map to the bounding rectangle of the shape. This method
          doesn't offer maximum flexibility, but it is much easier to use than
          individually setting the texture coordinates of each point of the
          shape.
          </p>
          <pre><code class="prettyprint">
auto shape = new CircleShape(50);

// map a 100x100 textured rectangle to the shape
shape.setTexture(texture); // texture is a Texture
shape.textureRect = IntRect(10, 10, 100, 100);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-texture.png" title="A textured shape"><p></p>
          <p class="para">
          Note that the outline is not textured.<br>
          It is important to know that the texture is modulated (multiplied)
          with the shape's fill color. If its fill color is <code class="cl">Color.White</code>,
          the texture will appear unmodified.<br>
          To disable texturing, call <code class="cl">setTexture(null)</code>.
          </p>
          <h2 id="drawing-a-shape"><a class ="anchor" href="#drawing-a-shape">Drawing a shape</a></h2>
          <p class="para">
          Drawing a shape is as simple as drawing any other DSFML entity:
          </p>
          <pre><code class="prettyprint">
window.draw(shape);
</code></pre><p></p>
          <h2 id="built-in-shape-types"><a class ="anchor" href="#built-in-shape-types">Built-in shape types</a></h2>
          <h3>Rectangle</h3>
          <p class="para">
          To draw rectangles, you can use the <a class="link" href="/doc/2_4/graphics/rectangleshape.php">RectangleShape</a>
          class. It has a single attribute: The size of the rectangle.
          </p>
          <pre><code class="prettyprint">
// define a 120x50 rectangle
auto rectangle = new RectangleShape(new Vector2f(120, 50));

// change the size to 100x100
rectangle.size = Vector2f(100, 100);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.0/images/graphics-shape-rectangle.png" title="A rectangle shape"><p></p>
          <h3>Circles</h3>
          <p class="para">
          Circles are represented by the <a class="link" href="/doc/2_4/graphics/circleshape.php">CircleShape</a>
          class. It has two attributes: The radius and the number of sides. The
          number of sides is an optional attribute, it allows you to adjust the
          "quality" of the circle: Circles have to be approximated by polygons
          with many sides (the graphics card is unable to draw a perfect circle
          directly), and this attribute defines how many sides your circle
          approximation will have. If you draw small circles, you'll probably
          only need a few sides. If you draw big circles, or zoom on regular
          circles, you'll most likely need more sides.
          </p>
          <pre><code class="prettyprint">
// define a circle with radius = 200
auto circle = new CircleShape(200);

// change the radius to 40
circle.radius = 40;

// change the number of sides (points) to 100
circle.pointCount = 100;
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-circle.png" alt="A circle shape"><p></p>
          <h3>Regular polygons</h3>
          <p class="para">
          There's no dedicated class for regular polygons, in fact you can
          represent a regular polygon with any number of sides using the
          <a class="link" href="/doc/2_4/graphics/circleshape.php">CircleShape</a>
          class: Since circles are approximated by polygons with many sides, you
          just have to play with the number of sides to get the desired
          polygons. A <a class="link" href="/doc/2_4/graphics/circleshape.php">CircleShape</a>
          with 3 points is a triangle, with 4 points it's a square, etc.
          </p>
          <pre><code class="prettyprint">
// define a triangle
auto triangle = new CircleShape(80, 3);

// define a square
auto square = new CircleShape(80, 4);

// define an octagon
auto octagon = new CircleShape(80, 8);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-regular.png" alt="Regular Polygons"><p></p>
          <h3>Convex shapes</h3>
          <p class="para">
          The <a class="link" href="/doc/2_4/graphics/convexshape.php">ConvexShape</a>
          class is the ultimate shape class: It allows you to define any convex
          shape. DSFML is unable to draw concave shapes. If you need to draw a
          concave shape, you'll have to split it into multiple convex polygons.
          </p>
          <p class="para">
          To construct a convex shape, you must first set the number of points
          it should have and then define the points.
          </p>
          <pre><code class="prettyprint">
// create an empty shape
auto convex = new ConvexShape();

// resize it to 5 points
convex.pointCount = 5;

// define the points
convex.setPoint(0, Vector2f(0, 0));
convex.setPoint(1, Vector2f(150, 10));
convex.setPoint(2, Vector2f(120, 90));
convex.setPoint(3, Vector2f(30, 100));
convex.setPoint(4, Vector2f(0, 50));
</code></pre><p></p>
          <p class="important">
          The order in which you define the points is very important. They must
          all be defined either in clockwise or counter-clockwise order. If you
          define them in an inconsistent order, the shape will be constructed
          incorrectly.
          </p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-convex.png" alt="A convex shape"><p></p>
          <p class="para">
          Although the name of <a class="link" href="/doc/2_4/graphics/convexshape.php">ConvexShape</a>
          implies that it should only be used to represent convex shapes, its
          requirements are a little more relaxed. In fact, the only requirement
          that your shape must meet is that if you went ahead and drew lines
          from its <em>center of gravity</em> to all of its points, these lines
          must be drawn in the same order. You are not allowed to "jump behind a
          previous line". Internally, convex shapes are automatically
          constructed using triangle fans, so if your shape is representable by
          a triangle fan, you can use <a class="link" href="/doc/2_4/graphics/convexshape.php">ConvexShape</a>.
          With this relaxed definition, you can draw stars using
          <a class="link" href="/doc/2_4/graphics/convexshape.php">ConvexShape</a>
          for example.
          </p>
          <h3>Lines</h3>
          <p class="para">
          There's no shape class for lines. The reason is simple: If your line
          has a thickness, it is a rectangle. If it doesn't, it can be drawn
          with a line primitive.
          </p>
          <p class="para">
          Line with thickness:
          </p>
          <pre><code class="prettyprint">
RectangleShape line = new RectangleShape(Vector2f(150, 5));
line.rotate(45);</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-line-rectangle.png" alt="A line shape drawn as a rectangle"><p></p>
          <p class="para">
          Line without thickness:</p>
          <pre><code class="prettyprint">
Vertex[2] line =
[
    Vertex(Vector2f(10, 10)),
    Vertex(Vector2f(150, 150))
];

window.draw(line, 2, PrimitiveType.Lines);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-line-primitive.png" alt="A line shape drawn as a primitive"><p></p>
          <p class="para">
          To learn more about vertices and primitives, you can read the tutorial
          on <a class="link" href="tutorials/2_4/graphics/vertex-arrays.php">vertex arrays</a>.
          </p>
          <h2 id="custom-shape-types"><a class ="anchor" href="#custom-shape-types">Custom shape types</a></h2>
          <p class="para">
          You can extend the set of shape classes with your own shape types. To
          do so, you must derive from <a class="link" href="/doc/2_4/graphics/shape.php">Shape</a>
          and override two functions:
          </p>
          <ul>
            <li><code class="cl">getPointCount</code>: return the number of points in the shape</li>
            <li><code class="cl">getPoint</code>: return a point of the shape</li>
          </ul>
          <p class="para">
          You must also call the <code class="cl">update()</code> protected
          function whenever any point in your shape changes, so that the base
          class is informed and can update its internal geometry.
          </p>
          <p class="para">
          Here is a complete example of a custom shape class: EllipseShape.
          </p>
          <pre><code class="prettyprint">
class EllipseShape : Shape
{
    private {
        Vector2f m_radius;
    }

    public :

        this(Vector2f radius = Vector2f(0, 0)) {
            m_radius = radius;
            update();
        }

        @property
        {
            Vector2f radius(Vector2f newRadius)
            {
                m_radius = newRadius;
                update();
                return newRadius;
            }

            Vector2f radius()
            {
                return m_radius;
            }
        }

        override uint getPointCount()
        {
            return 30; // fixed, but could be an attribute of the class if needed
        }

        override Vector2f getPoint(uint index) const
        {

            float angle = index * 2 * PI / getPointCount() - PI / 2;
            float x = cos(angle) * m_radius.x;
            float y = sin(angle) * m_radius.y;

            return Vector2f(m_radius.x + x, m_radius.y + y);
        }
}
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-ellipse.png" alt="An ellipse shape"><p></p>
          <h2 id="antialiased-shapes"><a class ="anchor" href="#antialiased-shapes">Antialiased shapes</a></h2>
          <p class="para">
          There's no option to anti-alias a single shape. To get anti-aliased
          shapes (i.e. shapes with smoothed edges), you have to enable
          anti-aliasing globally when you create the window, with the
          corresponding attribute of the
          <a class="link" href="/doc/2_4/window/contextsettings.php">ContextSettings</a>
          structure.
          </p>
          <pre><code class="prettyprint">
ContextSettings settings;
settings.antialiasingLevel = 8;

auto window = new RenderWindow(VideoMode(800, 600), "Shapes", sf::Style::Default, settings);
</code></pre><p></p>
          <img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-shape-antialiasing.png" alt="Aliased vs antialiased shape"><p></p>
          <p class="para">
          Remember that anti-aliasing availability depends on the graphics card:
          It might not support it, or have it forced to disabled in the driver
          settings.
          </p>
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/footer.php'?>
</body>
</html>
