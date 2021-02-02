<template>
    <div>
        <portal-target name="need_subsciption"></portal-target>
        <jet-dialog-modal :portal="'need_subsciption'" :show="true">
            <template #content>
                <div class="flex flex-col justify-center items-center text-center">
                    <div class="text-center fs-18">
                        We are constantly adding new writer<br>
                        features to the platform. To have<br>
                        unlimited access for your writing<br>
                        experience, update to Writers Map Pro.
                    </div>
                </div>
            </template>

            <template #footer>
                <div class="mt-4 flex flex-col items-center justify-center">
                    <a href="/user/profile" class="button px-2 py-2 fs-18" style="background-color: #EAE6DD;">Upgrade to Pro</a>
                    <a href="https://www.writersmap.co/pricing" target="_blank" class="mt-4 fs-14 underline">View Features List</a>
                </div>
            </template>
        </jet-dialog-modal>

    </div>
</template>

<script>
import JetDialogModal from "../Jetstream/DialogModal";
export default {
    components: {JetDialogModal},
}
</script>

<style>
.modal-backstage {
    background-color: rgba(236, 234, 227, 0.75) !important;
}

.modal-window {
    border: none !important;
    padding: 0 !important;
}

.modal-window .bg-light {
    background-color: #F9F6F0 !important;
}
</style>
