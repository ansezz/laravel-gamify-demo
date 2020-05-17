<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Badges</div>

                    <div class="card-body">
                        My Badges List
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Badges',
        mounted() {
            console.log('Points Component mounted.')
        },
        beforeMount() {
            this.getBadges()
        },
        data() {
            return {
                badges: [],
                loading: false
            }
        },
        methods: {
            getBadges() {
                this.loading = true
                axios.get('badges').then(({data}) => {
                    this.badges = data
                }).catch((err) => {
                    alert(' ERROR')
                }).finally(() => {
                    this.loading = false
                })
            }
        }
    }
</script>
