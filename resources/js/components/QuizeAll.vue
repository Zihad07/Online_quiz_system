<template>
    <div class="">
        <div class="card">
            <div class="card-header text-center text-dark" style="font-size:25px;">Take a Quize Exam</div>

            <div class="card-body">
                <table class="table table-hover table-dark">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quize Name</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(quize,index) in quizes" :key="quize.id">
                            <th scope="row">{{ index+1 }}</th>
                            <td>{{ quize.name }}</td>
                            <td>
                                <a :href="fullUrl(quize.id)" class="btn btn-sm btn-outline-primary">StartQuize</a>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
          return {
              url : './api/quize',
              examUrl: './quize/exam-start',
              quizes: []
          }
        },
        mounted() {
            console.log('Component mounted.')
            this.fetchQuize()
            // console.log(this.quizes)
        },

        computed: {

        },

        methods: {
        //    quize all
            fetchQuize() {
                axios.get(this.url)
                    .then((response)=> {
                        // handle success
                        // this.setData(response.data);
                        this.quizes = response.data
                        // console.log(response.data);
                        // console.log(this.quizes)
                    })
                    .catch((error)=> {
                        // handle error
                        console.log(error);
                    })
            },
            setData(data) {
                this.quizes = data
            },
            fullUrl(url) {
                return this.examUrl+'/'+url
            }
        }
    }
</script>
