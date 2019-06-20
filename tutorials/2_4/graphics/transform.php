<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';

head("Position, rotation, scale: Transforming entities");
section("Transforming SFML entities");
paragraph(
"All DSFML classes (sprites, text, shapes) use the same interface for
transformations: $TRANSFORMABLE. This base class provides a simple API to move,
rotate and scale your entities. It doesn't provide maximum flexibility, but
instead defines an interface which is easy to understand and to use, and which
covers 99% of all use cases -- for the remaining 1%, see the last chapters."
);
paragraph(
"$TRANSFORMABLE defines four ". cl("@property")." fields: ".bold("position").",".
bold("rotation").",".bold("scale").", and ".bold("origin").". These
transformation components are all independent of one another: If you want to
change the orientation of the entity, you just have to set its rotation property,
you don't have to care about the current position and scale."
);
subsection("Position");
paragraph(
"The position is the... position of the entity in the 2D world."
);
code("
// 'entity' can be a Sprite, a Text, a Shape or any other transformable class

// set the absolute position of the entity
entity.position = Vector2f(10, 50);

// move the entity relatively to its current position
// This may change later...
entity.position = entity.position + Vector2f(5, 5);

// retrieve the absolute position of the entity
Vector2f position = entity.position; // = (15, 55)
");
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-transform-position.png",
"A translated entity");
paragraph(
"By default, entities are positioned relative to their top-left corner. We'll
see how to change that with the 'origin' property later."
);
subsection("Rotation");
paragraph(
"The rotation is the orientation of the entity in the 2D world. It is defined in
degrees, in clockwise order (because the Y axis is pointing down in DSFML)."
);
code("
// 'entity' can be a Sprite, a Text, a Shape or any other transformable class

// set the absolute rotation of the entity
entity.rotation = 45;

// rotate the entity relatively to its current orientation
// This may change later...
entity.rotation = entity.rotation + 10;

// retrieve the absolute rotation of the entity
float rotation = entity.rotation; // = 55
");
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-transform-rotation.png",
"A rotated entity");
paragraph(
"Note that DSFML always returns an angle in range [0, 360) when you get an
entitiy's rotation using the ".cl("rotation")." property."
);
paragraph(
"As with the position, the rotation is performed around the top-left corner by
default, but this can be changed by setting the origin."
);
subsection("Scale");
paragraph(
"The scale factor allows the entity to be resized. The default scale is 1.
Setting it to a value less than 1 makes the entity smaller, greater than 1 makes
it bigger. Negative scale values are also allowed, so that you can mirror the
entity."
);
code("
// 'entity' can be a Sprite, a Text, a Shape or any other transformable class

// set the absolute scale of the entity
entity.scale = Vector2f(4.0f, 1.6f);

// scale the entity relatively to its current scale
// This may change later...
entity.scale = entity.scale + Vector2f(0.5f, 0.5f);

// retrieve the absolute scale of the entity
Vector2f scale = entity.scale; // = (2, 0.8)
");
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-transform-scale.png",
"A scaled entity");
subsection("Origin");
paragraph(
"The origin is the center point of the three other transformations. The entity's
position is the position of its origin, its rotation is performed around the
origin, and the scale is applied relative to the origin as well. By default, it
is the top-left corner of the entity (point (0, 0)), but you can set it to the
center of the entity, or any other corner of the entity for example."
);
paragraph(
"To keep things simple, there's only a single origin for all three
transformation components. This means that you can't position an entity relative
to its top-left corner while rotating it around its center for example. If you
need to do such things, have a look at the next chapters."
);
code("
// 'entity' can be a Sprite, a Text, a Shape or any other transformable class

// set the origin of the entity
entity.origin = Vector2f(10, 20);

// retrieve the origin of the entity
Vector2f origin = entity.origin; // = (10, 20)
");
paragraph(
"Note that changing the origin also changes where the entity is drawn on screen,
even though its position property hasn't changed. If you don't understand why,
read this tutorial one more time!"
);
section("Transforming your own classes");
paragraph(
"$TRANSFORMABLE is not only made for DSFML classes, it can also be used by one
of your own classes. One thing to mention is that $TRANSFORMABLE is an interface,
so it only defined the API used by classes that inherit it. DSFML provides a
template mixin called ".cl("NormalTransformable")."for convenience that
implements all methodes declared in $TRANSFORMABLE, which is the same
implementation used by all built-in transformable types (i.e., Sprite, Text,
etc.)."
);
code("
class MyGraphicalEntity : Transformable
{
    mixin NormalTransformable;
    // ...
}

auto entity = new MyGraphicalEntity(...);
entity.position = Vector2f(10, 30);
entity.rotation = 110;
entity.scale = Vector2f(0.5f, 0.2f);
");
paragraph(
"To retrieve the final transform of the entity (commonly needed when drawing it),
call the ".cl("getTransform")." function. This function returns a $TRANSFORM
object. See below for an explanation about it, and how to use it to transform an
DSFML entity."
);
paragraph(
"If you don't need/want the complete set of functions provided by the
$TRANSFORMABLE interface, don't hesitate to simply use it as a member instead
and provide your own functions on top of it. On top of the ".
cl("NormalTransformable")." template mixin, DSFML also provides a  convenience
class called ".cl("TransformableMember")." that you can include as a member of
your class."
);
code("
class MyGraphicalEntity
{
    TransformableMember m_transformable;

    // implement the transformable functionality that you need
};
");
section("Custom transforms");
paragraph(
"The $TRANSFORMABLE class is easy to use, but it is also limited. Some users
might need more flexibility. They might need to specify a final transformation
as a custom combination of individual transformations. For these users, a
lower-level class is available: $TRANSFORM. It is nothing more than a 3x3
matrix, so it can represent any transformation in 2D space."
);
paragraph(
"There are many ways to construct a $TRANSFORM:"
);
ul(array(
"by using the predefined functions for the most common transformations (translation, rotation, scale)",
"by combining two transforms",
"by specifying its 9 elements directly"
));
paragraph(
"Here are a few examples:"
);
code("
// the identity transform (does nothing)
auto t1 = Transform.Identity;

// a rotation transform
Transform t2;
t2.rotate(45);

// a custom matrix
auto t3 = Transform(2, 0, 20,
                    0, 1, 50,
                    0, 0, 1);

// a combined transform
auto t4 = t1 * t2 * t3;
");
paragraph("
You can apply several predefined transformations to the same transform as well.
They will all be combined sequentially:
");
code("
Transform t;
t.translate(10, 100);
t.rotate(90);
t.translate(-10, 50);
t.scale(0.5f, 0.75f);
");
paragraph(
"Back to the point: How can a custom transform be applied to a graphical entity?
Simple: Pass it to the draw function using $RENDERSTATES:"
);
code("
RenderStates states;
states.transform = transform;
window.draw(entity, states);
");
paragraph(
"If your entity is a $TRANSFORMABLE (sprite, text, shape), which contains its
own internal transform, both the internal and the passed transform are combined
to produce the final transform."
);

section("Bounding Boxes");
paragraph(
"After transforming entities and drawing them, you might want to perform some
computations using them e.g. checking for collisions."
);
paragraph(
"DSFML entities can give you their bounding box. The bounding box is the minimal
rectangle that contains all points belonging to the entity, with sides aligned
to the X and Y axes."
);
img("https://www.sfml-dev.org/tutorials/2.4/images/graphics-transform-bounds.png",
"Bounding box of entities");
paragraph(
"The bounding box is very useful when implementing collision detection: Checks
against a point or another axis-aligned rectangle can be done very quickly, and
its area is close enough to that of the real entity to provide a good
approximation."
);
code("
// get the bounding box of the entity
FloatRect boundingBox = entity.getGlobalBounds();

// check collision with a point
Vector2f point = ...;
if (boundingBox.contains(point))
{
    // collision!
}

// check collision with another box (like the bounding box of another entity)
FloatRect otherBox = ...;
if (boundingBox.intersects(otherBox))
{
    // collision!
}
");
paragraph(
"The function is named ".cl("getGlobalBounds")." because it returns the bounding
box of the entity in the global coordinate system, i.e. after all of its
transformations (position, rotation, scale) have been applied."
);
paragraph(
"There's another function that returns the bounding box of the entity in its
local coordinate system (before its transformations are applied): ".
cl("getLocalBounds").". This function can be used to get the initial size of an
entity, for example, or to perform more specific calculations."
);

section("Object hierarchies (scene graph)");
paragraph(
"With the custom transforms seen previously, it becomes easy to implement a
hierarchy of objects in which children are transformed relative to their parent.
All you have to do is pass the combined transform from parent to children when
you draw them, all the way until you reach the final drawable entities (sprites,
text, shapes, vertex arrays or your own drawables)."
);
code("
// the abstract base class
class Node
{

    // ... functions to transform the node

    // ... functions to manage the node's children

    void draw(RenderTarget target, Transform parentTransform)
    {
        // combine the parent transform with the node's one
        Transform combinedTransform = parentTransform * m_transform;

        // let the node draw itself
        onDraw(target, combinedTransform)

        // draw its children
        foreach (child; m_children)
            child.draw(target, combinedTransform);
    }

private:

    void onDraw(RenderTarget target, Transform transform);

    Transform m_transform;
    Node[] m_children;
}

// a simple derived class: a node that draws a sprite
class SpriteNode : Node
{

    // .. functions to define the sprite

private:

    void onDraw(RenderTarget target, Transform transform)
    {
        target.draw(m_sprite, transform);
    }

    Sprite m_sprite;
}
");
foot();
?>