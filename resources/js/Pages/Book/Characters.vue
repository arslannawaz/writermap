<template>
    <app-layout>
        <app-container>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <h1 class="h2 mr-6">Characters</h1>
                    <svg @click="isCharacterModalShow = true" class="cursor-pointer icon-hoverable" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#BEBDB8" fill-rule="nonzero">
                                <g>
                                    <path d="M9 0C4.03 0 0 4.03 0 9s4.03 9 9 9 9-4.03 9-9c0-2.387-.948-4.676-2.636-6.364C13.676.948 11.387 0 9 0zm0 16.2c-3.976 0-7.2-3.224-7.2-7.2S5.024 1.8 9 1.8s7.2 3.224 7.2 7.2c0 1.91-.759 3.74-2.109 5.091C12.741 15.441 10.91 16.2 9 16.2zm3.6-8.1H9.9V5.4c0-.497-.403-.9-.9-.9s-.9.403-.9.9v2.7H5.4c-.497 0-.9.403-.9.9s.403.9.9.9h2.7v2.7c0 .497.403.9.9.9s.9-.403.9-.9V9.9h2.7c.497 0 .9-.403.9-.9s-.403-.9-.9-.9z" transform="translate(-490 -46) translate(490 46)"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>

                <div class="flex items-center">
                    <svg @click="toggleSearch()"
                        class="mr-10 icon-hoverable cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#BEBDB8" fill-rule="nonzero">
                                <g>
                                    <g>
                                        <path d="M18.738 17.453l-3.357-3.33c2.705-3.373 2.302-8.273-.918-11.158C11.243.079 6.328.213 3.271 3.27.213 6.328.079 11.243 2.965 14.463c2.885 3.22 7.785 3.623 11.158.918l3.33 3.33c.17.17.401.267.642.267s.473-.096.643-.268c.339-.35.339-.906 0-1.257zm-9.69-2.072c-3.498 0-6.334-2.836-6.334-6.333 0-3.498 2.836-6.334 6.334-6.334 3.497 0 6.333 2.836 6.333 6.334 0 1.68-.667 3.29-1.855 4.478-1.188 1.188-2.799 1.855-4.478 1.855z" transform="translate(-986 -41) translate(986 41)"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>

                    <input @input="search($event)" ref="search_input" type="text" class="input-default mr-10 w-48" :class="{'hidden': !isSearchVisible}">

                    <select class="input-default mr-10 w-48" @change="changeGroup($event.target.value)">
                        <option value="all" @click="selectedGroup = 'all'" :selected="selectedGroup === 'all'">All groups</option>
                        <option :value="group.id" v-for="group in groups" :selected="selectedGroup === group.id">{{ group.title }}</option>
                    </select>

                    <button class="button rounded-lg bg-dark px-6 py-2 font-semibold text-white" @click="isGroupModalShow = true">Create Group</button>
                </div>
            </div>

            <div class="mt-32 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">
                <div class="border-default p-4" v-for="character in characters.data" :key="character.id">
                    <div class="bg-light p-8 flex flex-col items-center justify-center text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="84" height="84" viewBox="0 0 84 84">
                            <defs>
                                <circle id="xf1qgiyoqa" cx="42" cy="42" r="42"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g>
                                    <g>
                                        <g transform="translate(-673 -219) translate(595 179) translate(78 40)">
                                            <mask id="fj0ie4f00b" fill="#fff">
                                                <use xlink:href="#xf1qgiyoqa"/>
                                            </mask>
                                            <use fill="#EDE9E1" xlink:href="#xf1qgiyoqa"/>
                                            <g fill="#BEBDB8" fill-rule="nonzero" mask="url(#fj0ie4f00b)">
                                                <path d="M13.71 11.71c2.01-1.581 2.796-4.262 1.96-6.679C14.833 2.615 12.557.995 10 .995S5.167 2.615 4.33 5.03c-.836 2.417-.05 5.098 1.96 6.679C2.867 13.081.477 16.225.07 19.89c-.06.552.338 1.05.89 1.11.552.06 1.05-.338 1.11-.89.455-4.047 3.877-7.107 7.95-7.107s7.495 3.06 7.95 7.107c.056.509.488.893 1 .89h.11c.546-.063.939-.554.88-1.1-.409-3.676-2.812-6.826-6.25-8.19zM10 11c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4c0 1.06-.421 2.078-1.172 2.828C12.078 10.578 11.061 11 10 11z" transform="translate(32 32)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <div class="mt-4 fs-15 font-semibold">{{ character.name }}</div>
                        <div class="text-color-light fs-12">Main Character</div>

                        <p class="mt-8 fs-13">
                            Default description
                        </p>
                    </div>
                </div>
            </div>
            <div class="pagination mt-12 flex justify-center items-center noselect" v-if="characters">
                <div class="pagination__page" v-for="(page, index) in characters.links" :key="index"
                     :class="{ 'pagination__page_active': page.active }"
                     @click="setPage(page)"
                >
                    <span v-if="page.label === 'Previous' || page.label === '&laquo; Previous'">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
                            <defs>
                                <path id="sluil6fsia" d="M4.167 2.988L1.423.244C1.097-.08.57-.08.244.244c-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L4.167 2.988z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g>
                                    <g>
                                        <g transform="translate(-776 -885) translate(776 873) matrix(0 -1 -1 0 5 21)">
                                            <use fill="#BEBDB8" xlink:href="#sluil6fsia"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>

                    <span v-else-if="page.label === 'Next' || page.label === 'Next &raquo;'">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
                            <defs>
                                <path id="swxada9rxa" d="M4.167 2.988L1.423.244C1.097-.08.57-.08.244.244c-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L4.167 2.988z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g>
                                    <g>
                                        <g transform="translate(-920 -885) translate(776 873) rotate(-90 82.5 -61.5)">
                                            <use fill="#BEBDB8" xlink:href="#swxada9rxa"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>

                    <span v-else>{{ page.label }}</span>
                </div>
            </div>
        </app-container>


        <jet-dialog-modal :show="isGroupModalShow" @close="isGroupModalShow = false">
            <template #title>
                <span class="h2">Create new Group</span>
            </template>

            <template #content>
                <input type="text" class="input-default w-full" v-model="formGroup.title">

                <jet-input-error :message="formGroup.error" class="mt-2" />
            </template>

            <template #footer>
                <button @click="createCharacterGroup()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
            </template>
        </jet-dialog-modal>

        <jet-dialog-modal :portal="'modal_second'" :show="isCharacterModalShow" @close="isCharacterModalShow = false">
            <template #title>
                <span class="h2">Create new Character</span>
            </template>

            <template #content>
                <select class="mt-10 input-default w-full" v-model="formCharacter.group_id">
                    <option value="null">Select character group</option>
                    <option :value="group.id" v-for="group in groups" :selected="selectedGroup === group.id">{{ group.title }}</option>
                </select>

                <input type="text" class="mt-10 input-default w-full" v-model="formCharacter.name" placeholder="Character name">

                <jet-input-error :message="formCharacter.error" class="mt-2" />
            </template>

            <template #footer>
                <button @click="createCharacter()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
            </template>
        </jet-dialog-modal>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import AppContainer from "../../Layouts/AppContainer";
import Button from "../../Jetstream/Button";
import JetDialogModal from "../../Jetstream/DialogModal";
import JetInputError from "../../Jetstream/InputError";

export default {
    components: {
        Button,
        AppLayout,
        AppContainer,
        JetDialogModal,
        JetInputError,
    },

    props: ['book'],

    mounted() {
        this.updateCharacters();
        this.updateGroups();
    },

    data() {
        return {
            selectedGroup: 'all',
            isSearchVisible: false,
            isGroupModalShow: false,
            isCharacterModalShow: false,
            characters: [],
            groups: [],
            formGroup: this.$inertia.form({
                title: '',
                error: '',
            }, {
                bag: 'createCharacterGroup',
            }),
            formCharacter: this.$inertia.form({
                group_id: null,
                name: '',
                error: '',
            }, {
                bag: 'createCharacter',
            })
        }
    },

    methods: {
        createCharacterGroup() {
            this.formGroup.processing = true;

            axios.post('/books/' + this.book.id + '/characters/group/create', {
                title: this.formGroup.title,
            }).then(response => {
                this.isGroupModalShow = false;

                this.formGroup.title = '';

                this.formGroup.error = '';
                this.formGroup.processing = false;

                this.updateGroups();
            }).catch(error => {
                this.formGroup.processing = false;
                this.formGroup.error = error.response.data.errors.password[0];
            });
        },

        createCharacter() {
            this.formCharacter.processing = true;

            axios.post('/books/' + this.book.id + '/characters/create', {
                name: this.formCharacter.name,
                group_id: this.formCharacter.group_id,
            }).then(response => {
                this.isCharacterModalShow = false;

                this.formCharacter.name = '';
                this.formCharacter.group_id = null;

                this.formCharacter.error = '';
                this.formCharacter.processing = false;

                // this.$nextTick(() => this.$emit('confirmed'));

                // this.updateBooks();
                this.updateCharacters();
            }).catch(error => {
                this.formCharacter.processing = false;
                this.formCharacter.error = error.response.data.errors.password[0];
            });
        },

        setPage(page) {
            this.updateCharacters(page.url);
        },

        updateCharacters(url = null)
        {
            if (url === null) {
                url = '/books/' + this.book.id + '/characters/list';
            }

            console.log('update characters, group select', this.selectedGroup);

            axios.post(url, {
                group_id: this.selectedGroup,
                query: this.$refs.search_input.value,
            }).then(response => {
                console.log('resonse characteres', response);
                this.characters = response.data;
            }).catch(error => {
                console.log('error', error);
            });
        },

        updateGroups()
        {
            const url = '/books/' + this.book.id + '/characters/groups/list';
            axios.get(url, {
                group_id: this.selectedGroup
            }).then(response => {
                this.groups = response.data;
            }).catch(error => {
                console.log('error', error);
            });
        },

        changeGroup(value) {
            this.selectedGroup = value;
            this.updateCharacters();
        },

        toggleSearch() {
            this.isSearchVisible = !this.isSearchVisible;

            if (this.$refs.search_input.value != '') {
                this.$refs.search_input.value = '';
                this.search(null);
            }

            this.$nextTick(() => {
                this.$refs.search_input.focus();
            });
        },

        search(event) {
            this.updateCharacters();
        },
    },
}
</script>
