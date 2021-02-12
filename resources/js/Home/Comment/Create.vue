<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <textarea
                    class="form-control"
                    v-model="comment"
                    placeholder="Add a new comment"
                    name="body"
                ></textarea>
            </div>

            <div class="form-group">
                <button 
                    class="btn btn-primary"
                    @click="submitComment"
                >Comment</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            comment: ''
        }
    },

    methods: {
        submitComment() {
            let url = process.env.MIX_APP_URL + '/api/comments'
            let postData = {
                body: this.comment,
                video_id: this.$route.params.id
            }

            axios.post(url, postData)
                .then(res => {
                    window.eventBus.$emit('AddComment', res.data);
                    this.comment = '';
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }
}
</script>