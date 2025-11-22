<?php
$opts = ['http' => ['method' => 'GET', 'ignore_errors' => true]];
$ctx = stream_context_create($opts);
$r = @file_get_contents('http://127.0.0.1:8000/api/categories', false, $ctx);
if (isset($http_response_header)) echo implode("\n", $http_response_header) . "\n\n";
echo $r;
