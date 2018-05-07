<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        //return csrf_token();//Token de seguridad
        return view('auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/load';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $errors = [$this->username() => trans('auth.failed')];

    //     if ($request->expectsJson()) {
    //         return response()->json($errors, 200);
    //     }

    //     return redirect()->back()
    //         ->withInput($request->only($this->username(), 'remember'))
    //         ->withErrors($errors ,200);
    // }

    // protected function credentials(Request $request)
    // {
    //     $login = $request->input($this->username());

    //     // Comprobar si el input coincide con el formato de E-mail
    //     $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

    //     return [
    //     $field => $login,
    //     'password' => $request->input('password')
    //     ];
    // }

    // public function username()
    // {
    //     return 'login';
    // }

    // /**
    //  * Send the response after the user was authenticated.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     $this->clearLoginAttempts($request);
        
    //     return $this->authenticated($request, $this->guard()->user())
    //             ?: /*response()->json([
    //                'login' => '635465'
    //             ], 200);*/redirect()->intended($this->redirectPath());
    // }
}
