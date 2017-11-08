<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function indexAction()
    {
        if (Auth::check()) {
            return $this->redirect($this->redirectTo);
        }

        return $this->redirect('/#/sign-in');
    }

    public function loginAction()
    {
        $login = $this->request->post('login');
        if (strstr($login,"@")) {
            $attributes["email"] = $login;
        } else {
            $attributes["name"] = $login;
        }

        $attributes["password"] = $this->request->post('password');

        $success = auth()->attempt($attributes, true);

        if (!$success) {
            return $this->json([
                "errors" => [
                    "login" => "Incorrect login or password",
                ],
            ], 400);
        }

        return $this->json([
            "land-to" => $this->redirectTo,
        ]);
    }

    public function logoutAction()
    {
        $this->guard()->logout();

        return $this->redirect(route("home"));
    }

}
