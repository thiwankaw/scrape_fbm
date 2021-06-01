<?php

  error_reporting(E_ALL ^ E_WARNING);
  $path='/Users/thiwanka/Downloads/2021_05/messages/inbox/';

  //$path='/Volumes/disk/messages/2007/messages/inbox/';


  $dir = new DirectoryIterator($path);
  foreach ($dir as $fileinfo) {
      if ($fileinfo->isDir() && !$fileinfo->isDot()) {
          $folder =  $fileinfo->getFilename();
          checkFolder($folder , $path);
      }
  }


  function checkFolder($folderName,$path) {
      $fullPath =  $path . $folderName . '/message_1.html';
      echo $folderName. ',';
      //echo "\n";
      checkMessages($fullPath);

  }

  function checkMessages($folderName) {
      $page = file_get_contents($folderName);
          $doc = new DOMDocument();
          $doc->loadHTML($page);
          $xpath = new DOMXPath($doc);
          $title= $xpath->query('//title');

          foreach ($title as $tag){
          echo $tag->nodeValue.',' ;
          }

          $tags = $xpath->query('//div[@class="_3-96 _2let"]');
          $lines = 0;
          foreach ($tags as $tag) {
          $lines = $lines + 1;

        }

        echo $lines;

        echo "\n";
  }


?>
