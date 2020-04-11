<?php 

Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Core\Router::connect('/wesh', ['controller' => 'user', 'action' => 'filter']);
Core\Router::connect('/login', ['controller' => 'user', 'action' => 'displaylogin']);
Core\Router::connect('/user/login', ['controller' => 'user', 'action' => 'login']);

Core\Router::connect('/test', ['controller' => 'user', 'action' => 'test']);

Core\Router::connect('/read', ['controller' => 'user', 'action' => 'read']);

Core\Router::connect('/update', ['controller' => 'user', 'action' => 'update']);

Core\Router::connect('/delete', ['controller' => 'user', 'action' => 'delete']);

