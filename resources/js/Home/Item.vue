<template>
    <div class="col-md-3 mb-3">
        <div class="card" style="height: 30rem;">
            <img class="card-img-top" :src="image" :alt="title" />
            <div class="card-body">
                <h5 class="card-title">{{ title }}</h5>
                <p class="card-text">{{ description }}</p>
            </div>
            <div class="card-footer">
                <router-link :to="{name: 'video', params: {id: video.id.videoId, video: video}}" class="btn btn-primary">
                    Watch Video
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['video'],

        computed: {
            title() {
                return this.video.snippet.title;
            },

            description() {
                return this.video.snippet.description;
            },

            image() {
                return this.video.snippet.thumbnails.medium.url;
            }
        }
    }
</script>