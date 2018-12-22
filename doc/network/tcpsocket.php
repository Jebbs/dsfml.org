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
      <title>DSFML - dsfml.network.tcpsocket</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.tcpsocket</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    TCP is a connected protocol, which means that a TCP socket can only
 communicate with the host it is connected to.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It can't send or receive anything if it is not connected.
<br><br>
 The TCP protocol is reliable but adds a slight overhead. It ensures that your
 data will always be received in order and without errors (no data corrupted,
 lost or duplicated).
<br><br>
 When a socket is connected to a remote host, you can retrieve informations
 about this host with the <code class="prettyprint">getRemoteAddress</code> and <code class="prettyprint">getRemotePort</code> functions.
<br><br>
 You can also get the local port to which the socket is bound (which is
 automatically chosen when the socket is connected), with the <code class="prettyprint">getLocalPort</code>
 function.
<br><br>
 Sending and receiving data can use either the low-level or the high-level
 functions. The low-level functions process a raw sequence of bytes, and
 cannot ensure that one call to Send will exactly match one call to Receive at
 the other end of the socket.
<br><br>
 The high-level interface uses packets (see <a class="dsfml_link" href="../network/packet.php" title="Utility class to build blocks of data to transfer over the network.">Packet</a>), which are easier
 to use and provide more safety regarding the data that is exchanged. You can
 look at the <a class="dsfml_link" href="../network/packet.php" title="Utility class to build blocks of data to transfer over the network.">Packet</a> class to get more details about how they work.
<br><br>
 The socket is automatically disconnected when it is destroyed, but if you
 want to explicitely close the connection while the socket instance is still
 alive, you can call disconnect.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// ----- The client -----

// Create a socket and connect it to 192.168.1.50 on port 55001
auto socket = new TcpSocket();
socket.connect("192.168.1.50", 55001);

// Send a message to the connected host
string message = "Hi, I am a client";
socket.send(message);

// Receive an answer from the server
char[1024] buffer;
size_t received = 0;
socket.receive(buffer, received);
writeln("The server said: ", buffer[0 .. received]);

// ----- The server -----

// Create a listener to wait for incoming connections on port 55001
auto listener = TcpListener();
listener.listen(55001);

// Wait for a connection
auto socket = new TcpSocket();
listener.accept(socket);
writeln("New client connected: ", socket.getRemoteAddress());

// Receive a message from the client
char[1024] buffer;
size_t received = 0;
socket.receive(buffer, received);
writeln("The client said: ", buffer[0 .. received]);

// Send an answer
string message = "Welcome, client";
socket.send(message);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../network/socket.php" title="Base interface for all the socket types.">Socket</a>, <a class="dsfml_link" href="../network/udpsocket.php" title="Specialized socket using the UDP protocol.">UdpSocket</a>, <a class="dsfml_link" href="../network/packet.php" title="Utility class to build blocks of data to transfer over the network.">Packet</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket" id="TcpSocket">class TcpSocket: <span class="ddoc_psuper_symbol">dsfml.network.socket.Socket</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specialized socket using the TCP protocol.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.this" id="TcpSocket.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.getLocalPort" id="TcpSocket.getLocalPort">const ushort getLocalPort();
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
    If the socket is not connected, this function returns 0.


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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.getRemoteAddress" id="TcpSocket.getRemoteAddress">const IpAddress getRemoteAddress();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the address of the connected peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    It the socket is not connected, this function returns <code class="prettyprint">IpAddress.None</code>.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Address of the remote peer.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.getRemotePort" id="TcpSocket.getRemotePort">const ushort getRemotePort();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the port of the connected peer to which the socket is connected.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    If the socket is not connected, this function returns 0.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Remote port to which the socket is connected.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.setBlocking" id="TcpSocket.setBlocking">void setBlocking(bool blocking);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Set the blocking state of the socket.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, calls will not return until they have completed their
 task. For example, a call to <code class="prettyprint">receive</code> in blocking mode won't return
 until some data was actually received.
<br><br>
 In non-blocking mode, calls will always return immediately, using the
 return code to signal whether there was data available or not. By
 default, all sockets are blocking.


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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.connect" id="TcpSocket.connect">Status connect(IpAddress host, ushort port, Time timeout = Time.Zero);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Connect the socket to a remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, this function may take a while, especially if the
 remote peer is not reachable. The last parameter allows you to stop
 trying to connect after a given timeout.
<br><br>
 If the socket was previously connected, it is first disconnected.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IpAddress host</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Address of the remote peer
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
      Port of the remote peer
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
      Optional maximum time to wait
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.disconnect" id="TcpSocket.disconnect">void disconnect();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Disconnect the socket from its remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function gracefully closes the connection. If the socket is not
 connected, this function has no effect.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.isBlocking" id="TcpSocket.isBlocking">const bool isBlocking();
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

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.send" id="TcpSocket.send">Status send(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Send raw data to the remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function will fail if the socket is not connected.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">const(void)[] data</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Sequence of bytes to send
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.send.2" id="TcpSocket.send.2">Status send(Packet packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Send a formatted packet of data to the remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function will fail if the socket is not connected.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Packet packet</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Packet to send
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.receive" id="TcpSocket.receive">Status receive(void[] data, out size_t sizeReceived);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Receive raw data from the remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, this function will wait until some bytes are actually
 received. This function will fail if the socket is not connected.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">void[] data</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Array to fill with the received bytes
    </p>
  </div>
</td>
</tr>
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">size_t sizeReceived</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      This variable is filled with the actual number of bytes
                       received
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
        <code class="prettyprint"><a class="decl_anchor" href="#TcpSocket.receive.2" id="TcpSocket.receive.2">Status receive(Packet packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Receive a formatted packet of data from the remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, this function will wait until the whole packet has been
 received. This function will fail if the socket is not connected.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">Packet packet</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Packet to fill with the received data
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