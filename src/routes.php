<?php 

// use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/user/salut', ['controller' => 'user', 'action' => 'filter']);