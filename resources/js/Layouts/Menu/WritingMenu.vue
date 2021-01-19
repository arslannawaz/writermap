<template>
    <div>
        <div class="mt-8 px-10 nav-sidebar">
            <a :href="'/books/' + $page.book.id + '/pages'" class="menu-link w-48 group flex items-center px-2 py-2 focus:outline-none transition duration-75 ease-in-out">
                <svg class="nav-sidebar__icon nav-sidebar__icon_fill transition duration-75 ease-in-out" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
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
                <svg class="nav-sidebar__icon nav-sidebar__icon_fill transition duration-75 ease-in-out" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
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
                @click="isCreateModalShow = !isCreateModalShow"
                class="w-48 button rounded-lg bg-dark px-12 py-4 font-semibold text-white text-center cursor-pointer fs-14">Add Chapter</div>

            <jet-dialog-modal :show="isCreateModalShow" @close="isCreateModalShow = false">
                <template #title>
                    <span class="h2">Create New Chapter</span>
                </template>

                <template #content>
                    <input type="text" class="input-default w-full" v-model="newForm.title" placeholder="Chapter title">


                    <jet-input-error :message="newForm.error" class="mt-2" />
                </template>

                <template #footer>
                    <div class="flex justify-center">
                        <button @click="createChapter()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
                    </div>
                </template>
            </jet-dialog-modal>
        </div>

        <div class="mt-20"></div>
        <div v-for="chapter in $page.chapters" class="flex flex-col mt-4 px-10 py-4" :class="{'border-r-4 border-gray-400': $page.page_chapter.id === chapter.id}">
            <a :href="'/books/'+ $page.book.id +'/chapters/'+ chapter.id +'/edit'" class="fs-16 font-semibold text-color-dark">Chapter {{ chapter.number }}</a>
            <a :href="'/books/'+ $page.book.id +'/chapters/'+ chapter.id +'/edit'" v-if="chapter.title" class="mt-2 text-color-light" :class="{'text-color-dark': $page.page_chapter.id === chapter.id}">{{ chapter.title | truncate(96, '...') }}</a>
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
            isCreateModalShow: false,
            newForm: this.$inertia.form({
                book_id: this.$page.book.id,
                title: null,
                error: '',
            }, {
                bag: 'milestone',
            }),
        };
    },

    methods: {
        createChapter() {
            const url = '/books/'+ this.$page.book.id +'/chapters/create';
            axios.post(url, this.newForm).then((response) => {
                console.log('create new chapter', response.data);
                window.location.href = '/books/'+ this.$page.book.id +'/chapters/'+ response.data.id +'/edit';
            });
        },
    },
}
</script>
