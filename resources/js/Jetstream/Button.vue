<template>
    <button :type="type" class="button rounded-lg bg-dark px-12 py-2 font-semibold text-white">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
