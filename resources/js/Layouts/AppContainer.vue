<template>
    <div :class="width + ' mx-auto py-8 sm:px-6 lg:px-8'">
        <slot />
    </div>
</template>

<script>
    export default {
        props: {
            width: {
                default: 'max-w-7xl'
            }
        }
    }
</script>
