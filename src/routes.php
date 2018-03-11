<?php
// Routes

$app->get('/', 'appcontroller:paginaIncial');
$app->get('/index', 'appcontroller:paginaIncialUsuario');
$app->map(['GET', 'POST'],'/cadastro', 'usercontroller:cadastrar');
$app->get('/cadastroquestao', 'appcontroller:cadastroQuestao');
$app->map( ['GET', 'POST'],'/login', 'usercontroller:logar');