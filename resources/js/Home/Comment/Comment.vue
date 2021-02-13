<template>
    <div>
        <Create />

        <div v-for="comment in comments" :key="comment.id">
            <Item :comment="comment" />
        </div>
    </div>
</template>

<script>
import Create from './Create.vue'
import Item from './Item.vue'

export default {
    components: {
        Create, Item
    },

    data() {
        return {
            comments: []
        }
    },

    created() {
        window.eventBus.$on('AddComment', res => this.handleNewComment(res));
        this.loadComments();
        window.Echo.channel('comments')
            .listen('.comment.created', event => {
                console.log('event', event);
                this.handleNewComment(event.comment);
            });
    },

    methods: {
        loadComments () {
            let url = process.env.MIX_APP_URL + '/api/video/comments';
            let postData = {
                video_id: this.$route.params.id
            }

            axios.post(url, postData)
                .then(res => {
                    this.comments = res.data;
                })
                .catch(err => {
                    console.log(err)
                })
        },

        handleNewComment (comment) {
            this.comments.unshift(comment);
        }
    }
}

</script>