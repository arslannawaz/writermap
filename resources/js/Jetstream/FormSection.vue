<template>
    <div class="md:grid md:grid-cols-2 md:gap-3">
        <slot name="before"></slot>

        <jet-section-title>
            <template #title><slot name="title"></slot></template>
            <template #description><slot name="description"></slot></template>
        </jet-section-title>

        <div class="mt-5 sm:mt-0 md:col-span-2">
            <form @submit.prevent="$emit('submitted')">
                <div class="overflow-hidden">
                    <div class="px-4 py-5 bg-light sm:p-14">
                        <slot name="form"></slot>
                    </div>

                    <div class="flex items-start justify-start bg-light text-right px-1 pb-6 sm:px-12 sm:pb-12 sm:-mt-4" v-if="hasActions">
                        <slot name="actions"></slot>
                    </div>
                </div>
            </form>
        </div>

        <slot name="after"></slot>
    </div>
</template>

<script>
    import JetSectionTitle from './SectionTitle'

    export default {
        components: {
            JetSectionTitle,
        },

        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
