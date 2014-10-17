<?php

class AuthController extends \BaseController {

    public function login()
    {
        return View::make('auth/login');
    }

    public function loginPost()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        $info = [
          'password' => $password,
          'email' => $email
        ];

        $validator = Validator::make($info,
          array(
            'password' => 'required',
            'email' => 'required|email'
          )
        );

        if ($validator->fails())
        {
            return Redirect::route('login')->withInput()->withErrors($validator);
        }

        if (Auth::attempt(array('email' => $email, 'password' => $password)))
        {
            return Redirect::to('/dashboard');
        }
        return Response::make('failed to log you in');
    }

    public function signUp()
    {
        return View::make('auth/signup');
    }

    public function signUpPost()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        $info = [
            'password' => $password,
            'email' => $email
        ];

        $validator = Validator::make($info,
            array(
                'password' => 'required|min:8',
                'email' => 'required|email|unique:users'
            )
        );

        if ($validator->fails())
        {
            return Redirect::route('signup')->withInput()->withErrors($validator);
        }

        $hash = Hash::make($password);

        $user = new User;
        $user->email = $email;
        $user->password = $hash;
        $user->pages = 0;
        $user->save();

        Auth::attempt(array('email' => $email, 'password' => $password));

        return Redirect::route('billing');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function dashboard(){
        $userid = Auth::id();
        $pages = Page::where('user_id', '=', $userid)->get();
        return View::make('dashboard', ['pages'=>$pages]);
    }

}