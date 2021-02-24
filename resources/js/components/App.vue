<template>
    <div style="height: 100vh">
        <router-view></router-view>
    </div>
</template>

<script>
import Notes from "./parts/Notes";
export default {
name: "App",
    components: {Notes}
}
</script>

<style scoped>

</style>
