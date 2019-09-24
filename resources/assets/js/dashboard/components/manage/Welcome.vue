<template>
    <div>
        <v-layout row wrap>

            <v-flex xs12>
                <wysiwyg v-model="greeting.content" />
            </v-flex>

            <v-btn color="info" @click="save"
                :loading="saving"
                :disabled="saving">Save</v-btn>
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
                saving: false,

                snack: false,
                snackText: '',
                snackColor: '',

                greeting: {
                    id: '',
                    type: 1,
                    content: ''
                }
            }
        },

        computed: {},
        watch: {},
        created() {
            this.fetch();
        },
        methods: {
            fetch() {
                let self = this;
                axios.get('/manage/welcome')
                    .then(r => self.greeting = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },

            save() {
                let self = this;
                self.saving = true;
                axios.post('/manage/welcome', self.greeting )
                    .then(r => {
                        self.snack = true;
                        self.snackColor = 'success';
                        self.snackText = 'Greeting saved!';
                        self.saving = false;
                    })
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Refresh page and try again...';
                        self.saving = false;
                    });
            }
        }
    }
</script>