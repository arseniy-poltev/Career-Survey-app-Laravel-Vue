<template>
    <div>
        <v-toolbar flat color="white">
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="500px">
                <v-btn slot="activator" color="primary" dark class="mb-2">Add user</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12 sm6>
                                    <v-text-field v-model="editedItem.name" :rules="[rules.required, rules.min]"
                                                  label="User name"></v-text-field>
                                </v-flex>
                                <v-flex xs12 sm6>
                                    <v-text-field v-model="editedItem.email" :rules="[rules.required, rules.email]"
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
                :items="users"
                hide-actions
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td>{{ props.item.name }}</td>
                <td>{{ props.item.email }}</td>
                <td>{{ props.item.access_level }}</td>
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
                <v-btn color="primary" @click="fetchUsers">Reset</v-btn>
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
            users: [],
            dialog: false,
            headers: [
                { text: 'Name', value: 'name' },
                { text: 'Email', value: 'email' },
                { text: 'Access level', value: 'access_level' },
                { text: '*', value: null },
            ],
            editedIndex: -1,
            editedItem: {
                id: '',
                name: '',
                email: '',
                access_level: 1,
            },
            defaultItem: {
                id: '',
                name: '',
                email: '',
                access_level: 1
            },
            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 2 || 'Min 2 characters',
                email: (value) => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                }
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
            this.fetchUsers()
        },

        methods: {
            fetchUsers () {
                let self = this;
                axios.get('/users')
                    .then(r => self.users = r.data)
                    .catch(e => {
                        self.snack = true;
                        self.snackColor = 'error';
                        self.snackText = 'Fetching failed, try again later...';
                    });
            },

            editItem (item) {
                this.editedIndex = this.users.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.users.indexOf(item)
                confirm('Are you sure you want to delete this item?') && this.processDelete(item.id, index)
            },

            processDelete(id, index){
                let self = this;
                axios.delete('/users/' + id)
                    .then(r => self.users.splice(index, 1))
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

            save () {
                let self = this;
                if (this.editedIndex > -1) {
                    axios.patch('/users/' + this.editedItem.id, this.editedItem).then(r => {
                        Object.assign(self.users[self.editedIndex], self.editedItem);
                        self.close();
                    });
                } else {
                    axios.post('/users', this.editedItem).then(r => {
                        self.users.push(self.editedItem);
                        self.close();
                    });
                }
            }
        }
    }
</script>