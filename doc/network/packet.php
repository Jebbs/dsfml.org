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
      <title>DSFML - dsfml.network.packet</title>
    </head>
    <body>
      <div class="main">
        <?php include '../../header.php'?>
        <div class="inner" class="content">
          <article class="module">
            <h1 class="module_name">dsfml.network.packet</h1>
            <section id="module_content"><section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Packets provide a safe and easy way to serialize data, in order to send it
 over the network using sockets (sf::TcpSocket, sf::UdpSocket).

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    Packets solve 2 fundamental problems that arise when transferring data over
 the network:
 <ul class="lists"> <li>data is interpreted correctly according to the endianness</li>
 <li>the bounds of the packet are preserved (one send == one receive)</li></ul>
<br><br>
 <p class="para">The <u>Packet</u> class provides both input and output modes.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">int x = 24;
string s = "hello";
double d = 5.89;

// Group the variables to send into a packet
auto <span class="psymbol">packet</span> = new Packet();
<span class="psymbol">packet</span>.write(x);
<span class="psymbol">packet</span>.write(s);
<span class="psymbol">packet</span>.write(d);

// Send it over the network (socket is a valid TcpSocket)
socket.send(<span class="psymbol">packet</span>);

////////////////////////////////////////////////////////////////

// Receive the packet at the other end
auto <span class="psymbol">packet</span> = new Packet();
socket.receive(<span class="psymbol">packet</span>);

// Extract the variables contained in the packet
int x;
 s;
double d;
if (<span class="psymbol">packet</span>.read(x) &amp;&amp; <span class="psymbol">packet</span>.read(s) &amp;&amp; <span class="psymbol">packet</span>.read(d))
{
    // Data extracted successfully...
}
</code></pre>
  </div>
</section>
<br><br>
 <p class="para">Packets also provide an extra feature that allows to apply custom
 transformations to the data before it is sent, and after it is received. This
 is typically used to handle automatic compression or encryption of the data.
 This is achieved by inheriting from sf::Packet, and overriding the onSend and
 onReceive functions.</p>


  </p>
</div>
<div class="ddoc_section">
  <p class="para">
    <span class="ddoc_section_h">Example:</span>

<section class="code_listing">
  <div class="code_sample">
    <pre><code class="prettyprint">class ZipPacket : Packet
{
    override const(void)[] onSend()
    {
        const(void)[] srcData = getData();

        return MySuperZipFunction(srcData);
    }

    override void onReceive(const(void)[] data)
    {
        const(void)[] dstData = MySuperUnzipFunction(data);

        append(dstData);
    }
}

// Use like regular packets:
auto <span class="psymbol">packet</span> = new ZipPacket();
<span class="psymbol">packet</span>.write(x);
<span class="psymbol">packet</span>.write(s);
<span class="psymbol">packet</span>.write(d);
</code></pre>
  </div>
</section>


  </p>
</div>
<div class="ddoc_see_also">
  <h4>See Also:</h4>
  <p class="para">
    <a class="dsfml_link" href="../network/tcpsocket.php" title="Specialized socket using the TCP protocol.">TcpSocket</a>, <a class="dsfml_link" href="../network/udpsocket.php" title="Specialized socket using the UDP protocol.">UdpSocket</a>
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
        <code class="prettyprint"><a class="decl_anchor" href="#Packet" id="Packet">class Packet;
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Utility class to build blocks of data to transfer over the network.
  </p>
</div>

</section>
<ul class="ddoc_class_members">
  <li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.this" id="Packet.this">this();
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
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.getData" id="Packet.getData">const const(void)[] getData();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a slice of the data contained in the packet.

  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Slice containing the data.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.append" id="Packet.append">void append(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Append data to the end of the packet.

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
      Pointer to the sequence of bytes to append
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
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.clear" id="Packet.clear">void clear();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Clear the packet.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    After calling Clear, the packet is empty.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.endOfPacket" id="Packet.endOfPacket">const bool endOfPacket();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell if the reading position has reached the end of the packet.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function is useful to know if there is some data left to be read,
 without actually reading it.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if all data was read, <code class="prettyprint">false</code> otherwise.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.read" id="Packet.read">bool read(T)(out T value) if (isScalarType!T);
<br>
bool read(T)(out T value) if (isSomeString!T);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Reads a primitive data type or string from the packet.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    The value in the packet at the current read position is set to value.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    <code class="prettyprint">true</code> if last data extraction from packet was successful.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.write" id="Packet.write">void write(T)(T value) if (isScalarType!T);
<br>
void write(T)(T value) if (isSomeString!T);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Writes a scalar data type or string to the packet.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.onSend" id="Packet.onSend">const(void)[] onSend();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Called before the packet is sent over the network.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function can be defined by derived classes to transform the data
 before it is sent; this can be used for compression, encryption, etc.
<br><br>
 The function must return an array of the modified data, with a length of
 the number of bytes to send. The default implementation provides the
 packet's data without transforming it.


  </p>
</div>
<div class="ddoc_returns">
  <h4>Returns:</h4>
  <p class="para">
    Array of bytes to send.
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#Packet.onRecieve" id="Packet.onRecieve">void onRecieve(const(void)[] data);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Called after the packet is received over the network.

  </p>
</div>
<div class="ddoc_description">
  <p class="para">
    This function can be defined by derived classes to transform the data
 after it is received; this can be used for uncompression, decryption,
 etc.
<br><br>
 The function receives an array of the received data, and must fill the
 packet with the transformed bytes. The default implementation fills the
 packet directly without transforming the data.


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
      Array of the received bytes
    </p>
  </div>
</td>
</tr>

    </tbody>
  </table>
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
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_create" id="sfPacket_create">package sfPacket* sfPacket_create();
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create a new packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_copy" id="sfPacket_copy">package sfPacket* sfPacket_copy(const sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Create a new packet by copying an existing one
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_destroy" id="sfPacket_destroy">package void sfPacket_destroy(sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Destroy a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_append" id="sfPacket_append">package void sfPacket_append(sfPacket* packet, const void* data, size_t sizeInBytes);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Append data to the end of a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_clear" id="sfPacket_clear">package void sfPacket_clear(sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Clear a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_getData" id="sfPacket_getData">package const(void)* sfPacket_getData(const sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get a pointer to the data contained in a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_getDataSize" id="sfPacket_getDataSize">package size_t sfPacket_getDataSize(const sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Get the size of the data contained in a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_endOfPacket" id="sfPacket_endOfPacket">package bool sfPacket_endOfPacket(const sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Tell if the reading position has reached the end of a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_canRead" id="sfPacket_canRead">package bool sfPacket_canRead(const sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Test the validity of a packet, for reading
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_readBool" id="sfPacket_readBool">package bool sfPacket_readBool(sfPacket* packet);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Functions to extract data from a packet
  </p>
</div>

</section>

</div>

</li><li class="ddoc_member">
  <div class="ddoc_decl">
  <section class="section">
    <div class="declaration">
      <div class="dlang">
        <code class="prettyprint"><a class="decl_anchor" href="#sfPacket_writeBool" id="sfPacket_writeBool">package void sfPacket_writeBool(sfPacket* packet, bool);
</a></code>
      </div>
    </div>
  </section>
</div>
<div class="ddoc_decl_dd">
  <section class="section ddoc_sections">
  <div class="ddoc_summary">
  <p class="para">
    Functions to insert data into a packet
  </p>
</div>

</section>

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