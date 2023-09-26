<?php
require 'vendor/autoload.php';
use Workerman\Worker;


$worker = new Worker('websocket://127.0.0.1:8001');
$worker->count = 4;
// Emitted when new connection come
$worker->onConnect = function ($connection) {
    $connection->send('This message was sent from Backend(index.php), when server was started.');
    echo "New connection\n";
};

// Emitted when data received
$worker->onMessage = function ($connection, $data) {
    // if, server got message from frontend, server send message to Frontend $data
    $connection->send($data);
};

// Emitted when connection closed
$worker->onClose = function ($connection) {
    echo "Connection closed\n";
};

// Run worker
Worker::runAll();

