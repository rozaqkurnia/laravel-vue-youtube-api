<template>
    <div>
        <div class="card">
            <div class="card-body">
                <p><strong>{{ comment.user }}</strong> <small class="text-muted"><em>commented</em>    {{ comment.created_at }}</small></p>
                <p>{{ comment.body }}</p>
                <br>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['comment']
}
</script>