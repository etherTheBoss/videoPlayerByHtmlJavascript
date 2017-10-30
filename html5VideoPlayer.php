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
                <button id="playPauseButton">pause</button>
            </div>
        </div>




        <script>

            var vid, playBtn;


            function initializePlayer()
            {
                vid = document.getElementById('myVideo');
                playBtn = document.getElementById('playPauseButton');

                playBtn.addEventListener('click', playPause, false);
            }


            window.onload = initializePlayer;
            function playPause()
            {

                if(vid.paused)
                {
                    vid.play();
                    playBtn.innerHTML = 'pause';
                }
                else
                {
                    vid.pause();
                    playBtn.innerHTML = 'play';
                }
                
            }
        </script>
    </body>
</html>
