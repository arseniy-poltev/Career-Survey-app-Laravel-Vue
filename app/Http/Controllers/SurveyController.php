<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSurveyRequest;
use Illuminate\Support\Facades\DB;

use Cartalyst\Stripe\Stripe;
use App\Helpers\CustomSettings;

use App\Survey;

class SurveyController extends Controller
{


    public function all(Request $req)
    {
        if( $req->user()->isAdmin()){
            return  Survey::with('user')
                ->orderBy('user_id', 'ASC')
                ->orderBy('status', 'ASC')
                ->get();
        } else {
            return  DB::table('surveys')
                ->where('user_id', '=', $req->user()->id)
                ->orderBy('status', 'ASC')
                ->orderBy('id', 'DESC')
                ->get();
        }
    }

    /**
     * @param Request $req
     * @return \Illuminate\Support\Collection
     */
    public function index(Request $req)
    {
        return  DB::table('surveys')
            ->where('user_id', '=', $req->user()->id)
            ->orderBy('status', 'ASC')
            ->orderBy('id', 'DESC')
            ->get();
    }

    /**
     * Create an survey.
     *
     * @param StoreSurveyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSurveyRequest $request)
    {
        $survey = new Survey;

        $survey->hash = md5(time(). $request->client_name . $request->client_organisation);

        $survey->hrcoach_name           = $request->user()->name;
        $survey->hrcoach_organisation   = $request->user()->business_name;
        $survey->hrcoach_email          = $request->user()->email;

        $survey->client_name            = $request->client_name;
        $survey->client_organisation    = $request->client_organisation;
        $survey->client_email           = $request->client_email;

        if( intval($request->user()->access_level) == 5 && intval( $request->user_selected ) > 0 ){
            $survey->user_id                = $request->user_selected;
            $survey->paid                   = 1;
        } else {
            $survey->user_id                = $request->user()->id;
            $survey->paid                   = 0;
        }

        $survey->save();

        return $survey;
    }

    public function update(StoreSurveyRequest $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        $survey->client_name            = $req->client_name;
        $survey->client_organisation    = $req->client_organisation;
        $survey->client_email           = $req->client_email;

        $survey->save();

        return $survey;
    }

    /**
     * @param Survey $survey
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();

        return response()->json();
    }

    /**
     * @param $survey_id
     * @param Request $req
     * @param CustomSettings $customSettings
     * @return \Illuminate\Http\JsonResponse
     */
    public function pay($survey_id, Request $req, CustomSettings $customSettings)
    {
        $survey = Survey::where('id', $survey_id)->first();

        if ( $survey->paid == 1 ) {
            return response()->json([
                'message' => 'Survey is already paid',
                'order' => $$survey
            ]);
        }

        $stripe = Stripe::make($customSettings->show('services.stripe.secret'));

        try {
            $price = $req->user()->getPrice();

            if( $price == 0 ){

            } else {
                $stripe->charges()->create([
                    'amount' => $req->user()->getPrice() ?: 1,
                    'currency' => 'AUD',
                    'description' => 'Online Career Monitor For ' . $survey->client_name,
                    'receipt_email' => $req->user()->email,
                    'source' => $req->get('token', '')
                ]);
            }

            $survey->update([
                'paid' => true
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'message' => $exception->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Thanks for payment',
            'survey' => $survey
        ]);
    }

    public function getUser( $user_id, Request $req )
    {
        if( $req->user_keyword != '' )
            return  DB::table('users')
                ->where('id', '!=', $user_id)
                ->where('access_level', '<', 5)
                ->where('name', 'like', '%'.$req->user_keyword.'%')
                ->orderBy('name', 'ASC')
                ->get();
        else
            return  DB::table('users')
                ->where('id', '!=', $user_id)
                ->where('access_level', '<', 5)
                ->orderBy('name', 'ASC')
                ->get();
    }
}
