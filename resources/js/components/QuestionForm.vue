<template>
    <div class="">
        <form action="" method="get">
            <div v-for="(question,index) in questions" :key="question.id">
                <div class="input-group mb-1 input-group-sm">
                    <div class="input-group-prepend">
                    <span class="input-group-text bg-info text-white">
                        {{index+1}}.{{ question.question}}
                    </span>
                    </div>
<!--                    :name="'question'+(index+1)"-->
                    <select class="form-control" >
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
</template>

<script>
    export default {
        props : ['questions'],

        data() {
            return {
                res : this.questions
            }
        },
        mounted() {
            console.log('Question-Form.')
            console.log(this.res)
            this.setSelectOption()
        },

        created() {
            console.log(this.questions)
        },



        methods: {
            setSelectOption() {
               console.log(this.questions)

            }
        }
    }
</script>
