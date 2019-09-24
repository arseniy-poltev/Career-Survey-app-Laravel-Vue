<?php

namespace App\Http\Controllers;

use App\Greeting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $req)
    {
        $greeting = Greeting::where('type', 1)->first();
        $greeting->content = $greeting->content;
        return $greeting;
    }

    public function store(Request $req)
    {

        Greeting::updateOrCreate(
            [
                'type'      =>  $req->get('type')
            ],
            [
                'content'   =>  html_entity_decode( $req->get('content') )
            ]
        );

        return response()->json([], 200);
    }
}