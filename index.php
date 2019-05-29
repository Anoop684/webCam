<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>Cam</title>
 </head>
 <body>
<?php include "index2.php"; ?>
   <script>
     'use script';
     const video = document.getElementById('video');
     const canvas = document.getElementById('canvas');
     const snap = document.getElementById('snap');
     const errorMsgElement = document.getElementById('snap#ErrorMsg');

     const constraints ={
      audio:true,
      video:{
        width:1280,height:720
      }
     };
     async function init(){
      try{
        const stream=await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
      }
      catch(e){
        errorMsgElement.innerHTML=`navigator.getUserMedia.error:${e.toString()}`;
      }
     }

     function handleSuccess(stream){
      window.stream=stream;
      video.srcObject=stream;
     }

     init();

     var context=canvas.getContext('2d');
     snap.addEventListener("click",function(){
      context.drawImage(video,0,0,640,480);
     });

   </script>
 </body>
 </html> 