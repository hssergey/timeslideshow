<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: black;
            width: 960px;
            height: 500px;
        }
        #time {
            color: rgb(6, 223, 89);
            position: absolute;
            top: 0px;
            left: 0px;
            font-size: 380px;
            font-weight: 500;
            -webkit-text-stroke: 5px white;
        }
        #files {
            position: absolute;
        }
        #image {
            height: 500px;
            display: block;
        }
    </style>
    <script type="text/javascript">
        var screenWidth = 960;
        var images = new Array();
        <?php
        $images = glob("images/*.*");
        foreach($images as $image) {
//             $parts = explode("/", $image);
//             $dir = $parts[0];
//             $filename = $parts[1];
//             $parts = explode(".", $filename);
//             if(count($parts) > 1) {
//                 $image = $dir . "/" . urlencode($parts[0]) . "." . $parts[1];
//             }
            print('images.push("'. $image . '");');
        }
        ?>

        function setTime() {
            var today = new Date();
            var hours = today.getHours() + "";
            if(hours.length < 2) {
                hours = "0" + hours;
            }
            var minutes = today.getMinutes() + "";
            if(minutes.length < 2) {
                minutes = "0" + minutes;
            }
            var time = hours + ":" + minutes;
            document.getElementById("time").innerHTML = time;
        }

        function setImage() {
            index = Math.floor(Math.random() * images.length);
            image = images[index];
            document.getElementById('image').src = image;
        }

        function onLoad() {
            setTime();
            setInterval(setTime, 60000);
            
            var image = document.getElementById('image');
            image.onload = function() {
                var imageWidth = image.clientWidth;
                // console.log(imageWidth);
                offset = parseInt((screenWidth - imageWidth) / 2);
                image.style.marginLeft = offset + "px";
            };
            
            setImage();
            setInterval(setImage, 20000);
            
        }
        
    </script>

</head>

<body onload="onLoad()">
    <div id="time"></div>
    <img id="image" />
</body>

</html>
