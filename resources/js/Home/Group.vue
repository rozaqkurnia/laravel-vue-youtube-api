<template>
    <div class="col-12">
        <div class="row mb-3">
            <item 
                v-for="video in videos" 
                :key="video.id.videoId"
                :video="video"
            ></item>
        </div>
    </div>
</template>

<script>
    import Item from './Item.vue'
    export default {
        props: ['videos'],

        components: {
            Item
        }
    }
</script>