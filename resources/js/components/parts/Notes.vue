<template>
    <div>
        <navbar />
        <div class="container">
            <div v-if="loading">Загрузка</div>
            <div style="display:flex; flex-wrap: wrap;" v-else>
                <Note
                    v-for="note in notes"
                    :key="note.id"
                    :title="note.title"
                    :description="note.description"
                    :id="note.id"
                    :date="note.created_at"
                    @deleteNote = 'deleteNote'
                />
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';
import Note from "./Note";
export default {
    components: {
        Note
    },

    data: () => ({
        loading: true,
        notes: []
    }),
    mounted() {
        this.loadPosts();
    },
    methods: {
        loadPosts() {
            axios.get('/api/notes')
                .then(res => {
                    this.notes = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
                })
        },
        deleteNote(id){
            axios.delete('/api/notes/'+ id).then(res => this.loadPosts())
        }
    }
}
</script>

<style scoped>

</style>
