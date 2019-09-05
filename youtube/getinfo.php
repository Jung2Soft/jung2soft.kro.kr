<?php

$videoid = 'VIDEO_ID';
$apikey = 'AIzaSyACrFhEDDnknLz96rSYWwCo33t2_yt0GbI';

$json = file_get_contents('https://www.googleapis.com/youtube/v3/videos?id='.$videoid.'&key='.$apikey.'&part=snippet');
$ytdata = json_decode($json);

echo '<h1>Title: ' . $ytdata->items[0]->snippet->title . '</h1>';
echo 'Description: ' . $ytdata->items[0]->snippet->description;
