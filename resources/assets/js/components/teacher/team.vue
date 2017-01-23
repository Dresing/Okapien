<template>
    <div>
        <p class="text-center" v-if="loading">
            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </p>
        <div v-for="team in teams">
            <div class="col-md-6">
                <a class="no-effect" href="hold/{{$team->id}}">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background:  url({{asset('/img/photo1.png')}}) center center;">
                            <h3 class="widget-user-username">{{$team->collection->name}}</h3>
                            <h5 class="widget-user-desc"></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{asset('/img/user4-128x128.jpg')}}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Elever</h5>
                                        <span class="description-text">{{count($team->collection->name)}}</span>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Aktive cases</h5>
                                        <span class="description-text">{{count($team->cases)}}</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Afsluttede cases</h5>
                                        <span class="description-text">0</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$http.get('/api/team')
                .then( (resp) => {
                    console.log(resp)
                    this.status = resp.body.status
                    this.loading = false
                })
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            add_friend() {
                this.loading = true
                this.$http.get('/add_friend/' + this.profile_user_id )
                    .then( (r) => {
                        if(r.body == 1)
                            this.status = 'waiting'
                            noty({
                                type: 'success',
                                layout: 'bottomLeft',
                                text: 'Friend request sent .'
                            })
                            this.loading = false
                    })
            },
            accept_friend() {
                this.loading = true
                this.$http.get('/accept_friend/' + this.profile_user_id )
                    .then( (r) => {
                        if(r.body == 1)
                            this.status = 'friends'
                            noty({
                                type: 'success',
                                layout: 'bottomLeft',
                                text: 'You are now friend. Go ahead and hangout .'
                            })
                            this.loading = false
                    })
            }
        }
    }
</script>
