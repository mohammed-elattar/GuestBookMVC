<?php

// white list routes

use System\Application;

$app = Application::getInstance();

if (strpos($app->request->url(), '/admin') === 0 ) {
    // check if the current url started with /admin
    // if so, then call our middlewares
    $app->route->callFirst(function ($app) {
        $app->load->action('Admin/Access', 'index');
    });

    // share admin layout
    $app->share('adminLayout', function ($app) {
        return $app->load->controller('Admin/Common/Layout');
    });
} else {
    // share Blog layout
    $app->share('blogLayout', function ($app) {
        return $app->load->controller('Blog/Common/Layout');
    });

    // share|load settings for each request
    $app->share('settings', function ($app) {
        $settingsModel = $app->load->model('Settings');

        $settingsModel->loadAll();

        return $settingsModel;
    });
}

// Admin Routes
$app->route->add('/admin/login', 'Admin/Login');
$app->route->add('/admin/login/submit', 'Admin/Login@submit', 'POST');


// dashboard
$app->route->add('/admin' , 'Admin/Dashboard');
$app->route->add('/admin/dashboard' , 'Admin/Dashboard');
$app->route->add('/admin/submit' , 'Admin/Dashboard@submit', 'POST');

// admin => users
$app->route->add('/admin/users', 'Admin/Users');
$app->route->add('/admin/users/add', 'Admin/Users@add', 'POST');
$app->route->add('/admin/users/submit', 'Admin/Users@submit', 'POST');
$app->route->add('/admin/users/edit/:id', 'Admin/Users@edit', 'POST');
$app->route->add('/admin/users/save/:id', 'Admin/Users@save' , 'POST');
$app->route->add('/admin/users/delete/:id', 'Admin/Users@delete', 'POST');


// admin => users groups
$app->route->add('/admin/users-groups', 'Admin/UsersGroups');
$app->route->add('/admin/users-groups/add', 'Admin/UsersGroups@add', 'POST');
$app->route->add('/admin/users-groups/submit', 'Admin/UsersGroups@submit', 'POST');
$app->route->add('/admin/users-groups/edit/:id', 'Admin/UsersGroups@edit', 'POST');
$app->route->add('/admin/users-groups/save/:id', 'Admin/UsersGroups@save' , 'POST');
$app->route->add('/admin/users-groups/delete/:id', 'Admin/UsersGroups@delete', 'POST');

// admin => Guest book posts
$app->route->add('/admin/guestbook', 'Admin/GuestBook');
$app->route->add('/admin/guestbook/submit', 'Admin/GuestBook@submit', 'POST');
$app->route->add('/admin/guestbook/edit/:id', 'Admin/GuestBook@edit', 'POST');
$app->route->add('/admin/guestbook/save/:id', 'Admin/GuestBook@save' , 'POST');

// Admin settings
$app->route->add('/admin/settings', 'Admin/Settings');
$app->route->add('/admin/settings/save', 'Admin/Settings@save', 'POST');

// logout
$app->route->add('/admin/logout', 'Admin/Logout');


// Blog Routes
$app->route->add('/', 'Blog/Home'); // Home Page
$app->route->add('/register', 'Blog/Register');
$app->route->add('/guestbook/submit', 'Blog/GuestBook@submit','POST');
$app->route->add('/guestbook', 'Blog/GuestBook');
$app->route->add('/guestbook/create', 'Blog/GuestBook@createPost');
$app->route->add('/register/submit', 'Blog/Register@submit', 'POST');
$app->route->add('/login', 'Blog/Login');
$app->route->add('/login/submit', 'Blog/Login@submit', 'POST');
$app->route->add('/logout', 'Blog/Logout');

// Not Found Routes
$app->route->add('/404', 'NotFound');
$app->route->notFound('/404');
