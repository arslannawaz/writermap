<template>
    <app-layout>
        <div class="writers-room flex items-center justify-center">
            <img src="/images/writers_desk_preview.png" alt="room" width="100%" height="100%" usemap="#Map">
            <map name="Map" id="Map">
                <area href="/dashboard" coords="1570,487,1919,380" shape="rect">
            </map>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from "../Layouts/AppLayout";
    import * as mykey from '../imageMapResizer.min'

    export default {
        components: {AppLayout},
        data() {
            return {

            }
        },

        mounted() {
            mykey();
        },

        methods: {
        }
    }
</script>
