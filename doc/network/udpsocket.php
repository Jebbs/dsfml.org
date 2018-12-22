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
      <title>DSFML - dsfml.network.udpsocket</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.udpsocket</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    A UDP socket is a connectionless socket.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Instead of connecting once to a remote host, like TCP sockets, it can send to
 and receive from any host at any time.
<br><br>
 It is a datagram protocol: bounded blocks of data (datagrams) are transfered
 over the network rather than a continuous stream of data (TCP). Therefore,
 one call to send will always match one call to receive (if the datagram is
 not lost), with the same data that was sent.
<br><br>
 The UDP protocol is lightweight but unreliable. Unreliable means that
 datagrams may be duplicated, be lost or arrive reordered. However, if a
 datagram arrives, its data is guaranteed to be valid.
<br><br>
 UDP is generally used for real-time communication (audio or video streaming,
 real-time games, etc.) where speed is crucial and lost data doesn't matter
 much.
<br><br>
 Sending and receiving data can use either the low-level or the high-level
 functions. The low-level functions process a raw sequence of bytes, whereas
 the high-level interface uses packets (see Packet), which are easier to use
 and provide more safety regarding the data that is exchanged. You can look at
 the Packet class to get more details about how they work.
<br><br>
 It is important to note that UdpSocket is unable to send datagrams bigger
 than MaxDatagramSize. In this case, it returns an error and doesn't send
 anything. This applies to both raw data and packets. Indeed, even packets are
 unable to split and recompose data, due to the unreliability of the protocol
 (dropped, mixed or duplicated datagrams may lead to a big mess when trying to
 recompose a packet).
<br><br>
 If the socket is bound to a port, it is automatically unbound from it when
 the socket is destroyed. However, you can unbind the socket explicitely with
 the Unbind function if necessary, to stop receiving messages or make the port
 available for other sockets.


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// ----- The client -----

// Create a socket and bind it to the port 55001
auto socket = UdpSocket();
socket.bind(55001);

// Send a message to 192.168.1.50 on port 55002
string message = "Hi, I am " ~ IpAddress.getLocalAddress().toString();
socket.send(message, "192.168.1.50", 55002);

// Receive an answer (most likely from 192.168.1.50, but could be anyone else)
char[1024] buffer;
size_t received = 0;
IpAddress sender;
ushort port;
socket.receive(buffer, received, sender, port);
writeln( sender.toString(), " said: ", buffer[0 .. received]);

// ----- The server -----

// Create a socket and bind it to the port 55002
auto socket = new UdpSocket();
socket.bind(55002);

// Receive a message from anyone
char[1024] buffer;
size_t received = 0;
IpAddress sender;
ushort port;
socket.receive(buffer, received, sender, port);
writeln(sender.toString(), " said: ", buffer[0 .. received]);

// Send an answer
message = "Welcome " ~ sender.toString();
socket.send(message, sender, port);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../network/socket.php" title="Base interface for all the socket types.">Socket</a>, <a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a>, <a class="dsfml_link" href="../network/packet.php" title="Utility class to build blocks of data to transfer over the network.">Packet</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket" id="UdpSocket">class UdpSocket: <span class="ddoc_psuper_symbol">dsfml.network.socket.Socket</span>;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Specialized socket using the UDP protocol.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.maxDatagramSize" id="UdpSocket.maxDatagramSize">enum int maxDatagramSize;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The maximum number of bytes that can be sent in a single UDP datagram.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.this" id="UdpSocket.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.getLocalPort" id="UdpSocket.getLocalPort">const ushort getLocalPort();
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
    If the socket is not bound to a port, this function returns 0.


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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.setBlocking" id="UdpSocket.setBlocking">void setBlocking(bool blocking);
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
 task. For example, a call to Receive in blocking mode won't return until
 some data was actually received. In non-blocking mode, calls will always
 return immediately, using the return code to signal whether there was
 data available or not. By default, all sockets are blocking.


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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.bind" id="UdpSocket.bind">Status bind(ushort port, IpAddress address = IpAddress.Any);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Bind the socket to a specific port.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Binding the socket to a port is necessary for being able to receive data
 on that port. You can use the special value Socket.AnyPort to tell the
 system to automatically pick an available port, and then call
 getLocalPort to retrieve the chosen port.


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
      Port to bind the socket to
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
      Address of the interface to bind to
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.isBlocking" id="UdpSocket.isBlocking">const bool isBlocking();
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.send" id="UdpSocket.send">Status send(const(void)[] data, IpAddress address, ushort port);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Send raw data to a remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Make sure that the size is not greater than UdpSocket.MaxDatagramSize,
 otherwise this function will fail and no data will be sent.


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
      Pointer to the sequence of bytes to send
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
      Address of the receiver
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
      Port of the receiver to send the data to
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.send.2" id="UdpSocket.send.2">Status send(Packet packet, IpAddress address, ushort port);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Send a formatted packet of data to a remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Make sure that the packet size is not greater than
 UdpSocket.MaxDatagramSize, otherwise this function will fail and no data
 will be sent.


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
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IpAddress address</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Address of the receiver
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
      Port of the receiver to send the data to
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.receive" id="UdpSocket.receive">Status receive(void[] data, out size_t sizeReceived, out IpAddress address, out ushort port);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Receive raw data from a remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, this function will wait until some bytes are actually
 received.
<br><br>
 Be careful to use a buffer which is large enough for the data that you
 intend to receive, if it is too small then an error will be returned and
 all the data will be lost.


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
      The array to fill with the received bytes
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
      The number of bytes received
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
      Address of the peer that sent the data
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
      Port of the peer that sent the data
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.receive.2" id="UdpSocket.receive.2">Status receive(Packet packet, out IpAddress address, out ushort port);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Receive a formatted packet of data from a remote peer.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    In blocking mode, this function will wait until the whole packet has been
 received.


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
<tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">IpAddress address</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Address of the peer that sent the data
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
      Port of the peer that sent the data
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
        <code class="prettyprint"><a class="decl_anchor" href="#UdpSocket.unbind" id="UdpSocket.unbind">void unbind();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Unbind the socket from the local port to which it is bound.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The port that the socket was previously using is immediately available
 after this function is called. If the socket is not bound to a port, this
 function has no effect.
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