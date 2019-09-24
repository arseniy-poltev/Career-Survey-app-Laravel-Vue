<template>
    <div>
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
        >
            <v-card class="elevation-5">
                <v-card-title>
                    <h3>Participant details</h3>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field v-model="editedItem.client_name" :rules="[rules.required]"
                                              label="Client Name"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="editedItem.client_organisation" :rules="[rules.required]"
                                              label="Client Organisation"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="editedItem.client_email" :rules="[rules.required]"
                                              label="Client Email"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.gender" :items="genders"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Gender"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="editedItem.position" :rules="[rules.required]"
                                              label="Position"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="editedItem.department" :rules="[rules.required]"
                                              label="Department"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-menu
                                        :close-on-content-click="false"
                                        v-model="menu_start_date"
                                        :nudge-right="40"
                                        lazy
                                        transition="scale-transition"
                                        offset-y
                                        full-width
                                        max-width="290px"
                                        min-width="290px"
                                >
                                    <v-text-field
                                            slot="activator"
                                            v-model="computedStateDateFormatted"
                                            label="Start Date"
                                            prepend-icon="event"
                                            readonly
                                            :rules="[rules.required]"
                                    ></v-text-field>
                                    <v-date-picker v-model="editedItem.start_date" @input="menu_start_date = false"></v-date-picker>
                                </v-menu>
                            </v-flex>
                            <v-flex xs12>
                                <v-menu
                                        :close-on-content-click="false"
                                        v-model="menu_interview_date"
                                        :nudge-right="40"
                                        lazy
                                        transition="scale-transition"
                                        offset-y
                                        full-width
                                        max-width="290px"
                                        min-width="290px"
                                >
                                    <v-text-field
                                            slot="activator"
                                            v-model="computedInterviewDateFormatted"
                                            label="Date Of Interview"
                                            prepend-icon="event"
                                            readonly
                                            :rules="[rules.required]"
                                    ></v-text-field>
                                    <v-date-picker v-model="editedItem.interview_date" @input="menu_interview_date = false"></v-date-picker>
                                </v-menu>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.generation" :items="generations"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Generation"></v-select>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <h3>Participant Background Information details</h3>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.background"
                                            rows="3" label="Background"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.role"
                                            rows="3" label="Your role now"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.experience"
                                            rows="3" label="What has your job experience been like for you so far?"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.expectations"
                                            rows="3" label="Is it what you expected?"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.gain"
                                            rows="3" label="What do you want to gain from working here?"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.achieve"
                                            rows="3" label="What do you want to achieve for yourself over the next 12 months?"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.reason"
                                            rows="3" label="Why do you stay?"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.contribution"
                                            rows="3" label="How can you contribute to the business success in the next 12 months?"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>1. How you rate the business</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Poor, 2 - Fair, 3 - Meets minimal expectations, 4 - Good, 5 - Excellent</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q10" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Opportunities for growth and advancement"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q11" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Remuneration/ pay and benefits"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q12" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Efficient planning & decision making"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q13" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Knowing how the business is performing"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q14" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Communication and feedback"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_business"
                                            rows="3" label="Comments (Note - this information will copy into the summary reports)"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>2. How you rate operational effectiveness</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Poor, 2 - Fair, 3 - Meets minimal expectations, 4 - Good, 5 - Excellent</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q20" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Planning and future direction"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q21" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Having the resources to get the job done"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q22" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Involvement of staff in planning & implementation"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q23" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Employee management processes"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q24" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="How positions are structured"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_effectiveness"
                                            rows="3" label="Comments (Note - this information will copy into the summary reports)"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>3. How you rate yourself</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Poor, 2 - Fair, 3 - Meets minimal expectations, 4 - Good, 5 - Excellent</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q30" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="My knowledge for the job"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q31" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="My knowledge for why I do the job"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q32" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="My skills for the job"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q33" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="My effectiveness in my day to day activities in the job"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q34" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="My ability to get the job done with others"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q35" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="The results achieved from my job"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_self"
                                            rows="3" label="Comments (Note - this information will copy into the summary reports)"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <h3>Career Monitor Model</h3>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12 md6>
                                <v-container grid-list-xs>
                                    <v-layout wrap>
                                        <v-flex xs3></v-flex>
                                        <v-flex xs6>
                                            <v-img src="img/career-model.jpg"></v-img>
                                        </v-flex>
                                        <v-flex xs3></v-flex>
                                    </v-layout>
                                </v-container>
                            </v-flex>
                            <v-flex xs12 md6>
                                <v-container grid-list-xs>
                                    <v-layout wrap>
                                        <v-flex xs12>
                                            <v-select v-model="editedItem.qm" :items="career_model"
                                                      item-text="label" item-value="value"
                                                      :rules="[rules.required]" label="Review the Career Monitor Model. Where to you place yourself?"></v-select>
                                        </v-flex>
                                        <v-flex xs12>
                                            <v-textarea v-model="editedItem.comments_model"
                                                        rows="5" label="Why?"
                                                        maxlength="300" counter="300"></v-textarea>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>4. How would you rate your workplace culture Employees</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Poor, 2 - Fair, 3 - Meets minimal expectations, 4 - Good, 5 - Excellent</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q410" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Teamwork"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q411" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Customer focus"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q412" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Motivated work team"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q413" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Loyalty to the business"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q414" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Honesty and integrity"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_culture_staff"
                                            rows="3" label="Comments (Note - this information will copy into the summary reports)"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>Management</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Poor, 2 - Fair, 3 - Meets minimal expectations, 4 - Good, 5 - Excellent</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q420" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Being self motivated"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q421" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Effective communication"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q422" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Team leadership"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q423" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Management and business skills"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q424" :items="questions"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Effective planning and organising"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_culture_management"
                                            rows="3" label="Comments (Note - this information will copy into the summary reports)"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>5. Reasons For Joining Why you joined this organisation</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Not part of the reason, 2 - Played a part in my decision, 3 - Definitely a major part in my decision</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q510" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Earning potential"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q511" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Lifestyle / flexibility"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q512" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="External need for myself or family"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q513" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="The job opportunity"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q514" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="To advance my career"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q515" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Opportunity to learn"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q516" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Career choice"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q517" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="The brand and reputation"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q518" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="People"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_join"
                                            rows="3" label="Other"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-card class="elevation-5">
                <v-card-title>
                    <v-flex xs12 md6>
                        <h3>Why you stay in this organisation</h3>
                    </v-flex>
                    <v-flex xs12 md6 class="text-sm-right text-md-right">
                        <h5>1 - Not part of the reason, 2 - Played a part in my decision, 3 - Definitely a major part in my decision</h5>
                    </v-flex>
                </v-card-title>

                <v-divider></v-divider>

                <v-card-text>
                    <v-container grid-list-xs>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q520" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Earning potential"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q521" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Lifestyle / flexibility"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q522" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="External need for myself or family"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q523" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="The job opportunity"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q524" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="To advance my career"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q525" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Opportunity to learn"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q526" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="Career choice"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q527" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="The brand and reputation"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select v-model="editedItem.q528" :items="questions2"
                                          item-text="label" item-value="value"
                                          :rules="[rules.required]" label="People"></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-textarea v-model="editedItem.comments_stay"
                                            rows="3" label="Other"
                                            maxlength="300" counter="300"></v-textarea>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
            </v-card>

            <v-spacer class="pa-3"></v-spacer>

            <v-toolbar flat color="white">
                <v-container grid-list-xs>
                    <v-layout wrap>
                        <v-flex xs12 class="text-xs-center">
                            <v-btn color="primary" dark class="mb-2" @click.native="save"
                                   :loading="inputing"
                                   :disabled="inputing">Submit</v-btn>
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
                            :loading="inputing"
                            :disabled="inputing"
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
            inputing: false,

            genders: [
                { value: 'MALE', label: 'Male' },
                { value: 'FEMALE', label: 'Female' },
            ],
            generations: [
                { value: 'z', label: 'Generation Z (born 1989-2006)' },
                { value: 'y', label: 'Generation Y (born 1978-1988)' },
                { value: 'x', label: 'Generation X (born 1965-1977)' },
                { value: 'boomer',  label: 'Baby Boomer (born 1946-1964)' },
                { value: 'veteran', label: 'Veterans (born 1929-1945)' },
            ],
            questions: [
                { value: 1, label: 'Poor' },
                { value: 2, label: 'Fair' },
                { value: 3, label: 'Meets minimal expectations' },
                { value: 4, label: 'Good' },
                { value: 5, label: 'Excellent' },
            ],
            questions2: [
                { value: 1, label: 'Not part of the reason' },
                { value: 2, label: 'Played a part in my decision' },
                { value: 3, label: 'Definitely a major part in my decision' },
            ],
            career_model: [
                { value: 1, label: 'Career Maker' },
                { value: 2, label: 'Career Breaker' },
                { value: 3, label: 'Career Staller' },
                { value: 4, label: 'Career Risk' },
            ],
            menu_start_date: false,
            menu_interview_date: false,
            valid: false,
            snack: false,
            snackText: '',
            snackColor: '',
            editedItem: {
                hash: '',
                client_name: '',
                client_organisation: '',
                client_email: '',
                gender: '',
                position: '',
                department: '',
                start_date: '',
                interview_date: '',
                generation: '',
                background: '',
                role: '',
                experience: '',
                expectations: '',
                gain: '',
                achieve: '',
                reason: '',
                contribution: '',
                q10: '',
                q11: '',
                q12: '',
                q13: '',
                q14: '',
                comments_business: '',
                q20: '',
                q21: '',
                q22: '',
                q23: '',
                q24: '',
                comments_effectiveness: '',
                q30: '',
                q31: '',
                q32: '',
                q33: '',
                q34: '',
                q35: '',
                comments_self: '',
                qm: '',
                comments_model: '',
                q410: '',
                q411: '',
                q412: '',
                q413: '',
                q414: '',
                comments_culture_staff: '',
                q420: '',
                q421: '',
                q422: '',
                q423: '',
                q424: '',
                comments_culture_management: '',
                q510: '',
                q511: '',
                q512: '',
                q513: '',
                q514: '',
                q515: '',
                q516: '',
                q517: '',
                q518: '',
                comments_join: '',
                q520: '',
                q521: '',
                q522: '',
                q523: '',
                q524: '',
                q525: '',
                q526: '',
                q527: '',
                q528: '',
                comments_stay: ''
            },
            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 8 || 'Min 8 characters'
            },
        }),

        computed: {
            computedStateDateFormatted () {
                return this.formatDate(this.editedItem.start_date);
            },

            computedInterviewDateFormatted () {
                return this.formatDate(this.editedItem.interview_date);
            }
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
            this.fetchSurvey( this.editedItem.hash );
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

            formatDate (date) {
                if (!date) return null

                const [year, month, day] = date.split('-')
                return `${day}/${month}/${year}`
            },

            scrollTop(){
                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            },

            fetchSurvey( hash ) {
                let self = this;
                axios.get('/surveys/input/' + hash)
                    .then(r => {

                        self.editedItem = r.data;

                        if( r.data.status == 'NEW' ){

                        } else if( r.data.status == 'ANSWERED' ){
                            self.$router.push({ path: '/surveys/feedback/' + hash });
                            self.$router.go(1);
                        } else if( r.data.status == 'COMMENTED' ){
                            self.$router.push({ path: '/surveys/plan/' + hash });
                            self.$router.go(1);
                        } else if( r.data.status == 'FINISHED' ){
                            self.$router.push({ path: '/surveys' });
                            self.$router.go(1);
                        }
                    })
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },
            save() {
                let self = this;
                if( this.$refs.form.validate() ){
                    self.inputing = true;
                    axios.post('/surveys/input', this.editedItem).then(r => {
                        self.$router.push({ path: '/surveys/feedback/' + r.data.hash });
                        self.$router.go(1);
                        self.inputing = false;
                    });
                }
            },
        }
    }
</script>