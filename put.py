import requests

data = open('ahri.jpg').read()

resp = requests.put('http://streamer.loc',data)
print resp.content

