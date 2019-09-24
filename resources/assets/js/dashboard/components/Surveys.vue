<style>
    .v-input__control {
        width: 100% !important
    }
</style>
<template>
    <div>
        <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="createNewSurvey" max-width="800px">
                <v-btn slot="activator" color="primary" dark class="mb-2">Add survey</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap v-if="user.access_level<5">
                                <v-flex xs12>
                                    <v-text-field v-model="editedItem.client_name" :rules="[rules.required]"
                                                  label="Client Name"></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field v-model="editedItem.client_organisation" :rules="[rules.required]"
                                                  label="Client Organisation"></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field v-model="editedItem.client_email" :rules="[rules.email]"
                                                  label="Client Email"></v-text-field>
                                </v-flex>
                            </v-layout>
                            <v-layout wrap v-if="user.access_level===5">
                                <v-flex xs6>
                                    <v-card>
                                        <v-toolbar color="indigo" dark>
                                            <v-toolbar-title>Users</v-toolbar-title>
                                            <v-spacer></v-spacer>
                                            <v-text-field v-model="user_keyword" placeholder="Search users by name" @input="keywordUp"></v-text-field>
                                        </v-toolbar>
                                        <v-list two-line style="height: 200px; overflow-y: auto;" dense>
                                            <v-radio-group v-model="user_selected">
                                                <template v-for="one in user_list">
                                                    <v-list-tile @click="selectUser(one.id)">
                                                        <v-list-tile-action>
                                                            <v-radio :value="one.id" :key="one.id"></v-radio>
                                                        </v-list-tile-action>
                                                        <v-list-tile-content>
                                                            <v-list-tile-title>{{ one.name }}</v-list-tile-title>
                                                            <v-list-tile-sub-title>{{ one.email }}</v-list-tile-sub-title>
                                                        </v-list-tile-content>
                                                    </v-list-tile>
                                                </template>
                                            </v-radio-group>
                                        </v-list>
                                    </v-card>
                                </v-flex>

                                <v-flex xs6>
                                    <v-container grid-list-md>
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
                                                <v-text-field v-model="editedItem.client_email" :rules="[rules.email]"
                                                              label="Client Email"></v-text-field>
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click.native="createNewSurvey=false">Cancel</v-btn>
                        <v-btn color="blue darken-1" flat @click.native="save">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <v-dialog v-model="dialog" max-width="500px">
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
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
                                    <v-text-field v-model="editedItem.client_email" :rules="[rules.email]"
                                                  label="Client Email"></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click.native="close">Cancel</v-btn>
                        <v-btn color="blue darken-1" flat @click.native="save">Save</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <v-dialog v-model="stripeModal" max-width="500px">
                <v-card>
                    <v-card-title>
                        <span class="headline">Price depends on your access level. Checkout: $ {{ orderPrice }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <div ref="card"></div>
                        </v-container>
                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click.native="purchase">Purchase</v-btn>
                        <v-btn color="blue darken-1" flat @click.native="stripeModal=false">Cancel</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-toolbar>
        <v-data-table
                :headers="headers"
                :items="surveys"
                hide-actions
                class="elevation-1"
                expand
                disable-initial-sort
        >
            <template slot="items" slot-scope="props">
                <td class="px-3">{{ props.item.client_name }}</td>
                <td class="px-3">{{ props.item.client_organisation}}</td>
                <td class="px-3">{{ props.item.client_email }}</td>
                <td class="px-3 text-xs-center">{{ props.item.created_at | formatDate }}</td>
                <td class="px-3 text-xs-center">{{ props.item.status }}</td>
                <td class="px-3 text-xs-center">
                    <v-btn v-if="props.item.paid != 1 && props.item.status == 'NEW'" color="primary" @click="setStripeModal(props.item.id)">Pay</v-btn>
                    <v-icon v-else-if="props.item.paid != 1 && props.item.status != 'NEW'">cancel</v-icon>
                    <v-icon v-else-if="props.item.paid == 1 && props.item.status == 'NEW'">done</v-icon>
                    <v-icon v-else-if="props.item.paid == 1 && props.item.status != 'NEW'">done</v-icon>
                </td>
                <td>
                    <div v-if="props.item.paid == 1 && props.item.status === 'NEW'">
                        <v-btn
                                color="primary"
                                :to="{ path: '/surveys/input/' + props.item.hash}"
                                target="_blank"
                        >
                            Input
                        </v-btn>
                    </div>
                    <div v-if="props.item.paid == 1 && props.item.status === 'ANSWERED'">
                        <v-btn
                                color="primary"
                                :to="{ path: '/surveys/feedback/' + props.item.hash}"
                                target="_blank"
                        >
                            Feedback
                        </v-btn>
                    </div>
                    <div v-if="props.item.paid == 1 && props.item.status === 'COMMENTED'">
                        <v-btn
                                color="info"
                                :to="{ path: '/surveys/plan/' + props.item.hash}"
                                target="_blank"
                        >
                            Plan
                        </v-btn>
                    </div>
                    <div v-if="props.item.paid == 1 && props.item.status === 'FINISHED'">
                        <v-btn color="primary"
                               @click.native="downloadReports(props.item)"
                               :loading="downloading"
                               :disabled="downloading"
                        >
                            Download
                        </v-btn>
                    </div>
                </td>
                <td class="layout px-3">
                    <v-icon
                            small
                            class="mr-2"
                            @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon>
                </td>
            </template>
            <template slot="no-data">
                <v-btn color="primary" @click="fetchSurveys">Reset</v-btn>
            </template>
        </v-data-table>
        <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
            {{ snackText }}
            <v-btn flat @click="snack = false">Close</v-btn>
        </v-snackbar>
    </div>
</template>
<script>
    // TODO UNCOMMENT
    let stripe = Stripe(window.Localize.stripePublicKey),
        elements = stripe.elements(),
        card = undefined;

    let download = require('downloadjs');

    export default {
        data: () => ({
            downloading: false,

            stripeModal: false,
            orderToPay: null,

            snack: false,
            snackText: '',
            snackColor: '',

            dialog: false,
            createNewSurvey: false,

            user: null,
            user_list: null,
            user_selected: null,
            user_keyword: null,

            headers: [
                { text: 'Client Name', value: 'client_name', align: 'left', width: '1%', class: 'px-3' },
                { text: 'Client Organisation', value: 'client_organisation', align: 'left', width: '1%', class: 'px-3' },
                { text: 'Client Email', value: 'client_email', align: 'left', width: '1%', class: 'px-3' },
                { text: 'Create Time', value: 'created_at', align: 'center', width: '1%', class: 'px-3' },
                { text: 'Status', value: 'status', align: 'center', width: '1%', class: 'px-3' },
                { text: 'Paid', value: 'paid', align: 'center', width: '1%', class: 'px-3' },
                { text: 'Actions',value: 'status', align: 'center', width: '1%', class: 'px-3' },
                { text: '*', value: 'id', align: 'center', width: '1%', class: 'px-3' },
            ],

            surveys: [],
            editedIndex: -1,
            editedItem: {
                hash: '',
                client_name: '',
                client_organisation: '',
                client_email: '',
            },
            defaultItem: {
                hash: '',
                client_name: '',
                client_organisation: '',
                client_email: '',
            },

            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 8 || 'Min 8 characters',
                email: value => {
                    if(value.length === 0 ){
                        return 'Required e-mail.';
                    }
                    if(value.length > 0) {
                        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        return pattern.test(value) || 'Invalid e-mail.';
                    }
                }
            },
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'New survey' : 'Edit survey'
            },
            orderPrice() {
                return window.Localize.orderPrice;
            },
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

            // TODO UNCOMMENT
            card = elements.create('card', style);
            card.mount(this.$refs.card);
        },

        watch: {
            dialog (val) {
                val || this.close()
            }
        },

        created () {
            this.user = window.Localize.user;
            this.fetchUsers();
            this.fetchSurveys();
        },

        beforeDestroy() {
            // TODO UNCOMMENT
            card.destroy();
        },

        methods: {
            showLoader() {
                $("#preloader").show().removeClass('none').css('opacity', 1);
            },
            hideLoader() {
                $("#preloader").hide();
            },
            purchase() {
                let self = this;
                this.showLoader();

                if( window.Localize.orderPrice == 0 ){

                    axios.post('/surveys/pay/' + self.orderToPay, {
                    }).then(r => {
                        self.orderToPay = null;
                        self.stripeModal = false;
                        self.snack = true;
                        self.snackColor = 'success';
                        self.snackText = r.data.message;
                        self.fetchSurveys();
                        self.hideLoader();
                    });

                } else {
                    // TODO UNCOMMENT
                    stripe.createToken(card).then(resp => {
                        if(resp.token == undefined){
                            self.hideLoader();
                            self.orderToPay = null;
                            self.stripeModal = false;
                            self.snack = true;
                            self.snackColor = 'error';
                            self.snackText = resp.error.message;
                        }
                        else{
                            axios.post('/surveys/pay/' + self.orderToPay, {
                                token: resp.token.id
                            }).then(r => {
                                self.orderToPay = null;
                                self.stripeModal = false;
                                self.snack = true;
                                self.snackColor = 'success';
                                self.snackText = r.data.message;
                                self.fetchSurveys();
                                self.hideLoader();
                            });
                        }
                    });
                }
            },
            setStripeModal(id) {
                this.orderToPay = id;

                if( window.Localize.orderPrice == 0 ){
                    this.purchase();
                } else {
                    this.stripeModal = true;
                }
            },
            fetchSurveys () {
                let self = this;
                axios.get('/surveys')
                    .then(r => self.surveys = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },

            editItem (item) {
                this.editedIndex = this.surveys.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.dialog = true;
            },

            deleteItem (item) {
                const index = this.surveys.indexOf(item);
                confirm('Are you sure you want to delete this item?') && this.processDelete(item.id, index)
            },

            processDelete(id, index) {
                let self = this;
                axios.delete('/surveys/' + id)
                    .then(r => self.surveys.splice(index, 1))
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Deleting failed, try again later...';
                    });
            },

            close () {
                this.dialog = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                }, 300)
            },

            closeNewSurveyDialog() {
                this.createNewSurvey = false;
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                }, 300)
            },

            save() {
                let self = this;
                if (this.editedIndex > -1) {
                    axios.patch('/surveys/' + this.editedItem.hash, this.editedItem).then(r => {
                        self.close();
                        self.fetchSurveys();
                    }).catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Posting failed, try again later...';
                    });
                } else {
                    axios.post('/surveys', this.editedItem, {
                        params: {
                            user_selected: self.user_selected
                        }
                    }).then(r => {
                        self.closeNewSurveyDialog();
                        self.fetchSurveys();
                    }).catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Posting failed, try again later...';
                    });
                }
            },

            downloadReports( item ) {
                let self = this;
                for (let i = 0; i < 2; i++) {
                    this.downloading = true;
                    axios({
                        url: '/surveys/report/' + item.id + '/download?full=' + i,
                        method: 'post',
                        withCredentials: true,
                        responseType: 'blob',
                        headers: {
                            'Accept': (item.client_name + (i === 1 ? '-full.pdf' : '-small.pdf'))
                        },
                    }).then(r => {
                        download(r.data, (item.client_name + (i === 1 ? '-full.pdf' : '-small.pdf')));
                        self.downloading = false;
                    }).catch((error) => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = error.response.status === 403 ? 'No permissions to access this file' : 'Unknown error';
                        self.downloading = false;
                    });
                }
            },

            fetchUsers () {
                let self = this;
                axios.get('/surveys/users/' + self.user.id, {
                        params: {
                            user_keyword: self.user_keyword
                        }
                    }).then(r => self.user_list = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },

            selectUser( user_id ){
                this.user_selected = user_id;
            },

            keywordUp(){
                let self = this;

                self.fetchUsers();
            }
        }
    }
</script>