<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

use Config;
use App\Survey;
use App\Mail\SurveyFullReport;

use \SnappyPDF;

class SurveyDetailController extends Controller
{

    public $rating_types = array(
        'business', 'effectiveness', 'self',
        'culture_staff', 'culture_management', 'join',
        'stay', 'culture', 'retention');

    public $career_models = array(
        1 => 'Career Maker',
        2 => 'Career Breaker',
        3 => 'Career Staller',
        4 => 'Career Risk',
    );

    /**
     * @param $category
     * @param $survey
     * @return float|int
     */
    public function computeRating( $category, $survey){

        switch ($category){

            case 'business':
                return (
                    $survey['q10'] +
                    $survey['q11'] +
                    $survey['q12'] +
                    $survey['q13'] +
                    $survey['q14']
                    ) * Config::get('constants.avg_opts.avg_5');

                break;

            case 'effectiveness':
                return (
                    $survey['q20'] +
                    $survey['q21'] +
                    $survey['q22'] +
                    $survey['q23'] +
                    $survey['q24']
                    ) * Config::get('constants.avg_opts.avg_5');

                break;
            case 'self':
                return (int)(
                    (
                        $survey['q30'] +
                        $survey['q31'] +
                        $survey['q32'] +
                        $survey['q33'] +
                        $survey['q34'] +
                        $survey['q35']
                    ) * Config::get('constants.avg_opts.avg_6')
                );

                break;

            case 'culture_staff':
                return (
                    $survey['q410'] +
                    $survey['q411'] +
                    $survey['q412'] +
                    $survey['q413'] +
                    $survey['q414']
                ) * Config::get('constants.avg_opts.avg_5');

                break;

            case 'culture_management':
                return (
                    $survey['q420'] +
                    $survey['q421'] +
                    $survey['q422'] +
                    $survey['q423'] +
                    $survey['q424']
                ) * Config::get('constants.avg_opts.avg_5');

                break;

            case 'culture':
                return (int)((
                    $this->computeRating('culture_staff', $survey) +
                    $this->computeRating('culture_management', $survey)
                    ) / 2);

                break;

            case 'join':
                return (int)((
                    $survey['q510'] +
                    $survey['q511'] +
                    $survey['q512'] +
                    $survey['q513'] +
                    $survey['q514'] +
                    $survey['q515'] +
                    $survey['q516'] +
                    $survey['q517'] +
                    $survey['q518']
                ) * Config::get('constants.avg_opts.avg_9'));

                break;

            case 'stay':
                return (int)((
                    $survey['q520'] +
                    $survey['q521'] +
                    $survey['q522'] +
                    $survey['q523'] +
                    $survey['q524'] +
                    $survey['q525'] +
                    $survey['q526'] +
                    $survey['q527'] +
                    $survey['q528']
                ) * Config::get('constants.avg_opts.avg_9'));

                break;

            case 'retention':
                return (int)((
                    $this->computeRating('business', $survey) +
                    $this->computeRating('effectiveness', $survey) +
                    $this->computeRating('self', $survey) +
                    $this->computeRating('culture', $survey)
                ) / 4);

                break;

            default:
                return 0;

                break;
        }
    }

    public function Percent2Color( $percent ) {

        switch ( TRUE ){
            case $percent < 66.5:
                return 'red';
                break;

            case $percent >= 66.5 && $percent < 74.5:
                return 'yellow';
                break;

            case $percent >= 74.5:
                return 'green';
                break;

            default:
                return '';
                break;
        }

    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function getInput(Request $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        return $survey;
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function storeInput(Request $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        $survey->status                 = 'ANSWERED';

        $survey->client_name            = $req->client_name;
        $survey->client_organisation    = $req->client_organisation;
        $survey->client_email           = $req->client_email;
        $survey->gender                 = $req->gender;
        $survey->position               = $req->position;
        $survey->department             = $req->department;
        $survey->start_date             = $req->start_date;
        $survey->interview_date         = $req->interview_date;
        $survey->generation             = $req->generation;

        $survey->background             = $req->background;
        $survey->role                   = $req->role;
        $survey->experience             = $req->experience;
        $survey->expectations           = $req->expectations;
        $survey->gain                   = $req->gain;
        $survey->achieve                = $req->achieve;
        $survey->reason                 = $req->reason;
        $survey->contribution           = $req->contribution;

        $survey->q10                    = $req->q10;
        $survey->q11                    = $req->q11;
        $survey->q12                    = $req->q12;
        $survey->q13                    = $req->q13;
        $survey->q14                    = $req->q14;
        $survey->comments_business      = $req->comments_business;

        $survey->q20                    = $req->q20;
        $survey->q21                    = $req->q21;
        $survey->q22                    = $req->q22;
        $survey->q23                    = $req->q23;
        $survey->q24                    = $req->q24;
        $survey->comments_effectiveness = $req->comments_effectiveness;

        $survey->q30                    = $req->q30;
        $survey->q31                    = $req->q31;
        $survey->q32                    = $req->q32;
        $survey->q33                    = $req->q33;
        $survey->q34                    = $req->q34;
        $survey->q35                    = $req->q35;
        $survey->comments_self          = $req->comments_self;

        $survey->qm                     = $req->qm;
        $survey->comments_model         = $req->comments_model;

        $survey->q410                   = $req->q410;
        $survey->q411                   = $req->q411;
        $survey->q412                   = $req->q412;
        $survey->q413                   = $req->q413;
        $survey->q414                   = $req->q414;
        $survey->comments_culture_staff = $req->comments_culture_staff;

        $survey->q420                   = $req->q420;
        $survey->q421                   = $req->q421;
        $survey->q422                   = $req->q422;
        $survey->q423                   = $req->q423;
        $survey->q424                   = $req->q424;
        $survey->comments_culture_management = $req->comments_culture_management;

        $survey->q510                   = $req->q510;
        $survey->q511                   = $req->q511;
        $survey->q512                   = $req->q512;
        $survey->q513                   = $req->q513;
        $survey->q514                   = $req->q514;
        $survey->q515                   = $req->q515;
        $survey->q516                   = $req->q516;
        $survey->q517                   = $req->q517;
        $survey->q518                   = $req->q518;
        $survey->comments_join          = $req->comments_join;

        $survey->q520                   = $req->q520;
        $survey->q521                   = $req->q521;
        $survey->q522                   = $req->q522;
        $survey->q523                   = $req->q523;
        $survey->q524                   = $req->q524;
        $survey->q525                   = $req->q525;
        $survey->q526                   = $req->q526;
        $survey->q527                   = $req->q527;
        $survey->q528                   = $req->q528;
        $survey->comments_stay          = $req->comments_stay;

        $survey->save();

        return $survey;
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function getFeedback(Request $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        $ratings = array();
        foreach( $this->rating_types as $value ) {
            $ratings[$value] = $this->computeRating($value, $survey);
        }

        $etc = array();
        $etc['service_yrs']     = number_format((strtotime('now') - strtotime($survey->start_date)) / Config::get('constants.year2sec'), 2);
        $etc['career_model']    = $this->career_models[ $survey->qm ];
        $etc['retention_color'] = $this->Percent2Color( $ratings['retention'] );

        $result = array();
        $result['survey']   = $survey;
        $result['ratings']  = $ratings;
        $result['etc']      = $etc;

        return $result;
    }

    public function generateSummaryFile( $result )
    {
        File::delete( $result['survey']->getSummaryFilename() );

        SnappyPDF::loadView('reports.summary', [
            'survey'    =>  $result['survey'],
            'ratings'   =>  $result['ratings'],
            'etc'       =>  $result['etc'],
        ])->setPaper('a4')
            ->setOrientation('portrait')
            ->setOption('margin-bottom', '2cm')
            ->setOption('margin-top', '2cm')
            ->setOption('margin-left', '1cm')
            ->setOption('margin-right', '1cm')
            ->save( $result['survey']->getSummaryFilename() );
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function storeFeedback(Request $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        $survey->status                         = 'COMMENTED';

        $survey->comments_business              = $req->comments_business;
        $survey->comments_effectiveness         = $req->comments_effectiveness;
        $survey->comments_self                  = $req->comments_self;
        $survey->comments_model                 = $req->comments_model;
        $survey->comments_culture_staff         = $req->comments_culture_staff;
        $survey->comments_culture_management    = $req->comments_culture_management;
        $survey->comments_join                  = $req->comments_join;
        $survey->comments_stay                  = $req->comments_stay;

        $survey->save();

        $ratings = array();
        foreach( $this->rating_types as $value ) {
            $ratings[$value] = $this->computeRating($value, $survey);
        }

        $etc = array();
        $etc['career_model'] = $this->career_models[ $survey->qm ];

        $result = array();
        $result['survey'] = $survey;
        $result['ratings'] = $ratings;
        $result['etc'] = $etc;

        $this->generateSummaryFile( $result );

        return $survey;
    }


    public function generateFullFile( $result )
    {
        File::delete( $result['survey']->getFullFilename() );

        SnappyPDF::loadView('reports.risk', [
            'survey'    =>  $result['survey'],
            'ratings'   =>  $result['ratings'],
            'etc'       =>  $result['etc'],
            'know'      =>  $result['know'],
            'act'       =>  $result['act']
        ])->setPaper('a4')
            ->setOrientation('landscape')
            ->setOption('margin-bottom', '5mm')
            ->setOption('margin-top', '5mm')
            ->setOption('margin-left', '1cm')
            ->setOption('margin-right', '1cm')
            ->save( $result['survey']->getFullFilename() );
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function getPlan(Request $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        $ratings = array();
        foreach( $this->rating_types as $value ) {
            $ratings[$value] = $this->computeRating($value, $survey);
        }

        $etc = array();
        $etc['service_yrs']     = number_format((strtotime('now') - strtotime($survey->start_date)) / Config::get('constants.year2sec'), 2);
        $etc['career_model']    = $this->career_models[ $survey->qm ];
        $etc['retention_color'] = $this->Percent2Color( $ratings['retention'] );

        $know = array(
            $survey->q30 * 20,
            $survey->q31 * 20,
            $survey->q32 * 20,
        );
        $know['avg'] = (int)( array_sum($know) / 3);

        $act = array(
            $survey->q33 * 20,
            $survey->q34 * 20,
            $survey->q35 * 20,
        );
        $act['avg'] = (int)(array_sum($act) / 3);

        $result = array();
        $result['survey']   = $survey;
        $result['ratings']  = $ratings;
        $result['etc']      = $etc;
        $result['know']     = $know;
        $result['act']      = $act;

        return $result;
    }

    /**
     * @param Request $req
     * @return mixed
     */
    public function storePlan(Request $req)
    {
        $survey = Survey::where('hash', $req->hash)->first();

        $survey->status                     = 'FINISHED';

        $survey->plan_business              = $req->plan_business;
        $survey->plan_effectiveness         = $req->plan_effectiveness;
        $survey->plan_self                  = $req->plan_self;
        $survey->plan_model                 = $req->plan_model;
        $survey->plan_culture_staff         = $req->plan_culture_staff;
        $survey->plan_culture_management    = $req->plan_culture_management;
        $survey->plan_change                = $req->plan_change;

        $survey->save();

        $ratings = array();
        foreach( $this->rating_types as $value ) {
            $ratings[$value] = $this->computeRating($value, $survey);
        }

        $etc = array();
        $etc['service_yrs']     = number_format((strtotime('now') - strtotime($survey->start_date)) / Config::get('constants.year2sec'), 2);
        $etc['career_model']    = $this->career_models[ $survey->qm ];
        $etc['retention_color'] = $this->Percent2Color( $ratings['retention'] );

        $know = array(
            $survey->q30 * 20,
            $survey->q31 * 20,
            $survey->q32 * 20,
        );
        $know['avg'] = (int)( array_sum($know) / 3);

        $act = array(
            $survey->q33 * 20,
            $survey->q34 * 20,
            $survey->q35 * 20,
        );
        $act['avg'] = (int)(array_sum($act) / 3);

        $result = array();
        $result['survey']   = $survey;
        $result['ratings']  = $ratings;
        $result['etc']      = $etc;
        $result['know']     = $know;
        $result['act']      = $act;

        $this->generateFullFile( $result );
        
        /*$data['title'] = "Career Monitor - Your Final report for {$survey['client_name']} is completed";
        $data['survey'] = $survey;
        Mail::send('emails.surveys.full-report', $data, function ($message) use ($survey) {
            $message->from( $survey->hrcoach_email, $survey->hrcoach_name);
            $message->sender( $survey->hrcoach_email, $survey->hrcoach_name);
            $message->to( $survey->client_email, $survey->client_name );
            $message->cc( 'admin@hrcoach.com.au', 'MyHR Solutions' );
            $message->bcc('admin@hrcoach.com.au', 'MyHR Solutions');
            $message->subject( "Career Monitor - Your Final report for {$survey['client_name']} is completed" );
            $message->attach( $survey->getFullFilename(), [
                'as' => "{$survey['client_name']}_full.pdf",
                'mime' => "application/pdf",
            ]);
            $message->attach( $survey->getSummaryFilename(), [
                'as' => "{$survey['client_name']}_summary.pdf",
                'mime' => "application/pdf",
            ]);
        });*/

        Mail::to($survey->client_email)
            ->send(new SurveyFullReport($survey));


        return $survey;
    }

    public function downloadReports( $survey_id, Request $req)
    {
        $survey = Survey::where('id', $survey_id)->first();

        $ratings = array();
        foreach( $this->rating_types as $value ) {
            $ratings[$value] = $this->computeRating($value, $survey);
        }

        $etc = array();
        $etc['service_yrs']     = number_format((strtotime('now') - strtotime($survey->start_date)) / Config::get('constants.year2sec'), 2);
        $etc['career_model']    = $this->career_models[ $survey->qm ];
        $etc['retention_color'] = $this->Percent2Color( $ratings['retention'] );

        $know = array(
            $survey->q30 * 20,
            $survey->q31 * 20,
            $survey->q32 * 20,
        );
        $know['avg'] = (int)( array_sum($know) / 3);

        $act = array(
            $survey->q33 * 20,
            $survey->q34 * 20,
            $survey->q35 * 20,
        );
        $act['avg'] = (int)(array_sum($act) / 3);

        $result = array();
        $result['survey']   = $survey;
        $result['ratings']  = $ratings;
        $result['etc']      = $etc;
        $result['know']     = $know;
        $result['act']      = $act;

        if (!File::exists($survey->getSummaryFilename())) {
            $this->generateSummaryFile( $result );
        }
        if (!File::exists($survey->getFullFilename())) {
            $this->generateFullFile( $result );
        }
        if ($req->get('full', false)) {
            return response()->download($survey->getFullFilename());
        }
        return response()->download($survey->getSummaryFilename());
    }

    public function updateState(Request $req)
    {
        $state = $req->get('state');
        $survey = Survey::where('hash', $req->hash)->first();

        $survey->status = $state;
        $survey->save();

        return $survey;
    }
}
