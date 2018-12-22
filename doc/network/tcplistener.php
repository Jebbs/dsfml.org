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
      <title>DSFML - dsfml.network.tcplistener</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.tcplistener</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A listener socket is a special type of socket that listens to a given port
 and waits for connections on that port. This is all it can do.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    When a new connection is received, you must call <code class="prettyprint">accept</code> and the listener
 returns a new instance of <a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a> that is properly initialized and
 can be used to communicate with the new client.
<br><br>
 Listener sockets are specific to the TCP protocol, UDP sockets are
 connectionless and can therefore communicate directly. As a consequence, a
 listener socket will always return the new connections as <a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a>
 instances.
<br><br>
 A listener is automatically closed on destruction, like all other types of
 socket. However if you want to stop listening before the socket is destroyed,
 you can call its <code class="prettyprint">close()</code> function.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Create a listener socket and make it wait for new
// connections on port 55001
auto listener = new TcpListener();
listener.listen(55001);

// Endless loop that waits for new connections
while (running)
{
    auto client = new TcpSocket();
    if (listener.accept(client) == Socket.Status.Done)
    {
        // A new client just connected!
        writeln("New connection received from ", client.getRemoteAddress());
        doSomethingWith(client);
    }
}
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a>, <a class="dsfml_link" href="../network/socket.php" title="Base interface for all the socket types.">Socket</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener" id="TcpListener">class TcpListener: <span class="ddoc_psuper_symbol">dsfml.network.socket.Socket</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Socket that listens to new TCP connections.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener.this" id="TcpListener.this">this();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Default constructor.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener.getLocalPort" id="TcpListener.getLocalPort">const ushort getLocalPort();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the port to which the socket is bound locally.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the socket is not listening to a port, this function returns 0.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Port to which the socket is bound.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener.setBlocking" id="TcpListener.setBlocking">void setBlocking(bool blocking);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether the socket is in blocking or non-blocking mode.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, calls will not return until they have completed their
 task. For example, a call to <code class="prettyprint">receive</code> in blocking mode won't return
 until some data was actually received.
<br><br>
 In non-blocking mode, calls will
 always return immediately, using the return code to signal whether there
 was data available or not. By default, all sockets are blocking.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">bool blocking</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      <code class="prettyprint">true</code> to set the socket as blocking, <code class="prettyprint">false</code> for non-blocking
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener.accept" id="TcpListener.accept">Status accept(TcpSocket socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Accept a new connection.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the socket is in blocking mode, this function will not return until a
 connection is actually received.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">TcpSocket socket</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Socket that will hold the new connection
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
    Status code.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener.listen" id="TcpListener.listen">Status listen(ushort port, IpAddress address = IpAddress.Any);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Start listening for connections.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This functions makes the socket listen to the specified port, waiting for
 new connections. If the socket was previously listening to another port,
 it will be stopped first and bound to the new port.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">ushort port</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Port to listen for new connections
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IpAddress address</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Address of the interface to listen on
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
    Status code.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpListener.isBlocking" id="TcpListener.isBlocking">const bool isBlocking();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell whether the socket is in blocking or non-blocking mode.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if the socket is blocking, <code class="prettyprint">false</code> otherwise.
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