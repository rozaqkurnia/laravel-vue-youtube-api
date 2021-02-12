<template>
    <div v-if="video">
        <div class="col-sm-8 col-sm-push-2">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" :src="url" allowfullscreen></iframe>
            </div>
            <h2 class="mt-3">{{ video.snippet.title }}</h2>
            <hr>
            <h6 class="mb-2">Channel: {{video.snippet.channelTitle}}</h6>
            <p>{{ video.snippet.description }}</p>
            <Comment />
        </div>
    </div>
</template>

<script>
import Comment from './Comment/Comment.vue'
export default {
    components: {
        Comment
    },
    created() {
        if (this.$route.params.video === undefined) {
            this.$router.push({name: 'home'});
        }

        this.videoId = this.$route.params.id;
        this.url = `https://youtube.com/embed/${this.videoId}`;
        this.video = this.$route.params.video;
    },

    data() {
        return {
            videoId: null,
            video: null,
            url: null
        }
    }
}
</script>