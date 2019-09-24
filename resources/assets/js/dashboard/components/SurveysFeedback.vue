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
                            Business
                        </h3>
                    </v-flex>

                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>

                                <v-flex xs6 class="mb-2">
                                    Growth and advancement
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q10 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Remuneration / pay and benefits
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q11 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Planning & decision making
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q12 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Knowing how the business is performing
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q13 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Communication and feedback
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q14 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total business rating
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.ratings.business + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    0%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    20%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    40%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    60%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    80%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-right">
                                    100%
                                </v-flex>

                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2 py-0">
                        <v-textarea v-model="editedItem.comments_business"
                                    rows="8" label="" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                    <v-flex xs12 class="mb-2">
                        <h3 class="text-xs-left font-weight-bold">
                            Operations
                        </h3>
                    </v-flex>

                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>
                                <v-flex xs6 class="mb-2">
                                    Planning and future direction
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q20 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Resources to get the job done
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q21 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Involvement of staff in planning & implementation
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q22 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Employee management processes
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q23 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    How positions are structured
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q24 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total Operations Rating
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.ratings.effectiveness + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    0%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    20%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    40%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    60%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    80%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-right">
                                    100%
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2 py-0">
                        <v-textarea v-model="editedItem.comments_effectiveness"
                                    rows="8" label="" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                    <v-flex xs12 class="mb-2">
                        <h3 class="text-xs-left font-weight-bold">
                            Own Performance Factors
                        </h3>
                    </v-flex>
                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>
                                <v-flex xs6 class="mb-2">
                                    Know
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: ( (this.survey.q30 + this.survey.q31 + this.survey.q32) * 16.66 / 3 ) + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Act
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: ( (this.survey.q33 + this.survey.q34 + this.survey.q35) * 16.66 / 3 ) + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-left">
                                    40%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-left">
                                    60%
                                </v-flex>
                                <v-flex xs2 class="mb-2 text-xs-left">
                                    80%
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2 py-0">
                        <v-textarea v-model="editedItem.comments_self"
                                    rows="2" label="" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                    <v-flex xs4 class="mb-2">
                        <p class="font-weight-normal">Career Self Evaluation</p>
                        <p class="px-5 font-weight-bold">
                            :{{ this.etc.career_model }}
                        </p>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-img src="/img/wheel_title_descriptions.png"></v-img>
                    </v-flex>
                    <v-flex xs4 class="mb-2">
                        <v-textarea v-model="editedItem.comments_model"
                                    rows="15" label="" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                    <v-flex xs12 class="mb-2">
                        <h3 class="text-xs-left font-weight-bold">
                            Culture
                        </h3>
                    </v-flex>
                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>
                                <v-flex xs6 class="mb-2">
                                    Teamwork
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q410 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Customer focus
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q411 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Motivated work team
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q412 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Loyalty to the business
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q413 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Honesty and integrity
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q414 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total Staff
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.ratings.culture_staff + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    0%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    20%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    40%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    60%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    80%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-right">
                                    100%
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2 py-0">
                        <v-textarea v-model="editedItem.comments_culture_staff"
                                    rows="8" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>
                                <v-flex xs6 class="mb-2">
                                    Being self motivated
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q420 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Effective communication
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q421 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Team leadership
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q422 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Management and business skills
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q423 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Effective planning and organising
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q424 * 20 + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total Management
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.ratings.culture_management + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total Culture
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: ((this.ratings.culture_staff + this.ratings.culture_management)/2) + '%', background: 'blue' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    0%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    20%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    40%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    60%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    80%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-right">
                                    100%
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2 py-0">
                        <v-textarea v-model="editedItem.comments_culture_management"
                                    rows="10" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                    <v-flex xs12 class="mb-2">
                        <h3 class="text-xs-left font-weight-bold">
                            Changing Motivations
                        </h3>
                    </v-flex>
                    <v-flex xs8 class="mb-2">
                        <v-container grid-list-xs class="py-0">
                            <v-layout wrap>
                                <v-flex xs6 class="mb-2">
                                    Earning potential
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q510 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q520 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Lifestyle / flexibility
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q511 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q521 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    External need for myself or family
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q512 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q522 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    The job opportunity
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q513 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q523 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    To advance my career
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q514 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q524 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Opportunity to learn
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q515 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q525 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    Career choice
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q516 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q526 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    The brand and reputation
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q517 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q527 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    People
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.survey.q518 * 33.3 + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.survey.q528 * 33.3 + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    Total Variance check
                                </v-flex>
                                <v-flex xs6 class="mb-2">
                                    <div :style="{ width: this.ratings.join + '%', background: 'blue' }">&nbsp;</div>
                                    <div :style="{ width: this.ratings.stay + '%', background: 'red' }">&nbsp;</div>
                                </v-flex>

                                <v-flex xs6 class="mb-2 font-weight-bold">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    0%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    20%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    40%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    60%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-left">
                                    80%
                                </v-flex>
                                <v-flex xs1 class="mb-2 text-xs-right">
                                    100%
                                </v-flex>

                                <v-flex xs6 class="mb-2">
                                    &nbsp;
                                </v-flex>
                                <v-flex xs3 class="mb-2 font-weight-bold text-xs-left">
                                    <div :style="{ width: '25%', background: 'blue' }">&nbsp;</div>Join
                                </v-flex>
                                <v-flex xs3 class="mb-2 font-weight-bold text-xs-left">
                                    <div :style="{ width: '25%', background: 'red' }">&nbsp;</div>Stay
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-flex>
                    <v-flex xs4 class="mb-2 py-0">
                        <v-textarea v-model="editedItem.comments_join"
                                    rows="12" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                        <v-textarea v-model="editedItem.comments_stay"
                                    rows="12" outline solo
                                    maxlength="300" counter="300"></v-textarea>
                    </v-flex>

                </v-layout>
            </v-container>

            <v-toolbar flat color="white">
                <v-container grid-list-xs>
                    <v-layout wrap>
                        <v-flex xs12 class="text-xs-center">
                            <v-btn color="primary" dark class="mb-2" @click.native="save"
                                   :loading="feedbacking"
                                   :disabled="feedbacking">CREATE REPORT</v-btn>
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
                            :loading="feedbacking"
                            :disabled="feedbacking"
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
                            :loading="editing"
                            :disabled="editing"
                            @click.native="goEdit">
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
    export default {
        data: () => ({
            feedbacking: false,
            editing: false,

            snack: false,
            snackText: '',
            snackColor: '',

            editedItem: {
                hash: '',

                comments_business: '',
                comments_effectiveness: '',
                comments_self: '',
                comments_model: '',
                comments_culture_staff: '',
                comments_culture_management: '',
                comments_join: '',
                comments_stay: ''
            },
            survey: [],
            ratings: [],
            etc: [],
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
            goEdit(){
                let self = this;
                self.editing = true;
                self.$router.push({ path: '/surveys/edit/' + self.editedItem.hash });
                self.$router.go(1);
                self.editing = false;
            },
            scrollTop(){
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            },
            fetchSurvey ( hash ) {
                let self = this;
                axios.get('/surveys/feedback/' + hash)
                    .then(r => {
                        if( r.data.survey.status == 'NEW' ){
                            self.$router.push({ path: '/surveys/input/' + hash });
                            self.$router.go(1);
                        } else if( r.data.survey.status == 'ANSWERED' ){

                        } else if( r.data.survey.status == 'COMMENTED' ){
                            self.$router.push({ path: '/surveys/plan/' + hash });
                            self.$router.go(1);
                        } else if( r.data.survey.status == 'FINISHED' ){
                            self.$router.push({ path: '/surveys' });
                            self.$router.go(1);
                        }

                        self.survey = r.data.survey;
                        self.ratings = r.data.ratings;
                        self.etc = r.data.etc;

                        self.editedItem.comments_business           = self.survey.comments_business;
                        self.editedItem.comments_effectiveness      = self.survey.comments_effectiveness;
                        self.editedItem.comments_self               = self.survey.comments_self;
                        self.editedItem.comments_model              = self.survey.comments_model;
                        self.editedItem.comments_culture_staff      = self.survey.comments_culture_staff;
                        self.editedItem.comments_culture_management = self.survey.comments_culture_management;
                        self.editedItem.comments_join               = self.survey.comments_join;
                        self.editedItem.comments_stay               = self.survey.comments_stay;
                    })
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },
            save() {
                let self = this;
                self.feedbacking = true;
                axios.post('/surveys/feedback', this.editedItem).then(r => {
                    self.$router.push({ path: '/surveys/plan/' + r.data.hash });
                    self.$router.go(1);
                    self.feedbacking = false;
                });
            },
        }
    }
</script>