<template>
    <div>
        <v-data-table
                :headers="headers"
                :items="surveys"
                hide-actions
                class="elevation-1"
                expand
                disable-initial-sort
        >
            <template slot="items" slot-scope="props">
                <td class="px-2">{{ props.item.user ? props.item.user.name : '' }}</td>
                <td class="px-2">{{ props.item.user ? props.item.user.email : ''  }}</td>
                <td class="px-2">{{ props.item.client_name }}</td>
                <td class="px-2">{{ props.item.client_organisation}}</td>
                <td class="px-2">{{ props.item.client_email }}</td>
                <td class="px-2 text-xs-center">{{ props.item.created_at | formatDate }}</td>
                <td class="px-2 text-xs-center">{{ props.item.status }}</td>
                <td class="px-2 text-xs-center">
                    <v-icon v-if="props.item.paid != 1">cancel</v-icon>
                    <v-icon v-else-if="props.item.paid == 1">done</v-icon>
                </td>
                <td>
                    <div v-if="props.item.status === 'FINISHED'">
                        <v-btn color="primary"
                               @click.native="downloadReports(props.item)"
                               :loading="downloading"
                               :disabled="downloading"
                        >
                            Download
                        </v-btn>
                    </div>
                </td>
                <td class="layout px-2">
                    <v-icon
                            small
                            @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon>
                </td>
            </template>
        </v-data-table>
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
            snack: false,
            snackText: '',
            snackColor: '',

            downloading: false,

            headers: [
                { text: 'User Name', value: null, align: 'left', width: '1%', class: 'px-2' },
                { text: 'User Email', value: null, align: 'left', width: '1%', class: 'px-2' },
                { text: 'Client Name', value: 'client_name', align: 'left', width: '1%', class: 'px-2' },
                { text: 'Client Organisation', value: 'client_organisation', align: 'left', width: '1%', class: 'px-2' },
                { text: 'Client Email', value: 'client_email', align: 'left', width: '1%', class: 'px-2' },
                { text: 'Create Time', value: 'created_at', align: 'center', width: '1%', class: 'px-2' },
                { text: 'Status', value: 'status', align: 'center', width: '1%', class: 'px-2' },
                { text: 'Paid', value: 'paid', align: 'center', width: '1%', class: 'px-2' },
                { text: 'Actions',value: 'status', align: 'center', width: '1%', class: 'px-2' },
                { text: '*',value: 'status', align: 'center', width: '1%', class: 'px-2' },
            ],

            surveys: []
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
            this.fetchSurveys()
        },

        beforeDestroy() {
        },

        methods: {
            showLoader() {
                $("#preloader").show().removeClass('none').css('opacity', 1);
            },
            hideLoader() {
                $("#preloader").hide();
            },
            fetchSurveys () {
                let self = this;
                axios.get('/manage/surveys')
                    .then(r => self.surveys = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
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
        }
    }
</script>