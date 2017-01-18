<template>
        <div>
            <p class="text-center" v-if="loading">
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
            </p>
            <div v-for="student in students">
                <div class="item seperation-border offline">
                    <img src="/img/user/1.jpg" alt="user image"><div class="status"></div></img>
                    <p class="message">
                        <span class="name">
                        <a href="#">{{ student.user_info.name }}</a>
                        <span class="pull-right text-muted small" style="margin-top: 5px;">11:33</span>
                        </span>
                        <i class="fa fa-trophy text-blue"></i>
                    </p>
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/api/v1/student/list/'+this.course_id)
                .then( (resp) => {
                    console.log(resp)
                    this.students = resp.body
                    this.loading = false
                })
        },
        props: ['course_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {


        }
    }
</script>
