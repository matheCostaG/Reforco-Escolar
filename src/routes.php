<?php
// Routes

$app->get('/', 'appcontroller:index');
$app->get('/login', 'appcontroller:login');
$app->map(['GET', 'POST'],'/cadastro', 'usercontroller:cadastrar');
$app->get('/cadastroquestao', 'appcontroller:cadastroQuestao');