<?php 

Core\Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Core\Router::connect('MVC_PiePHP/user/wesh', ['controller' => 'user', 'action' => 'filter']);