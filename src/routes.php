<?php
// Routes

$app->get('/', 'appcontroller:index');
$app->get('/login', 'appcontroller:login');
$app->get('/cadastro', 'appcontroller:cadastro');
$app->get('/cadastroquestao', 'appcontroller:cadastroQuestao');