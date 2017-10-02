<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function loginAction()
    {
        $success = $this->attemptLogin($this->request);

        if (!$success) {
            return $this->json([
                "login" => "Incorrect login or password",
            ], 400);
        }

        return $this->redirect();
    }

    public function logoutAction()
    {
        $this->guard()->logout();

        return $this->redirect(route("home"));
    }

    public function username()
    {
        return "email";
    }

}
