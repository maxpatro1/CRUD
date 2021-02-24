<template>
    <div>
        <div class="container">
            <div class="left">
                <div class="header">
                    <h2 v-if="!edit" class="animation a1">Опубликовать заметку</h2>
                    <h2 v-if="edit" class="animation a1">Изменить заметку</h2>

                </div>
                <div class="form">
                        <input class="form-field animation a3" v-model="form.title" placeholder="Заголовок">
                        <textarea class="form-field animation a4" v-model="form.description" rows="5" placeholder="Содержимое"></textarea>
                    <button v-if="edit" class="animation a6" @click.prevent="update(id)">
                        <span v-if="edit">Изменить</span>
                    </button>
                    <button v-if="!edit" class="animation a6" @click.prevent="add">
                        <span>Опубликовать</span>
                    </button>
                </div>
            </div>
            <div class="right"></div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    components: {},
    data() {
        return{
            form: {
                title: this.title,
                description: this.description
            },
            loading: false,
            error: false,
        }

    },
    props:{
        edit:{
            type: Boolean,
            default: false
        },
        title: {
            type:String,
            default: ""
        },
        description: {
            type:String,
            default: ""
        },
        id:{
            type: Number,
        }

    },
    methods: {
        add() {
            this.loading = true;
            axios.post('/api/notes/', this.form
                , {
                headers: {
                    "Content-type": "application/json"
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.$router.push('/note/' + res.data.post.id);
                    } else {
                        this.error = true;
                    }
                })
        },
        update(id){
            this.loading = true;
            axios.put('/api/notes/'+id, this.form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
                .then(res => {
                    this.$router.push('/note/' + id);
                })
        }
    }
}
</script>

<style scoped>
.container {
    display: flex;
    height: 100vh;
    justify-content: center;
}

.left {
    overflow: hidden;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    /*justify-content: center;*/
    animation-name: left;
    animation-duration: 1s;
    animation-fill-mode: both;
    animation-delay: 1s;
}





.header > h2 {
    margin: 0;
    color: #4f46a5;
}

.header > h4 {
    margin-top: 10px;
    font-weight: normal;
    font-size: 15px;
    color: rgba(0,0,0,.4);
}

.form {
    max-width: 80%;
    display: flex;
    flex-direction: column;
}

.form > p {
    text-align: right;
}

.form > p > a {
    color: #000;
    font-size: 14px;
}

.form-field {
    /*height: 46px;*/
    padding: 0 16px;
    border: 2px solid #ddd;
    border-radius: 4px;
    font-family: 'Rubik', sans-serif;
    outline: 0;
    transition: .2s;
    margin-top: 20px;
}

.form-field:focus {
    border-color: #0f7ef1;
}

.form > button {
    padding: 12px 10px;
    border: 0;
    background: linear-gradient(to right, #de48b5 0%,#0097ff 100%);
    border-radius: 3px;
    margin-top: 10px;
    color: #fff;
    letter-spacing: 1px;
    font-family: 'Rubik', sans-serif;
}

.animation {
    animation-name: move;
    animation-duration: .4s;
    animation-fill-mode: both;
    animation-delay: 2s;
}

</style>
