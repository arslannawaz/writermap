<template>
    <modal :portal="portal" :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="px-8 py-8">
            <div class="text-center">
                <slot name="title">
                </slot>
            </div>

            <div class="mt-4">
                <slot name="content">
                </slot>
            </div>
        </div>

        <div class="px-8 pb-8 bg-light">
            <slot name="footer">
            </slot>
        </div>
    </modal>
</template>

<script>
    import Modal from './Modal'

    export default {
        components: {
            Modal,
        },

        props: {
            portal: {
                default: 'modal',
            },
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
