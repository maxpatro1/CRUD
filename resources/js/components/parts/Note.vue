<template>
    <div class="container-sm flex justify-center items-center h-screen">
        <router-link :to="{name:'CreateNote', params:{title:title,id:id,description:description,edit: true}}">
            изменить
        </router-link>
        <div @click="deleteNote(id)">Delete</div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{title}}</div>
                <p class="text-gray-700 text-base">
                    {{description}}
                </p>
            </div>
            <router-link :to="'/note/' + id">
                read more
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "NULL"
        },
        description: {
            type: String,
            default: "NULL"
        },
        date: {
            type: String,
            default: "NULL"
        },
        id: {
          type: Number,
          default: null
        }
    },
    methods: {
        deleteNote(id) {
            this.$emit('deleteNote',id)
        }
    }
}
</script>

<style scoped>






body {
    color:  #4a4a4e;
}

</style>
