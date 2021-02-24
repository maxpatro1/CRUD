import Vue from 'vue'
import Router from 'vue-router'
import CreateNotes from "./components/parts/CreateNotes";
import Notes from "./components/parts/Notes";
import Post from "./components/parts/Post";



Vue.use(Router);

let router = new Router({
    routes: [
        {
            path: '/',
            name: 'mainPage',
            component: Notes
        },
        {
            path: '/note/:id',
            name: 'note',
            component: Post
        },
        {
            path: '/create',
            name: 'CreateNote',
            component: CreateNotes,
            props: true
        }
    ]
})

export default router;
