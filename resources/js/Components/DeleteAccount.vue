<template>
    <div>
        <portal-target name="delete_account"></portal-target>
        <jet-dialog-modal :portal="'delete_account'" :show="isShowed === true">
            <template #content>
                <div class="text-center font-bold">Delete Account</div>
                <div class="mt-4 flex flex-col justify-center items-center text-center">
                    <div class="text-center fs-18">
                        By deleting your account,<br>
                        you'll no longer be able to<br>
                        access any of your work or<br>
                        log in to Writers map.
                    </div>
                </div>
            </template>

            <template #footer>
                <div class="mt-6 w-full flex justify-between">
                    <div class="cursor-pointer" @click="toggleDeleteAccountModal(false)">Cancel</div>
                    <div class="cursor-pointer hover:text-red-500" @click="handleDeleteAccount">Delete</div>
                </div>
            </template>
        </jet-dialog-modal>

    </div>
</template>

<script>
import JetDialogModal from "../Jetstream/DialogModal";
import Vue from "vue";

export default {
    components: {JetDialogModal},
    props:  ['isShowed', 'toggleDeleteAccountModal', 'getIsDeleteAccountOpened', 'user'],
    methods: {
        handleDeleteAccount() {
            axios.post('/profile/delete', {
                id: this.user.id,
            }).then((response) => {
                if (response.data == true) {
                    window.location.href = '/';
                } else {
                    Vue.swal('Delete Account Error', 'Oops.. Something wong wrong');
                }
            });
        }
    },
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
