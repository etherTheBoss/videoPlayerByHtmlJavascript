<?php
/**
 * Created by
 * HABIBUR RAHMAN.
 * Sr.Software Engineer
 * User: Habib
 * Date: 10/18/2017
 * Time: 5:02 PM
 * SOURCE : YOUTUBE https://www.youtube.com/watch?v=BuaIDNu_pPg
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Habib Video Player</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" >

        <style>



            /*div#videoControlBar*/
            /*{*/
                /*background: #333;*/
                /*padding: 10px;*/
            /*}*/

            /*div#videoPlayerBox*/
            /*{*/
                /*background: #000;*/
                /*width: 40%;*/
            /*}*/

            /*#curentTimeText*/
            /*{*/
                /*float: right;*/
                /*color: azure;*/
            /*}*/

            /*#durentTimeText*/
            /*{*/
                /*float: right;*/
                /*color: azure;*/
            /*}*/

            /*#btwDandC*/
            /*{*/
                /*float: right;*/
                /*color: azure;*/
            /*}*/

            /*#muteBtn*/
            /*{*/
                /*float: right;*/
            /*}*/

            video::-webkit-media-controls-enclosure
            {
                display:none !important;
            }




        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <video id="myVideo" autoplay width="100%" height="200px">
                            <source src="animation.mp4">
                            <source src="animation.ogg">
                        </video>
                    </div>

                    <div align="center" style="background: rgba(43, 28, 11, 0.4); border: 1px solid #fdf7f7; height: 51px; padding: 2px;">
                        <span style="font-size: 10px; float: right !important;" id="curentTimeText"></span> <span style="font-size: 10px; float: right !important;" id="btwDandC">/</span> <span style="font-size: 10px; float: right !important;" id="durentTimeText"></span>
                        <span id="playPauseButton"><i style=" font-size: .7em; float: left !important;" class="fa fa-pause" aria-hidden="true"></i></span>
                        <span style="float: right !important; margin-right: 2%; hight:2%;" id="fullScreen"><i style=" font-size: .6em;" class="fa fa-arrows-alt" aria-hidden="true"></i></span>
                        <br/>

                        <input id="seekSlider" type="range" min="0" max="100" value="0" step="1" style="width: 60%; float: left !important;" />

                        <span>
<!--                            <span style="float: right !important; margin-left: 2%;" id="fullScreen"><i style=" font-size: .7em;" class="fa fa-arrows-alt" aria-hidden="true"></i></span>-->
                            <input id="volumeSlider" type="range" min="0" max="100" value="50" step="1" style="width: 20%;float: right !important;" />
                            <span style="float: right !important; margin-right: 2%;" id="muteBtn"><i style=" font-size: .7em;" class="fa fa-volume-up" aria-hidden="true"></i></span>
                        </span>
                    </div>
                </div>


            </div>

        </div>














<!--        <div id="videoPlayerBox">-->
<!--            <video style="padding: 8px;" id="myVideo" autoplay width="95%" height="200px">-->
<!--                <source src="animation.mp4">-->
<!--                <source src="animation.ogg">-->
<!--            </video>-->
<!--            <div id="videoControlBar">-->
<!--                <input id="seekSlider" type="range" min="0" max="100" value="0" step="1" style="width: 100%;" />-->
<!--                <button id="playPauseButton">pause</button>-->
<!--                <span id="curentTimeText"></span> <span id="btwDandC">/</span> <span id="durentTimeText"></span><br>-->
<!--                <button id="muteBtn">Mute</button>-->
<!--                <input id="volumeSlider" type="range" min="0" max="100" value="100" step="1" style="width: 30%;" />-->
<!--                <button id="fullScreen">[ &nbsp; ]</button>-->
<!---->
<!--            </div>-->
<!--        </div>-->




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
                    playBtn.innerHTML = '<i style="font-size: .7em; float: left !important;" class="fa fa-pause" aria-hidden="true"></i>';
                }
                else
                {
                    vid.pause();
                    playBtn.innerHTML = '<i style="font-size: .7em; float: left !important;" class="fa fa-play" aria-hidden="true"></i>';
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
                    muteBtn.innerHTML = '<i style="font-size: .7em;" class="fa fa-volume-up" aria-hidden="true"></i>';
                    volumeSlider.value = 100;
                }
                else
                {
                    vid.muted = true;
                    muteBtn.innerHTML = '<i style="font-size: .7em; " class="fa fa-volume-off" aria-hidden="true"></i>';
                    volumeSlider.value = 0;
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
