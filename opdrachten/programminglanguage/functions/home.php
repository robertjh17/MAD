<?php


function show(){
    $content = file_get_contents(__DIR__.'/../template/home.php');
    return page_show($content);
}