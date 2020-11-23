<template>
    <div class="mt-3">
<!--       <TodoMessage v-if="message" :message="message" />-->
        <div class="message">
            {{message}}
        </div>
        <ul>
            <div class="d-flex justify-content-between" v-for="todo in arrayOfTodos" :key="todo.id">
                <div v-if="todo.completed == false" class="d-flex not-completed" >
                    <a   @click.prevent="markComplete(todo)"><i class="fas fa-check-circle fa-2x"></i></a>
                    <p class="completed-mark font-weight-bolder"> {{todo.title}}</p>
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

    import TodoMessage from "./TodoMessage";
    export default {
        name: "TodoList",
        components: {TodoMessage},
        props: {todos: Array},
        data() {
            return {
                arrayOfTodos: this.todos,
                message: '',
                timer: Function
            }
        },

        methods: {
            markComplete(todo) {
                axios.put('/todos/' + todo.id + '/complete')
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
                axios.delete('/todos/' + id + '/delete')
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

    .completed-mark{
        margin-left:20px;
    }

    .not-completed {
        color: gray;
        text-decoration: none;

    }

    .message {
        background-color: #d4edda;
        margin-bottom: 20px;
        border-radius: 5px;
    }


</style>
