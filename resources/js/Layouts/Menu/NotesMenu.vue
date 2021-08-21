<template>
<div>
    <div class="mt-8 px-10 nav-sidebar">
        <a :href="'/books/' + $page.book.id + '/pages'" class="menu-link w-48 group flex items-center px-2 py-2 focus:outline-none transition duration-75 ease-in-out">
            <svg style="width: auto;" class="nav-sidebar__icon nav-sidebar__icon_fill transition duration-75 ease-in-out" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
                <defs>
                    <path id="1smf43lq8a" d="M4.167 2.988L1.423.244C1.097-.08.57-.08.244.244c-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L4.167 2.988z"/>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g>
                        <g>
                            <g transform="translate(-47 -41) matrix(0 -1 -1 0 52 50)">
                                <use fill="#BEBDB8" xlink:href="#1smf43lq8a"/>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            <svg style="width: auto;" class="nav-sidebar__icon nav-sidebar__icon_fill transition duration-75 ease-in-out" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
                <defs>
                    <path id="1smf43lq8a" d="M4.167 2.988L1.423.244C1.097-.08.57-.08.244.244c-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L4.167 2.988z"/>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <g>
                        <g>
                            <g transform="translate(-47 -41) matrix(0 -1 -1 0 52 50)">
                                <use fill="#BEBDB8" xlink:href="#1smf43lq8a"/>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>

            <span class="ml-8 menu-link-title">Back</span>
        </a>
    </div>

    <div class="mt-8 px-10">
        <div
            @click="isCreateNoteModalShow = !isCreateNoteModalShow"
            class="w-48 button rounded-lg bg-dark px-12 py-4 font-semibold text-white text-center cursor-pointer">New Note</div>

        <jet-dialog-modal :show="isCreateNoteModalShow" @close="isCreateNoteModalShow = false">
            <template #title>
                <span class="h2">Create New Note</span>
            </template>
               

            <template #content>
                <input type="text" @keyup.enter="trigger" class="input-default w-full" v-model="newNoteForm.title" placeholder="Note title">

                <jet-input-error :message="newNoteForm.error" class="mt-2" />
            </template>

            <template #footer>
                <div class="flex justify-center">
                    <button @click="createNote()" ref="sendReply" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
                </div>
            </template>
                              

        </jet-dialog-modal>
    </div>

<!--    <div class="mt-8 px-10 font-semibold fs-20 ff-minion">-->
<!--        <div v-if="$page.note">-->
<!--            <span v-if="$page.note.group === 0">General</span>-->
<!--            <span v-if="$page.note.group === 1">Research</span>-->
<!--            <span v-if="$page.note.group === 2">Story ideas</span>-->
<!--        </div>-->
<!--        <div v-else>-->
<!--            <span v-if="$page.note_group === 'general'">General</span>-->
<!--            <span v-if="$page.note_group === 'research'">Research</span>-->
<!--            <span v-if="$page.note_group === 'ideas'">Story ideas</span>-->
<!--        </div>-->
<!--    </div>-->

    <div v-for="note in $page.notes" class="mt-8 px-10">
        <a :href="'/books/'+ $page.book.id +'/notes/'+ note.id +'/edit'" class="fs-16 text-color-dark">{{ note.title }}</a>
        <div v-if="note.content" class="mt-2 text-color-light">{{ note.content | truncate(96, '...') }}</div>
    </div>
</div>
</template>

<script>
import JetDialogModal from "../../Jetstream/DialogModal";
import JetInputError from "../../Jetstream/InputError";

export default {
    components: {
        JetDialogModal,
        JetInputError,
    },

    data() {
        return {
            isCreateNoteModalShow: false,
            newNoteForm: this.$inertia.form({
                book_id: this.$page.book.id,
                group: this.$page.note_group,
                title: null,
                content: null,
                error: '',
            }, {
                bag: 'milestone',
            }),
        };
    },

    methods: {
    trigger () {
    	this.$refs.sendReply.click()
    },
        createNote() {
            const url = '/books/'+ this.$page.book.id +'/notes/create';
            axios.post(url, this.newNoteForm).then((response) => {
                console.log('create new note', response.data);
                window.location.href = '/books/'+ this.$page.book.id +'/notes/'+ response.data.id +'/edit';
            });
        },
    },
}
</script>
