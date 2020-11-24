<template>
    <div class="mt-3">
        <div class="message">
            {{message}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="d-flex justify-content-between list-group-item" v-for="todo in arrayOfTodos" :key="todo.id">
                <div v-if="todo.completed == false" class="d-flex not-completed" >
                    <a   @click.prevent="markComplete(todo)"><i class="fas fa-check-circle fa-2x"></i></a>
                    <p class="todo-text font-weight-bold"> {{todo.title}}</p>
                </div>
                <div v-if="todo.completed == true" class="d-flex is-completed" >
                    <a @click.prevent="markComplete(todo)"><i class="fas fa-check-circle fa-2x"></i></a>
                    <p class="todo-text"> {{todo.title}}</p>
                </div>
                <div class="d-flex">
                    <a :href="`/todo/` + todo.id + `/edit`" v-if="!todo.completed" ><i class="fas fa-edit fa-2x"></i></a>
                    <a @click.prevent="deleteTodo(todo.id)" ><i class="fas fa-trash-alt text-danger fa-2x"></i></a>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>

    export default {
        name: "TodoList",
        props: {todos: Array},
        data() {
            return {
                arrayOfTodos: this.todos,
                message: '',
            }
        },

        methods: {
            markComplete(todo) {
                axios.put('/todo/' + todo.id + '/complete')
                    .then((res) => {
                        this.arrayOfTodos = res.data
                        if (todo.completed) {
                            this.todoMessage('Todo unmarked')
                        } else {
                            this.todoMessage('Todo marked as complete')
                        }
                    })
                    .catch(err => console.log(err))
            },

            deleteTodo(id) {
                axios.delete('/todo/' + id)
                    .then((res) => {
                            this.arrayOfTodos = res.data
                            this.todoMessage('Todo deleted')

                        }
                    )
                    .catch(err => console.log(err))
            },

            todoMessage(msg){
                this.message = msg
              this.timer = setTimeout(() => this.message = '', 3000)
            }
        },

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

    .todo-text{
        margin-left:20px;
        margin-right:20px;
        word-break: break-word;
        text-align: left;

    }

    .not-completed i {
        color: gray;
        text-decoration: none;

    }

    .message {
        background-color: #d4edda;
        margin-bottom: 20px;
        border-radius: 5px;
    }




</style>
