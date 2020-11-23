<template>
    <div v-show="todoMessage" class="message" >
        {{todoMessage}}

    </div>
</template>

<script>
    export default {
        name: "TodoMessage",
        props: {message: String},

        data() {
            return {
                todoMessage: this.message


            }
        },

        }




</script>

<style scoped>
    .message {
        background-color: #d4edda;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>
