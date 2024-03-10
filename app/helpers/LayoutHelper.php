<?php

namespace Helpers;

class LayoutHelper
{
    public static function user_layout($view, $data = null)
    {
        view('layouts/UserHeader', $data);
        view("$view", $data);
        view('layouts/UserFooter', $data);
    }
}
