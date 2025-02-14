@extends('layouts/layout')

@section('css')
<link rel="stylesheet" href="/css/billing.css">
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
@stop

@section('content')
<div id="box">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Step 2: Create Subscription</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div class="row">
        <div class="col-md-6">
            <h2>Starter Account</h2>
            <h3>FREE</h3>
            <ul>
                <li>1 App Rocket Page</li>
                <li>App Rocket Branding</li>
                <li>http://yourapp.approcket.com</li>
            </ul>
            <a href="{{{ route('dashboard') }}}" class="stripe-button-el">
                <span style="display: block; min-height: 30px;">Continue for Free</span>
            </a>
        </div>
        <div class="col-md-6">
            <h2>Pro Account</h2>
            <h3>$5 a month</h3>
            <ul>
                <li>Unlimited App Rocket Pages</li>
                <li>No App Rocket Branding</li>
                <li>Custom Domain Name</li>
            </ul>
            <form action="billing/pro" method="POST">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_4Te47S8wjPLWUR2HsfadSWJ8"
                    data-amount="500"
                    data-name="App Rocket"
                    data-description="Pro Account (Monthly $5.00)"
                    data-panel-label="Subscribe"
                    data-email="{{{ Auth::user()->email }}}"
                    data-label="Create Pro Account"
                    data-image="/128x128.png">
                </script>
            </form>
        </div>
    </div>
</div>
@stop