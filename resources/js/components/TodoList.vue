<template>
    <div class="mt-3">
        <ul>
            <div class="d-flex justify-content-between" v-for="todo in arrayOfTodos" :key="todo.id">
                <div v-if="todo.completed == false" class="d-flex not-completed" >
                    <a   @click.prevent="markComplete(todo)"><i class="fas fa-check-circle fa-2x"></i></a>
                    <p class="completed-mark"> {{todo.title}}</p>
                </div>
                <div v-if="todo.completed == true" class="d-flex is-completed" >
                    <a @click.prevent="markComplete(todo)"><i class="fas fa-check-circle fa-2x"></i></a>
                    <p class="completed-mark"> {{todo.title}}</p>
                </div>
                <div>
                    <a :href="`/todos/` + todo.id + `/edit`" v-if="!todo.completed" ><i class="fas fa-edit fa-2x"></i></a>
                    <a @click.prevent="deleteTodo(todo.id)" ><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                </div>
            </div>
        </ul>
    </div>
</template>

<script>

    export default {
        name: "TodoList",
        props: {todos: Array},
        data() {
            return {
             arrayOfTodos: this.todos
            }
        },

        methods: {
            markComplete(todo) {
                axios.put('/todos/' + todo.id + '/complete')
                    .then((res) => todo.completed = !todo.completed)
                    .catch(err => console.log(err))
            },

            deleteTodo(id){
                axios.delete('/todos/' + id + '/delete')
                    .then((res) => this.arrayOfTodos = res.data)
                    .catch(err => console.log(err))
            }
        },



        created() {
            // this.todoClass(todo)
            //
        }
    }
</script>

<style scoped>
    ul{
        padding-inline-start: 0;
    }
    .is-completed  {
        text-decoration: line-through;

    }

    .is-completed i {
        color: green;

    }

    .completed-mark{
        margin-left:20px;
    }

    .not-completed {
        color: gray;
        text-decoration: none;

    }

</style>
