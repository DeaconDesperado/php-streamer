<?php
//CHANGE THESE VALUES FOR YOUR OWN EXAMPLE
define('REMOTE_HOST','streamer.loc');
define('REMOTE_PORT','8081');

if($_SERVER['REQUEST_METHOD'] =='GET'){
?>
   <h1>Socket forwarder example</h1>

   <p>Uses a combination of HTTP put and the <code>php://input</code> wrapper to stream a file to a remote host over a socket</p>
   
   <p>Please note you will need to set up hosts to run this example</p>

   <ol>
        <li>Make sure python and the python requests module are installed: <code>sudo pip install requests</code></li>
        <li>Set the hosts up, most likely at your localhost.  There are constants in the php file.  You will need to setup hosts in your hosts
                file as well.</li>
        <li>Run remote_server.py.  This is just an example service that will listen indefinitely on a socket on the machine it is run on.  It represents the remote
        service you'll be forwarding to.</li>
        <li>Run put.py.  This will fire an http request sending the included image file to whatever host you setup for the php.  The php
        will then open a socket to remote_server and stream it there... you should see the bytes of the image in your terminal for remote_server.py!</li>
   <ol>
<?
}else{

    $host = REMOTE_HOST;
    $port = REMOTE_PORT;

    $socket = socket_create(AF_INET,SOCK_STREAM,0) or die('Could not get socket');
    $bind = socket_connect($socket,$host,$port) or die('Could not bind socket');

    $fh = fopen('php://input','r');
    while(!feof($fh)){
        $part = fgets($fh,128);
        socket_write($socket,$part,128);
    }
    
    fclose($fh);
    socket_close($socket);

}
?>
