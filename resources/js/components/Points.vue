<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Points</div>

                    <div class="card-body">
                        My Points List
                        <ul>
                            <li v-for="point in points" :key="point.id">
                                {{ point.name }} - {{ point.point }}
                                <button @click="achieve(point)">Achieve</button>
                                <button @click="undo(point)">Undo</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Points',
        mounted() {
            console.log('Points Component mounted.')
        },
        beforeMount() {
            this.getPoints()
        },
        data() {
            return {
                points: [],
                loading: false
            }
        },
        methods: {
            undo(point) {
                this.loading = true
                axios.get('undo/point/' + point.id).then(({data}) => {
                    console.log(data)
                }).catch((err) => {
                    alert(' ERROR')
                }).finally(() => {
                    this.loading = false
                })
            },
            achieve(point) {
                this.loading = true
                axios.get('achieve/point/' + point.id).then(({data}) => {
                    console.log(data)
                }).catch((err) => {
                    alert(' ERROR')
                }).finally(() => {
                    this.loading = false
                })
            },
            getPoints() {
                this.loading = true
                axios.get('points').then(({data}) => {
                    this.points = data
                }).catch((err) => {
                    alert(' ERROR')
                }).finally(() => {
                    this.loading = false
                })
            }
        }
    }
</script>
