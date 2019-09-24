<?php

if( !function_exists('Percent2Color') ){
    function Percent2Color( $percent )
    {
        switch ( true ) {
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
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summary</title>

    <style type="text/css" media="all">
        @font-face {
            font-family: "Arimo";
            src: local("{{ public_path() }}/fonts/arimo.ttf") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        html {
            font-family: "Arimo", SansSerif;
            font-size: 14px;
        }

        .w10p {
            width: 10%;
        }
        .w20p {
            width: 20%;
        }
        .w50p {
            width: 50%;
        }
        .w60p {
            width: 60%;
        }
        .w80p {
            width: 80%;
        }
        .w100p {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }
        .text-left {
            text-align: left;
        }
        .text-right {
            text-align: right;
        }

        .text-top {
            vertical-align: top;
        }
        .text-middle {
            vertical-align: middle;
        }
        .text-bottom {
            vertical-align: bottom;
        }

        .mb-10px {
            margin-bottom: 10px;
        }
        .mb-20px {
            margin-bottom: 20px;
        }
        .mb-30px {
            margin-bottom: 30px;
        }
        .mb-40px {
            margin-bottom: 40px;
        }

        h2 {
            margin-bottom: 0px;
        }
        h3 {
            margin-bottom: 0px;
        }

        .font-weight-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="2">
                <div style="float: left;">
                    <h1 style="font-size: 30px;">Career Monitor Participant Report</h1>
                    <span class="text-left" style="font-size: 20px;">{{ $survey->client_name }}</span>
                </div>
                <div style="float: right;">
                    <span class="text-right" style="font-size: 20px;">{{ $survey->client_organisation }}</span>
                </div>

            </td>
        </tr>

        <tr>
            <td class="text-center text-middle">
                <img src="{{ public_path() }}/img/career-model.jpg" style="width: 100%; height: auto;">
            </td>

            <td class="text-top">
                <table>
                    <tr>
                        <td colspan="2" class="text-left">
                            <h2 style="margin-bottom: 10px;">Participant Information</h2>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p">Position</td>
                        <td class="w50p">{{ $survey->position }}</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>{{ $survey->department }}</td>
                    </tr>
                    <tr>
                        <td>Length of Service (yrs)</td>
                        <td>@php echo number_format((strtotime('now') - strtotime($survey->start_date)) / (365 * 24 * 3600), 2); @endphp</td>
                    </tr>
                    <tr class="mb-20px">
                        <td>Date Conducted</td>
                        <td>@php echo date('d/m/Y', strtotime( $survey->interview_date) ); @endphp</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <h2>KNOW</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80%">My knowledge for the job</td>
                                    <td width="10%">{{ $survey->q30 * 20 }}%</td>
                                    <td width="10%">
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( $survey->q30 * 20 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>My knowledge for why I do the job</td>
                                    <td>{{ $survey->q31 * 20 }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( $survey->q31 * 20 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>My skills for the job</td>
                                    <td>{{ $survey->q32 * 20 }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( $survey->q32 * 20 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr class="mb-20px">
                                    <td class="font-weight-bold">Total Know Rating</td>
                                    <td class="font-weight-bold">{{ (int)(($survey->q30 * 20  + $survey->q31 * 20  + $survey->q32 * 20 ) / 3) }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( ($survey->q30 * 20 + $survey->q31 * 20 + $survey->q32 * 20) / 3 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <h2>ACT</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td>My effectiveness in my day to day activities in the job</td>
                                    <td>{{ $survey->q33 * 20 }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( $survey->q33 * 20 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>My ability to get the job done with others</td>
                                    <td>{{ $survey->q34 * 20 }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( $survey->q34 * 20 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>The results achieved from my job</td>
                                    <td>{{ $survey->q35 * 20 }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( $survey->q35 * 20 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>
                                <tr class="mb-40px">
                                    <td class="font-weight-bold">Total Act Rating</td>
                                    <td class="font-weight-bold">{{ (int)(($survey->q33 * 20 + $survey->q34 * 20  + $survey->q35 * 20) / 3) }}%</td>
                                    <td>
                                        <div style="width: 100%; height: 60%; background: @php echo Percent2Color( ($survey->q33 * 20 + $survey->q34 * 20 + $survey->q35 * 20) / 3 ); @endphp">&nbsp;</div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">Career Self Evaluation</td>
                                    <td class="font-weight-bold" colspan="2">{{ $etc['career_model'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>

        <tr>
            <td width="50%" style="border-collapse: collapse; border: 1px solid black;">
                <table style="font-size: 12px !important;">
                    <tr>
                        <td colspan="2" class="text-center">
                            <h2>Changing Motivation</h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">Earning potential</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q510 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q520 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">Lifestyle / flexibility</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q511 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q521 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">External need for myself or family</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q512 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q522 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">The job opportunity</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q513 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q523 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">To advance my career</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q514 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q524 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">Opportunity to learn</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q515 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q525 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">Career choice</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q516 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q526 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">The brand and reputation</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q517 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q527 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right">People</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $survey->q518 * 33.3 }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $survey->q528 * 33.3 }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle text-right font-weight-bold">Total Variance check</td>
                        <td class="w50p text-middle">
                            <div style="clear: both; height: 5px; width: {{ $ratings['join'] }}%; background: #95B3D7;"></div>
                            <div style="clear: both; height: 5px; width: {{ $ratings['stay'] }}%; background: #0000FF;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="w50p text-middle"></td>
                        <td class="w50p text-middle">
                            <table>
                                <tr>
                                    <td class="w20p">0%</td>
                                    <td class="w20p">20%</td>
                                    <td class="w20p">40%</td>
                                    <td class="w20p">60%</td>
                                    <td class="w20p">80%</td>
                                    <td class="w20p">100%</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

            <td width="50%">
                <table width="100%">
                    <tr>
                        <td class="text-left" colspan="3">
                            <h2>Rating Monitor Summary</h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td class="w80p">Business</td>
                        <td class="w10p">{{ $ratings['business'] }}%</td>
                        <td class="w10p">
                            <div style="height: 60%; background: @php echo Percent2Color( $ratings['business'] ); @endphp">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Operations</td>
                        <td>{{ $ratings['effectiveness'] }}%</td>
                        <td>
                            <div style="height: 60%; background: @php echo Percent2Color( $ratings['effectiveness'] ); @endphp">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Myself</td>
                        <td>{{ $ratings['self'] }}%</td>
                        <td>
                            <div style="height: 60%; background: @php echo Percent2Color( $ratings['self'] ); @endphp">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td>Team Culture</td>
                        <td>{{ $ratings['culture'] }}%</td>
                        <td>
                            <div style="height: 60%; background: @php echo Percent2Color( $ratings['culture'] ); @endphp">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Total Retention Rating</td>
                        <td>{{ $ratings['retention'] }}%</td>
                        <td>
                            <div style="height: 60%; background: @php echo Percent2Color( $ratings['retention'] ); @endphp">&nbsp;</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>