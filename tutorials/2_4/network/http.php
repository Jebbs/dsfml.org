<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Web requests with HTTP");
section("Introduction");
paragraph(
'DSFML provides a simple HTTP client class which you can use to communicate with
HTTP servers. "Simple" means that it supports the most basic features of HTTP:
POST, GET and HEAD request types, accessing HTTP header fields, and
reading/writing the pages body.'
);
paragraph(
"If you need more advanced features, such as secured HTTP (HTTPS) for example,
you're better off using a true HTTP library, like libcurl or cpp-netlib."
);
paragraph(
"For basic interaction between your program and an HTTP server, it should be
enough."
);

section("The Http class");
paragraph(
"To communicate with an HTTP server you must use the $HTTP class."
);
code('
import dsfml.network;

auto http = new Http();
http.setHost("http://www.some-server.org/");

// or
Http http = new Http("http://www.some-server.org/");
');
paragraph(
"Note that setting the host doesn't trigger any connection. A temporary
connection is created for each request."
);
paragraph(
"The only other function in $HTTP, sends requests. This is basically all that
the class does."
);
code('
Http.Request request = new Http.Request();
// fill the request...
Http.Response response = http.sendRequest(request);
');

section("Requests");
paragraph(
"An HTTP request, represented by the $HTTPREQUEST class, contains the
following information:"
);
ul(array(
    "The method: POST (send content), GET (retrieve a resource), HEAD (retrieve
    a resource header, without its body)",
    "The URI: the address of the resource (page, image, ...) to get/post,
    relative to the root directory",
    "The HTTP version (it is 1.0 by default but you can choose a different
    version if you use specific features)",
    "The header: a set of fields with key and value",
    "The body of the page (used only with the POST method)"
));
code('
auto request = new Http.Request();
request.setMethod(Http.Request.Method.Post);
request.setUri("/page.html");
request.setHttpVersion(1, 1); // HTTP 1.1
request.setField("From", "me");
request.setField("Content-Type", "application/x-www-form-urlencoded");
request.setBody("para1=value1&amp;param2=value2");

auto response = http.sendRequest(request);
');
paragraph(
'DSFML automatically fills mandatory header fields, such as "Host",
"Content-Length", etc. You can send your requests without worrying about them.
DSFML will do its best to make sure they are valid.'
);

section("Responses");
paragraph(
"If the $HTTP class could successfully connect to the host and send the request,
a response is sent back and returned to the user, encapsulated in an instance of
the $HTTPRESPONSE class. Responses contain the following members:"
);
ul(array(
"A status code which precisely indicates how the server processed the request
(OK, redirected, not found, etc.)",
"The HTTP version of the server",
"The header: a set of fields with key and value",
"The body of the response"
));
code('
auto response = http.sendRequest(request);
writeln("status: ", response.getStatus());
writeln("HTTP version: ", response.getMajorHttpVersion(), ".", response.getMinorHttpVersion());
writeln("Content-Type header:", response.getField("Content-Type"));
writeln("body: ", response.getBody());
');
paragraph(
"The status code can be used to check whether the request was successfully
processed or not: codes 2xx represent success, codes 3xx represent a
redirection, codes 4xx represent client errors, codes 5xx represent server
errors, and codes 10xx represent SFML specific errors which are not part of the
HTTP standard."
);

section("Example: sending scores to an online server");
paragraph(
"Here is a short example that demonstrates how to perform a simple task: Sending
a score to an online database."
);
code('
import dsfml.network;
import std.conv;

void sendScore(int score, const std.string& name)
{
    // prepare the request
    Http.Request request = new Request("/send-score.php", Http.Request.Post);

    // encode the parameters in the request body
    string body = "name=" ~ to!string(name) ~ "&score=" ~ to!string(score);
    request.setBody(body);

    // send the request
    Http http = new Http("http://www.myserver.com/");
    Http.Response response = http.sendRequest(request);

    // check the status
    if (response.getStatus() == Http.Response.Ok)
    {
        // check the contents of the response
        writeln(response.getBody());
    }
    else
    {
        writeln("request failed");
    }
}
');
paragraph(
"Of course, this is a very simple way to handle online scores. There's no
protection: Anybody could easily send a false score. A more robust approach
would probably involve an extra parameter, like a hash code that ensures that
the request was sent by the program. That is beyond the scope of this tutorial."
);
paragraph(
"And finally, here is a very simple example of what the PHP page on server might
look like."
);



code(htmlspecialchars('
<?php
    $name = $_POST[\'name\'];
    $score = $_POST[\'score\'];
    
    if (write_to_database($name, $score)) // this is not a PHP tutorial :)
    {
        echo "name and score added!";
    }
    else
    {
        echo "failed to write name and score to database...";
    }
?>
'));

foot();
?>