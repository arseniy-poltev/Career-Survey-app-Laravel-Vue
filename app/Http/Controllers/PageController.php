<?php

namespace App\Http\Controllers;

use App\Greeting;
use App\Helpers\CustomSettings;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @param CustomSettings $customSettings
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(CustomSettings $customSettings, Request $request)
    {
        $greeting = Greeting::where('type', 1)->first();

        return view('dashboard', [
            'user' => $request->user(),
            'stripePublicKey' => $customSettings->show('services.stripe.key'),
            'greeting'  => $greeting
        ]);
    }

    public function success()
    {
        return view('surveys.success');
    }
}
