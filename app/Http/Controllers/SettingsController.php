<?php

namespace App\Http\Controllers;

use App\Config;
use App\Helpers\CustomSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(CustomSettings $customSettings, Request $request)
    {
        return $customSettings->index();
    }

    public function publicSettings(CustomSettings $customSettings)
    {
        return $customSettings->show('services.stripe.key');
    }

    public function store(Request $request)
    {
        foreach ($request->get('settings', []) as $key => $value) {
            if (!$value)
                continue;
            Config::updateOrCreate([
                'key' => $key,
            ], [
                'value' => $value
            ]);
        }
        return response()->json([], 200);
    }
}