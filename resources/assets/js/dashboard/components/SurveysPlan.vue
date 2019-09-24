<template>
    <div style="background: white;">
        <v-form
            ref="form"
            lazy-validation
        >

            <v-container grid-list-xs>
                <v-layout row wrap>
                    <v-flex xs12 class="mb-3">
                        <h2 class="text-xs-center font-weight-bold">
                            Career Monitor Executive Summary
                        </h2>
                    </v-flex>

                    <v-flex xs6 class="mb-2">
                        <div class="text-xs-left">
                            Name: {{ this.survey.client_name }}
                        </div>
                    </v-flex>
                    <v-flex xs6 class="mb-2">
                        <div class="text-xs-right">
                            Organisation: {{ this.survey.client_organisation }}
                        </div>
                    </v-flex>

                    <v-flex xs2 class="mb-2 text-xs-center">
                        Retention Rating
                        <div :style="{ width: '100%', textAlign: 'center', color: 'black', background: this.etc.retention_color }">{{ this.ratings.retention }}%</div>
                        <v-img src="/img/wheel_empty.png"></v-img>
                    </v-flex>
                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs>
                            <v-layout wrap>
                                <v-flex xs6>
                                    <h3 class="text-xs-left font-weight-bold">
                                        Rating Monitor Summary
                                    </h3>
                                </v-flex>
                                <v-flex xs6>
                                    <h3 class="text-xs-left font-weight-bold">
                                        Participant Information
                                    </h3>
                                </v-flex>

                                <v-flex xs4>
                                    Business
                                </v-flex>
                                <v-flex xs2>
                                    {{ this.ratings.business }}%
                                </v-flex>
                                <v-flex xs3>
                                    Position
                                </v-flex>
                                <v-flex xs3>
                                    {{ this.survey.position }}
                                </v-flex>

                                <v-flex xs4>
                                    Operations
                                </v-flex>
                                <v-flex xs2>
                                    {{ this.ratings.effectiveness }}%
                                </v-flex>
                                <v-flex xs3>
                                    Department
                                </v-flex>
                                <v-flex xs3>
                                    {{ this.survey.department }}
                                </v-flex>

                                <v-flex xs4>
                                    Myself
                                </v-flex>
                                <v-flex xs2>
                                    {{ this.ratings.self }}%
                                </v-flex>
                                <v-flex xs3>
                                    Length of Service (yrs)
                                </v-flex>
                                <v-flex xs3>
                                    {{ this.etc.service_yrs }}
                                </v-flex>

                                <v-flex xs4>
                                    Team Culture
                                </v-flex>
                                <v-flex xs2>
                                    {{ this.ratings.culture }}%
                                </v-flex>
                                <v-flex xs3>
                                    Career Self Evaluation
                                </v-flex>
                                <v-flex xs3 class="font-weight-bold">
                                    {{ this.etc.career_model }}
                                </v-flex>

                                <v-flex xs4 class="font-weight-bold">
                                    Total Retention Rating
                                </v-flex>
                                <v-flex xs2 class="font-weight-bold">
                                    {{ this.ratings.retention }}%
                                </v-flex>
                                <v-flex xs3>
                                    Date Conducted
                                </v-flex>
                                <v-flex xs3>
                                    {{ this.survey.interview_date }}
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs2 class="mb-2">
                        <v-img src="/img/career-model.png"></v-img>
                    </v-flex>

                    <v-flex xs12 class="mb-2">
                        <h3 class="text-xs-left font-weight-bold">
                            Guide to your Retention Plan
                        </h3>
                    </v-flex>
                    <v-flex xs12 class="mb-2">
                        <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">The ratings have been tested since 2008 in regards to engagement and retention of employees, based on findings of over 10,000 employees.</p>
                        <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">The Risk Ratings have been established using the following:</p>
                    </v-flex>
                    <v-flex xs12 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>
                                <v-flex xs1 class="mb-2">&nbsp;</v-flex>
                                <v-flex xs1 class="mb-2">&nbsp;</v-flex>
                                <v-flex xs6 class="mb-2">&nbsp;</v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">Risk Rating</v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">Potential Risk Period</v-flex>

                                <v-flex xs1 class="mb-2">
                                    <div style="width: 100%; background: green;">&nbsp;</div>
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-center">75%+</v-flex>
                                <v-flex xs6 class="mb-2">
                                    <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">The employee has found alignment with the organisation and their career. Review this report with the Green Traffic Light as an Opportunity for Growth and a 12 month priority.</p>
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">LOW RISK</v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">Over 12 months</v-flex>

                                <v-flex xs1 class="mb-2">
                                    <div style="width: 100%; background: yellow;">&nbsp;</div>
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-center">67% ~ 74%</v-flex>
                                <v-flex xs6 class="mb-2">
                                    <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">The employee is generally positive towards to organisation in terms of their career. Some alignment issues exist and should be followed up internally. Review this report with the Amber Traffic Light as a Management Improvement and a 6 month priority.</p>
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">MEDIUM RISK</v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">Up to 12 months</v-flex>

                                <v-flex xs1 class="mb-2">
                                    <div style="width: 100%; background: red;">&nbsp;</div>
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-center">67%</v-flex>
                                <v-flex xs6 class="mb-2">
                                    <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">The employee has identified aligment issues with the organisation, their career and job. Immediate action is required. Review this report with the Red Traffic Light as a Management of Risk and a top 3 month priority.</p>
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">HIGH RISK</v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-center">3 - 6 months</v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs12 class="mb-2">
                        <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">It is suggested that a Retention Plan is completed in conjunction with the participant at the completion of the Retention Interview.</p>
                        <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">Review the Report findings with your HR Coach. This is a business improvement strategy to enable businesses to proactively manage retention of employees and maximise growth opportunities in their business. The Retention Plan process may be facilitated by your HR Coach to enable maximum value from your joint planning meeting.</p>
                    </v-flex>

                    <v-flex xs12 class="mb-2">
                        <h2 class="text-xs-left font-weight-bold">
                            Retention Planner for: {{ this.survey.client_name }}
                        </h2>
                    </v-flex>
                    <v-flex xs12 class="mb-2">
                        <p class="ma-0 py-0 pl-2" style="font-weight: normal !important;">Review each component of the feedback and discuss issues, opportunities and planning considerations for both the employee and the business.</p>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Business Monitor
                                    </h3>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Growth and advancement
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q10 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q10 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Remuneration / pay and benefits
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q11 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q11 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Planning & decision making
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q12 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q12 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Knowing how the business is performing
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q13 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q13 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Communication and feedback
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q14 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q14 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total business rating
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold">
                                    {{ this.ratings.business }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.ratings.business ) }">&nbsp;</div>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_business"
                                            rows="10" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_business"
                                                rows="10" label="" outline solo
                                                maxlength="300" counter="300"></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Operations Monitor
                                    </h3>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Planning and future direction
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q20 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q20 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Resources to get the job done
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q21 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q21 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Involvement of staff in planning &amp; implementation
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q22 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q22 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Employee management processes
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q23 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q23 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    How positions are structured
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q24 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q24 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total Operations Rating
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold">
                                    {{ this.ratings.effectiveness }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.ratings.effectiveness ) }">&nbsp;</div>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_effectiveness"
                                                rows="10" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_effectiveness"
                                                rows="10" label="" outline solo
                                                maxlength="300" counter="300"></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Own Performance Monitor
                                    </h3>
                                </v-flex>

                                <v-flex xs12 class="mb-2">
                                    <h4 class="text-xs-left font-weight-bold">
                                        Know
                                    </h4>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    My knowledge for the job
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.know[0] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.know[0] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    My knowledge for why I do the job
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.know[1] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.know[1] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    My skills for the job
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.know[2] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.know[2] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total Know Rating
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.know['avg'] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.know['avg'] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs12 class="mb-2">
                                    <h4 class="text-xs-left font-weight-bold">
                                        Act
                                    </h4>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    My effectiveness in my day to day activities in the job
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.act[0] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.act[0] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    My ability to get the job done with others
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.act[1] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.act[1] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    The results achieved from my job
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.act[2] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.act[2] ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total Act Rating
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold">
                                    {{ this.act['avg'] }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.act['avg'] ) }">&nbsp;</div>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_self"
                                                rows="20" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_self"
                                                rows="20" label="" outline solo
                                                maxlength="300" counter="300" solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Career Self Evaluation
                                    </h3>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    <v-img src="/img/wheel_empty.png"></v-img>
                                </v-flex>
                                <v-flex xs6 class="mb-2 text-xs-center font-weight-bold">
                                    {{ this.etc.career_model }}
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_model"
                                                rows="6" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_model"
                                                rows="6" label="" outline solo
                                                maxlength="300" counter="300"></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Culture Rating
                                    </h3>
                                </v-flex>

                                <v-flex xs12 class="mb-2">
                                    <h4 class="text-xs-left font-weight-bold">
                                        Staff
                                    </h4>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Teamwork
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q410 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q410 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Customer focus
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q411 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q411 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Motivated work team
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q412 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q412 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Loyalty to the business
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q413 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q413 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Honesty and integrity
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q414 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q414 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total Staff Culture
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold">
                                    {{ this.ratings.culture_staff }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.ratings.culture_staff ) }">&nbsp;</div>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_culture_staff"
                                                rows="10" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_culture_staff"
                                                rows="10" label="" outline solo
                                                maxlength="300" counter="300"></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h4 class="text-xs-left font-weight-bold">
                                        Management
                                    </h4>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Being self motivated
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q420 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q420 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Effective communication
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q421 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q421 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Team leadership
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q422 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q422 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Management and business skills
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q423 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q423 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2">
                                    Effective planning and organising
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    {{ this.survey.q424 * 20 }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.survey.q424 * 20 ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total Management
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold">
                                    {{ this.ratings.culture_management }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.ratings.culture_management ) }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs8 class="mb-2 font-weight-bold">
                                    Total Culture
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold">
                                    {{ this.ratings.culture }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2">
                                    <div :style="{ width: '100%', background: this.Percent2Color( this.ratings.culture ) }">&nbsp;</div>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_culture_management"
                                                rows="12" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_culture_management"
                                                rows="12" label="" outline solo
                                                maxlength="300" counter="300"></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Changing Motivations Table
                                    </h3>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-center">
                                    <h5 class="text-xs-center font-weight-bold">
                                        Joined
                                    </h5>
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-center">
                                    <h5 class="text-xs-center font-weight-bold">
                                        Stayed
                                    </h5>
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-center">
                                    <h5 class="text-xs-center font-weight-bold">
                                        Variance
                                    </h5>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Earning potential
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q510 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q520 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q520 - this.survey.q510 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Lifestyle / flexibility
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q511 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q521 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q521 - this.survey.q511 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    External need for myself or family
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q512 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q522 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q522 - this.survey.q512 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    The job opportunity
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q513 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q523 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q523 - this.survey.q513 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    To advance my career
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q514 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q524 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q524 - this.survey.q514 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Opportunity to learn
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q515 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q525 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q525 - this.survey.q515 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Career choice
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q516 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q526 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q526 - this.survey.q516 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    The brand and reputation
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q517 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q527 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q527 - this.survey.q517 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    People
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q518 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( this.survey.q528 * 33.3 ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-right">
                                    {{ this.Round( ( this.survey.q528 - this.survey.q518 ) * 33.3 ) }}%
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total Variance check
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-right">
                                    {{ this.Round( this.ratings.join ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-right">
                                    {{ this.Round( this.ratings.stay ) }}%
                                </v-flex>
                                <v-flex xs2 class="mb-2 font-weight-bold text-xs-right">
                                    {{ this.Round( this.ratings.join - this.ratings.stay ) }}%
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Key Discussion Points
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.comments_change"
                                                rows="19" label="" outline disabled solo></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs12 class="mb-2">
                                    <h3 class="text-xs-center font-weight-bold">
                                        Action Plan
                                    </h3>
                                </v-flex>

                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.plan_change"
                                                rows="19" label="" outline solo
                                                maxlength="300" counter="300"></v-textarea>
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                </v-layout>
            </v-container>

            <v-toolbar flat color="white">
                <v-container grid-list-xs>
                    <v-layout wrap>
                        <v-flex xs12 class="text-xs-center">
                            <v-btn color="primary" dark class="mb-2" @click.native="save"
                                   :loading="downloading"
                                   :disabled="downloading">FINISH SURVEY</v-btn>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-toolbar>
        </v-form>

        <v-layout column class="fab-container">
            <v-tooltip left>
                <template v-slot:activator="{on}">
                    <v-btn
                            v-on="on"
                            color="error"
                            fab
                            dark
                            :loading="downloading"
                            :disabled="downloading"
                            @click.native="save">
                        <v-icon>done</v-icon>
                    </v-btn>
                </template>
                <span>Jump to next page</span>
            </v-tooltip>
            <v-tooltip left>
                <template v-slot:activator="{on}">
                    <v-btn
                            v-on="on"
                            color="warning"
                            fab
                            dark
                            :loading="bFeedbacking"
                            :disabled="bFeedbacking"
                            @click.native="goFeedback">
                        <v-icon>keyboard_arrow_left</v-icon>
                    </v-btn>
                </template>
                <span>Go back</span>
            </v-tooltip>
            <v-tooltip left>
                <template v-slot:activator="{on}">
                    <v-btn
                            v-on="on"
                            color="primary"
                            fab
                            dark
                            @click.native="scrollTop">
                        <v-icon>keyboard_arrow_up</v-icon>
                    </v-btn>
                </template>
                <span>Scroll to top</span>
            </v-tooltip>
        </v-layout>

        <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
            {{ snackText }}
            <v-btn flat @click="snack = false">Close</v-btn>
        </v-snackbar>
    </div>
</template>
<script>
    let download = require('downloadjs');

    export default {
        data: () => ({
            bFeedbacking: false,
            downloading: false,

            snack: false,
            snackText: '',
            snackColor: '',

            editedItem: {
                id: '',
                hash: '',

                client_name: '',

                comments_business: '',
                comments_effectiveness: '',
                comments_self: '',
                comments_model: '',
                comments_culture_staff: '',
                comments_culture_management: '',
                comments_change: '',

                plan_business: '',
                plan_effectiveness: '',
                plan_self: '',
                plan_model: '',
                plan_culture_staff: '',
                plan_culture_management: '',
                plan_change: '',
            },
            survey: [],
            ratings: [],
            etc: [],
            know: [],
            act: [],
        }),

        computed: {
        },

        mounted() {
            let style = {
                base: {
                    border: '1px solid #D8D8D8',
                    borderRadius: '4px',
                    color: "#000",
                },
                invalid: {
                    // All of the error styles go inside of here.
                }
            };
        },

        watch: {

        },

        created () {
            this.editedItem.hash = this.$route.params.hash;
            this.fetchSurvey( this.$route.params.hash );
        },
        events: {

        },

        methods: {
            showLoader() {
                $("#preloader").show().removeClass('none').css('opacity', 1);
            },
            hideLoader() {
                $("#preloader").hide();
            },
            Percent2Color( percent ) {
                switch (true) {
                    case percent < 66.5:
                        return 'red';
                        break;

                    case percent >= 66.5 && percent < 74.5:
                        return 'yellow';
                        break;

                    case percent >= 74.5:
                        return 'green';
                        break;

                    default:
                        return '';
                        break;
                }
            },
            Round( decimal ){
                return Math.round( decimal );
            },

            scrollTop(){
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            },

            goFeedback(){
                let self = this;
                self.bFeedbacking = true;

                axios.post('/surveys/state/'+ self.editedItem.hash, {
                    state: 'ANSWERED'
                })
                .then(r => {
                    self.$router.push({ path: '/surveys/feedback/' + self.editedItem.hash });
                    self.$router.go(1);
                    self.bFeedbacking = false;
                })
                .catch(e => {
                    self.bFeedbacking = false;
                    self.snack = true;
                    self.snackColor = 'error';
                    self.snackText = 'Update failed, try again later...';
                });
            },

            fetchSurvey ( hash ) {
                let self = this;
                axios.get('/surveys/plan/' + hash)
                    .then(r => {
                        if( r.data.survey.status == 'NEW' ){
                            self.$router.push({ path: '/surveys/input/' + hash });
                            self.$router.go(1);
                        } else if( r.data.survey.status == 'ANSWERED' ){
                            self.$router.push({ path: '/surveys/feedback/' + hash });
                            self.$router.go(1);
                        } else if( r.data.survey.status == 'COMMENTED' ){

                        } else if( r.data.survey.status == 'FINISHED' ){
                            self.$router.push({ path: '/surveys' });
                            self.$router.go(1);
                        }

                        self.survey = r.data.survey;
                        self.ratings = r.data.ratings;
                        self.etc = r.data.etc;
                        self.know = r.data.know;
                        self.act = r.data.act;

                        self.editedItem.comments_business        = self.survey.comments_business;
                        self.editedItem.comments_effectiveness   = self.survey.comments_effectiveness;
                        self.editedItem.comments_self            = self.survey.comments_self;
                        self.editedItem.comments_model           = self.survey.comments_model;
                        self.editedItem.comments_culture_staff   = self.survey.comments_culture_staff;
                        self.editedItem.comments_culture_management = self.survey.comments_culture_management;
                        self.editedItem.comments_change          = self.survey.comments_join + "\r\n" + self.survey.comments_stay;
                    })
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },
            save() {
                let self = this;
                self.downloading = true;
                axios.post('/surveys/plan', this.editedItem).then(r => {

                    for (let i = 0; i < 2; i++) {
                        axios({
                            url: '/surveys/report/' + self.survey.id + '/download?full=' + i,
                            method: 'post',
                            withCredentials: true,
                            responseType: 'blob',
                            headers: {
                                'Accept': (self.survey.client_name + (i === 1 ? '-full.pdf' : '-small.pdf'))
                            },
                        }).then(r => {
                            download(r.data, (self.survey.client_name + (i === 1 ? '-full.pdf' : '-small.pdf')));

                            if( i == 1 ){
                                self.$router.push({ path: '/surveys' });
                                self.$router.go(1);
                                self.downloading = false;
                            }

                        }).catch((error) => {
                            self.snack = true;
                            self.snackColor = 'error';                            
                            self.snackText = error.response.status === 403 ? 'No permissions to access this file' : 'Unknown error';
                            self.downloading = false;
                        });
                    }

                });
            },
        }
    }
</script>