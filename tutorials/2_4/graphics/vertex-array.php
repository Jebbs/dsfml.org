<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';

head("Designing your own entities with vertex arrays");

section("Introduction");
paragraph(
"SFML provides simple classes for the most common 2D entities. And while more
complex entities can easily be created from these building blocks, it isn't
always the most efficient solution. For example, you'll reach the limits of your
graphics card very quickly if you draw a large number of sprites. The reason is
that performance depends in large part on the number of calls to the draw
function. Indeed, each call involves setting a set of OpenGL states, resetting
matrices, changing textures, etc. All of this is required even when simply
drawing two triangles (a sprite). This is far from optimal for your graphics
card: Today's GPUs are designed to process large batches of triangles, typically
several thousand to millions."
);
paragraph(
"To fill this gap, SFML provides a lower-level mechanism to draw things: Vertex
arrays. As a matter of fact, vertex arrays are used internally by all other SFML
classes. They allow for a more flexible definition of 2D entities, containing as
many triangles as you need. They even allow drawing points or lines."
);

section("What is a vertex, and why are they always in arrays?");
paragraph(
"A vertex is the smallest graphical entity that you can manipulate. In short, it
is a graphical point: Naturally, it has a 2D position (x, y), but also a color,
and a pair of texture coordinates. We'll go into the roles of these attributes
later."
);
paragraph(
"Vertices (plural of vertex) alone don't do much. They are always grouped into
".em("primitives").": Points (1 vertex), lines (2 vertices), triangles
(3 vertices) or quads (4 vertices). You can then combine multiple primitives
together to create the final geometry of the entity."
);
paragraph(
"Now you understand why we always talk about vertex arrays, and not vertices
alone."
);

section("A simple vertex array");
paragraph(
"Let's have a look at the $VERTEX class now. It's simply a container which
contains three public members and no functions besides its constructors. These
constructors allow you to construct vertices from the set of attributes you care
about -- you don't always need to color or texture your entity."
);
code("
// create a new vertex
auto vertex = Vertex();

// set its position
vertex.position = Vector2f(10, 50);

// set its color
vertex.color = Color.Red;

// set its texture coordinates
vertex.texCoords = Vector2f(100, 100);
");
paragraph(
"... or, using the correct constructor:"
);
code("
auto vertex = Vertex(Vector2f(10, 50), Color.Red, Vector2f(100, 100));
");
paragraph(
"Now, let's define a primitive. Remember, a primitive consists of several
vertices, therefore we need a vertex array. DSFML provides a simple wrapper for
this: $VERTEXARRAY. It provides the semantics of an array, and also stores the
type of primitive its vertices define."
);
code("
// create an array of 3 vertices that define a triangle primitive
auto triangle = VertexArray(PrimitiveType.Triangles, 3);

// define the position of the triangle's points
triangle[0].position = Vector2f(10, 10);
triangle[1].position = Vector2f(100, 10);
triangle[2].position = Vector2f(100, 100);

// define the color of the triangle's points
triangle[0].color = Color.Red;
triangle[1].color = Color.Blue;
triangle[2].color = Color.Green;

// no texture coordinates here, we'll see that later
");
paragraph(
"Your triangle is ready and you can now draw it. Drawing a vertex array can be
done similar to drawing any other DSFML entity, by using the ".cl("draw").
" function:"
);
code("
window.draw(triangle);
"
);
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-triangle.png",
"A triangle made with vertices");

paragraph(
"You can see that the vertices' color is interpolated to fill the primitive.
This is a nice way of creating gradients."
);
paragraph(
"Note that you don't have to use the $VERTEXARRAY class. It's just defined for
convenience, it's nothing more than a ".cl("Vertex[]")." along with a ".
cl("PrimitiveType").". If you need more flexibility, or a static array, you can
use your own storage. You must then use the overload of the ".cl("draw").
" function which takes an array of vertices and the primitive type."
);
code("
Vertex[] vertices;
vertices ~= Vertex(...);
...

window.draw(vertices, PrimitiveType.Triangles);
"
);
code("
Vertex vertices[2] =
[
    Vertex(...),
    Vertex(...)
];

window.draw(vertices, PrimitiveType.Lines);
"
);

section("Primitive types");
paragraph(
"Let's pause for a while and see what kind of primitives you can create. As
explained above, you can define the most basic 2D primitives: Point, line,
triangle and quad (quad exists merely as a convenience, internally the graphics
card breaks it into two triangles). There are also \"chained\" variants of these
primitive types which allow for sharing of vertices among two consecutive
primitives. This can be useful because consecutive primitives are often
connected in some way."
);
paragraph(
"Let's have a look at the full list:"
);

//no table function :(
echo '
<table style="width:100%">
<tr>
<th>Primitive type</th>
<th>Description</th>
<th>Example</th>
</tr>
<tr>
<td><code class="cl">Points</code></td>
<td>
A set of unconnected points. These points have no thickness: They will
always occupy a single pixel, regardless of the current transform and view.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-points.png" alt="The Points primitive type">
</td>
</tr>
<tr>
<td><code class="cl">Lines</code></td>
<td>
A set of unconnected lines. These lines have no thickness: They will always be
one pixel wide, regardless of the current transform and view.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-lines.png" alt="The Lines primitive type">
</td>
</tr>
<tr>
<td><code class="cl">LineStrip</code></td>
<td>
A set of connected lines. The end vertex of one line is used as the start vertex
of the next one.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-line-strip.png" alt="The LineStrip primitive type">
</td>
</tr>
<tr>
<td><code class="cl">Triangles</code></td>
<td>
A set of unconnected triangles.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-triangles.png" alt="The Triangles primitive type">
</td>
</tr>
<tr>
<td><code class="cl">TriangleStrip</code></td>
<td>
A set of connected triangles. Each triangle shares its two last vertices with
the next one.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-triangle-strip.png" alt="The TriangleStrip primitive type">
</td>
</tr>
<tr>
<td><code class="cl">TriangleFan</code></td>
<td>
A set of triangles connected to a central point. The first vertex is the center,
then each new vertex defines a new triangle, using the center and the previous
vertex.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-triangle-fan.png" alt="The TriangleFan primitive type">
</td>
</tr>
<tr>
<td><code class="cl">Quads</code></td>
<td>
A set of unconnected quads. The 4 points of each quad must be defined
consistently, either in clockwise or counter-clockwise order.
</td>
<td>
<img src="https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-quads.png" alt="The Quads primitive type">
</td>
</tr>
</table>';

section("Texturing");
paragraph(
"Like other SFML entities, vertex arrays can also be textured. To do so, you'll
need to manipulate the ".cl("texCoords")." attribute of the vertices. This
attribute defines which pixel of the texture is mapped to the vertex."
);
code("
// create a quad
auto quad = VertexArray(Quads, 4);

// define it as a rectangle, located at (10, 10) and with size 100x100
quad[0].position = Vector2f(10, 10);
quad[1].position = Vector2f(110, 10);
quad[2].position = Vector2f(110, 110);
quad[3].position = Vector2f(10, 110);

// define its texture area to be a 25x50 rectangle starting at (0, 0)
quad[0].texCoords = Vector2f(0, 0);
quad[1].texCoords = Vector2f(25, 0);
quad[2].texCoords = Vector2f(25, 50);
quad[3].texCoords = Vector2f(0, 50);
"
);
important(
"Texture coordinates are defined in pixels (just like the ".cl("textureRect").
" of sprites and shapes). They are not normalized (between 0 and 1), as people
who are used to OpenGL programming might expect."
);
paragraph(
"Vertex arrays are low-level entities, they only deal with geometry and do not
store additional attributes like a texture. To draw a vertex array with a
texture, you must use a $RENDERSTATES object to pass it to the ".cl("draw").
" function:"
);
code("
auto vertices = VertexArray();
auto texture = new Texture();

...

auto states = RenderStates(texture);

window.draw(vertices, states);
");

section("Transforming a vertex array");
paragraph(
"Transforming is similar to texturing. The transform is not stored in the vertex
array, you must use a $RENDERSTATES object to pass it to the ".cl("draw").
" function:"
);
code("
auto vertices = VertexArray();
auto transform = Transform();

...

auto states = RenderStates(transform);

window.draw(vertices, states);
");
paragraph(
"To know more about transformations and the $TRANSFORM class, you can read the
tutorial on ".transform_link("transforming entities")."."
);

section("Creating a DSFML-like Entity");
paragraph(
"Now that you know how to define your own textured/colored/transformed entity,
wouldn't it be nice to wrap it in an DSFML-style class? Fortunately, DSFML makes
this easy for you by providing the $DRAWABLE and $TRANSFORMABLE interfaces.
These interfaces define the base API of the built-in DSFML entities $SPRITE,
$TEXT, and $SHAPE."
);
paragraph(
"The $DRAWABLE interface declares a single virtual function that allows you to
draw instances of your class the same way as DSFML classes:"
);
code("
class MyEntity : Drawable
{
    override void draw(RenderTarget& target, RenderStates states)
    {
        ...
    }
}

MyEntity entity = ...;
window.draw(entity); // internally calls entity.draw
"
);
paragraph(
"Note that doing this is not mandatory, you could also just have a similar draw
function in your class and simply call it with ".cl("entity.draw(window)").". But
the other way, with $DRAWABLE as a base class, is nicer and more consistent.
This also means that if you plan on storing an array of drawable objects, you
can do it without any additional effort since all drawable objects (DSFML's and
yours) derive from the same interface."
);
paragraph(
"The other interface, $TRANSFORM, defines the same transformation API in your
class that other DSFML classes use (position, rotation, scale, ...). For
convenience, DSFML provides the ".cl("NormalTransformable")."template mixin that
you can use to provide your classes with the necessary implementation. You can
learn more about this class in the tutorial on ".
transform_link("transforming entities")."."
);
paragraph(
"Using these two base classes and a vertex array (in this example we'll also add
a texture), here is what a typical DSFML-like graphical class would look like:"
);
code("
class MyEntity : Drawable, Transformable
{
    // provide your class with the Transformable implementation
    mixin(NormalTransformable);

    private 
    {
        VertexArray m_vertices;
        Texture m_texture;
    }

    // add functions to play with the entity's geometry / colors / texturing...

    override void draw(RenderTarget target, RenderStates states)
    {
        // apply the entity's transform by combining it with the
        // one that was passed by the caller
        states.transform *= getTransform(); // getTransform() is defined by Transformable

        // apply the texture
        states.texture = m_texture;

        // you may also override states.shader or states.blendMode if you want

        // draw the vertex array
        target.draw(m_vertices, states);
    }
}
");
paragraph(
"You can then use this class as if it were a built-in DSFML class:"
);
code("
auto entity = MyEntity();

// you can transform it
entity.position = Vector2f(10, 50);
entity.rotation = Vector2f(45);

// you can draw it
window.draw(entity);
");

section("Example: tile map");
paragraph(
"With what we've seen above, let's create a class that encapsulates a tile map.
The whole map will be contained in a single vertex array, therefore it will be
super fast to draw. Note that we can apply this strategy only if the whole tile
set can fit into a single texture. Otherwise, we would have to use at least one
vertex array per texture."
);
code("
class TileMap : Drawable, Transformable
{
    // include the Transformable implementation
    mixin(NormalTransformable);

    private
    {
        VertexArray m_vertices;
        Texture m_tileset;
    }

    this()
    {
        m_tileSet = Texture();
    }

    bool load(const(string) tileset, Vector2u tileSize, const(int[]) tiles,
              uint width, uint height)
    {
        // load the tileset texture
        if (!m_tileset.loadFromFile(tileset))
            return false;

        // resize the vertex array to fit the level size
        m_vertices = new VertexArray(PrimitiveType.Quads, width * height * 4);

        // populate the vertex array, with one quad per tile
        for (uint i = 0; i < width; ++i)
            for (uint j = 0; j < height; ++j)
            {
                // get the current tile number
                int tileNumber = tiles[i + j * width];

                // find its position in the tileset texture
                int tu = tileNumber % (m_tileset.size.x / tileSize.x);
                int tv = tileNumber / (m_tileset.size.x / tileSize.x);

                // get a slice containing the current tile's quad
                Vertex[] quad = &(m_vertices[(i + j * width) * 4])[0..4];

                // define its 4 corners
                quad[0].position = Vector2f(i * tileSize.x, j * tileSize.y);
                quad[1].position = Vector2f((i + 1) * tileSize.x, j * tileSize.y);
                quad[2].position = Vector2f((i + 1) * tileSize.x, (j + 1) * tileSize.y);
                quad[3].position = Vector2f(i * tileSize.x, (j + 1) * tileSize.y);

                // define its 4 texture coordinates
                quad[0].texCoords = Vector2f(tu * tileSize.x, tv * tileSize.y);
                quad[1].texCoords = Vector2f((tu + 1) * tileSize.x, tv * tileSize.y);
                quad[2].texCoords = Vector2f((tu + 1) * tileSize.x, (tv + 1) * tileSize.y);
                quad[3].texCoords = Vector2f(tu * tileSize.x, (tv + 1) * tileSize.y);
            }

        return true;
    }

    override void draw(RenderTarget target, RenderStates states = RenderStates.Default)
    {
        // apply the transform
        states.transform *= getTransform();

        // apply the tileset texture
        states.texture = m_tileset;

        // draw the vertex array
        target.draw(m_vertices, states);
    }

}
");
paragraph(
"And now, the application that uses it:"
);
code("
void main()
{
    // create the window
    RenderWindow window = RenderWindow(VideoMode(512, 256), \"Tilemap\");

    // define the level with an array of tile indices
    const(int) level[] =
    [
        0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
        0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 2, 0, 0, 0, 0,
        1, 1, 0, 0, 0, 0, 0, 0, 3, 3, 3, 3, 3, 3, 3, 3,
        0, 1, 0, 0, 2, 0, 3, 3, 3, 0, 1, 1, 1, 0, 0, 0,
        0, 1, 1, 0, 3, 3, 3, 0, 0, 0, 1, 1, 1, 2, 0, 0,
        0, 0, 1, 0, 3, 0, 2, 2, 0, 0, 1, 1, 1, 1, 2, 0,
        2, 0, 1, 0, 3, 0, 2, 2, 2, 0, 1, 1, 1, 1, 1, 1,
        0, 0, 1, 0, 3, 2, 2, 2, 0, 0, 0, 0, 1, 1, 1, 1,
    ];

    // create the tilemap from the level definition
    TileMap map = TileMap();
    if (!map.load(\"tileset.png\", Vector2u(32, 32), level, 16, 8))
        exit(-1);

    // run the main loop
    while (window.isOpen())
    {
        // handle events
        Event event;
        while (window.pollEvent(event))
        {
            if(event.type == Event.EventType.Closed)
                window.close();
        }

        // draw the map
        window.clear();
        window.draw(map);
        window.display();
    }
}
");
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-tilemap.png",
"The tilemap example");
paragraph(
"You can download the tileset used for this tilemap example ".
lnk("https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-tilemap-tileset.png","here")."."
);

section("Example: particle system");
paragraph(
"This second example implements another common entity: The particle system. This
one is very simple, with no texture and as few parameters as possible. It
demonstrates the use of the ".cl("Points")." primitive type with a dynamic
vertex array which changes every frame."
);
code("
class ParticleSystem : Drawable, Transformable
{
    // include the Transformable implementation
    mixin(NormalTransformable);

    private
    {
        struct Particle
        {
            Vector2f velocity;
            Time lifetime;
        }

        Particle[] m_particles;
        VertexArray m_vertices;
        Time m_lifetime;
        Vector2f m_emitter;
    }


    this(unsigned int count)
    {
        m_particles = new Particle[count];
        m_vertices(PrimitiveType.Points, count);
        m_lifetime(seconds(3));
        m_emitter = Vector2f(0, 0);
    }

    void setEmitter(Vector2f position)
    {
        m_emitter = position;
    }

    void update(Time elapsed)
    {
        for (uint i = 0; i < m_particles.size(); ++i)
        {
            // update the particle lifetime
            Particle p = m_particles[i];
            p.lifetime -= elapsed;

            // if the particle is dead, respawn it
            if (p.lifetime <= Time.Zero)
                resetParticle(i);

            // update the position of the corresponding vertex
            m_vertices[i].position += p.velocity * elapsed.asSeconds();

            // update the alpha (transparency) of the particle according to its lifetime
            float ratio = p.lifetime.asSeconds() / m_lifetime.asSeconds();
            m_vertices[i].color.a = to!ubyte(ratio * 255);
        }
    }

    override void draw(RenderTarget target, RenderStates states)
    {
        // apply the transform
        states.transform *= getTransform();

        // our particles don't use a texture
        states.texture = null;

        // draw the vertex array
        target.draw(m_vertices, states);
    }

    void resetParticle(int index)
    {
        // give a random velocity and lifetime to the particle
        float angle = (uniform!(uint)() % 360) * 3.14f / 180.f;
        float speed = (uniform!(uint)() % 50) + 50.f;
        m_particles[index].velocity = Vector2f(cos(angle) * speed, sin(angle) * speed);
        m_particles[index].lifetime = milliseconds((uniform!(uint)() % 2000) + 1000);

        // reset the position of the corresponding vertex
        m_vertices[index].position = m_emitter;
    }
}
");
paragraph(
"And a little demo that uses it:"
);
code("
void main()
{
    // create the window
    auto window = RenderWindow(VideoMode(512, 256), \"Particles\");

    // create the particle system
    auto particles = ParticleSystem(1000);

    // create a clock to track the elapsed time
    Clock clock = new Clock();

    // run the main loop
    while (window.isOpen())
    {
        // handle events
        Event event;
        while (window.pollEvent(event))
        {
            if(event.type == Event.EventType.Closed)
                window.close();
        }

        // make the particle system emitter follow the mouse
        Vector2i mouse = Mouse.getPosition(window);
        particles.setEmitter(window.mapPixelToCoords(mouse));

        // update it
        Time elapsed = clock.restart();
        particles.update(elapsed);

        // draw it
        window.clear();
        window.draw(particles);
        window.display();
    }

}
");
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-vertex-array-particles.png",
"The particles example");

foot();
?>