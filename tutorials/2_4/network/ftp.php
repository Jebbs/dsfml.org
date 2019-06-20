<?php
include $_SERVER['DOCUMENT_ROOT'].'/site_builder.php';
head("File transfers with FTP");
section("FTP for dummies");
paragraph(
"If you know what FTP is, and just want to know how to use the FTP class that
DSFML provides, you can skip this section."
);
paragraph(
"FTP (".em("File Transfer Protocol").') is a simple protocol that allows
manipulation of files and directories on a remote server. The protocol consists
of commands such as "create directory", "delete file", "download file", etc. You
can\'t send FTP commands to any remote computer, it needs to have an FTP server
running which can understand and execute the commands that clients send.'
);
paragraph(
"So what can you do with FTP, and how can it be helpful to your program?
Basically, with FTP you can access existing remote file systems, or even create
your own. This can be useful if you want your network game to download resources
(maps, images, ...) from a server, or your program to update itself
automatically when it's connected to the internet."
);
paragraph(
"If you want to know more about the FTP protocol, the ".
lnk("http://en.wikipedia.org/wiki/File_Transfer_Protocol","Wikipedia article").
" provides more detailed information than this short introduction."
);

section("The FTP client class");
paragraph(
"The class provided by DSFML is $FTP (surprising, isn't it?). It's a client,
which means that it can connect to an FTP server, send commands to it and upload
or download files."
);
paragraph(
"Every function of the $FTP class wraps an FTP command, and returns a standard
FTP response. An FTP response contains a status code (similar to HTTP status
codes but not identical), and a message that informs the user of what happened.
FTP responses are encapsulated in the $FTPRESPONSE class."
);
code('
import dsfml.network;

auto ftp = new Ftp();
...
Ftp.Response response = ftp.login(); // just an example, could be any function

writeln("Response status: ", response.getStatus());
writeln("Response message: ", response.getMessage());
');
paragraph(
"The status code can be used to check whether the command was successful or
failed: Codes lower than 400 represent success, all others represent errors. You
can use the ".cl("isOk()")." function as a shortcut to test a status code for success."
);
code('
Ftp.Response response = ftp.login();
if (response.isOk())
{
    // success!
}
else
{
    // error...
}
');
paragraph(
"If you don't care about the details of the response, you can check for success
with even less code:"
);
code('
if (ftp.login().isOk())
{
    // success!
}
else
{
    // error...
}
');
paragraph(
"For readability, these checks won't be performed in the following examples in
this tutorial. Don't forget to perform them in your code!"
);
paragraph(
"Now that you understand how the class works, let's have a look at what it can
do."
);

section("Connecting to the FTP server");
paragraph(
"The first thing to do is connect to an FTP server."
);
code('
auto ftp = new Ftp();
ftp.connect("ftp.myserver.org");
');
paragraph(
"The server address can be any valid $IPADDRESS: A URL, an IP address, a network
name, ..."
);
paragraph(
"The standard port for FTP is 21. If, for some reason, your server uses a
different port, you can specify it as an additional argument:"
);
code('
auto ftp = new Ftp();
ftp.connect("ftp.myserver.org", 45000);
');
paragraph(
"You can also pass a third parameter, which is a time out value. This prevents
you from having to wait forever (or at least a very long time) if the server
doesn't respond."
);
code('
auto ftp = new Ftp();
ftp.connect("ftp.myserver.org", 21, seconds(5));
');
paragraph(
"Once you're connected to the server, the next step is to authenticate
yourself:"
);
code('
// authenticate with name and password
ftp.login("username", "password");

// or login anonymously, if the server allows it
ftp.login();
');

section("FTP commands");
paragraph(
"Here is a short description of all the commands available in the $FTP class.
Remember one thing: All these commands are performed relative to the ".
cl("current working directory").", exactly as if you were executing file or
directory commands in a console on your operating system."
);
paragraph(
"Getting the current working directory:"
);
code('
Ftp.DirectoryResponse response = ftp.getWorkingDirectory();
if (response.isOk())
    writeln("Current directory: ", response.getDirectory());
');
paragraph(
"$FTPDIRECTORYRESPONSE is a specialized $FTPRESPONSE that also contains the
requested directory."
);
paragraph(
"Getting the list of directories and files contained in the current directory:"
);
code('
Ftp.ListingResponse response = ftp.getDirectoryListing();
if (response.isOk())
{
    const(string) listing = response.getFilenames();
    for (file : listing)
        writeln("- ", file);
}

// you can also get the listing of a sub-directory of the current directory:
response = ftp.getDirectoryListing("subfolder");
');
paragraph(
"$FTPLISTINGRESPONSE is a specialized $FTPRESPONSE that also contains the
requested directory/file names."
);
paragraph(
"Changing the current directory:"
);
code('
// the given path is relative to the current directory
ftp.changeDirectory("path/to/new_directory");
');
paragraph(
"Going to the parent directory of the current one:"
);
code('
ftp.parentDirectory();
');
paragraph(
"Creating a new directory (as a child of the current one):"
);
code('
ftp.createDirectory("name_of_new_directory");
');
paragraph(
"Deleting an existing directory:"
);
code('
ftp.deleteDirectory("name_of_directory_to_delete");
');
paragraph(
"Renaming an existing file:"
);
code('
ftp.renameFile("old_name.txt", "new_name.txt");
');
paragraph(
"Deleting an existing file:"
);
code('
ftp.deleteFile("file_name.txt");
');
paragraph(
"Downloading (receiving from the server) a file:"
);
code('
ftp.download("remote_file_name.txt", "local/destination/path", Ftp.TransferMode.Ascii);
');
paragraph(
"The last argument is the transfer mode. It can be either Ascii (for text
files), Ebcdic (for text files using the EBCDIC character set) or Binary (for
non-text files). The Ascii and Ebcdic modes can transform the file (line
endings, encoding) during the transfer to match the client environment. The
Binary mode is a direct byte-for-byte transfer."
);
paragraph(
"Uploading (sending to the server) a file:"
);
code('
ftp.upload("local_file_name.pdf", "remote/destination/path", Ftp.TransferMode.Binary);
');
paragraph(
"FTP servers usually close connections that are inactive for a while. If you
want to avoid being disconnected, you can send a no-op command periodically:"
);
code('
ftp.keepAlive();
');

section("Disconnecting from the FTP server");
paragraph(
"You can close the connection with the server at any moment with the disconnect
function."
);
code('
ftp.disconnect();
');
foot();
?>