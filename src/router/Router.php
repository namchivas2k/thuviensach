<?php

$authMiddleware = function ($req, $res, $next) {
    if (!AuthService::isLogin()) {
        $res->redirect('/dang-nhap')->end();
    } else {
        $next();
    }
};


ROUTER::get('/', $authMiddleware, function ($req, $res) {
    $res->render('home')->end();
});


ROUTER::get('/tat-ca-sach', $authMiddleware, function ($req, $res) {
    $query = $req->query()['q'] ?? "";
    $books = BookService::search($query);

    $res->render('books', array(
        'books' => $books
    ))->end();
});


ROUTER::get('/sach-da-muon', $authMiddleware, function ($req, $res) {
    $borroweds = BookService::getBorrow();

    $res->render('borrowed', array(
        'borrowed' => $borroweds
    ))->end();
});


ROUTER::post('/muon-sach', $authMiddleware, function ($req, $res) {
    $data = $req->bodyJSON();
    if ($data['id']) {
        $res->send(BookService::borrow($data))->end();
    }
});

ROUTER::post('/tra-sach', $authMiddleware, function ($req, $res) {
    $data = $req->bodyJSON();

    // print_r($data);

    $res->send(BookService::deleteBorrow($data))->end();
});


ROUTER::get('/dang-nhap', function ($req, $res) {
    if (AuthService::isLogin()) {
        $res->redirect('/')->end();
    }
    require_once(VIEW_DIR . '/login.view.php');
    $res->end();
});


ROUTER::post('/dang-nhap', function ($req, $res) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (AuthService::login($username, $password)) {
        $res->redirect("/")->end();
    } else {
        $res->redirect("/dang-nhap")->end();
    }

    $res->end();
});


ROUTER::any('/dang-xuat', function ($req, $res) {
    $res->clearSession();
    $res->clearCookies();
    $res->redirect('/dang-nhap')->end();
});


ROUTER::any('*', function ($req, $res) {
    $res->setStatus(404)->render('404')->end();
});
