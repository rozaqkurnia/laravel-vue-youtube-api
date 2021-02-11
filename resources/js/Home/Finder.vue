<template>
    <div class="col-12 mb-3">
        <div class="container">
            <form v-on:submit.prevent="handleFormSubmit">
                <input
                    v-model="search" 
                    type="text" 
                    class="form-control"
                >
            </form>
        </div>
    </div>
</template>

<script>
import Search from './Search';

export default {
    data() {
        return {
            search: '',
        }
    },
    methods: {
        handleFormSubmit() {

            window.eventBus.$emit('searchStarted');

            Search({
                apiKey: process.env.MIX_YOUTUBE_API_KEY,
                term: this.search,
                items: 20
            }, res => {
                window.eventBus.$emit('searchResult', res);
                this.search = '';
            });
        }
    }
}
</script>