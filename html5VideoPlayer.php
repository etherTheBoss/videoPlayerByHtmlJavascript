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

            #curentTimeText
            {
                float: right;
                color: azure;
            }

            #durentTimeText
            {
                float: right;
                color: azure;
            }

            #btwDandC
            {
                float: right;
                color: azure;
            }

            #muteBtn
            {
                float: right;
            }

        </style>
    </head>

    <body>
        <div id="videoPlayerBox">
            <video style="padding: 8px;" id="myVideo" autoplay width="95%" height="200px">
                <source src="animation.mp4">
                <source src="animation.ogg">
            </video>
            <div id="videoControlBar">
<!--                <span id="curentTimeText"></span> <span id="btwDandC">/</span> <span id="durentTimeText"></span><br>-->
                <input id="seekSlider" type="range" min="0" max="100" value="0" step="1" style="width: 100%;" />

                <button id="playPauseButton">pause</button>
                <span id="curentTimeText"></span> <span id="btwDandC">/</span> <span id="durentTimeText"></span><br>
                <button id="muteBtn">Mute</button>
                <input id="volumeSlider" type="range" min="0" max="100" value="100" step="1" style="width: 30%;" />
                <button id="fullScreen">[ &nbsp; ]</button>

            </div>
        </div>




        <script>

            var vid, playBtn, seekSlider, curentTimeText, durentTimeText, muteBtn, volumeSlider, fullScreen;


            function initializePlayer()
            {
//                OBJECT REFERENCE
                vid = document.getElementById('myVideo');
                playBtn = document.getElementById('playPauseButton');
                seekSlider = document.getElementById('seekSlider');
                curentTimeText = document.getElementById('curentTimeText');
                durentTimeText = document.getElementById('durentTimeText');
                muteBtn = document.getElementById('muteBtn');
                volumeSlider = document.getElementById('volumeSlider');
                fullScreen = document.getElementById('fullScreen');

//                EVENT LISTENER
                playBtn.addEventListener('click', playPause, false);
                seekSlider.addEventListener('change', vidSeek, false);
                vid.addEventListener('timeupdate', seekTimeUpdate, false);
                muteBtn.addEventListener('click', vidMute, false);
                volumeSlider.addEventListener('change', setVolume, false);
                fullScreen.addEventListener('click', toggleFullScreen, false);
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

            function vidSeek()
            {
                var seekTo = vid.duration * (seekSlider.value / 100);
                vid.currentTime = seekTo;
            }

            function seekTimeUpdate()
            {
                var newTime = vid.currentTime * (100 / vid.duration);
                seekSlider.value = newTime;

                var curmins = Math.floor(vid.currentTime / 60);
                var cursecs = Math.floor(vid.currentTime - curmins * 60);
                var durmins = Math.floor(vid.duration / 60);
                var dursecs = Math.floor(vid.duration - durmins * 60);
                if(cursecs < 10){ cursecs = "0"+cursecs; }
                if(dursecs < 10){ dursecs = "0"+dursecs; }
                if(curmins < 10){ curmins = "0"+curmins; }
                if(durmins < 10){ durmins = "0"+durmins; }
                curentTimeText.innerHTML = curmins+":"+cursecs;
                durentTimeText.innerHTML = durmins+":"+dursecs;
            }

            function vidMute()
            {
                if(vid.muted)
                {
                    vid.muted = false;
                    muteBtn.innerHTML = 'Mute';
                }
                else
                {
                    vid.muted = true;
                    muteBtn.innerHTML = 'Unmute';
                }
            }

            function setVolume()
            {
                vid.volume = volumeSlider.value / 100;
            }

            function toggleFullScreen()
            {
                if(vid.requestFullScreen){
                    vid.requestFullScreen();
                } else if(vid.webkitRequestFullScreen){
                    vid.webkitRequestFullScreen();
                } else if(vid.mozRequestFullScreen){
                    vid.mozRequestFullScreen();
                }
            }




        </script>
    </body>
</html>
