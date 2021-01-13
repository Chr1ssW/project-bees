<?php
$postdata = file_get_contents('php://input');
file_put_contents(
    'TMP.txt',
    $postdata . PHP_EOL,
    FILE_APPEND
);
echo 'ok';
