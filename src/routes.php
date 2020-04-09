<?php 

Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Core\Router::connect('/wesh', ['controller' => 'user', 'action' => 'filter']);
Core\Router::connect('/login', ['controller' => 'user', 'action' => 'displaylogin']);
Core\Router::connect('/user/login', ['controller' => 'user', 'action' => 'login']);


