<template>
    <div class="home__wrapper">
        <finder />
        <div v-if="!isLoading">
            <group :videos="videos"></group>
        </div>

        <div v-else>
            Loading...
        </div>
    </div>
</template>

<script>
import Finder from './Finder';
import Search from './Search';
import Group from './Group.vue';
export default {
    components: {
        Finder,
        Group
    },

    created() {
        Search({
            apiKey: process.env.MIX_YOUTUBE_API_KEY,
            term: 'Laravel'
        }, res => this.handleSearchResult(res));

        window.eventBus.$on('searchStarted', () => {
            this.loading = true;
        });
        
        window.eventBus.$on('searchResult', res => {
            this.handleSearchResult(res)
        });
    },

    data() {
        return {
            videos: null,
            isLoading: false
        }
    },

    methods: {
        handleSearchResult(result) {
            this.isLoading = false;
            this.videos = result;
        }
    }
}

</script>