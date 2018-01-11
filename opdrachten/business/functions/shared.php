<?php

include_once 'db/db.php';
function page_show($content){
    require_once __DIR__.'/../template/template.php';
}


function show404(){
    return page_show('<section class="fullwidth">Error 404</section>');
}

