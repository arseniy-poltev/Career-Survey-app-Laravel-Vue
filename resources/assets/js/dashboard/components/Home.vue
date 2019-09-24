<template>
    <div>
        <div>
            <h3 v-if="user">Welcome {{ user.name }},</h3>
            <p v-html="greeting"></p>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: null,
                greeting: null
            }
        },
        created() {
            this.user = window.Localize.user;
            this.greeting = window.Localize.greeting;
        },
        methods: {
        }
    }
</script>
<style scoped>
    div p {
        font-weight: normal;
        line-height: 26px;
        font-size: 15px;
    }
</style>