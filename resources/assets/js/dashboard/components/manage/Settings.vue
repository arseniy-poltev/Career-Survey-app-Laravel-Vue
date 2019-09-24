<template>
    <div>
        <v-toolbar flat color="white">
            <v-spacer></v-spacer>
        </v-toolbar>
        <v-layout row wrap>

            <v-flex xs12 sm6>
                <v-text-field v-if="settings"
                              label="Stripe key"
                              outline
                              style="margin-right: 0.5rem;"
                              v-model="settings['services.stripe.key']"
                ></v-text-field>
            </v-flex>
            <v-flex xs12 sm6>
                <v-text-field v-if="settings"
                              label="Stripe secret"
                              outline
                              v-model="settings['services.stripe.secret']"
                ></v-text-field>
            </v-flex>
            <v-btn color="info" @click="saveSettings">Save settings</v-btn>

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
            snack: false,
            snackText: '',
            snackColor: '',
            dialog: false,
            settings: [],
        }),

        computed: {},

        watch: {
            dialog(val) {
                val || this.close()
            }
        },

        created() {
            this.fetchSettings();
        },

        methods: {
            fetchSettings() {
                let self = this;
                axios.get('/settings')
                    .then(r => self.settings = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },
            saveSettings() {
                axios.post('/settings', {
                    settings: {
                        'services.stripe.key': this.settings['services.stripe.key'],
                        'services.stripe.secret': this.settings['services.stripe.secret']
                    }
                })
                    .then(r => {
                        self.snack = true;
                        self.snackColor = 'success';
                        self.snackText = 'Settings saved!';
                    })
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Refresh page and try again...';
                    });
            }
        }
    }
</script>