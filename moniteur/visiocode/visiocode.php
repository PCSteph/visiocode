<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
        <head>
                <title>Visio-code</title>
                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                <script type="text/javascript">
                function playvlc(tgt)
                {
                        var uri = "http://88.191.63.188:8080";
                        if (document.all) tgt += "_IE";
                        var tgt = document.getElementById(tgt);
                        if (document.all) tgt.playlist.add(uri,uri, new Array());
                        else     tgt.playlist.add(uri,uri, "");
                        tgt.playlist.play();
                }
                function reload(tgt)
                {
                        if (document.all) tgt += "_IE";
                        var tgt = document.getElementById(tgt);
                        tgt.playlist.play();
                }
                </script>
        </head>
       <body onload="playvlc('vlc1');playflash();">
                 <!--video en direct-->
                 <OBJECT id='vlc1_IE'  codeBase=http://sd-12936.dedibox.fr/telecharger/axvlc.cab height=240 width=320 classid=clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921>
                 <embed type="application/x-vlc-plugin" pluginspage="http://sd-12936.dedibox.fr/telecharger/vlc.exe" version="VideoLAN.VLCPlugin.2"
                     width="320"
                     height="240"
                     id="vlc1">
                 </embed>
                 </OBJECT>
                 <br><div id="retour"><input type="button" value="Relancer la vidéo" onclick="reload('vlc1')"></div>

        </body>
</html>

