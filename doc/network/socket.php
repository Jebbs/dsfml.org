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
      <title>DSFML - dsfml.network.socket</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.socket</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    This class mainly defines internal stuff to be used by derived classes.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The only public features that it defines, and which is therefore common to
 all the socket classes, is the blocking state. All sockets can be set as
 blocking or non-blocking.
<br><br>
 In blocking mode, socket functions will hang until the operation completes,
 which means that the entire program (well, in fact the current thread if you
 use multiple ones) will be stuck waiting for your socket operation to
 complete.
<br><br>
 In non-blocking mode, all the socket functions will return immediately. If
 the socket is not ready to complete the requested operation, the function
 simply returns the proper status code (Socket.Status.NotReady).
<br><br>
 The default mode, which is blocking, is the one that is generally used, in
 combination with threads or selectors. The non-blocking mode is rather used
 in real-time applications that run an endless loop that can poll the socket
 often enough, and cannot afford blocking this loop.


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../network/tcplistener.php" title="Socket that listens to new TCP connections.">TcpListener</a>, <a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a>, <a class="dsfml_link" href="../network/udpsocket.php" title="Specialized socket using the UDP protocol.">UdpSocket</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Socket" id="Socket">interface Socket;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Base interface for all the socket types.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.Status" id="Socket.Status">enum Status: int;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Status codes that may be returned by socket functions.
  </p>
</div>

</section>
<ul class="ddoc_enum_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.Status.Done" id="Socket.Status.Done">Done</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The socket has sent / received the data
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.Status.NotReady" id="Socket.Status.NotReady">NotReady</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The socket is not ready to send / receive data yet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.Status.Disconnected" id="Socket.Status.Disconnected">Disconnected</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    The TCP socket has been disconnected
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.Status.Error" id="Socket.Status.Error">Error</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    An unexpected error happened
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
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.AnyPort" id="Socket.AnyPort">enum int AnyPort;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Special value that tells the system to pick any available port.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.setBlocking" id="Socket.setBlocking">abstract void setBlocking(bool blocking);
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
 In non-blocking mode, calls will
 always return immediately, using the return code to signal whether there
 was data available or not. By default, all sockets are blocking.
<br><br>
 By default, all sockets are blocking.


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
        <code class="prettyprint"><a class="decl_anchor" href="#Socket.isBlocking" id="Socket.isBlocking">abstract const bool isBlocking();
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