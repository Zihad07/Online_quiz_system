<template>
    <div>
        <div class="card">
            <div class="card-header">Example Component</div>

            <div class="card-body">
                <form action="../../api/question/submit" method="post">

                    <input type="hidden" name="_token" v-bind:value="csrf">
                    <div v-for="(question,index) in questions" :key="question.id">
                        <div class="input-group mb-1 input-group-sm">
                            <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white">
                        {{index+1}}.{{ question.question}}
                    </span>
                            </div>
                            <!--                    :name="'question'+(index+1)"-->
<!--                            <select class="form-control" :name="'question-'+ question.id">-->
                            <select class="form-control" name="questions[]" required>
                                <option value="none">-- Select --</option>
                                <option v-for="option in question.answers" :key="option.id" :value="option.id">
                                    {{ option.answer }}
                                </option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group mt-3">
                        <input type="submit" value="Submit" class="btn btn-outline-info btn-block">
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>

    import questionForm from './QuestionForm'
    export default {
        props : ['quize','csrf'],
        components: {
          questionForm,
        },
        data() {
            return {
                url : '../../api/quize/question/'+this.quize,
                questions: [],
                select : {}
            }
        },
        mounted() {
            // console.log('Exam Question Component mounted.')
            this.fetchQuestion()


        },

        methods: {
            fetchQuestion() {
                axios.get(this.url)
                    .then((response)=> {
                        // handle success

                        this.questions = response.data
                        this.setSelectOption()
                        // console.log(response.data);

                    })
                    .catch((error)=> {
                        // handle error
                        console.log(error);
                    })
            },

            setSelectOption() {
                this.questions.forEach((question)=> {
                    this.select[question.id] = 'none'
                })

                console.log(this.questions)
            }
        }
    }
</script>
