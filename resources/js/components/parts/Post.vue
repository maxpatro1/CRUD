<template>
    <div>
<!--        <spin v-if="loading"/>-->
        <div>
            <h1>{{ post.title }} <span class="uk-badge">{{ post.created_at }}</span></h1>
            <p class="uk-text-lead">{{ post.description }}</p>
        </div>
<!--        <div >-->
<!--            <a ></a>-->
<!--            <h3>404 пост не найден</h3>-->
<!--        </div>-->
    </div>
</template>

<script>
import axios from "axios";
export default {
    data: () => ({
        loading: true,
        post: [],
        not_found: false
    }),
    mounted() {
        this.loadPost(this.$route.params.id);
    },
    methods: {
        loadPost(id) {
            axios.get('/api/notes/'+id)
                .then(res => {
                    this.post = res.data;
                    setTimeout(()=> {
                        this.loading = false;
                    }, 500);
                })
                .catch(err => {
                    this.not_found = true;
                })

        }
    }
}
</script>

<style scoped>
</style>
