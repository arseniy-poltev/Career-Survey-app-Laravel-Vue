<?php

use App\Greeting;
use Illuminate\Database\Seeder;

class GreetingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Greeting::create([
            'type' => 1,
            'content' => '<b>Online Career Monitor</b> is an online, easy to manage, business survey platform specifically designed for HR Coaches!<div>Head across to <b>Surveys</b> to create a new survey for a prospective client and have it sent directly to their email address.</div><div>To view a sample report, that only you will receive once the client has completed their survey,&nbsp;<a href="/example.pdf" style="font-family: inherit; background-color: rgb(250, 250, 250);">Click Here.</a></div><div>Download the Coach Quick Start Guide by accessing the support page on the left-hand toolbar.</div><div>If you have any other questions about this product or process, please contact the HR Coach office on 1300 550 674.</div>'
        ]);
    }
}
