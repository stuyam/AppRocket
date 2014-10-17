<?php

class BillingController extends \BaseController {

    public function billing()
    {
        return View::make('billing.pick-billing');
    }

//    public function billingStarter()
//    {
//        return $this->biller('starter');
//    }

    public function billingPro()
    {
        return $this->biller('pro');
    }

    private function biller($plan)
    {
        $user = Auth::user();
        $token = Input::get('stripeToken');

        $validator = Validator::make(['card'=>$token],['card' => 'required']);

        if ($validator->fails())
        {
            return Redirect::route('billing')->withInput()->withErrors($validator);
        }

        $user->subscription($plan)->create($token, [
            'email'  => Auth::user()->email
        ]);
        return Redirect::route('dashboard');
    }
}