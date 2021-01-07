<?php
// Caminho dos arquivos de visão
Container::set('app.view.path', __DIR__ . '/App/Views/');

// URL da aplicação
Container::set('app.url', 'http://localhost:8000');

// Dados de acesso ao banco de dados
Container::set('app.db.config', [
    'sgdb' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'agenda',
    'user' => 'root',
    'password' => ''
]);

// Rotas
Container::set('app.routes', require __DIR__ . '/App/Routes.php');

// Classes
Container::set('base.database.db', function() {
    $data = array_values(Container::get('app.db.config'));
    return new Foundation\Database\Db(...$data);
});

Container::set('base.http.session', new Foundation\Http\Session());
Container::set('base.http.input', new Foundation\Http\Input());
Container::set('base.http.redirect', new Foundation\Http\Redirect());
Container::set('base.html.assets', new Foundation\Html\Assets());
Container::set('base.html.url', new Foundation\Html\Url());
Container::set('base.html.date', new Foundation\Html\Date());
