<?php

namespace App\Controllers;

use App\Core\App;
use App\Core\Router;

class PagesController
{
    // controller for each page
    // process data for each page
    // for GET requests return a view
    // post submit data to db
    // html forms only supports GET and POST, no PUT or PATCH

    public function index()
    {
        // GET
        $post = App::get('database')->getPost();

        return $this->view('index', ['post' => $post]);
    }

    public function about()
    {
        // GET
        $post = App::get('database')->getPost();

        return $this->view('about', ['post' => $post]);
    }

    public function contact()
    {
        // GET
        $post = App::get('database')->getPost();

        return $this->view('contact', ['post' => $post]);
    }

    public function admin()
    {
        // GET

        // returns values for each post into an array
        // view can then access $data and use as default values for form
        $data = [
            'home' => App::get('database')->getCurrentValues(''),
            'about' => App::get('database')->getCurrentValues('about'),
            'contact' => App::get('database')->getCurrentValues('contact')
        ];

        return $this->view('admin', $data);
    }

    public function page_404()
    {
        return $this->view('404');
    }

    public function updateHome()
    {
        // POST
        // post route for updating values
        // accepts new title, and new text,

        // id hardcoded because it stays constant for each post
        $Id = 1;

        // home page form will post here
        $params = [
            'title', $_POST['new_title'],
            'text', $_POST['new_text'],
            'id', $Id,
        ];

        // call update from querybuilder with home ID
        App::get('database')->update('mytodo.pages', $params);

        // redirect to relevant page
        Router::redirect('/');
    }

    public function updateAbout()
    {
        // POST

        // id hardcoded because it stays constant
        $Id = 2;

        // about page form will post here
        $params = [
            'title', $_POST['new_title'],
            'text', $_POST['new_text'],
            'id', $Id,
        ];

        // call update with about ID
        App::get('database')->update('mytodo.pages', $params);

        // redirect to relevant page
        Router::redirect('/about');
    }

    public function updateContact()
    {
        // POST

        // id hardcoded because it stays constant
        $Id = 3;

        // home page form will post here
        $params = [
            'title', $_POST['new_title'],
            'text', $_POST['new_text'],
            'id', $Id,
        ];

        // call update with contact ID
        App::get('database')->update('mytodo.pages', $params);

        // redirect to relevant page
        Router::redirect('/contact');
    }

    public function view(string $name, array $data = [])
    {
        // helper method to render views in a more readable way
        extract($data);

        return require "views/{$name}.view.php";
    }
}
