<template>
    <div>
        <navbar />
        <div>
            <div v-if="loading" class="spinner-border text-primary spin" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div v-if="!loading && notes.length ===0" style="justify-content: center;display: flex;margin: 50px; color: grey">
                <h1>Заметок пока не создано....</h1>
            </div>
            <div v-if="!loading && notes.length !==0" class="notes" v-else>
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
    .spin{
        position: absolute;
        left: 50%;
        top: 50%;
    }
    .notes{
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
</style>
