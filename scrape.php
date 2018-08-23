<?php
    error_reporting(0);
    $page = file_get_contents('message.html');
    $doc = new DOMDocument();
    $doc->loadHTML($page);

    $xpath = new DOMXPath($doc);

    $tags = $xpath->query('//div[@class="_3-96 _2pio _2lek _2lel"]');


    foreach ($tags as $tag) {
    echo trim($tag->nodeValue);
    echo "\n";
}    

  
?>
