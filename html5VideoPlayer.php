<?php
/**
 * Created by
 * HABIBUR RAHMAN.
 * Sr.Software Engineer
 * User: Habib
 * Date: 10/18/2017
 * Time: 5:02 PM
 * SOURCE : YOUTUBE https://www.youtube.com/watch?v=V8_wEZD160g
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Habib Video Player</title>

        <style>

            div#videoControlBar
            {
                background: #333;
                padding: 10px;
            }

            div#videoPlayerBox
            {
                background: #000;
                width: 40%;
            }

        </style>
    </head>

    <body>
        <div id="videoPlayerBox">
            <video style="padding: 8px;" id="myVideo" autoplay controls="controls" width="95%" height="200px">
                <source src="animation.mp4">
                <source src="animation.ogg">
            </video>
            <div id="videoControlBar">
                <button id="playPauseButton" onclick="playPause(this, 'myVideo')">pause</button>
            </div>
        </div>




        <script>
            function playPause(btn, vid){

                var vid = document.getElementById(vid);
                if(vid.paused)
                {
                    vid.play();
                    btn.innerHTML = 'pause';
                }
                else
                {
                    vid.pause();
                    btn.innerHTML = 'play';
                }
                
            }
        </script>
    </body>
</html>
