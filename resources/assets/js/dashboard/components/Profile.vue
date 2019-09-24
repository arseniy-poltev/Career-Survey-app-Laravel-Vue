<template>
    <div>
        <v-toolbar flat color="white">
            <v-spacer></v-spacer>
        </v-toolbar>
        <v-layout row wrap v-if="user">
            <v-flex xs12 sm6>
                <v-text-field
                        label="Business name"
                        outline
                        style="margin-right: 0.5rem;"
                        v-model="user.business_name"
                ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6>
                <v-text-field
                        label="Business address"
                        outline
                        v-model="user.business_address"
                ></v-text-field>
            </v-flex>
            <v-btn color="info" @click="updateProfile">Save changes</v-btn>
        </v-layout>
        <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
            {{ snackText }}
            <v-btn flat @click="snack = false">Close</v-btn>
        </v-snackbar>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: null,
                snack: false,
                snackText: '',
                snackColor: '',
            }
        },
        created() {
            this.user = window.Localize.user;
        },
        methods: {
            updateProfile() {
                let self = this;
                axios.post('/profile', {
                    business_name: this.user.business_name,
                    business_address: this.user.business_address
                }).then(response => {
                    self.snack = true;
                    self.snackColor = 'success';
                    self.snackText = 'Saved';
                }).catch(error => {
                    self.snack = true;
                    self.snackColor = 'error';
                    self.snackText = 'Can not update, try again later...';
                });
            }
        }
    }
</script>