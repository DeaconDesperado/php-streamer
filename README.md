# Socket forwarder example

   Uses a combination of HTTP put and the <code>php://input</code> wrapper to stream a file to a remote host over a socket
   
   Please note you will need to set up hosts to run this example

1. Make sure python and the python requests module are installed: sudo pip install requests
2. Set the hosts up, most likely at your localhost.  There are constants in the php file.  You will need to setup hosts in your hosts file as well.
3. Run remote_server.py.  This is just an example service that will listen indefinitely on a socket on the machine it is run on.  It represents the remote service you'll be forwarding to.
4. Run put.py.  This will fire an http request sending the included image file to whatever host you setup for the php.  The php will then open a socket to remote_server and stream it there... you should see the bytes of the image in your terminal for remote_server.py!
