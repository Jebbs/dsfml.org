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
      <title>DSFML - dsfml.network.ipaddress</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.ipaddress</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    <u>IpAddress</u> is a utility structure for manipulating network addresses. It
 provides a set a implicit constructors and conversion functions to easily
 build or transform an IP address from/to various representations.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Note that <u>IpAddress</u> currently doesn't support IPv6 nor other types of
 network addresses.

  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// an invalid address
IpAddress a0;

// an invalid address (same as a0)
IpAddress a1 = IpAddress.None;

// the local host address
IpAddress a2 = IpAddress("127.0.0.1");

// the broadcast address
IpAddress a3 = IpAddress.Broadcast;

// a local address
IpAddress a4 = IpAddress(192, 168, 1, 56);

// a local address created from a network name
IpAddress a5 = IpAddress("my_computer");

// a distant address
IpAddress a6 = IpAddress("89.54.1.169");

// a distant address created from a network name
IpAddress a7("www.google.com");

// my address on the local network
IpAddress a8 = IpAddress.getLocalAddress();

// my address on the internet
IpAddress a9 = IpAddress.getPublicAddress();
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
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress" id="IpAddress">struct IpAddress;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Encapsulate an IPv4 network address.
  </p>
</div>

</section>
<ul class="ddoc_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.this" id="IpAddress.this">this(const(char)[] address);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the address from a string.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Here address can be either a decimal address (ex: "192.168.1.56") or a
 network name (ex: "localhost").


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(char)[] address</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      IP address or network name.
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
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.this.2" id="IpAddress.this.2">this(ubyte byte0, ubyte byte1, ubyte byte2, ubyte byte3);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the address from 4 bytes.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Calling <code class="prettyprint">IpAddress(a, b, c, d)</code> is equivalent to calling
 <code class="prettyprint">IpAddress("a.b.c.d")</code>, but safer as it doesn't have to parse a string to
 get the address components.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ubyte byte0</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      First byte of the address.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ubyte byte1</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Second byte of the address.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ubyte byte2</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Third byte of the address.
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ubyte byte3</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Fourth byte of the address.
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
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.this.3" id="IpAddress.this.3">this(uint address);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Construct the address from a 32-bits integer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This constructor uses the internal representation of the address
 directly. It should be used only if you got that representation from
 <code class="prettyprint">IpAddress.toInteger()</code>.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">uint address</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      4 bytes of the address packed into a 32-bits integer
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
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.toInteger" id="IpAddress.toInteger">const int toInteger();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get an integer representation of the address.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The returned number is the internal representation of the address, and
 should be used for optimization purposes only (like sending the address
 through a socket). The integer produced by this function can then be
 converted back to an <u>IpAddress</u> with the proper constructor.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    32-bits unsigned integer representation of the address.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.toString" id="IpAddress.toString">const @nogc @trusted const(char)[] toString();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a string representation of the address.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The returned string is the decimal representation of the IP address
 (like "192.168.1.56"), even if it was constructed from a host name.
<br><br>
 This string is built using an internal buffer. If you need to store the
 string, make a copy.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    String representation of the address
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.getLocalAddress" id="IpAddress.getLocalAddress">static IpAddress getLocalAddress();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the computer's local address.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The local address is the address of the computer from the LAN point of
 view, i.e. something like 192.168.1.56. It is meaningful only for
 communications over the local network. Unlike <code class="prettyprint">getPublicAddress</code>, this
 function is fast and may be used safely anywhere.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Local IP address of the computer.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.getPublicAddress" id="IpAddress.getPublicAddress">static IpAddress getPublicAddress(Time timeout = Time.Zero);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the computer's public address.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The public address is the address of the computer from the internet point
 of view, i.e. something like 89.54.1.169.
<br><br>
 It is necessary for communications over the world wide web. The only way
 to get a public address is to ask it to a distant website; as a
 consequence, this function depends on both your network connection and
 the server, and may be very slow. You should use it as few as possible.
<br><br>
 Because this function depends on the network connection and on a distant
 server, you may use a time limit if you don't want your program to be
 possibly stuck waiting in case there is a problem; this limit is
 deactivated by default.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
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
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Public IP address of the computer.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.None" id="IpAddress.None">static immutable immutable(IpAddress) None;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Value representing an empty/invalid address.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.Any" id="IpAddress.Any">static immutable immutable(IpAddress) Any;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Value representing any address (0.0.0.0)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.LocalHost" id="IpAddress.LocalHost">static immutable immutable(IpAddress) LocalHost;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The "localhost" address (for connecting a computer to itself locally)
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#IpAddress.Broadcast" id="IpAddress.Broadcast">static immutable immutable(IpAddress) Broadcast;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The "broadcast" address (for sending UDP messages to everyone on a local network)
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