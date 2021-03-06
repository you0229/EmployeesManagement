<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninPost;
use App\Services\AuthenticationService;

use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    protected $auth_service;

    /**
     * AuthenticationController constructor.
     * EmployeeServiceのインスタンス化
     */
    function __construct()
    {
        $this->auth_service = new AuthenticationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * ログイン画面の表示
     */
    public function getSignin()
    {
        if (isset($_GET['status']))
        {
            $msg = "サインインに失敗しました";
            return view('auth.signin', compact('msg'));
        }
        return view('auth.signin');
    }

    /**
     * @param SigninPost $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * ログイン画面の入力値をAuthenticationServiceに投げて
     * パスワードとメールアドレスが一致すれば社員IDが返ってくる
     */
    public function postSignin(SigninPost $request)
    {
        $request_data = $request->all();
        $mail = $request_data['mail'];
        $password = $request_data['password'];

        if (Auth::guard('original')
            ->attempt(['mail' => $mail, 'password' => $password])) {
            session()->regenerate();
            $input_data = $request->all();
            $check = $this->auth_service->Signin($input_data);
            session(['employee_id' => $check, 'id' => $check]);
            return redirect()->route('top');
        } else {
            return redirect()->route('signin', ['status' => '']);
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSignout()
    {
        return view('auth.signout');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSignout()
    {
        session()->flush();
        return redirect()->route('signin');
    }

    protected function guard()
    {
        return Auth::guard('original');
    }

    public function original()
    {
        if(Auth::guard('original')->check()){
            $user = Auth::guard('original')->user();
        }
        return redirect()->route('signin');
    }
}
