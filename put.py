import requests

#Set this host to whatever your php virtualhost is
REMOTE_HOST = 'http://streamer.loc'

data = open('ahri.jpg').read()

resp = requests.put('http://streamer.loc',data)
print resp.content

