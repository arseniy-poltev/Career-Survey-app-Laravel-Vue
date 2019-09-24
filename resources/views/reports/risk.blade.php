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
<html>
<head>
    <meta charset="UTF-8">
    <style type="text/css" media="all">
        html {
            padding: 0;
            margin: 0;
        }
        body {
            padding: 0;
            margin: 0;
        }
        section:first-child table,
        section:nth-child(3) #charts_and_data {
            page-break-after: always;
        }
        section:first-child table {
            width: 730px;
        }
        #cover_bkg {
            width: 270px;
        }
        #cover_bkg img {
            width: 55%;
        }
        #cover_wheel {
            width: 200px;
        }
        #cover_wheel img {
            width: 100%;
        }
        section:first-child table {
            font-size: 90%;
        }
        section:first-child table td {
            padding-top: 1em;
        }
        section:first-child table tr:first-child td:first-child {
            padding-top: 0;
        }
        section:first-child h1 {
            margin-top: 1em;
        }
        section:first-child table tr:first-child td:last-child {
            vertical-align: bottom;
        }
        section:first-child p {
            margin-top: 4em;
            font-size: 0.75em;
            width: 570px;
        }

        .retention_rating_wheel {
            width: 80px;
            margin: 0 auto;
        }
        .retention_rating_wheel img {
            width: 100%;
        }
        .career_model_wheel {
            width: 100%;
        }
        .career_model_wheel img {
            width: 100%;
        }
        .retention_rating_percentage {
            text-align: center;
            width: 3em;
            font-size: 2em;
            margin: 0.2em auto;
        }
        .retention_rating_percentage.red {
            background-color: #f00;
        }
        .retention_rating_percentage.yellow {
            background-color: #fba125;
        }
        .retention_rating_percentage.green {
            background-color: #0f0;
        }
        section h2,
        section h3 {
            margin: 0;
        }
        section h2 {
            margin-bottom: 0.5em;
        }
        table.ratings_and_info,
        table.charts,
        #charts_and_data,
        table.chart {
            width: 100%;
        }
        table.ratings_and_info tr:first-child td:last-child {
            text-align: right;
            vertical-align: top;
        }
        table.ratings_and_info tr:nth-child(3) td:first-child {
            text-align: center;
        }
        table.ratings_and_info tr:nth-child(2) td:last-child {
            width: 130px;
        }
        table.ratings_and_info tr:nth-child(3) td,
        table.ratings_and_info tr:nth-child(4) td,
        table.ratings_and_info tr:nth-child(5) td,
        table.ratings_and_info tr:nth-child(6) td,
        table.ratings_and_info tr:nth-child(7) td {
            padding-top: 0.8em;
        }
        table.ratings_and_info td div.rating {
            width: 40px;
            margin-right: 30px;
        }
        table.ratings_and_info td div.rating.red {
            background-color: #f00;
        }
        table.ratings_and_info div.rating.yellow {
            background-color: #fba125;
        }
        table.ratings_and_info div.rating.green {
            background-color: #0f0;
        }

        table.charts p,
        table#charts_and_data p {
            font-weight: bold;
            text-align: center;
            margin: 15px 0 0 0;
        }
        table.charts td {
            vertical-align: top;
        }
        table.chart td,
        table.data td {
            font-size: 80%;
            padding: 0;
        }
        table.chart td:first-child {
            text-align: right;
            padding-right: 15px;
        }
        table.chart div {
            background-color: #3376c3;
            text-align: right;
        }
        table.chart .legend td {
            font-size: 80%;
        }
        table.chart .legend td:nth-child(2),
        table.chart .legend td:nth-child(3),
        table.chart .legend td:nth-child(4),
        table.chart .legend td:nth-child(5),
        table.chart .legend td:nth-child(6) {
            width: 33px;
        }
        table.chart .legend td:last-child {
            text-align: right;
        }
        table.chart.thick_bars td {
            padding-top: 0.5em;
            padding-bottom: 0.5em;
        }
        table.chart.thick_bars tr.legend td {
            padding: 0;
        }
        table.chart.thick_bars div {
            line-height: 2.5em;
        }
        table.chart.changing_motivations div {
            height: 6px;
        }
        table.chart.changing_motivations div:first-child {
            background-color: #b9d4f8;
        }
        table.chart tr:last-child td:last-child {
            text-align: center;
        }
        #charts_and_data table.chart .legend.lighter td:nth-child(3) {
            text-align: right !important;
        }
        #join_legend,
        #stay_legend {
            padding: 3px;
            margin-right: 6px;
            font-size: 1px;
            position: relative;
            top: -4px;
        }
        #join_legend {
            background-color: #b9d4f8;
        }
        #stay_legend {
            background-color: #3376c3;
        }

        table.data td:last-child div {
            width: 30px;
            height: 20px;
        }
        table.data td:last-child div.red {
            background-color: #f00;
        }
        table.data td:last-child div.yellow {
            background-color: #fba125;
        }
        table.data td:last-child div.green {
            background-color: #0f0;
        }
        table.data.changing_motivations tr td:nth-child(2),
        table.data.changing_motivations tr td:nth-child(3),
        table.data.changing_motivations tr td:nth-child(4) {
            text-align: center;
        }
        table.data.changing_motivations tr:last-child td {
            font-weight: bold;
        }
        #charts_and_data > tbody > tr > td {
            page-break-inside: avoid
        }
        #charts_and_data > tbody > tr > td:first-child {
            padding: 0 40px 20px 0;
        }
        #charts_and_data > tbody > tr > td {
            vertical-align: top;
        }
        #charts_and_data table.chart tr td:first-child {
            width: 470px;
        }
        #charts_and_data table.data {
            width: 100%;
        }
        #risk_career_model_wheel div {
            margin: 0 auto;
        }
        #risk_career_model_wheel div {
            width: 400px;
        }
        #risk_career_model_wheel img {
            width: 100%;
        }
        #charts_and_data  #risk_self_evaluation_wheel p {
            text-align: left;
        }
        #risk_self_evaluation_wheel div {
            position: relative;
            overflow: hidden;
        }
        #risk_self_evaluation_wheel div div {
            float: left;
            width: 200px;
        }
        #risk_self_evaluation_wheel div div:first-child {
            width: 110px;
        }
        #risk_self_evaluation_wheel div div:first-child {
            line-height: 180px;
        }
        #risk_self_evaluation_wheel img {
            width: 100%;
        }
        #charts_and_data > tr > td:first-child {
            width: 674px;
            padding-right: 40px;
        }
        #charts_and_data table.chart .legend td:nth-child(2),
        #charts_and_data table.chart .legend td:nth-child(3),
        #charts_and_data table.chart .legend td:nth-child(4),
        #charts_and_data table.chart .legend td:nth-child(5),
        #charts_and_data table.chart .legend td:nth-child(6) {
            width: 10%;
        }

        section:nth-child(4) > p {
            margin: 0.75em 0;
        }
        #risks {
            border-collapse: collapse;
        }
        #risks td:first-child {
            border-left: 1px solid #000;
        }
        #risks td:last-child {
            border-right: 1px solid #000;
        }
        #risks td {
            border-top: 1px solid #000;
            border-bottom: 1px solid #000;
        }
        #risks th:first-child {
            width: 30px;
        }
        #risks th:nth-child(1) {
            width: 150px;
        }
        #risks th:nth-child(2) {
            width: 110px;
        }
        #risks th:nth-child(4) {
            width: 130px;
        }
        #risks th:nth-child(5) {
            width: 160px;
        }
        #risks tbody tr:nth-child(1) td:first-child {
            background-color: #0f0
        }
        #risks tbody tr:nth-child(2) td:first-child {
            background-color: #fba125
        }
        #risks tbody tr:nth-child(3) td:first-child {
            background-color: #f00
        }
        #risks tr th,
        #risks tbody tr td:nth-child(2),
        #risks tbody tr td:nth-child(4) {
            font-weight: bold;
        }
        #risks tr td:nth-child(2) {
            text-align: center;
        }
        #risks tr td:nth-child(3) {
            font-size: 80%;
        }
        #risks tr td:nth-child(4) {
            padding: 0 10px;
        }
        #plan_title {
            margin-top: 1em;
            font-size: 1.3em;
        }
        #plan {
            width: 100%;
        }
        #plan table.data td:first-child {
            width: 300px;
        }
        #plan table.data.changing_motivations td:first-child {
            width: 220px;
        }
        #plan table.data p {
            font-weight: bold;
        }
        #plan > tbody > tr > td {
            vertical-align: top;
        }
        #plan > tbody > tr > td:nth-child(1) {
            width: 400px;
        }
        #plan > tbody > tr > td:nth-child(2) {
            width: 350px;
        }
        #plan > tbody > tr > td:nth-child(3) {
            width: 350px;
        }
        #plan > tbody > tr > td {
            padding: 0.5em 0;
        }
        #plan > tbody > tr > td > p {
            font-weight: bold;
            margin: 0.25em 0;
            text-align: center;
        }
        #plan > tbody > tr > td:nth-child(2) div,
        #plan > tbody > tr > td:nth-child(3) div {
            border: 1px solid #000;
            padding: 5px;
        }
        #plan > tbody > tr:nth-child(1) > td:nth-child(2) div,
        #plan > tbody > tr:nth-child(1) > td:nth-child(3) div {
            min-height: 120px;
        }
        #plan > tbody > tr:nth-child(2) > td:nth-child(2) div,
        #plan > tbody > tr:nth-child(2) > td:nth-child(3) div {
            min-height: 120px;
        }
        #plan > tbody > tr:nth-child(3) > td:nth-child(2) div,
        #plan > tbody > tr:nth-child(3) > td:nth-child(3) div {
            min-height: 220px;
        }
        #plan > tbody > tr:nth-child(4) > td:nth-child(2) div,
        #plan > tbody > tr:nth-child(4) > td:nth-child(3) div {
            min-height: 160px;
        }
        #plan > tbody > tr:nth-child(5) > td:nth-child(2) div,
        #plan > tbody > tr:nth-child(5) > td:nth-child(3) div {
            min-height: 310px;
        }
        #plan > tbody > tr:nth-child(6) > td:nth-child(2) div,
        #plan > tbody > tr:nth-child(6) > td:nth-child(3) div {
            min-height: 210px;
        }
        #plan td .data,
        #plan td .data *,
        #plan td div {
            page-break-inside: avoid;
        }
        #plan_wheel div {
            float: left;
        }
        #plan_wheel div:first-child {
            width: 160px;
        }
        #plan_wheel div:first-child img {
            width: 100%;
        }
        #plan_wheel div:nth-child(2) {
            width: 140px;
            font-weight: bold;
            line-height: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
<section>
    <table>
        <tr>
            <td rowspan="8">
                <div id="cover_bkg">
                    <img src="{{ public_path() }}/img/cover.jpg" />
                </div>
            </td>
            <td colspan="3" style="text-align: center;">
                <img src="{{public_path()}}/img/Career-Monitor-Logo.png" style="width: 125px; height: auto;"/>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h1>Career Monitor Report</h1>
            </td>
            <td rowspan="6" id="cover_wheel">
                <img src="{{ public_path() }}/img/wheel_title_descriptions.png" />
            </td>
        </tr>
        <tr>
            <td>Participant:</td>
            <td><?php echo $survey['client_name']; ?></td>
        </tr>
        <tr>
            <td>Date Completed</td>
            <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
        </tr>
        <tr>
            <td>Completed by</td>
            <td><?php echo $survey['hrcoach_name']; ?></td>
        </tr>
        <tr>
            <td>HR Coach Network Member</td>
            <td><?php echo $survey['hrcoach_organisation']; ?></td>
        </tr>
        <tr>
            <td>Report Completed for</td>
            <td><?php echo $survey['client_organisation']; ?></td>
        </tr>
        <tr>
            <td colspan="3">
                <p>This report and all its components are protected by copyright. No part may be reproduced, copied, transmitted in any form or by any means (electronic, mechanical or graphic) without the prior written permission of HR Coach International Pty Ltd.  The Report includes comments received during the interview. Note, HR Coach International will not be held liable for ratings, comments and information provided by the particant. Please talk with your HR Coach Network Member during the feedback session on techniques in using this information.</p>
            </td>
        </tr>
    </table>
</section>

<section style="page-break-after: always;">
    <table class="ratings_and_info">
        <tr>
            <td colspan="2">
                <h3>Career Monitor Executive Summary</h3>
                <h2><?php echo $survey['client_name']; ?></h2>
            </td>
            <td colspan="5">
                <?php echo $survey['client_organisation']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Rating Monitor Summary</strong></td>
            <td></td>
            <td></td>
            <td colspan="2"><strong>Participant Information</strong></td>
            <td rowspan="6">
                <div class="career_model_wheel">
                    <img src="{{ public_path() }}/img/wheel_title_descriptions.png" />
                </div>
            </td>
        </tr>
        <tr>
            <td rowspan="5">
                <strong>Retention Rating</strong>
                <div class="retention_rating_percentage <?php echo Percent2Color($ratings['retention']); ?>">
                    <?php echo $ratings['retention'] ?>%
                </div>
                <div class="retention_rating_wheel">
                    <img src="{{ public_path() }}/img/wheel_empty.png" />
                </div>
            </td>
            <td>Business</td>
            <td><?php echo $ratings['business']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['business']); ?>">&nbsp;</div>
            </td>
            <td>Position</td>
            <td><?php echo $survey['position']; ?></td>
            <td rowspan="5"></td>
        </tr>
        <tr>
            <td>Operations</td>
            <td><?php echo $ratings['effectiveness']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['effectiveness']); ?>">&nbsp;</div>
            </td>
            <td>Department</td>
            <td><?php echo $survey['department']; ?></td>
        </tr>
        <tr>
            <td>Myself</td>
            <td><?php echo $ratings['self']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['self']); ?>">&nbsp;</div>
            </td>
            <td>Length of Service (yrs)</td>
            <td><?php echo number_format((strtotime('now') - strtotime($survey['start_date'])) / (365 * 24 * 3600), 2); ?></td>
        </tr>
        <tr>
            <td>Team Culture</td>
            <td><?php echo $ratings['culture']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['culture']); ?>">&nbsp;</div>
            </td>
            <td>Career Self Evaluation</td>
            <td><strong><?php echo $etc['career_model']; ?></strong></td>
        </tr>
        <tr>
            <td><strong>Total Retention Rating</strong></td>
            <td><strong><?php echo $ratings['retention']; ?>%</strong></td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['retention']); ?>">&nbsp;</div>
            </td>
            <td>Date Conducted</td>
            <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
        </tr>
    </table>

    <table class="charts">
        <tr>
            <td>
                <p>Business</p>
                <table class="chart">
                    <tr>
                        <td>Growth and advancement</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q10'] * 20; ?>%;">
                                <?php echo $survey['q10'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Remuneration / pay and benefits</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q11'] * 20; ?>%;">
                                <?php echo $survey['q11'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Planning &amp; decision making</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q12'] * 20; ?>%;">
                                <?php echo $survey['q12'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Knowing how the business is performing</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q13'] * 20; ?>%;">
                                <?php echo $survey['q13'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Communication and feedback</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q14'] * 20; ?>%;">
                                <?php echo $survey['q14'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total business rating</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['business']; ?>%;">
                                <?php echo $ratings['business']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>

            <td>
                <p>Operations</p>
                <table class="chart">
                    <tr>
                        <td>Planning and future direction</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q20'] * 20; ?>%;">
                                <?php echo $survey['q20'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Resources to get the job done</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q21'] * 20; ?>%;">
                                <?php echo $survey['q21'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Involvement of staff in planning &amp; implementation</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q22'] * 20; ?>%;">
                                <?php echo $survey['q22'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee management processes</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q23'] * 20; ?>%;">
                                <?php echo $survey['q23'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>How positions are structured</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q24'] * 20; ?>%;">
                                <?php echo $survey['q24'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total Operations Rating</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['effectiveness']; ?>%;">
                                <?php echo $ratings['effectiveness']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <p>Culture</p>
                <table class="chart thick_bars">
                    <tr>
                        <td>Staff</td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['culture_staff']; ?>%;">
                                <?php echo $ratings['culture_staff']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Management</td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['culture_management']; ?>%;">
                                <?php echo $ratings['culture_management']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Culture</td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['culture']; ?>%;">
                                <?php echo $ratings['culture']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>
            <td>
                <p>Changing Motivations</p>
                <table class="chart changing_motivations">
                    <tr>
                        <td>Earning potential</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q510'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q520'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Lifestyle / flexibility</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q511'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q521'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>External need for myself or family</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q512'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q522'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>The job opportunity</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q513'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q523'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>To advance my career</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q514'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q524'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Opportunity to learn</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q515'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q525'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Career choice</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q516'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q526'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>The brand and reputation</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q517'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q527'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>People</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q518'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q528'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total Variance check</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['join']; ?>%;"></div>
                            <div style="width: <?php echo $ratings['stay']; ?>%;"></div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">
                            <span id="join_legend"></span>
                            Joined
                            <span id="stay_legend"></span>
                            Stay
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</section>

<section>
    <table class="ratings_and_info">
        <tr>
            <td colspan="2">
                <h3>Business Risk Report</h3>
                <h2><?php echo $survey['client_name']; ?></h2>
            </td>
            <td colspan="5">
                <?php echo $survey['client_organisation']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Rating Monitor Summary</strong></td>
            <td></td>
            <td></td>
            <td colspan="2"><strong>Participant Information</strong></td>
            <td rowspan="6">
                <div class="career_model_wheel">
                    <img src="{{ public_path() }}/img/wheel_title_descriptions.png" />
                </div>
            </td>
        </tr>
        <tr>
            <td rowspan="5">
                <strong>Retention Rating</strong>
                <div class="retention_rating_percentage <?php echo Percent2Color($ratings['retention']); ?>">
                    <?php echo $ratings['retention'] ?>%
                </div>
                <div class="retention_rating_wheel">
                    <img src="{{ public_path() }}/img/wheel_empty.png" />
                </div>
            </td>
            <td>Business</td>
            <td><?php echo $ratings['business']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['business']); ?>">&nbsp;</div>
            </td>
            <td>Position</td>
            <td><?php echo $survey['position']; ?></td>
            <td rowspan="5"></td>
        </tr>
        <tr>
            <td>Operations</td>
            <td><?php echo $ratings['effectiveness']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['effectiveness']); ?>">&nbsp;</div>
            </td>
            <td>Department</td>
            <td><?php echo $survey['department']; ?></td>
        </tr>
        <tr>
            <td>Myself</td>
            <td><?php echo $ratings['self']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['self']); ?>">&nbsp;</div>
            </td>
            <td>Length of Service (yrs)</td>
            <td><?php echo number_format((strtotime('now') - strtotime($survey['start_date'])) / (3600*24*365), 2); ?></td>
        </tr>
        <tr>
            <td>Team Culture</td>
            <td><?php echo $ratings['culture']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['culture']); ?>">&nbsp;</div>
            </td>
            <td>Career Self Evaluation</td>
            <td><strong><?php echo $etc['career_model']; ?></strong></td>
        </tr>
        <tr>
            <td><strong>Total Retention Rating</strong></td>
            <td><strong><?php echo $ratings['retention']; ?>%</strong></td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['retention']); ?>">&nbsp;</div>
            </td>
            <td>Date Conducted</td>
            <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
        </tr>
    </table>

    <table id="charts_and_data">
        <tr>
            <td>
                <p>Business</p>
                <table class="chart">
                    <tr>
                        <td>Growth and advancement</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q10'] * 20; ?>%;">
                                <?php echo $survey['q10'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Remuneration / pay and benefits</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q11'] * 20; ?>%;">
                                <?php echo $survey['q11'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Planning &amp; decision making</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q12'] * 20; ?>%;">
                                <?php echo $survey['q12'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Knowing how the business is performing</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q13'] * 20; ?>%;">
                                <?php echo $survey['q13'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Communication and feedback</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q14'] * 20; ?>%;">
                                <?php echo $survey['q14'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total business rating</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['business']; ?>%;">
                                <?php echo $ratings['business']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>
            <td>
                <p>Business Monitor</p>
                <table class="data">
                    <tr>
                        <td>Growth and advancement</td>
                        <td><?php echo $survey['q10'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q10'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Remuneration / pay and benefits</td>
                        <td><?php echo $survey['q11'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q11'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Planning &amp; decision making</td>
                        <td><?php echo $survey['q12'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q12'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Knowing how the business is performing</td>
                        <td><?php echo $survey['q13'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q13'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Communication and feedback</td>
                        <td><?php echo $survey['q14'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q14'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total business rating</strong></td>
                        <td><strong><?php echo $ratings['business']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['business']); ?>"></div></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <p>Operations</p>
                <table class="chart">
                    <tr>
                        <td>Planning and future direction</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q20'] * 20; ?>%;">
                                <?php echo $survey['q20'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Resources to get the job done</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q21'] * 20; ?>%;">
                                <?php echo $survey['q21'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Involvement of staff in planning &amp; implementation</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q22'] * 20; ?>%;">
                                <?php echo $survey['q22'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee management processes</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q23'] * 20; ?>%;">
                                <?php echo $survey['q23'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>How positions are structured</td>
                        <td colspan="6">
                            <div style="width: <?php echo $survey['q24'] * 20; ?>%;">
                                <?php echo $survey['q24'] * 20; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total Operations Rating</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['effectiveness']; ?>%;">
                                <?php echo $ratings['effectiveness']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>
            <td>
                <p>Operations Monitor</p>
                <table class="data">
                    <tr>
                        <td>Planning and future direction</td>
                        <td><?php echo $survey['q20'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q20'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Resources to get the job done</td>
                        <td><?php echo $survey['q21'] * 20; ?>%</td>
                        <td> <div class="<?php echo Percent2Color($survey['q21'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Involvement of staff in planning &amp; implementation</td>
                        <td><?php echo $survey['q22'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q22'] * 20); ?>"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee management processes</td>
                        <td><?php echo $survey['q23'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q23'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>How positions are structured</td>
                        <td><?php echo $survey['q24'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q24'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Operations Rating</strong></td>
                        <td><strong><?php echo $ratings['effectiveness']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['effectiveness']); ?>"></div></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table id="charts_and_data" style="page-break-before: always !important;">
        <tr>
            <td>
                <p>Own Performance Factors</p>
                <table class="chart thick_bars">
                    <tr>
                        <td>Know</td>
                        <td colspan="6">
                            <div style="width: <?php echo $know['avg']; ?>%;">
                                <?php echo $know['avg']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Act</td>
                        <td colspan="6">
                            <div style="width: <?php echo $act['avg']; ?>%;">
                                <?php echo $act['avg']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend lighter">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>
            <td>
                <p>Own Performance Monitor</p>
                <table class="data">
                    <tr>
                        <td colspan="3"><strong>KNOW</strong></td>
                    </tr>
                    <tr>
                        <td>My knowledge for the job</td>
                        <td><?php echo $know[0]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($know[0]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>My knowledge for why I do the job</td>
                        <td><?php echo $know[1]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($know[1]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>My skills for the job</td>
                        <td><?php echo $know[2]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($know[2]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Know Rating</strong></td>
                        <td><strong><?php echo $know['avg']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($know['avg']); ?>"></div></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>ACT</strong></td>
                    </tr>
                    <tr>
                        <td>My effectiveness in my day to day activities in the job</td>
                        <td><?php echo $act[0]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($act[0]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>My ability to get the job done with others</td>
                        <td><?php echo $act[1]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($act[1]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>The results achieved from my job</td>
                        <td><?php echo $act[2]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($act[2]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Act Rating</strong></td>
                        <td><strong><?php echo $act['avg']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($act['avg']); ?>"></div></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td id="risk_career_model_wheel">
                <div>
                    <img src="{{ public_path() }}/img/wheel_title_descriptions.png" />
                </div>
            </td>
            <td id="risk_self_evaluation_wheel">
                <p>Career Self Evaluation</p>
                <div>
                    <div><?php echo $etc['career_model']; ?></div>
                    <div>
                        <img src="{{ public_path() }}/img/wheel_empty.png" />
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table id="charts_and_data" style="page-break-before: always !important;">
        <tr>
            <td>
                <p>Culture</p>
                <table class="chart thick_bars">
                    <tr>
                        <td>Staff</td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['culture_staff']; ?>%;">
                                <?php echo $ratings['culture_staff']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Management</td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['culture_management']; ?>%;">
                                <?php echo $ratings['culture_management']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total Culture</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['culture']; ?>%;">
                                <?php echo $ratings['culture']; ?>%
                            </div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                </table>
            </td>
            <td>
                <p>Culture Rating</p>
                <table class="data">
                    <tr>
                        <td colspan="3"><strong>Staff</strong></td>
                    </tr>
                    <tr>
                        <td>Teamwork</td>
                        <td><?php echo $survey['q410'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q410'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Customer focus</td>
                        <td><?php echo $survey['q411'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q411'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Motivated work team</td>
                        <td><?php echo $survey['q412'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q412'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Loyalty to the business</td>
                        <td><?php echo $survey['q413'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q413'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Honesty and integrity</td>
                        <td><?php echo $survey['q414'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q414'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Staff Culture</strong></td>
                        <td><strong><?php echo $ratings['culture_staff']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['culture_staff']); ?>"></div></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Management</strong></td>
                    </tr>
                    <tr>
                        <td>Being self motivated</td>
                        <td><?php echo $survey['q420'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q420'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Effective communication</td>
                        <td><?php echo $survey['q421'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q421'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Team leadership</td>
                        <td><?php echo $survey['q422'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q422'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Management and business skills</td>
                        <td><?php echo $survey['q423'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q423'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Effective planning and organising</td>
                        <td><?php echo $survey['q424'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q424'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Management</strong></td>
                        <td><strong><?php echo $ratings['culture_management']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['culture_management']); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Culture</strong></td>
                        <td><strong><?php echo $ratings['culture']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['culture']); ?>"></div></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <p>Changing Motivations</p>
                <table class="chart changing_motivations">
                    <tr>
                        <td>Earning potential</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q510'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q520'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Lifestyle / flexibility</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q511'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q521'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>External need for myself or family</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q512'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q522'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>The job opportunity</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q513'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q523'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>To advance my career</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q514'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q524'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Opportunity to learn</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q515'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q525'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Career choice</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q516'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q526'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>The brand and reputation</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q517'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q527'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>People</td>
                        <td colspan="6">
                            <div style="width: <?php echo round($survey['q518'] * 33.3); ?>%;"></div>
                            <div style="width: <?php echo round($survey['q528'] * 33.3); ?>%;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total Variance check</strong></td>
                        <td colspan="6">
                            <div style="width: <?php echo $ratings['join']; ?>%;"></div>
                            <div style="width: <?php echo $ratings['stay']; ?>%;"></div>
                        </td>
                    </tr>
                    <tr class="legend">
                        <td></td>
                        <td>0%</td>
                        <td>20%</td>
                        <td>40%</td>
                        <td>60%</td>
                        <td>80%</td>
                        <td>100%</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="6">
                            <span id="join_legend"></span>
                            Joined
                            <span id="stay_legend"></span>
                            Stay
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table class="data changing_motivations">
                    <tr>
                        <th>Changing Motivations Table</th>
                        <th>Joined</th>
                        <th>Stay</th>
                        <th>Variance</th>
                    </tr>
                    <tr>
                        <td>Earning potential</td>
                        <td><?php echo round($survey['q510'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q520'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q520'] - $survey['q510']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>Lifestyle / flexibility</td>
                        <td><?php echo round($survey['q511'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q521'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q521'] - $survey['q511']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>External need for myself or family</td>
                        <td><?php echo round($survey['q512'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q522'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q522'] - $survey['q512']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>The job opportunity</td>
                        <td><?php echo round($survey['q513'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q523'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q523'] - $survey['q513']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>To advance my career</td>
                        <td><?php echo round($survey['q514'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q524'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q524'] - $survey['q514']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>Opportunity to learn</td>
                        <td><?php echo round($survey['q515'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q525'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q525'] - $survey['q515']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>Career choice</td>
                        <td><?php echo round($survey['q516'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q526'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q526'] - $survey['q516']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>The brand and reputation</td>
                        <td><?php echo round($survey['q517'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q527'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q527'] - $survey['q517']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>People</td>
                        <td><?php echo round($survey['q518'] * 33.3); ?>%</td>
                        <td><?php echo round($survey['q528'] * 33.3); ?>%</td>
                        <td><?php echo round(($survey['q528'] - $survey['q518']) * 33.3); ?>%</td>
                    </tr>
                    <tr>
                        <td>Total Variance check</td>
                        <td><?php echo $ratings['join']; ?>%</td>
                        <td><?php echo $ratings['stay']; ?>%</td>
                        <td><?php echo ($ratings['stay'] - $ratings['join']); ?>%</td>
                    </tr>
                </table>
            </td>
    </table>
</section>

<section style="page-break-after: always;">
    <table class="ratings_and_info">
        <tr>
            <td colspan="2">
                <h3>Retention Plan</h3>
                <h2><?php echo $survey['client_name']; ?></h2>
            </td>
            <td colspan="5">
                <?php echo $survey['client_organisation']; ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><strong>Rating Monitor Summary</strong></td>
            <td></td>
            <td></td>
            <td colspan="2"><strong>Participant Information</strong></td>
            <td rowspan="6">
                <div class="career_model_wheel">
                    <img src="{{ public_path() }}/img/wheel_title_descriptions.png" />
                </div>
            </td>
        </tr>
        <tr>
            <td rowspan="5">
                <strong>Retention Rating</strong>
                <div class="retention_rating_percentage <?php echo Percent2Color($ratings['retention']); ?>">
                    <?php echo $ratings['retention'] ?>%
                </div>
                <div class="retention_rating_wheel">
                    <img src="{{ public_path() }}/img/wheel_empty.png" />
                </div>
            </td>
            <td>Business</td>
            <td><?php echo $ratings['business']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['business']); ?>">&nbsp;</div>
            </td>
            <td>Position</td>
            <td><?php echo $survey['position']; ?></td>
            <td rowspan="5"></td>
        </tr>
        <tr>
            <td>Operations</td>
            <td><?php echo $ratings['effectiveness']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['effectiveness']); ?>">&nbsp;</div>
            </td>
            <td>Department</td>
            <td><?php echo $survey['department']; ?></td>
        </tr>
        <tr>
            <td>Myself</td>
            <td><?php echo $ratings['self']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['self']); ?>">&nbsp;</div>
            </td>
            <td>Length of Service (yrs)</td>
            <td><?php echo number_format((strtotime('now') - strtotime($survey['start_date'])) / (3600*24*365), 2); ?></td>
        </tr>
        <tr>
            <td>Team Culture</td>
            <td><?php echo $ratings['culture']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['culture']); ?>">&nbsp;</div>
            </td>
            <td>Career Self Evaluation</td>
            <td><strong><?php echo $etc['career_model']; ?></strong></td>
        </tr>
        <tr>
            <td><strong>Total Retention Rating</strong></td>
            <td><?php echo $ratings['retention']; ?>%</td>
            <td>
                <div class="rating <?php echo Percent2Color($ratings['retention']); ?>">&nbsp;</div>
            </td>
            <td>Date Conducted</td>
            <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
        </tr>
    </table>

    <p id="plan_title"><strong>Guide to your Retention Plan</strong></p>
    <p>The ratings have been tested since 2008 in regards to engagement and retention of employees, based on findings of over 10,000 employees.</p>
    <p>The Risk Ratings have been established using the following:</p>
    <table id="risks">
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Risk Rating</th>
            <th>Potential Risk Period</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>75%+</td>
            <td>The employee has found alignment with the organisation and their career.  Review this report with the Green Traffic Light as an Opportunity for Growth and a 12 month priority.</td>
            <td>LOW RISK</td>
            <td>Over 12 months</td>
        </tr>
        <tr>
            <td></td>
            <td>67% - 74%</td>
            <td>The employee is generally positive towards to organisation in terms of their career.  Some alignment issues exist and should be followed up internally.  Review this report with the Amber Traffic Light as a Management Improvement and a 6 month priority.</td>
            <td>MEDIUM RISK</td>
            <td>Up to 12 months</td>
        </tr>
        <tr>
            <td></td>
            <td>67%</td>
            <td>The employee has identified aligment issues with the organisation, their career and job.  Immediate action is required.  Review this report with the Red Traffic Light as a Management of Risk and a top 3 month priority.</td>
            <td>HIGH RISK</td>
            <td>3 - 6 months</td>
        </tr>
        </tbody>
    </table>
    <p>It is suggested that a Retention Plan is completed in conjunction with the particpant at the completion of the Retention Interview.</p>
    <p>Review the Report findings with your HR Coach.  This is a business improvement strategy to enable businesses to proactively manage retention of employees and maximise growth opportuities in their business.  The Retention Plan process may be facilitated by your HR Coach to enable maximum value from your joint planning meeting.</p>
    <h2 style="page-break-before: always;">Retention Planner for: <?php echo $survey['client_name']; ?></h2>
    <p style="margin-top:-10px">Review each component of the feedback and discuss issues, opportunities and planning considerations for both the employee and the business.</p>
    <table id="plan">
        <tr style="page-break-inside: avoid;">
            <td>
                <p style="margin-top:-5px">Business Monitor</p>
                <table class="data">
                    <tr>
                        <td>Growth and advancement</td>
                        <td><?php echo $survey['q10'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q10'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Remuneration / pay and benefits</td>
                        <td><?php echo $survey['q11'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q11'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Planning &amp; decision making</td>
                        <td><?php echo $survey['q12'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q12'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Knowing how the business is performing</td>
                        <td><?php echo $survey['q13'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q13'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Communication and feedback</td>
                        <td><?php echo $survey['q14'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q14'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total business rating</strong></td>
                        <td><strong><?php echo $ratings['business']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['business']); ?>"></div></td>
                    </tr>
                </table>
            </td>
            <td>
                <p style="margin-top:-5px">Key Discussion Points</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['comments_business']); ?></div>
            </td>
            <td>
                <p style="margin-top:-5px">Action Plan</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['plan_business']); ?></div>
            </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td>
                <p style="margin-top:-5px">Operations Monitor</p>
                <table class="data">
                    <tr>
                        <td>Planning and future direction</td>
                        <td><?php echo $survey['q20'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q20'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Resources to get the job done</td>
                        <td><?php echo $survey['q21'] * 20; ?>%</td>
                        <td> <div class="<?php echo Percent2Color($survey['q21'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Involvement of staff in planning &amp; implementation</td>
                        <td><?php echo $survey['q22'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q22'] * 20); ?>"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee management processes</td>
                        <td><?php echo $survey['q23'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q23'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>How positions are structured</td>
                        <td><?php echo $survey['q24'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q24'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Operations Rating</strong></td>
                        <td><strong><?php echo $ratings['effectiveness']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['effectiveness']); ?>"></div></td>
                    </tr>
                </table>
            </td>
            <td>
                <p style="margin-top:-5px">Key Discussion Points</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['comments_effectiveness']); ?></div>
            </td>
            <td>
                <p style="margin-top:-5px">Action Plan</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['plan_effectiveness']); ?></div>
            </td>
        </tr>
        <tr style="page-break-inside:avoid;">
            <td>
                <p style="margin-top:-5px">Own Performance Monitor</p>
                <table class="data">
                    <tr>
                        <td colspan="3"><strong>KNOW</strong></td>
                    </tr>
                    <tr>
                        <td>My knowledge for the job</td>
                        <td><?php echo $know[0]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($know[0]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>My knowledge for why I do the job</td>
                        <td><?php echo $know[1]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($know[1]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>My skills for the job</td>
                        <td><?php echo $know[2]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($know[2]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Know Rating</strong></td>
                        <td><strong><?php echo $know['avg']; ?>%<strong></td>
                        <td><div class="<?php echo Percent2Color($know['avg']); ?>"></div></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>ACT</strong></td>
                    </tr>
                    <tr>
                        <td>My effectiveness in my day to day activities in the job</td>
                        <td><?php echo $act[0]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($act[0]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>My ability to get the job done with others</td>
                        <td><?php echo $act[1]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($act[1]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>The results achieved from my job</td>
                        <td><?php echo $act[2]; ?>%</td>
                        <td><div class="<?php echo Percent2Color($act[2]); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Act Rating</strong></td>
                        <td><strong><?php echo $act['avg']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($act['avg']); ?>"></div></td>
                    </tr>
                </table>
            </td>
            <td>
                <p style="margin-top:-5px">Key Discussion Points</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['comments_self']); ?></div>
            </td>
            <td>
                <p style="margin-top:-5px">Action Plan</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['plan_self']); ?></div>
            </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td>
                <p>Career Self Evaluation</p>
                <div id="plan_wheel">
                    <div>
                        <img src="{{ public_path() }}/img/wheel_empty.png" />
                    </div>
                    <div><?php echo $etc['career_model']; ?></div>
                </div>
            </td>
            <td>
                <p>Key Discussion Points</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['comments_model']); ?></div>
            </td>
            <td>
                <p>Action Plan</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['plan_model']); ?></div>
            </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td>
                <p>Culture Rating</p>
                <table class="data">
                    <tr>
                        <td colspan="3"><strong>Staff</strong></td>
                    </tr>
                    <tr>
                        <td>Teamwork</td>
                        <td><?php echo $survey['q410'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q410'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Customer focus</td>
                        <td><?php echo $survey['q411'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q411'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Motivated work team</td>
                        <td><?php echo $survey['q412'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q412'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Loyalty to the business</td>
                        <td><?php echo $survey['q413'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q413'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Honesty and integrity</td>
                        <td><?php echo $survey['q414'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q414'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Staff Culture</strong></td>
                        <td><strong><?php echo $ratings['culture_staff']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['culture_staff']); ?>"></div></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Management</strong></td>
                    </tr>
                    <tr>
                        <td>Being self motivated</td>
                        <td><?php echo $survey['q420'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q420'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Effective communication</td>
                        <td><?php echo $survey['q421'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q421'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Team leadership</td>
                        <td><?php echo $survey['q422'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q422'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Management and business skills</td>
                        <td><?php echo $survey['q423'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q423'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td>Effective planning and organising</td>
                        <td><?php echo $survey['q424'] * 20; ?>%</td>
                        <td><div class="<?php echo Percent2Color($survey['q424'] * 20); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Management</strong></td>
                        <td><strong><?php echo $ratings['culture_management']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['culture_management']); ?>"></div></td>
                    </tr>
                    <tr>
                        <td><strong>Total Culture</strong></td>
                        <td><strong><?php echo $ratings['culture']; ?>%</strong></td>
                        <td><div class="<?php echo Percent2Color($ratings['culture']); ?>"></div></td>
                    </tr>
                </table>
            </td>
            <td>
                <p>Key Discussion Points</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['comments_culture_staff']) . '<br /><br />' . nl2br($survey['comments_culture_management']); ?></div>
            </td>
            <td>
                <p>Action Plan</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['plan_culture_staff']) . '<br /><br />' . nl2br($survey['plan_culture_management']); ?></div>
            </td>
        </tr>
        <tr style="page-break-inside: avoid;">
            <td>
                <br /><br /><br /><div style="page-break-inside:avoid;">
                    <table class="data changing_motivations">
                        <tr>
                            <th>Changing Motivations Table</th>
                            <th>Joined</th>
                            <th>Stay</th>
                            <th>Variance</th>
                        </tr>
                        <tr>
                            <td>Earning potential</td>
                            <td><?php echo round($survey['q510'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q520'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q520'] - $survey['q510']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>Lifestyle / flexibility</td>
                            <td><?php echo round($survey['q511'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q521'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q521'] - $survey['q511']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>External need for myself or family</td>
                            <td><?php echo round($survey['q512'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q522'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q522'] - $survey['q512']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>The job opportunity</td>
                            <td><?php echo round($survey['q513'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q523'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q523'] - $survey['q513']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>To advance my career</td>
                            <td><?php echo round($survey['q514'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q524'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q524'] - $survey['q514']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>Opportunity to learn</td>
                            <td><?php echo round($survey['q515'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q525'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q525'] - $survey['q515']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>Career choice</td>
                            <td><?php echo round($survey['q516'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q526'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q526'] - $survey['q516']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>The brand and reputation</td>
                            <td><?php echo round($survey['q517'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q527'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q527'] - $survey['q517']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>People</td>
                            <td><?php echo round($survey['q518'] * 33.3); ?>%</td>
                            <td><?php echo round($survey['q528'] * 33.3); ?>%</td>
                            <td><?php echo round(($survey['q528'] - $survey['q518']) * 33.3); ?>%</td>
                        </tr>
                        <tr>
                            <td>Total Variance check</td>
                            <td><?php echo $ratings['join']; ?>%</td>
                            <td><?php echo $ratings['stay']; ?>%</td>
                            <td><?php echo ($ratings['stay'] - $ratings['join']); ?>%</td>
                        </tr>
                    </table></div>
            </td>
            <td>
                <br /><br /><br /><p>Key Discussion Points</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['comments_stay']).'<br /><br />'.nl2br($survey['comments_join']); ?></div>
            </td>
            <td>
                <br /><br /><br /><p>Action Plan</p>
                <div style="width: 350px; overflow: hidden; text-overflow: ellipsis; word-break: break-all;"><?php echo nl2br($survey['plan_change']); ?></div>
            </td>
        </tr>
    </table>
</section>

<div style="page-break-before: always;">
    <section style="page-break-before: always;">
        <table style="width:100%">
            <tr>
                <td>
                    <h3>Background Information</h3>
                    <h2><?php echo $survey['client_name']; ?></h2>
                </td>
                <td style="vertical-align:top;">
                    <div style="float:right"><?php echo $survey['client_organisation']; ?></div>
                </td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><strong>Generation: </strong>
                    <?php if ($survey['generation'] == 'z') {
                        echo 'Generation Z ( born 1989-2006)';
                    } elseif ($survey['generation'] == 'y') {
                        echo 'Generation Y ( born 1978-1988)';
                    } elseif ($survey['generation'] == 'x') {
                        echo 'Generation X ( born 1965-1977)';
                    } elseif ($survey['generation'] == 'boomer') {
                        echo 'Baby Boomer ( born 1946-1964)';
                    } elseif ($survey['generation'] == 'veteran') {
                        echo 'Veterans ( born 1929-1945)';
                    } ?>
                </td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>Background:</strong><br /><?php echo nl2br($survey['background']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>Your role now:</strong><br /><?php echo nl2br($survey['role']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>What has your job experience been like for you so far?</strong><br /><?php echo nl2br($survey['experience']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>Is it what you expected?</strong><br /><?php echo nl2br($survey['expectations']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>What do you want to gain from working here?</strong><br /><?php echo nl2br($survey['gain']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>What do you want to achieve for yourself over the next 12 months?</strong><br /><?php echo nl2br($survey['achieve']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>Why do you stay?</strong><br /><?php echo nl2br($survey['reason']); ?></td>
            </tr>
            <tr style="page-break-inside: avoid;">
                <td colspan="2"><br /><strong>How can you contribute to the business success in the next 12 months?</strong><br /><?php echo nl2br($survey['contribution']); ?></td>
            </tr>
        </table>
    </section>
</div>
</body>
</html>