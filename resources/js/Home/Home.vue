<template>
    <div class="home__wrapper">
        <group :videos="videos"></group>
    </div>
</template>

<script>
import Search from './Search';
import Group from './Group.vue';
export default {
    components: {
        Group
    },

    created() {
        Search({
            apiKey: process.env.MIX_YOUTUBE_API_KEY,
            term: 'laravel repository'
        }, response => this.videos = response);
    },

    data() {
        return {
            videos: null
        }
    }
}

</script>