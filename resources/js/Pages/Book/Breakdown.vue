<template>
    <app-layout>
        <app-container>
            <div :class="{'block': $page.user.stripe_subscription}">
                <div class="flex items-center px-16">
                    <h1 class="h2">Breakdown</h1>
                    <div class="flex-wrap ml-16 breakdown-header-links -mt-4 hidden xl:flex">
                        <a :href="'/books/' + book.id + '/breakdown/characters'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/characters') }">Characters</a>
                        <a :href="'/books/' + book.id + '/breakdown/settings'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/settings') }">Settings</a>
                        <a :href="'/books/' + book.id + '/breakdown/problem'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/problem') }">Problem</a>
                        <a :href="'/books/' + book.id + '/breakdown/solution'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/solution') }">Solution</a>
                        <a :href="'/books/' + book.id + '/breakdown/key-events'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/key-events') }">Key Events</a>
                    </div>
                </div>

                <div class="px-10 flex-wrap breakdown-header-links mt-1 flex xl:hidden">
                    <a :href="'/books/' + book.id + '/breakdown/characters'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/characters') }">Characters</a>
                    <a :href="'/books/' + book.id + '/breakdown/settings'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/settings') }">Settings</a>
                    <a :href="'/books/' + book.id + '/breakdown/problem'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/problem') }">Problem</a>
                    <a :href="'/books/' + book.id + '/breakdown/solution'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/solution') }">Solution</a>
                    <a :href="'/books/' + book.id + '/breakdown/key-events'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/key-events') }">Key Events</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 px-16">
                    <!-- BEGIN Left block -->
                    <div>
                        <div class="mt-12">
                            <a :href="'/books/' + book.id + '/breakdown/' + prev_type" class="flex justify-start cursor-pointer icon-hoverable pb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
                                    <defs>
                                        <path id="mn9mdf2o2a" d="M4.167 2.988L1.423.244C1.097-.08.57-.08.244.244c-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L4.167 2.988z"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <g>
                                            <g transform="translate(-350 -154) matrix(0 -1 -1 0 355 163)">
                                                <use fill="#BEBDB8" xlink:href="#mn9mdf2o2a"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <div class="book-page flex justify-center">
                                <div class="book-page__paper flex flex-col ff-minion">
                                    <span class="book-page__chapter fs-24 capitalize mt-16">{{ type }}</span>

                                    <span class="book-page__chapter mt-4">Paragraph</span>

                                    <div class="book-page__content -mt-4" style="padding: 0 30px;">
                                        <p :ref="'content_' + index" contenteditable="true" v-for="(item, index) in decodeContent" :key="index"
                                           @input="updateContentEditableField('content', $event, index)"
                                           v-on:keypress="checkContentKey"
                                           class="outline-none"
                                        >
                                            <span v-if="item">{{ item }}</span>
                                            <span v-else>Type here..</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Left block -->

                    <!-- BEGIN Right block -->
                    <div>
                        <div class="mt-12">
                            <a :href="'/books/' + book.id + '/breakdown/' + next_type" class="icon-hoverable cursor-pointer flex justify-end pb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="5" height="9" viewBox="0 0 5 9">
                                    <defs>
                                        <path id="b7e3ue085a" d="M4.167 2.988L1.423.244C1.097-.08.57-.08.244.244c-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L4.167 2.988z"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <g>
                                            <g transform="translate(-1365 -154) rotate(-90 764 -601)">
                                                <use fill="#BEBDB8" xlink:href="#b7e3ue085a"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <div class="book-page flex justify-center">
                                <div class="book-page__paper flex flex-col ff-minion">
                                    <div class="mb-4"></div>
                                    <span class="book-page__chapter mt-32">Key Points</span>

                                    <div class="book-page__content" style="padding: 0 30px;">
                                        <ul class="list-disc ml-4">
                                            <li :ref="'point_' + index" contenteditable="true" v-for="(item, index) in decodeKeyPoints" :key="index"
                                                @input="updatePointEditableField('key_points', $event, index)"
                                                v-on:keypress="checkPointsKey"
                                                class="outline-none"
                                            >
                                                <span v-if="item">{{ item }}</span>
                                                <span v-else>Type here..</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Right block -->
                    </div>
                </div>
            </div>
        </app-container>

        <template v-slot:modals>
            <need-subscription v-if="!$page.user.stripe_subscription"></need-subscription>
        </template>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import AppContainer from "../../Layouts/AppContainer";
import NeedSubscription from "../../Components/NeedSubscription";

export default {
    props: ['book', 'type', 'breakdown', 'prev_type', 'next_type'],

    components: {
        NeedSubscription,
        AppLayout,
        AppContainer,
    },

    data() {
        return {
            decodeContent: {},
            decodeKeyPoints: {},
        };
    },

    mounted() {
        console.log('mounted');
        console.log('book', this.book);
        console.log('breakdown', this.breakdown);

        if (this.breakdown.content != null && this.breakdown.content.length > 4) {
            console.log('1 err');
            this.decodeContent = JSON.parse(this.breakdown.content)
        } else {
            console.log('2 err');
            this.$set(this.decodeContent, 0, '');
        }

        if (this.breakdown.key_points != null && this.breakdown.key_points.length > 4) {
            console.log('11 err');
            this.decodeKeyPoints = JSON.parse(this.breakdown.key_points)
        } else {
            console.log('22 err');
            this.$set(this.decodeKeyPoints, 0, '');
        }
    },

    methods: {
        isUrlContain(value) {
            return window.location.pathname.indexOf(value) > -1;
        },

        checkContentKey(event) {
            console.log(event.key);
            if (event.key === 'Enter') {
                event.preventDefault();

                let lastKey = Object.keys(this.decodeContent)[Object.keys(this.decodeContent).length-1];
                lastKey = parseInt(lastKey) + 1;

                this.$set(this.decodeContent, lastKey, '');
                // this.decodeContent[lastKey] = 'New line';

                console.log('refs list', this.$refs);
                console.log('decodeContent', this.decodeContent);

                this.$nextTick(() => {
                    // const focusToRef = parseInt(Object.keys(this.decodeContent).length) - 1;
                    this.$refs['content_' + lastKey][0].focus();
                });
            }
        },

        checkPointsKey(event) {
            console.log(event.key);
            if (event.key === 'Enter') {
                event.preventDefault();

                let lastKey = Object.keys(this.decodeKeyPoints)[Object.keys(this.decodeKeyPoints).length-1];
                lastKey = parseInt(lastKey) + 1;

                this.$set(this.decodeKeyPoints, lastKey, '');
                // this.decodeContent[lastKey] = 'New line';

                console.log('refs list', this.$refs);
                console.log('decodePoint', this.decodeKeyPoints);

                this.$nextTick(() => {
                    // const focusToRef = parseInt(Object.keys(this.decodeContent).length) - 1;
                    this.$refs['point_' + lastKey][0].focus();
                });
            }
        },

        postUpdate(data, config = {}, callback=()=>{}) {
            axios.post('/books/' + this.book.id + '/breakdowns/' + this.breakdown.id + '/update', data, config).then(response => {
                console.log('response', response);
                if (typeof callback === 'function') {
                    callback(response.data);
                }
            }).catch(error => {
                // this.form.processing = false;
                // this.form.error = error.response.data.errors.password[0];
                console.log('update error', error);
            });
        },

        updateContentEditableField(field, event, index = null) {
            console.log('input to index element', index);
            if (event.target.innerText == "" || event.target.innerText == null) {
                console.log('EMpty text', this.decodeContent);

                this.$delete(this.decodeContent, index);

                console.log('delete decode content', this.decodeContent);

                this.$nextTick(() => {
                    if (Object.keys(this.decodeContent).length > 0) {
                        const lastKey = Object.keys(this.decodeContent)[Object.keys(this.decodeContent).length-1];
                        const keyToFocus = 'content_' + lastKey;
                        console.log('last key after delete', lastKey, keyToFocus);
                        console.log('refs', this.$refs);
                        this.$refs[keyToFocus][0].focus();
                    } else {
                        this.$set(this.decodeContent, 0, '');
                        this.$nextTick(() => {
                            this.$refs['content_0'][0].focus();
                        });
                    }
                });
            }

            // console.log(field, this.bookItem, this.bookItem[field]);
            this.postUpdate({
                field: field,
                value: event.target.innerText,
                index: index,
            });
        },

        updatePointEditableField(field, event, index = null) {
            console.log('input to index element', index);
            if (event.target.innerText == "" || event.target.innerText == null) {
                console.log('EMpty text', this.decodeKeyPoints);

                this.$delete(this.decodeKeyPoints, index);

                console.log('delete decode points', this.decodeKeyPoints);

                this.$nextTick(() => {
                    if (Object.keys(this.decodeKeyPoints).length > 0) {
                        const lastKey = Object.keys(this.decodeKeyPoints)[Object.keys(this.decodeKeyPoints).length-1];
                        const keyToFocus = 'point_' + lastKey;
                        console.log('last key after delete', lastKey, keyToFocus);
                        console.log('refs', this.$refs);
                        this.$refs[keyToFocus][0].focus();
                    } else {
                        this.$set(this.decodeKeyPoints, 0, '');
                        this.$nextTick(() => {
                            this.$refs['point_0'][0].focus();
                        });
                    }
                });
            }

            // console.log(field, this.bookItem, this.bookItem[field]);
            this.postUpdate({
                field: field,
                value: event.target.innerText,
                index: index,
            });
        },
    },
}
</script>
