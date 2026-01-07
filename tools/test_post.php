<?php
$data = json_encode(['name'=>'Test Coffee','price'=>2.5,'description'=>'Test','categorie'=>1]);
$opts = [
    'http'=>[
        'method'=>'POST',
        'header'=>'Content-Type: application/json',
        'content'=>$data,
    ],
];
$ctx = stream_context_create($opts);
 $response = @file_get_contents('http://127.0.0.1:8000/api/menu-items', false, $ctx);
if ($response === false) {
    echo "Request failed\n";
    if (isset($http_response_header)) {
        echo implode("\n", $http_response_header) . "\n";
    }
} else {
    echo $response . "\n";
    if (isset($http_response_header)) {
        echo implode("\n", $http_response_header) . "\n";
    }
}
