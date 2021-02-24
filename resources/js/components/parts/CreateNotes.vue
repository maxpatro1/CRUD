<template>
    <div>
<!--        <div v-if="error">-->
<!--            <p>Проверьте правильность введенный полей</p>-->
<!--        </div>-->
        <form style="margin-bottom: 20px;">
            <fieldset class="uk-fieldset">
                <legend class="uk-legend">Опубликовать пост</legend>
                <div class="uk-margin">
                    <input class="uk-input" v-model="form.title" placeholder="Заголовок">
                </div>
                <div class="uk-margin">
                    <textarea class="uk-textarea" v-model="form.description" rows="5" placeholder="Содержимое"></textarea>
                </div>
                <button v-if="edit" class="uk-button uk-button-primary" @click.prevent="update(id)">
                    <span v-if="edit">Изменить</span>
                </button>
                <button v-if="!edit" class="uk-button uk-button-primary" @click.prevent="add">
                    <span>Опубликовать</span>
                </button>
            </fieldset>

        </form>
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
</style>
