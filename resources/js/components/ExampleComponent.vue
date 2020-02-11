<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">

                        <button class="btn btn-warning" style="margin-bottom: 20px;" @click="aksesApi">
                            refresh
                        </button>

                        <input v-model="katakunci" type="search" class="form-control" placeholder="Masukan Kata Kunci" @change="jalankanPencarian" />

                        {{katakunci}}

                        <table class="table table-bordered">
                            <tr>
                                <td>Nama</td>
                                <td>JK</td>
                                <td>Tanggal dibuat</td>
                            </tr>

                            <tr v-for="item in data.data":key="item.id">
                                <td>{{item.nama}}</td>
                                <td>{{item.jk}}</td>
                                <td>{{item.created_at}}</td>
                            </tr>
                        </table>

                        <pagination :data="data" @pagination-change-page="aksesApi"></pagination>

                    </div>

                    <vue-progress-bar></vue-progress-bar>
                    <notipications group="foo"/>
                </div>
            </div>
        </div>

        
    </div>
</template>

<script>
    export default {
        data(){
            return {
                data: {},
                loading: true,
                error:null,
                katakunci:''
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.aksesApi()
        },
        methods: {
            aksesApi(page = 1){
                this.$Progress.start()
                this.loading = true
                const params ={
                    page:page
                }
                axios.get('/testapi',{params})
                .then(response => {
                    this.data = response.data
                    this.loading = false
                    this.$Progress.finish()
                    this.$notify({
                        group: 'foo',
                        title: 'Important message',
                        text: 'Hello user! ini notification'
                    })
                })
                .catch(error => {
                    this.error = error
                    this.loading = false
                    this.$Progress.fail()
                })
                
            },

            jalankanPencarian(){
                this.aksesApi
            }

        }

    }
</script>
