<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
</head>

<body>
    <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto"
        height="600" width="980">

        <source src="{{url($video)}}" type="{{$mime}}" />
    </video>

    <script src="//vjs.zencdn.net/4.12/video.js"></script>

    <script>
        videojs(document.getElementById('example_video_1'), {}, function() {
            // This is functionally the same as the previous example.
        });
    </script>
</body>

</html>
