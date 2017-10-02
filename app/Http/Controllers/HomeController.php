<?php
/**
 * Created by PhpStorm.
 * User: ddi-pc-52
 * Date: 10/2/17
 * Time: 2:42 PM
 */

namespace App\Http\Controllers;

class HomeController extends Controller
{
    protected $loginPath = '/auth/sign-in?land-to=home';

    public function indexAction()
    {
        return "<p align='center'></p>";
    }

}
