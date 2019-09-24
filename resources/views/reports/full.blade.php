<?php

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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Full</title>

    <style type="text/css" media="all">
        @font-face {
            font-family: "Arimo";
            src: local("{{ public_path() }}/fonts/Arimo") format("truetype");
            font-weight: normal;
            font-style: normal;
        }

        html {
            font-family: 'Arimo', sans-serif;
            font-size: 12px;
        }

        .w20p {
            width: 20%;
        }
        .w25p {
            width: 25%;
        }
        .w50p {
            width: 50%;
        }
        .w60p {
            width: 60%;
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

        .tbl-fixed {
            table-layout: fixed;
            width: 100%;
        }

        section {
            margin: 0px;
            padding: 0px;
        }

        h1 {
            font-size: 60px;
        }

        h2 {
            margin-bottom: 0px;
            font-size: 50px;
        }
        h3 {
            margin-bottom: 0px;
            font-size: 40px;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .font-size-16px {
            font-size: 16px;
        }
        .font-size-18px {
            font-size: 18px;
        }
        .font-size-20px {
            font-size: 20px;
        }
        .font-size-24px {
            font-size: 24px;
        }
        .font-size-28px {
            font-size: 28px;
        }
        .font-size-32px {
            font-size: 32px;
        }
        .font-size-36px {
            font-size: 36px;
        }
    </style>
</head>
<body>
<section style="page-break-after: always;">
    <table style="width: 100%; font-size: 20px;">
        <tr>
            <td>
                <img src="{{public_path()}}/img/cover.jpg" style="width: 200px; height: auto;"/>
            </td>
            <td>
                <div style="width: 100px; color: white;">&nbsp;</div>
            </td>
            <td>
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3">
                            <h3>Career Monitor Report</h3>
                        </td>
                    </tr>
                    <tr height="50">
                        <td>Participant:</td>
                        <td><?php echo $survey['client_name']; ?></td>
                        <td rowspan="5" class="text-middle text-center">
                            <img src="{{public_path()}}/img/career-model.png" style="width: 250px; height: auto;"/>
                        </td>
                    </tr>
                    <tr height="50">
                        <td>Date Completed</td>
                        <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
                    </tr>
                    <tr height="50">
                        <td>Completed by</td>
                        <td><?php echo $survey['hrcoach_name']; ?></td>
                    </tr>
                    <tr height="50">
                        <td>HR Coach Network Member</td>
                        <td><?php echo $survey['hrcoach_organisation']; ?></td>
                    </tr>
                    <tr height="50">
                        <td>Report Completed for</td>
                        <td><?php echo $survey['client_organisation']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="color: white; height: 150px;">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-bottom">
                            <p style="font-size: 16px;">This report and all its components are protected by copyright. No part may be reproduced, copied, transmitted in any form or by any means (electronic, mechanical or graphic) without the prior written permission of HR Coach International Pty Ltd.  The Report includes comments received during the interview. Note, HR Coach International will not be held liable for ratings, comments and information provided by the particant. Please talk with your HR Coach Network Member during the feedback session on techniques in using this information.</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <div style="width: 100px; color: white;">&nbsp;</div>
            </td>
        </tr>
    </table>
</section>

<section style="page-break-after: always;">
    <table style="width: 100%;">
        <tr>
            <td class="font-weight-bold font-size-24px" colspan="2">
                Career Monitor Executive Summary
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold font-size-32px" width="50%">
                <?php echo $survey['client_name']; ?>
            </td>
            <td class="text-right font-weight-bold font-size-20px" width="50%">
                <?php echo $survey['client_organisation']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%;">
                    <tr>
                        <td rowspan="6" class="text-center text-middle">
                            <h2>Retention Rating</h2>
                            <div style="margin: 0 auto; width: 100px; background: <?php echo Percent2Color($ratings['retention']); ?>">
                                <?php echo $ratings['retention'] ?>%
                            </div>
                            <img src="{{public_path()}}/img/wheel_empty.png" style="width: 100px; height: auto;"/>
                        </td>
                        <td class="font-weight-bold font-size-16px" colspan="3">
                            Rating Monitor Summary
                        </td>
                        <td class="font-weight-bold font-size-16px" colspan="2">
                            Participant Information
                        </td>
                        <td rowspan="6" class="text-center text-middle">
                            <img src="{{public_path()}}/img/career-model.png" style="width: 100px; height: auto;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Business</td>
                        <td><?php echo $ratings['business']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['business']); ?>"></div>
                        </td>
                        <td>Position</td>
                        <td><?php echo $survey['position']; ?></td>
                    </tr>
                    <tr>
                        <td>Operations</td>
                        <td><?php echo $ratings['effectiveness']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['effectiveness']); ?>"></div>
                        </td>
                        <td>Department</td>
                        <td><?php echo $survey['department']; ?></td>
                    </tr>
                    <tr>
                        <td>Myself</td>
                        <td><?php echo $ratings['self']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['self']); ?>"></div>
                        </td>
                        <td>Length of Service (yrs)</td>
                        <td><?php echo number_format((strtotime('now') - strtotime($survey['start_date'])) / (365 * 24 * 3600), 2); ?></td>
                    </tr>
                    <tr>
                        <td>Team Culture</td>
                        <td><?php echo $ratings['culture']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['effectiveness']); ?>"></div>
                        </td>
                        <td>Career Self Evaluation</td>
                        <td><strong><?php echo $etc['career_model']; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total Retention Rating</strong></td>
                        <td><?php echo $ratings['retention']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['retention']); ?>"></div>
                        </td>
                        <td>Date Conducted</td>
                        <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="7" class="font-weight-bold font-size-16px text-center">Business</td>
                        <td colspan="7" class="font-weight-bold font-size-16px text-center">Operations</td>
                    </tr>
                    <tr>
                        <td class="text-right">Growth and advancement</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q10'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q10'] * 20; ?>%</div>
                        </td>
                        <td class="text-right">Planning and future direction</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q20'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q20'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Remuneration / pay and benefits</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q11'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q11'] * 20; ?>%</div>
                        </td>
                        <td class="text-right">Resources to get the job done</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q21'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q21'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Planning & decision making</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q12'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q12'] * 20; ?>%</div>
                        </td>
                        <td class="text-right">Involvement of staff in planning & implementation</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q22'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q22'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Knowing how the business is performing</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q13'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q13'] * 20; ?>%</div>
                        </td>
                        <td class="text-right">Employee management processes</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q23'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q23'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Communication and feedback</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q14'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q14'] * 20; ?>%</div>
                        </td>
                        <td class="text-right">How positions are structured</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q24'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q24'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold">Total business rating</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $ratings['business']; ?>%; background: #3376C3;"><?php echo $ratings['business']; ?>%</div>
                        </td>
                        <td class="text-right font-weight-bold">Total Operations Rating</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $ratings['effectiveness']; ?>%; background: #3376C3;"><?php echo $ratings['effectiveness']; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="width: 33px;">0%</td>
                        <td style="width: 33px;">20%</td>
                        <td style="width: 33px;">40%</td>
                        <td style="width: 33px;">60%</td>
                        <td style="width: 33px;">80%</td>
                        <td style="width: 33px;">100%</td>
                        <td></td>
                        <td style="width: 33px;">0%</td>
                        <td style="width: 33px;">20%</td>
                        <td style="width: 33px;">40%</td>
                        <td style="width: 33px;">60%</td>
                        <td style="width: 33px;">80%</td>
                        <td style="width: 33px;">100%</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%" class="text-top">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="7" class="font-weight-bold font-size-16px text-center">Culture</td>
                    </tr>
                    <tr>
                        <td class="text-right">Staff</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 30px; width: <?php echo $ratings['culture_staff']; ?>%; background: #3376C3;"><?php echo $ratings['culture_staff']; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Management</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 30px; width: <?php echo $ratings['culture_management']; ?>%; background: #3376C3;"><?php echo $ratings['culture_management']; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold">Total Culture</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 30px; width: <?php echo $ratings['culture']; ?>%; background: #3376C3;"><?php echo $ratings['culture']; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="width: 33px;">0%</td>
                        <td style="width: 33px;">20%</td>
                        <td style="width: 33px;">40%</td>
                        <td style="width: 33px;">60%</td>
                        <td style="width: 33px;">80%</td>
                        <td style="width: 33px;">100%</td>
                    </tr>
                </table>
            </td>
            <td width="50%">
                <table style="width: 100%;" cellpadding="0">
                    <tr>
                        <td colspan="7" class="font-weight-bold font-size-16px text-center">Changing Motivations</td>
                    </tr>
                    <tr>
                        <td class="text-right">Earning potential</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q510'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q520'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Lifestyle / flexibility</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q511'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q521'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">External need for myself or family</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q512'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q522'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">The job opportunity</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q513'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q523'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">To advance my career</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q514'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q524'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Opportunity to learn</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q515'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q525'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Career choice</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q516'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q526'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">The brand and reputation</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q517'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q527'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">People</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q518'] * 33.3; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $survey['q528'] * 33.3; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold">Total Variance check</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 5px; width: <?php echo $ratings['join']; ?>%; background: #B9D4F8;"></div>
                            <div style="text-align: right; height: 5px; width: <?php echo $ratings['stay']; ?>%; background: #3376C3;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="width: 33px;">0%</td>
                        <td style="width: 33px;">20%</td>
                        <td style="width: 33px;">40%</td>
                        <td style="width: 33px;">60%</td>
                        <td style="width: 33px;">80%</td>
                        <td style="width: 33px;">100%</td>
                    </tr>
                    <tr>
                        <td class="text-right">Joined</td>
                        <td>
                            <div style="height: 15px; width: 20px; background: #B9D4F8;"></div>
                        </td>
                        <td>
                            <div style="height: 15px; width: 20px; background: #3376C3;"></div>
                        </td>
                        <td colspan="4">
                            Stay
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</section>

<section style="page-break-after: always;">
    <table style="width: 100%;">
        <tr>
            <td class="font-weight-bold font-size-18px" colspan="2">
                Business Risk Report
            </td>
        </tr>
        <tr>
            <td class="font-weight-bold font-size-20px" width="50%">
                <?php echo $survey['client_name']; ?>
            </td>
            <td class="text-right font-weight-bold font-size-20px" width="50%">
                <?php echo $survey['client_organisation']; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%;">
                    <tr>
                        <td rowspan="6" class="text-center text-middle">
                            <h2>Retention Rating</h2>
                            <div style="margin: 0 auto; width: 100px; background: <?php echo Percent2Color($ratings['retention']); ?>">
                                <?php echo $ratings['retention'] ?>%
                            </div>
                            <img src="{{public_path()}}/img/wheel_empty.png" style="width: 100px; height: auto;"/>
                        </td>
                        <td class="font-weight-bold font-size-16px" colspan="3">
                            Rating Monitor Summary
                        </td>
                        <td class="font-weight-bold font-size-16px" colspan="2">
                            Participant Information
                        </td>
                        <td rowspan="6" class="text-center text-middle">
                            <img src="{{public_path()}}/img/career-model.png" style="width: 100px; height: auto;"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Business</td>
                        <td><?php echo $ratings['business']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['business']); ?>"></div>
                        </td>
                        <td>Position</td>
                        <td><?php echo $survey['position']; ?></td>
                    </tr>
                    <tr>
                        <td>Operations</td>
                        <td><?php echo $ratings['effectiveness']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['effectiveness']); ?>"></div>
                        </td>
                        <td>Department</td>
                        <td><?php echo $survey['department']; ?></td>
                    </tr>
                    <tr>
                        <td>Myself</td>
                        <td><?php echo $ratings['self']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['self']); ?>"></div>
                        </td>
                        <td>Length of Service (yrs)</td>
                        <td><?php echo number_format((strtotime('now') - strtotime($survey['start_date'])) / (365 * 24 * 3600), 2); ?></td>
                    </tr>
                    <tr>
                        <td>Team Culture</td>
                        <td><?php echo $ratings['culture']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['effectiveness']); ?>"></div>
                        </td>
                        <td>Career Self Evaluation</td>
                        <td><strong><?php echo $etc['career_model']; ?></strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total Retention Rating</strong></td>
                        <td><?php echo $ratings['retention']; ?>%</td>
                        <td>
                            <div style="width: 60px; height: 10px; background: <?php echo Percent2Color($ratings['retention']); ?>"></div>
                        </td>
                        <td>Date Conducted</td>
                        <td><?php echo date('d/m/Y', strtotime($survey['interview_date'])); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="7" class="font-weight-bold font-size-16px text-center">Business</td>
                    </tr>
                    <tr>
                        <td class="text-right">Growth and advancement</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q10'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q10'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Remuneration / pay and benefits</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q11'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q11'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Planning & decision making</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q12'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q12'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Knowing how the business is performing</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q13'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q13'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Communication and feedback</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q14'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q14'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold">Total business rating</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $ratings['business']; ?>%; background: #3376C3;"><?php echo $ratings['business']; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="width: 33px;">0%</td>
                        <td style="width: 33px;">20%</td>
                        <td style="width: 33px;">40%</td>
                        <td style="width: 33px;">60%</td>
                        <td style="width: 33px;">80%</td>
                        <td style="width: 33px;">100%</td>
                    </tr>
                </table>
            </td>
            <td width="50%" class="text-top">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" class="font-weight-bold font-size-16px text-center">Business Monitor</td>
                    </tr>
                    <tr>
                        <td>Growth and advancement</td>
                        <td>
                            <?php echo $survey['q10'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q10'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Remuneration / pay and benefits</td>
                        <td>
                            <?php echo $survey['q11'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q11'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Planning & decision making</td>
                        <td>
                            <?php echo $survey['q12'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q12'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Knowing how the business is performing</td>
                        <td>
                            <?php echo $survey['q13'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q13'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Communication and feedback</td>
                        <td>
                            <?php echo $survey['q14'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q14'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Total business rating</td>
                        <td>
                            <?php echo $ratings['business']; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $ratings['business']); ?>;"></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td width="50%">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="7" class="font-weight-bold font-size-16px text-center">Operations</td>
                    </tr>
                    <tr>
                        <td class="text-right">Planning and future direction</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q20'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q20'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Resources to get the job done</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q21'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q21'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Involvement of staff in planning & implementation</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q22'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q22'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">Employee management processes</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q23'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q23'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">How positions are structured</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $survey['q24'] * 20; ?>%; background: #3376C3;"><?php echo $survey['q24'] * 20; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right font-weight-bold">Total Operations Rating</td>
                        <td colspan="6">
                            <div style="text-align: right; height: 15px; width: <?php echo $ratings['effectiveness']; ?>%; background: #3376C3;"><?php echo $ratings['effectiveness']; ?>%</div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="width: 33px;">0%</td>
                        <td style="width: 33px;">20%</td>
                        <td style="width: 33px;">40%</td>
                        <td style="width: 33px;">60%</td>
                        <td style="width: 33px;">80%</td>
                        <td style="width: 33px;">100%</td>
                    </tr>
                </table>
            </td>
            <td width="50%" class="text-top">
                <table style="width: 100%;">
                    <tr>
                        <td colspan="3" class="font-weight-bold font-size-16px text-center">Operations Monitor</td>
                    </tr>
                    <tr>
                        <td>Planning and future direction</td>
                        <td>
                            <?php echo $survey['q20'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q20'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Resources to get the job done</td>
                        <td>
                            <?php echo $survey['q21'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q21'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Involvement of staff in planning & implementation</td>
                        <td>
                            <?php echo $survey['q22'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q22'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Employee management processes</td>
                        <td>
                            <?php echo $survey['q23'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q23'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>How positions are structured</td>
                        <td>
                            <?php echo $survey['q24'] * 20; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $survey['q24'] * 20); ?>;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Total Operations Rating</td>
                        <td>
                            <?php echo $ratings['effectiveness']; ?>%
                        </td>
                        <td>
                            <div style="height: 15px; width: 50px; background: <?php echo Percent2Color( $ratings['effectiveness']); ?>;"></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</section>
</body>
</html>