<template>
    <div>
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
