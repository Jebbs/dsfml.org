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
      <title>DSFML - dsfml.network.socketselector</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.socketselector</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Socket selectors provide a way to wait until some data is available on a set
 of sockets, instead of just one. This is convenient when you have multiple
 sockets that may possibly receive data, but you don't know which one will be
 ready first. In particular, it avoids to use a thread for each socket; with
 selectors, a single thread can handle all the sockets.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    All types of sockets can be used in a selector:
 <ul class="lists"> <li><a class="dsfml_link" href="../network/tcplistener.php" title="Socket that listens to new TCP connections.">TcpListener</a></li>
 <li><a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a></li>
 <li><a class="dsfml_link" href="../network/udpsocket.php" title="Specialized socket using the UDP protocol.">UdpSocket</a></li></ul>
<br><br>
 <p class="para"> A selector doesn't store its own copies of the sockets, it simply keeps a
 reference to the original sockets that you pass to the "add" function.
 Therefore, you can't use the selector as a socket container, you must store
 them outside and make sure that they are alive as long as they are used in
 the selector (i.e., they cannot be collected by the GC).
<br><br>
 Using a selector is simple:</p>
 <ul class="lists"> <li>populate the selector with all the sockets that you want to observe</li>
 <li>make it wait until there is data available on any of the sockets</li>
 <li>test each socket to find out which ones are ready</li></ul>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">// Create a socket to listen to new connections
auto listener = new TcpListener();
listener.listen(55001);

// Create a list to store the future clients
TcpSocket[] clients;

// Create a selector
auto selector = new SocketSelector();

// Add the listener to the selector
selector.add(listener);

// Endless loop that waits for new connections
while (running)
{
    // Make the selector wait for data on any socket
    if (selector.wait())
    {
        // Test the listener
        if (selector.isReady(listener))
        {
            // The listener is ready: there is a pending connection
            auto client = new TcpSocket();
            if (listener.accept(client) == Socket.Status.Done)
            {
                // Add the new client to the clients list
                clients~=client;

                // Add the new client to the selector so that we will
                // be notified when he sends something
                selector.add(client);
            }
            else
            {
                // Error, we won't get a new connection
            }
        }
        else
        {
            // The listener socket is not ready, test all other sockets (the clients)
            foreach(client; clients)
            {
                if (selector.isReady(client))
                {
                    // The client has sent some data, we can receive it
                    auto packet = new Packet();
                    if (client.receive(packet) == Socket.Status.Done)
                    {
                        ...
                    }
                }
            }
        }
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
    <a class="dsfml_link" href="../network/socket.php" title="Base interface for all the socket types.">Socket</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector" id="SocketSelector">class SocketSelector;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Multiplexer that allows to read from multiple sockets.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.this" id="SocketSelector.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.add" id="SocketSelector.add">void add(TcpListener listener);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Add a new TcpListener to the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function keeps a weak reference to the socket, so you have to make
 sure that the socket is not destroyed while it is stored in the selector.
 This function does nothing if the socket is not valid.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">TcpListener listener</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference to the listener to add
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.add.2" id="SocketSelector.add.2">void add(TcpSocket socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Add a new TcpSocket to the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function keeps a weak reference to the socket, so you have to make
 sure that the socket is not destroyed while it is stored in the selector.
 This function does nothing if the socket is not valid.


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
      Reference to the socket to add
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.add.3" id="SocketSelector.add.3">void add(UdpSocket socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Add a new UdpSocket to the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function keeps a weak reference to the socket, so you have to make
 sure that the socket is not destroyed while it is stored in the selector.
 This function does nothing if the socket is not valid.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">UdpSocket socket</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference to the socket to add
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.clear" id="SocketSelector.clear">void clear();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Remove all the sockets stored in the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't destroy any instance, it simply removes all the
 references that the selector has to external sockets.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.isReady" id="SocketSelector.isReady">const bool isReady(TcpListener listener);
<br>
const bool isReady(TcpSocket socket);
<br>
const bool isReady(UdpSocket socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Test a socket to know if it is ready to receive data.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function must be used after a call to Wait, to know which sockets
 are ready to receive data. If a socket is ready, a call to receive will
 never block because we know that there is data available to read. Note
 that if this function returns <code class="prettyprint">true</code> for a TcpListener, this means that it
 is ready to accept a new connection.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.remove" id="SocketSelector.remove">void remove(TcpListener socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Remove a socket from the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't destroy the socket, it simply removes the reference
 that the selector has to it.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">TcpListener socket</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference to the socket to remove
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.remove.2" id="SocketSelector.remove.2">void remove(TcpSocket socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Remove a socket from the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't destroy the socket, it simply removes the reference
 that the selector has to it.


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
      Reference to the socket to remove
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.remove.3" id="SocketSelector.remove.3">void remove(UdpSocket socket);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Remove a socket from the selector.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function doesn't destroy the socket, it simply removes the reference
 that the selector has to it.


  </p>
</div>
<div class="ddoc_params">
  <h4>Parameters:</h4>
  <table cellspacing="0" cellpadding="0" border="1" class="graybox">
    <tbody>
      <tr class="ddoc_param_row">
  <td scope="ddoc_param_id">
  <code class="prettyprint">UdpSocket socket</code>
</td>
<td>
  <div class="ddoc_param_desc">
    <p class="param_desc">
      Reference to the socket to remove
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
        <code class="prettyprint"><a class="decl_anchor" href="#SocketSelector.wait" id="SocketSelector.wait">bool wait(Time timeout = Time.Zero);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Wait until one or more sockets are ready to receive.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function returns as soon as at least one socket has some data
 available to be received. To know which sockets are ready, use the
 isReady function. If you use a timeout and no socket is ready before the
 timeout is over, the function returns <code class="prettyprint">false</code>.
<br><br>
 Parameters
 		timeout = Maximum time to wait, (use Time.Zero for infinity)


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if there are sockets ready, <code class="prettyprint">false</code> otherwise.
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