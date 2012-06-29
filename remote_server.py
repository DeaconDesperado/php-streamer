import socket
#create an INET, STREAMing socket
serversocket = socket.socket(
    socket.AF_INET, socket.SOCK_STREAM)
#bind the socket to a public host,
# and a well-known port
serversocket.bind((socket.gethostname(), 8081))
#become a server socket
serversocket.listen(5)

while 1:
    #accept connections from outside
    (clientsocket, address) = serversocket.accept()
    #now do something with the clientsocket
    #in this case, we'll pretend this is a threaded server
    data = ""

    while True:
        line=clientsocket.recv(128) 
        if line == "":
            break
        print 'recving'
        data+=line
    print data
    
