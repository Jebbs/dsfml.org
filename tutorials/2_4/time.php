<!DOCTYPE html>
<html>
    <head>
        <meta name="theme-color" content="#333333">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="/styles.css">
        <title>DSFML - Handling Time</title>
    </head>
    <body>
    <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
            <h1>Handling Time</h1>
            <h2>Time in DSFML</h2>
            <p class="para">
            Just like the SFML implementation of time, DSFML doesn't impose a
            specific unit or type for time values. Instead it leaves this choice
            to the user through a flexible struct: Time. All DSFML classes and
            functions that manipulate time values use this class.
            </p>
            <p class="para">
            Time represents a time period (in other words, the time that elapses
            between two events). It is not a date-time class which would
            represent the current year/month/day/hour/minute/second as a
            timestamp, it's just a value that represents a certain amount of
            time, and how to interpret it depends on the context where it is
            used.
            </p>
            <h2>Converting time</h2>
            <p class="para">
            A sf::Time value can be constructed from different source units:
            seconds, milliseconds and microseconds. A Time struct can also be
            constructed from the standard library `Duration` structure. There is
            are (non-member) functions to turn each of them into a Time:
            </p>
            <pre><code class="prettyprint">
auto t1 = microseconds(10000);
auto t2 = milliseconds(10);
auto t3 = seconds(0.01f);
auto t4 = duration(dur!"msecs"(10))
</code></pre>
            <p class="para">
            Note that these three times are all equal.
            </p>
            <p class="para">
            Similarly, a Time can be converted back to either seconds,
            milliseconds, microseconds or a Duration:
            </p>
            <pre><code class="prettyprint">
Time time = ...;

long         usec = time.asMicroseconds();
int          msec = time.asMilliseconds();
float        sec  = time.asSeconds();
Duration duration = time.asDuration();
</code></pre>
            <h2>Playing with time values</h2>
            <p class="para">
            Time is just an amount of time, so it supports arithmetic operations
            such as addition, subtraction, comparison, etc. Times can also be
            negative.
            </p>
            <pre><code class="prettyprint">
Time t1 = ...;
auto t2 = t1 * 2;
auto t3 = t1 + t2;
auto t4 = -t3;

bool b1 = (t1 == t2);
bool b2 = (t3 > t4);
</code></pre>
            <h2>Measuring time</h2>
            <p class="para">
            Now that we've seen how to manipulate time values with SFML, let's
            see how to do something that almost every program needs: measuring
            the time elapsed.
            </p>
            <p class="para">
            SFML has a very simple class for measuring time: Clock. It only has
            two functions: getElapsedTime, to retrieve the time elapsed since
            the clock started, and restart, to restart the clock.
            </p>
            <pre><code class="prettyprint">
auto clock = new Clock(); // starts the clock
...
Time elapsed1 = clock.getElapsedTime();
writeln(elapsed1.asSeconds());
clock.restart();
...
Time elapsed2 = clock.getElapsedTime();
writeln(elapsed2.asSeconds());
</code></pre>
            <p></p>
            <p class="para">
            Note that restart also returns the elapsed time, so that you can
            avoid the slight gap that would exist if you had to call
            getElapsedTime explicitly before restart.
            </p>
            <p class="para">
            Here is an example that uses the time elapsed at each iteration of
            the game loop to update the game logic:
            </p>
            <pre><code class="prettyprint">
auto clock = new Clock();
while (window.isOpen())
{
    Time elapsed = clock.restart();
    updateGame(elapsed);
    ...
}
</code></pre>
        </div>
    </div>
    <?php include '../../footer.php'?>
</body>
</html>