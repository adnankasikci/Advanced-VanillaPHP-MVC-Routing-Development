<?php


class HomeController
{
    public function index()
    {
        $data = [
            'title' => 'Anasayfa | Adnan Frameworks',
            'description' => 'MVC kullanarak geliştirdiğim bir framework üzerine alıp geliştirmeler yapabilirsini'
        ];
        user_layout('Home', $data);
    }
}
