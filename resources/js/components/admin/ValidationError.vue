<template>
    <ul class="list-unstyled mb-0">
        <li v-for="message, index in messages" :key="'validation_message_' + index" class="text-danger mt-1">
            <i>{{ message }}</i>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        messages: Array
    }
}
</script>

<style scoped>

</style>
