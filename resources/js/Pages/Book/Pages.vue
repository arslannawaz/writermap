<template>
    <app-layout>
        <app-container>
            <div class="grid grid-cols-2 grid-background absolute z-0 invisible lg:visible">
                <div class="col-span-1"></div>
                <div class="col-span-1 col-bg"></div>
            </div>
            <div class="grid grid-cols-1 xl:grid-cols-2 relative z-10 h-full">
                <!-- BEGIN Left block -->
                <div class="px-12">
                    <div class="flex justify-between pl-6">
                        <h1 class="h2">
                            <input ref="book_name" type="text" class="input-default input-default_p-zero input-default_border-transparent h2" v-model="book.title" @input="updateField('title')">
                        </h1>
                        <svg class="mt-2 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" @click="$refs.book_name.focus()">
                            <g fill="none" fill-rule="evenodd">
                                <g fill="#BEBDB8" fill-rule="nonzero">
                                    <g>
                                        <path d="M18 4.716c.001-.24-.093-.47-.261-.639L13.923.261c-.17-.168-.4-.262-.639-.261-.24-.001-.47.093-.639.261l-2.547 2.547-9.837 9.837c-.168.17-.262.4-.261.639V17.1c0 .497.403.9.9.9h3.816c.255.014.503-.081.684-.261l9.783-9.837L17.739 5.4c.082-.087.15-.188.198-.297.009-.072.009-.144 0-.216.004-.042.004-.084 0-.126L18 4.716zM4.347 16.2H1.8v-2.547l8.937-8.937 2.547 2.547L4.347 16.2zM14.553 5.994l-2.547-2.547 1.278-1.269 2.538 2.538-1.269 1.278z" transform="translate(-642 -40) translate(642 40)"/>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>

                    <div class="mt-85px">
                        <div class="flex justify-between px-6">
                            <div class="book-label outline-none select-none" @click="isShowCover = !isShowCover">
                                <span v-if="isShowCover">Title Page</span>
                                <span v-else>Cover Page</span>
                            </div>
                            <div class="flex flex-end items-center" v-if="isShowCover">
                                <svg @click="selectNewCoverImage()" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g fill="none" fill-rule="evenodd">
                                        <g fill="#4E4D4B" fill-rule="nonzero">
                                            <g>
                                                <path d="M15.455 10.91c-.503 0-.91.406-.91.908v.346L13.2 10.818c-.989-.98-2.584-.98-3.573 0l-.636.637L6.736 9.2c-1-.952-2.572-.952-3.572 0l-1.346 1.345v-5.09c0-.503.407-.91.91-.91H9.09c.502 0 .909-.407.909-.909s-.407-.909-.91-.909H2.728C1.221 2.727 0 3.948 0 5.455v10.909c0 1.506 1.221 2.727 2.727 2.727h10.91c1.506 0 2.727-1.221 2.727-2.727v-4.546c0-.502-.407-.909-.91-.909zM2.727 17.272c-.502 0-.909-.407-.909-.91v-3.245l2.637-2.636c.277-.265.713-.265.99 0l2.882 2.882 3.91 3.909h-9.51zm11.818-.91c0 .175-.058.344-.163.482l-4.1-4.118.636-.636c.132-.134.312-.21.5-.21s.369.076.5.21l2.627 2.645v1.628zm4.282-13.372L16.1.264c-.086-.083-.188-.148-.3-.191-.221-.091-.47-.091-.69 0-.113.043-.214.108-.3.19l-2.728 2.728c-.23.23-.32.567-.236.882.084.315.33.56.645.645.315.084.651-.006.882-.236L14.545 3.1v5.082c0 .502.407.909.91.909.502 0 .909-.407.909-.91V3.1l1.172 1.182c.171.172.403.269.646.269.242 0 .475-.097.645-.27.172-.17.27-.402.27-.645 0-.242-.098-.474-.27-.645z" transform="translate(-538 -152) translate(538 152)"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>

                                <input type="file" class="hidden"
                                       ref="cover"
                                       @change="updateCoverImagePreview()">

<!--                                <span class="ml-2 font-semibold fs-12 cursor-pointer select-none" @click="selectNewCoverImage()">Update cover image</span>-->
                            </div>
                        </div>

                        <div class="book-page flex justify-center mt-2">
                            <div v-if="coverImageUrl && isShowCover" class="book-page__paper book-page__paper_cover flex flex-col justify-start ff-minion">
                                <div :style="{ backgroundImage: 'url(' + coverImageUrl + ')', height: '100%', backgroundSize: 'cover' }"></div>
                            </div>
                            <div v-else class="book-page__paper flex flex-col justify-between ff-minion">
                                <span class="text-center outline-none" v-model="book.additional_title" contenteditable="true" @input="updateContentEditableField('additional_title', $event)">
                                    <span v-if="book.additional_title === null">Additional title</span>
                                    <span v-else>{{ book.additional_title }}</span>
                                </span>

                                <div class="text-center">
                                    <p class="font-semibold fs-24">”{{ book.title }}”</p>
                                    <p>By {{ $page.user.pen_name }}</p>
                                </div>

                                <div>
                                    <div class="text-right outline-none book-page__contacts">
                                        <p class="outline-none" contenteditable="true" @input="updateContentEditableField('address', $event)">
                                            <span v-if="book.address">{{ book.address }}</span>
                                            <span v-else>First Stree 12,  BC 6769</span>
                                        </p>
                                        <p class="outline-none" contenteditable="true" @input="updateContentEditableField('phone', $event)">
                                            <span v-if="book.phone">{{ book.phone }}</span>
                                            <span v-else>+1 6768 797</span>
                                        </p>
                                        <p class="outline-none" contenteditable="true" @input="updateContentEditableField('email', $event)">
                                            <span v-if="book.email">{{ book.email }}</span>
                                            <span v-else>{{ $page.user.email }}</span>
                                        </p>
                                        <p class="outline-none" contenteditable="true" @input="updateContentEditableField('site', $event)">
                                            <span v-if="book.site">{{ book.site }}</span>
                                            <span v-else>amb-gord_stories.com</span>
                                        </p>
                                    </div>

                                    <p class="text-center mt-16 copyright outline-none" v-model="book.copyright" contenteditable="true" @input="updateContentEditableField('copyright', $event)">
                                        <span v-if="book.copyright === null">Copyright</span>
                                        <span v-else>{{ book.copyright }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Left block -->

                <!-- BEGIN Right block -->
                <div class="px-12 mt-16 lg:mt-0">
                    <div class="flex justify-between mt-2">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#BEBDB8" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M18.738 17.453l-3.357-3.33c2.705-3.373 2.302-8.273-.918-11.158C11.243.079 6.328.213 3.271 3.27.213 6.328.079 11.243 2.965 14.463c2.885 3.22 7.785 3.623 11.158.918l3.33 3.33c.17.17.401.267.642.267s.473-.096.643-.268c.339-.35.339-.906 0-1.257zm-9.69-2.072c-3.498 0-6.334-2.836-6.334-6.333 0-3.498 2.836-6.334 6.334-6.334 3.497 0 6.333 2.836 6.333 6.334 0 1.68-.667 3.29-1.855 4.478-1.188 1.188-2.799 1.855-4.478 1.855z" transform="translate(-740 -40) translate(740 40)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <input type="text" class="input-default input-default_p-zero ml-4">
                        </div>

                        <div class="flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#BEBDB8" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M8.571 15.429h-6c-.473 0-.857-.384-.857-.858v-12c0-.473.384-.857.857-.857h4.286v2.572c0 1.42 1.151 2.571 2.572 2.571H12v.857c0 .474.384.857.857.857.474 0 .857-.383.857-.857V6v-.051c-.009-.08-.026-.157-.051-.232V5.64c-.041-.088-.096-.17-.163-.24L8.357.257c-.07-.067-.152-.122-.24-.163-.025-.003-.051-.003-.077 0C7.953.044 7.857.012 7.757 0H2.571C1.151 0 0 1.151 0 2.571v12c0 1.42 1.151 2.572 2.571 2.572h6c.474 0 .858-.384.858-.857 0-.474-.384-.857-.858-.857zm0-12.506l2.22 2.22H9.43c-.474 0-.858-.384-.858-.857V2.923zm-4.285 2.22c-.474 0-.857.384-.857.857s.383.857.857.857h.857C5.616 6.857 6 6.473 6 6s-.384-.857-.857-.857h-.857zm12.608 10.534l-1.003-.994c.66-1.15.47-2.598-.462-3.54-.855-.885-2.163-1.157-3.299-.685-1.136.471-1.867 1.59-1.844 2.82-.006 1.051.545 2.028 1.45 2.565.904.538 2.025.556 2.947.048l.994 1.003c.161.163.38.254.609.254.228 0 .447-.091.608-.254.163-.16.254-.38.254-.608 0-.229-.091-.448-.254-.609zm-2.717-1.5c-.508.478-1.3.478-1.808 0-.236-.24-.369-.563-.369-.9-.004-.341.133-.67.377-.908.229-.228.535-.36.857-.369.35-.022.694.104.948.346.254.243.395.58.39.931-.008.34-.15.664-.395.9zM9.43 8.571H4.286c-.474 0-.857.384-.857.858 0 .473.383.857.857.857h5.143c.473 0 .857-.384.857-.857 0-.474-.384-.858-.857-.858zm-1.715 5.143c.474 0 .857-.383.857-.857 0-.473-.383-.857-.857-.857H4.286c-.474 0-.857.384-.857.857 0 .474.383.857.857.857h3.428z" transform="translate(-1102 -40) translate(1102 40)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            <svg class="ml-6" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#BEBDB8" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M4 6.4c-.442 0-.8.358-.8.8 0 .442.358.8.8.8.442 0 .8-.358.8-.8 0-.442-.358-.8-.8-.8zm9.6-3.2h-.8V.8c0-.442-.358-.8-.8-.8H4c-.442 0-.8.358-.8.8v2.4h-.8C1.075 3.2 0 4.275 0 5.6v4.8c0 1.325 1.075 2.4 2.4 2.4h.8v2.4c0 .442.358.8.8.8h8c.442 0 .8-.358.8-.8v-2.4h.8c1.325 0 2.4-1.075 2.4-2.4V5.6c0-1.325-1.075-2.4-2.4-2.4zM4.8 1.6h6.4v1.6H4.8V1.6zm6.4 12.8H4.8v-3.2h6.4v3.2zm3.2-4c0 .442-.358.8-.8.8h-.8v-.8c0-.442-.358-.8-.8-.8H4c-.442 0-.8.358-.8.8v.8h-.8c-.442 0-.8-.358-.8-.8V5.6c0-.442.358-.8.8-.8h11.2c.442 0 .8.358.8.8v4.8z" transform="translate(-1144 -42) translate(1102 40) translate(42 2)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-85px pt-4">
                        <div class="flex justify-between px-6">
                            <span class="book-label">Page Preview</span>
                        </div>

                        <div class="book-page flex justify-center mt-2">
                            <div class="book-page__paper flex flex-col justify-end">
                                <span class="book-page__chapter">Chapter One</span>

                                <div class="book-page__content book-page__content_first-letter">
                                    <p>Don’t know about you, but I’m getting a lot of reading done these days. I just finished To Kill a Mockingbird, which I still can’t believe  school without reading. On my nightstand are The Overstory by Richard Powers and Edge of the Map by Johanna Garton. Coventry by Rachel Cusk calls to me to finish it with a reminder of how lucid close observation can be. There’s a Stephen King open on my Kindle app…which one? Ah, yes, The Institute. Oh, and Joni just finished a loaner copy of Michelle Obama’s Becoming and I get it next.</p>
                                    <p>Sometimes, though, you want to lose yourself in a classic adventure tale, where a human sets a goal and then launches on a quest to accomplish that goal. Can they climb this? Can they paddle this faster than anyone? Can they survive a plane crash in the Sahara? These five are some of my faves (four in photo because Emerald Mile is out on loan). I’ve read them all more than once, and each time I discover new delights within.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Right block -->
                </div>
            </div>
        </app-container>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import AppContainer from "../../Layouts/AppContainer";

export default {
    props: ['book_data'],

    components: {
        AppLayout,
        AppContainer,
    },

    data() {
        return {
            book: this.book_data,
            previewCover: null,
            coverImage: null,
            isShowCover: false,
            coverImageUrl: this.book_data.cover_image_url,
        };
    },

    mounted() {
        console.log('mounted')
    },

    methods: {
        postUpdate(data, config = {}, callback=()=>{}) {
            axios.post('/books/' + this.book.id + '/update', data, config).then(response => {
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

        updateContentEditableField(field, event) {
            // console.log(field, this.bookItem, this.bookItem[field]);
            this.postUpdate({
                field: field,
                value: event.target.innerText,
            });
        },

        updateField(field) {
            // console.log(field, this.bookItem, this.bookItem[field]);
            this.postUpdate({
                field: field,
                value: this.book[field],
            });
        },

        updateCoverImage() {
            if (this.$refs.cover) {
                this.coverImage = this.$refs.cover.files[0];

                const formData = new FormData();
                formData.append('image', this.coverImage);

                this.postUpdate(formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }, (data) => {
                    this.coverImageUrl = data.cover_image_url;
                    if (this.coverImageUrl !== this.book.cover_image_url) {
                        this.isShowCover = true;
                    }
                });
            }
        },

        updateCoverImagePreview() {
            const reader = new FileReader();

            reader.onload = (e) => {
                this.previewCover = e.target.result;
                console.log('preview cover', this.previewCover);
            };

            reader.readAsDataURL(this.$refs.cover.files[0]);

            this.updateCoverImage();
        },

        selectNewCoverImage() {
            this.$refs.cover.click();
        },
    },
}
</script>
