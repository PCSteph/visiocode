<?PHP
system("ffmpeg -i http://sd-12936.dedibox.fr:8080/stream.ts -acodec libmp3lame -b 300k -s 320x240 -ab 36k -ar 11025 -y  -f flv -");
?>

