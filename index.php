<?php
echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD'] =='GET'){
?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="/xhr.js"></script>

    <form method="post" action="<?=$_SERVER['PHP_SELF'];?>" enctype="multipart/form-data"/>
        <input type="file" name="uploaded_file"/>
        <button type="submit">Send</button>
    </form>
    
<?
}else{

    $host = 'streamer.loc';
    $port = '8081';

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
