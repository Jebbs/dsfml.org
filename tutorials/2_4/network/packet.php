<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("Using and extending packets");
section("Problems that need to be solved");
paragraph(
"Exchanging data on a network is more tricky than it seems. The reason is that
different machines, with different operating systems and processors, can be
involved. Several problems arise if you want to exchange data reliably between
these different machines."
);
paragraph(
'The first problem is the endianness. The endianness is the order in which a
particular processor interprets the bytes of primitive types that occupy more
than a single byte (integers and floating point numbers). There are two main
families: "big endian" processors, which store the most significant byte first,
and "little endian" processors, which store the least significant byte first.
There are other, more exotic byte orders, but you\'ll probably never have to
deal with them.'
);
paragraph(
'The problem is obvious: If you send a variable between two computers whose
endianness doesn\'t match, they won\'t see the same value. For example, the
16-bit integer "42" in big endian notation is 00000000 00101010, but if you send
this to a little endian machine, it will be interpreted as "10752".'
);
paragraph(
"The second problem is specific to how the TCP protocol works. Because it
doesn't preserve message boundaries, and can split or combine chunks of data,
receivers must properly reconstruct incoming messages before interpreting them.
Otherwise bad things might happen, like reading incomplete variables, or
ignoring useful bytes."
);
paragraph(
"You may of course face other problems with network programming, but these are
the lowest-level ones, that almost everybody will have to solve. This is the
reason why DSFML provides some simple tools to avoid them."
);

section("Packets");
paragraph(
"The two problems above (endianness and message boundaries) are solved by using
a specific class to pack your data: $PACKET. As a bonus, it provides a much
nicer interface than plain old byte arrays."
);
paragraph(
"Reading to and writing from a packet is performed using the template ".
cl("read")." and ".cl("write")." methods."
);
code('
// on sending side
short x = 10;
string s = "hello";
double d = 0.6;

Packet packet = new Packet();
packet.write(x);
packet.write(s);
packet.write(d);
');
code('
// on receiving side
short x;
string s;
double d;

packet.read(x);
packet.read(s);
packet.read(d);
');
paragraph(
"Unlike writing, reading from a packet can fail if you try to extract more bytes
than the packet contains. If a reading operation fails, the ".cl("read")."
function will return ".cl("false")."."
);
code("
if (packet.read(x))
{
    // ok
}
else
{
    // error, failed to read 'x' from the packet
}
");
paragraph(
"Sending and receiving packets is as easy as sending/receiving an array of
bytes: sockets have an overload of ".cl("send")." and ".cl("receive")." that
directly accept a $PACKET."
);
code("
// with a TCP socket
tcpSocket.send(packet);
tcpSocket.receive(packet);
");
code("
// with a UDP socket
udpSocket.send(packet, recipientAddress, recipientPort);
udpSocket.receive(packet, senderAddress, senderPort);
");
paragraph(
'Packets solve the "message boundaries" problem, which means that when you send
a packet on a TCP socket, you receive the exact same packet on the other end,
it cannot contain less bytes, or bytes from the next packet that you send.
However, it has a slight drawback: To preserve message boundaries, $PACKET has
to send some extra bytes along with your data, which implies that you can only
receive them with a $PACKET if you want them to be properly decoded. Simply put,
you can\'t send an DSFML/SFML packet to a non-DSFML/non-SFML packet recipient,
it has to use a DSFML/SFML packet for receiving too. Note that this applies to
TCP only, UDP is fine since the protocol itself preserves message boundaries.'
);

section("Extending packets to handle user types");
paragraph(
"Packets can read and write all the primitive types and the most common standard
types, but what about your own classes? You can make a type \"compatible\" with
$PACKET by providing an overload for read and write using D's ".
lnk("https://dlang.org/spec/function.html#pseudo-member", "UFCS")."."
);
code("
struct Character
{
    byte age;
    string name;
    float weight;
};

void write(Packet packet, ref const(Character) character)
{
    packet.write(character.age);
    packet.write(character.name);
    packet.write(character.weight);
}

bool read(Packet packet, ref Character character)
{
    return packet.read(character.age) && packet.read(character.name)
           && packet.read(character.weight);
}
");
paragraph(
"Now that these functions are defined, you can insert/extract a ".
cl("Character")." instance to/from a packet like any other primitive type:"
);
code("
Character bob;

...

packet.write(bob);
packet.read(bob);

");

section("Custom packets");
paragraph(
"Packets provide nice features on top of your raw data, but what if you want to
add your own features such as automatically compressing or encrypting the data?
This can easily be done by deriving from $PACKET and overriding the following
functions:"
);
ul(array(
cl("onSend").": called before the data is sent by the socket",
cl("onReceive").": called after the data has been received by the socket"
));
paragraph(
"These functions provide direct access to the data, so that you can transform
them according to your needs."
);
paragraph(
"Here is a mock-up of a packet that performs automatic
compression/decompression:"
);
code('
class ZipPacket : Packet
{
    override const(void)[] onSend()
    {
        auto srcData = getData();
        return compressTheData(srcData); // this is a fake function, of course :)
    }
    override void onReceive(const(void)[] data)
    {
        auto dstData = uncompressTheData(data); // this is a fake function, of course :)
        append(dstData);
    }
}
');
paragraph(
"Such a packet class can be used exactly like $PACKET. All your custom UFCS
functions will apply to them as well."
);
code("
auto packet = new ZipPacket();
packet.write(x);
packet.write(bob);
socket.send(packet);
");
foot();
?>