<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Communicating with sockets");
section("Sockets");
paragraph(
"A socket is the interface between your application and the outside world:
through a socket, you can send and receive data. Therefore, any network program
will most likely have to deal with sockets, they are the central element of
network communication."
);
paragraph(
"There are several kinds of sockets, each providing specific features. DSFML
implements the most common ones: TCP sockets and UDP sockets."
);

section("TCP vs UDP");
paragraph(
"It is important to know what TCP and UDP sockets can do, and what they can't
do, so that you can choose the best socket type according to the requirements of
your application."
);
paragraph(
"The main difference is that TCP sockets are connection-based. You can't send or
receive anything until you are connected to another TCP socket on the remote
machine. Once connected, a TCP socket can only send and receive to/from the
remote machine. This means that you'll need one TCP socket for each client in
your application."
);
paragraph(
"UDP is not connection-based, you can send and receive to/from anyone at any
time with the same socket."
);
paragraph(
"The second difference is that TCP is reliable unlike UDP. It ensures that what
you send is always received, without corruption and in the same order. UDP
performs fewer checks, and doesn't provide any reliability: what you send might
be received multiple times (duplication), or in a different order, or be lost
and never reach the remote computer. However, UDP does guarantee that data which
is received is always valid (not corrupted)."
);
paragraph(
"UDP may seem scary, but keep in mind that ".em("almost all the time").", data
arrives correctly and in the right order."
);
paragraph(
"The third difference is a direct consequence of the second one: UDP is faster
and more lightweight than TCP because it has fewer requirements, thus less
overhead."
);
paragraph(
"The last difference is about the way data is transported. TCP is a
".em("stream").' protocol: there\'s no message boundary, if you send "Hello"
and then "SFML", the remote machine might receive "HelloSFML", "Hel" + "loSFML",
or even "He" + "loS" + "FML".'
);
paragraph(
"UDP is a ".em("datagram")." protocol. Datagrams are packets that can't be mixed
with each other. If you receive a datagram with UDP, it is guaranteed to be
exactly the same as it was sent."
);
paragraph(
"Oh, and one last thing: since UDP is not connection-based, it allows
broadcasting messages to multiple recipients, or even to an entire network. The
one-to-one communication of TCP sockets doesn't allow that."
);

section("Connecting a TCP socket");
paragraph(
"As you can guess, this part is specific to TCP sockets. There are two sides to a
connection: the one that waits for the incoming connection (let's call it the
server), and the one that triggers it (let's call it the client)."
);
paragraph(
"On client side, things are simple: the user just needs to have a $TCPSOCKET and
call its ".em("connect")." function to start the connection attempt."
);
code('
import dsfml.network;

auto socket = new TcpSocket();
Socket.Status status = socket.connect("192.168.0.5", 53000);
if (status != Socket.Status.Done)
{
    // error...
}
');
paragraph(
"The first argument is the address of the host to connect to. It is an
$IPADDRESS, which can represent any valid address: a URL, an IP address, or a
network host name. See its documentation for more details."
);
paragraph(
"The second argument is the port to connect to on the remote machine. The
connection will succeed only if the server is accepting connections on that
port."
);
paragraph(
"There's an optional third argument, a time out value. If set, and the
connection attempt doesn't succeed before the time out is over, the function
returns an error. If not specified, the default operating system time out is
used."
);
paragraph(
"Once connected, you can retrieve the address and port of the remote computer if
needed, with the ".cl("getRemoteAddress()")." and ".cl("getRemotePort()")."
functions."
);
important(
"All functions of socket classes are blocking by default. This means that your
program (more specifically the thread that contains the function call) will be
stuck until the operation is complete. This is important because some functions
may take very long: For example, trying to connect to an unreachable host will
only return after a few seconds, receiving will wait until there's data
available, etc.<br>
You can change this behavior and make all functions non-blocking by using the
".cl("setBlocking")." function of the socket. See the next chapters for more
details."
);
paragraph(
"On the server side, a few more things have to be done. Multiple sockets are
required: One that listens for incoming connections, and one for each
connected client."
);
paragraph(
"To listen for connections, you must use the special $TCPLISTENER class. Its
only role is to wait for incoming connection attempts on a given port, it can't
send or receive data."
);
code('
auto listener = new TcpListener();

// bind the listener to a port
if (listener.listen(53000) != Socket.Status.Done)
{
    // error...
}

// accept a new connection
TcpSocket client = new TcpSocket();
if (listener.accept(client) != Socket.Status.Done)
{
    // error...
}

// use "client" to communicate with the connected client,
// and continue to accept new connections with the listener
');
paragraph(
"The ".cl("accept")." function blocks until a connection attempt
arrives (unless the socket is configured as non-blocking). When it happens, it
initializes the given socket and returns. The socket can now be used to
communicate with the new client, and the listener can go back to waiting for
another connection attempt."
);
paragraph(
"After a successful call to ".cl("connect")." (on client side) and 
".cl("accept")." (on server side), the communication is established and both
sockets are ready to exchange data."
);

section("Binding a UDP socket");
paragraph(
"UDP sockets need not be connected, however you need to bind them to a specific
port if you want to be able to receive data on that port. A UDP socket cannot
receive on multiple ports simultaneously."
);
code('
UdpSocket socket = new UdpSocket();

// bind the socket to a port
if (socket.bind(54000) != Socket.Status.Done)
{
    // error...
}
');
paragraph(
"After binding the socket to a port, it's ready to receive data on that port. If
you want the operating system to bind the socket to a free port automatically,
you can pass ".cl("Socket.AnyPort").", and then retrieve the chosen port with ".
cl("socket.getLocalPort()")."."
);
paragraph(
"UDP sockets that send data don't need to do anything before sending."
);

section("Sending and receiving data");
paragraph(
"Sending and receiving data is done in the same way for both types of sockets.
The only difference is that UDP has two extra arguments: the address and port of
the sender/recipient. There are two different functions for each operation: the
low-level one, that sends/receives a raw array of bytes, and the higher-level
one, which uses the $PACKET class. See the ".packet_link("tutorial on packets").
" for more details about this class. In this tutorial, we'll only explain the
low-level functions."
);
paragraph(
"To send data, you must call the send function with a pointer to the data that
you want to send, and the number of bytes to send."
);
code('
char[100] data = ...;

// TCP socket:
if (socket.send(data) != Socket.Status.Done)
{
    // error...
}

// UDP socket:
IpAddress recipient = new IpAddress("192.168.0.5");
unsigned short port = 54000;
if (socket.send(data, recipient, port) != Socket.Status.Done)
{
    // error...
}
');
paragraph(
"The ".cl("send")." functions take a ".cl("const(void)[]").", so you can pass
an array of anything. However, it is generally a bad idea to send something\
other than an array of bytes because native types with a size larger than 1 byte
are not guaranteed to be the same on every machine: Types such as ".cl("int")."
or ".cl("long")." may have a different size, and/or a different endianness.
Therefore, such types cannot be exchanged reliably across different systems.
This problem is explained (and solved) in the "
.packet_link("tutorial on packets")."."
);
paragraph(
"With UDP you can broadcast a message to an entire sub-network in a single call:
to do so you can use the special address ".cl("IpAddress.Broadcast")."."
);
paragraph(
"There's another thing to keep in mind with UDP: Since data is sent in datagrams
and the size of these datagrams has a limit, you are not allowed to exceed it.
Every call to ".cl("send")." must send less that ".
cl("UdpSocket.MaxDatagramSize")." bytes -- which is a little less than 2^16
(65536) bytes."
);
paragraph(
"To receive data, you must call the ".cl("receive")." function:"
);
code('
char[100] data;
size_t received;

// TCP socket:
if (socket.receive(data, data.length, received) != Socket.Status.Done)
{
    // error...
}
writeln("Received ", received, " bytes");

// UDP socket:
IpAddress sender;
ushort port;
if (socket.receive(data, data.length, received, sender, port) != Socket.Status.Done)
{
    // error...
}
writeln("Received ", received, " bytes from ", sender, " on port ", port);
');
paragraph(
"It is important to keep in mind that if the socket is in blocking mode, ".
cl("receive")." will wait until something is received, blocking the thread that
called it (and thus possibly the whole program)."
);
paragraph(
"The first two arguments specify the buffer to which the received bytes are to
be copied, along with its maximum size. The third argument is a variable that
will contain the actual number of bytes received after the function returns."
);
paragraph(
"With UDP sockets, the last two arguments will contain the address and port of
the sender after the function returns. They can be used later if you want to
send a response."
);
paragraph(
"These functions are low-level, and you should use them only if you have a very
good reason to do so. A more robust and flexible approach involves using
".packet_link("packets")."."
);

section("Blocking on a group of sockets");
paragraph(
"Blocking on a single socket can quickly become annoying, because you will most
likely have to handle more than one client. You most likely don't want socket A
to block your program while socket B has received something that could be
processed. What you would like is to block on multiple sockets at once, i.e.
waiting until ".em("any of them")." has received something. This is possible
with socket selectors, represented by the $SOCKETSELECTOR class."
);
paragraph(
"A selector can monitor all types of sockets: $TCPSOCKET, $UDPSOCKET, and
$TCPLISTENER. To add a socket to a selector, use its ".cl("add")." function:"
);
code('
auto socket = new TcpSocket();

SocketSelector selector = new Selector();
selector.add(socket);
');
important(
"A selector is not a socket container. It only keeps references to the sockets
that you add, it doesn't store them. There is no way to retrieve or count the
sockets that you put inside. Instead, it is up to you to have your own separate
socket storage (like an array or linked-list)."
);
paragraph(
"Once you have filled the selector with all the sockets that you want to
monitor, you must call its ".cl("wait")." function to wait until any one of them
has received something (or has triggered an error). You can also pass an
optional time out value, so that the function will fail if nothing has been
received after a certain period of time -- this avoids staying stuck forever if
nothing happens."
);
code('
if (selector.wait(seconds(10)))
{
    // received something
}
else
{
    // timeout reached, nothing was received...
}
');
paragraph(
"If the ".cl("wait")." function returns ".cl("true").", it means that one or
more socket(s) have received something, and you can safely call ".cl("receive").
" on the socket(s) with pending data without having them block. If the socket is
a $TCPLISTENER, it means that an incoming connection is ready to be accepted and
that you can call its accept function without having it block."
);
paragraph(
"Since the selector is not a socket container, it cannot return the sockets that
are ready to receive. Instead, you must test each candidate socket with the ".
cl("isReady")." function:"
);
code("
if (selector.wait(seconds(10)))
{
    // for each socket... <-- pseudo-code because I don't know how you store your sockets :)
    {
        if (selector.isReady(socket))
        {
            // this socket is ready, you can receive (or accept if it's a listener)
            socket.receive(...);
        }
    }
}
");
paragraph(
"You can have a look at the API documentation of the $SOCKETSELECTOR class for a
working example of how to use a selector to handle connections and messages from
multiple clients."
);
paragraph(
"As a bonus, the time out capability of ".cl("Selector::wait")." allows you to
implement a receive-with-timeout function, which is not directly available in
the socket classes, very easily:"
);
code('
Socket.Status receiveWithTimeout(TcpSocket socket, Packet packet, Time timeout)
{
    SocketSelector selector = new SocketSelector();
    selector.add(socket);
    if (selector.wait(timeout))
        return socket.receive(packet);
    else
        return Socket.Status.NotReady;
}
');

section("Non-blocking sockets");
paragraph(
"All sockets are blocking by default, but you can change this behaviour at any
time with the ".cl("setBlocking")." function."
);
code('
auto tcpSocket = new TcpSocket();
tcpSocket.setBlocking(false);

auto listenerSocket = new TcpListener();
listenerSocket.setBlocking(false);

auto udpSocket = new UdpSocket();
udpSocket.setBlocking(false);
');
paragraph(
"Once a socket is set as non-blocking, all of its functions always return
immediately. For example, receive will return with status ".
cl("Socket.Status.NotReady")." if there's no data available. Or, ".cl("accept").
" will return immediately, with the same status, if there's no pending
connection."
);
paragraph(
"Non-blocking sockets are the easiest solution if you already have a main loop
that runs at a constant rate. You can simply check if something happened on your
sockets in every iteration, without having to block program execution."
);
important(
"When using ".cl("TcpSocket")." in non-blocking mode, calls to ".cl("send")."
are not guaranteed to actually send all the data you pass to it, whether it be
as a ".cl("Packet")." or as raw data. Starting from DSFML 2.4, when sending raw
data over a non-blocking ".cl("TcpSocket").", always make sure to use the ".
cl("send(const(void[]) data, out size_t& sent)")." overload which returns the
number of bytes actually sent in the ".cl("sent")." out parameter after the
function returns. Regardless of whether you send ".cl("Packet")."s or raw data,
if only a part of the data was sent in the call, the return status will be ".
cl("Socket.Status.Partial")." to indicate a partial send. If ".
cl("Socket.Status.Partial")." is returned, you must make sure to handle the
partial send properly or else data corruption will occur. When sending raw data,
you must reattempt sending the raw data at the byte offset where the previous
send call stopped. When sending ".cl("Packet")."s, the byte offset is saved
within the ".cl("Packet")." itself. In this case, you must make sure to keep
attempting to send the exact same unmodified ".cl("Packet")." object over and
over until a status other than ".cl("Socket.Status.Partial")." is returned.
Constructing a new ".cl("Packet")." object and filling it with the same data
will not work, it must be the same object that was previously sent."
);
foot();
?>