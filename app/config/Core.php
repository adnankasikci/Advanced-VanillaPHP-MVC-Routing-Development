<?php

use Config\Functions;
use Config\Router;
use Helpers\LayoutHelper;

function base_url($uri)
{
    return Functions::base_url($uri);
}

function base_path($path)
{
    return Functions::base_path($path);
}

//File Import
function view($path, $data = null)
{
    return Functions::view($path, $data);
}
function model($path)
{
    Functions::model($path);
    return new UserModel();;
}
function user_layout($view, $data = null)
{
    LayoutHelper::user_layout($view, $data);
}

$router = new Router();
