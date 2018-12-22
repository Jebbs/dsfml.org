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
      <title>DSFML - dsfml.network.http</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.http</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The Http class is a very simple HTTP client that allows you to communicate
 with a web server. You can retrieve web pages, send data to an interactive
 resource, download a remote file, etc. The HTTPS protocol is not supported.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The HTTP client is split into 3 classes:
 <ul class="lists"> <li>Http.Request</li>
 <li>Http.Response</li>
 <li>Http</li></ul>
<br><br>
 <p class="para">Http.Request builds the request that will be sent to the server. A
 request is made of:</p>
 <ul class="lists"> <li>a method (what you want to do)</li>
 <li>a target URI (usually the name of the web page or file)</li>
 <li>one or more header fields (options that you can pass to the server)</li>
 <li>an optional body (for POST requests)</li></ul>
<br><br>
 <p class="para">Http.Response parses the response from the web server and provides
 getters to read them. The response contains:</p>
 <ul class="lists"> <li>a status code</li>
 <li>header fields (that may be answers to the ones that you requested)</li>
 <li>a body, which contains the contents of the requested resource</li></ul>
<br><br>
 <p class="para"><u>Http</u> provides a simple function, <code class="prettyprint">sendRequest</code>, to send a
 Http.Request and return the corresponding Http.Response from the server.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Create a new HTTP client
auto <span class="psymbol">http</span> = new Http();

// We'll work on http://www.sfml-dev.org
<span class="psymbol">http</span>.setHost("http://www.sfml-dev.org");

// Prepare a request to get the 'features.php' page
auto request = new Http.Request("features.php");

// Send the request
auto response = <span class="psymbol">http</span>.sendRequest(request);

// Check the status code and display the result
auto status = response.getStatus();
if (status == Http.Response.Status.Ok)
{
    writeln(response.getBody());
}
else
{
    writeln("Error ", status);
}
</code></pre>
  </div>
</section>

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
        <code class="prettyprint"><a class="decl_anchor" href="#Http" id="Http">class Http;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    An HTTP client.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.this" id="Http.this">this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Default constructor
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.this.2" id="Http.this.2">this(const(char)[] host, ushort port = 0);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the HTTP client with the target host.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This is equivalent to calling <code class="prettyprint">setHost(host, port)</code>. The port has a
 default value of 0, which means that the HTTP client will use the right
 port according to the protocol used (80 for HTTP, 443 for HTTPS). You
 should leave it like this unless you really need a port other than the
 standard one, or use an unknown protocol.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] host</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Web server to connect to
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ushort port</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Port to use for connection
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.setHost" id="Http.setHost">void setHost(const(char)[] host, ushort port = 0);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the target host.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function just stores the host address and port, it doesn't actually
 connect to it until you send a request. The port has a default value of
 0, which means that the HTTP client will use the right port according to
 the protocol used (80 for HTTP, 443 for HTTPS). You should leave it like
 this unless you really need a port other than the standard one, or use an
 unknown protocol.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] host</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Web server to connect to
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ushort port</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Port to use for connection
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.sendRequest" id="Http.sendRequest">Response sendRequest(Request request, Time timeout = Time.Zero);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Send a HTTP request and return the server's response.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    You must have a valid host before sending a request (see setHost). Any
 missing mandatory header field in the request will be added with an
 appropriate value. Warning: this function waits for the server's response
 and may not return instantly; use a thread if you don't want to block
 your application, or use a timeout to limit the time to wait. A value of
 Time.Zero means that the client will use the system defaut timeout
 (which is usually pretty long).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Request request</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Request to send
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Time timeout</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Maximum time to wait
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request" id="Http.Request">class Request;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define a HTTP request.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.Method" id="Http.Request.Method">enum Method: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enumerate the available HTTP methods for a request.
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.Method.Get" id="Http.Request.Method.Get">Get</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request in get mode, standard method to retrieve a page.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.Method.Post" id="Http.Request.Method.Post">Post</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request in post mode, usually to send data to a page.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.Method.Head" id="Http.Request.Method.Head">Head</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request a page's header only.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.Method.Put" id="Http.Request.Method.Put">Put</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request in put mode, useful for a REST API
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.Method.Delete" id="Http.Request.Method.Delete">Delete</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Request in delete mode, useful for a REST API
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.this" id="Http.Request.this">this(const(char)[] uri = "/", Method method = Method.Get, const(char)[] requestBody = "");
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    This constructor creates a GET request, with the root URI ("/") and
 an empty body.

  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] uri</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Target URI
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Method method</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Method to use for the request
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] requestBody</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Content of the request's body
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.setBody" id="Http.Request.setBody">void setBody(const(char)[] requestBody);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the body of the request.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The body of a request is optional and only makes sense for POST
 requests. It is ignored for all other methods. The body is empty by
 default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] requestBody</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Content of the body
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.setField" id="Http.Request.setField">void setField(const(char)[] field, const(char)[] value);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the value of a field.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The field is created if it doesn't exist. The name of the field is
 case insensitive. By default, a request doesn't contain any field
 (but the mandatory fields are added later by the HTTP client when
 sending the request).


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] field</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the field to set
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] value</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Value of the field
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.setHttpVersion" id="Http.Request.setHttpVersion">void setHttpVersion(uint major, uint minor);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the HTTP version for the request.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The HTTP version is 1.0 by default.
<br><br>
 Parameters
 	major = Major HTTP version number
 	minor = Minor HTTP version number
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.setMethod" id="Http.Request.setMethod">void setMethod(Method method);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the request method.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    See the Method enumeration for a complete list of all the availale
 methods. The method is Http.Request.Method.Get by default.
<br><br>
 Params
 	method = Method to use for the request
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Request.setUri" id="Http.Request.setUri">void setUri(const(char)[] uri);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the requested URI.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The URI is the resource (usually a web page or a file) that you want
 to get or post. The URI is "/" (the root page) by default.
<br><br>
 Params
 	uri = URI to request, relative to the host
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
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response" id="Http.Response">class Response;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Define a HTTP response.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response.Status" id="Http.Response.Status">enum Status: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Enumerate all the valid status codes for a response.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response.getBody" id="Http.Response.getBody">const string getBody();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the body of the response.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    The response body.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response.getField" id="Http.Response.getField">const string getField(const(char)[] field);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the value of a field.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the field field is not found in the response header, the empty
 string is returned. This function uses case-insensitive comparisons.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] field</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Name of the field to get
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
    Value of the field, or empty string if not found.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response.getMajorHttpVersion" id="Http.Response.getMajorHttpVersion">const uint getMajorHttpVersion();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the major HTTP version number of the response.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Major HTTP version number.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response.getMinorHttpVersion" id="Http.Response.getMinorHttpVersion">const uint getMinorHttpVersion();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the minor HTTP version number of the response.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Minor HTTP version number.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Http.Response.getStatus" id="Http.Response.getStatus">const Status getStatus();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the response status code.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The status code should be the first thing to be checked after
 receiving a response, it defines whether it is a success, a failure
 or anything else (see the Status enumeration).


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Status code of the response.
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