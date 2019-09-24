<template>
    <div>
        <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12 sm6>
                                    <v-text-field v-model="editedItem.name" :rules="[rules.required]"
                                                  label="User name"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6>
                                    <v-text-field v-model="editedItem.email" :rules="[rules.required]"
                                                  label="Email"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm4>
                                    <v-select v-model="editedItem.access_level"
                                              :items="accessLevels"
                                              label="Access level">
                                    </v-select>
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
        </v-toolbar>
        <v-data-table
                :headers="headers"
                :items="orders"
                hide-actions
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.user.name }}</td>
                <td>{{ props.item.contact_name }}</td>
                <td>{{ props.item.contact_email }}</td>
                <td>{{ props.item.business_name }}</td>
                <td><v-icon v-if="props.item.paid">done</v-icon><v-icon v-else>highlight_off</v-icon></td>
                <td>{{ props.item.completed ? 'Completed' : 'Incompleted' }}</td>
                <td class="justify-center layout px-0">
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
                <v-btn color="primary" @click="fetchOrders">Reset</v-btn>
            </template>
        </v-data-table>
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
            headers: [
                { text: 'Created by', value: 'user.name' },
                { text: 'Contact name', value: 'contact_name' },
                { text: 'Contact email', value: 'contact_email' },
                { text: 'Business name', value: 'business_name' },
                { text: 'Paid', value: 'paid' },
                { text: 'Status', value: 'completed' },
            ],
            orders: [],
            editedIndex: -1,
            editedItem: {
                name: '',
                email: '',
                access_level: 1,
            },
            defaultItem: {
                name: '',
                email: '',
                access_level: 1
            },
            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 8 || 'Min 8 characters',
            },
            accessLevels: [1, 2, 3, 4, 5],
            showPassword: false,
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
            }
        },

        watch: {
            dialog (val) {
                val || this.close()
            }
        },

        created () {
            this.fetchOrders()
        },

        methods: {
            fetchOrders () {
                let self = this;
                axios.get('/manage/orders')
                    .then(r => self.orders = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },

            editItem (item) {
                this.editedIndex = this.orders.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.orders.indexOf(item);
                confirm('Are you sure you want to delete this item?') && this.processDelete(item.id, index)
            },

            processDelete(id, index) {
                let self = this;
                axios.delete('/orders/' + id)
                    .then(r => self.orders.splice(index, 1))
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Deleting failed, try again later...';
                    });
            },

            close () {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                }, 300)
            },

            save () {
                if (this.editedIndex > -1) {
                    Object.assign(this.orders[this.editedIndex], this.editedItem)
                } else {
                    this.orders.push(this.editedItem)
                }
                this.close()
            }
        }
    }
</script>