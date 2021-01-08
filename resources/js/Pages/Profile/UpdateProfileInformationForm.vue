<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #before>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-2 mb-12">
                <div class="flex items-center">
                    <div v-if="$page.jetstream.managesProfilePhotos">
                        <!-- Profile Photo File Input -->
                        <input type="file" class="hidden"
                               ref="photo"
                               @change="updatePhotoPreview">

                        <!-- Current Profile Photo -->
                        <div class="mt-2 profile-photo" v-show="! photoPreview" @click="selectNewPhoto">
                            <img :src="$page.user.profile_photo_url" alt="Current Profile Photo"
                                 class="rounded-full h-24 w-24 object-cover cursor-pointer profile-photo__image">

                                 <div class="profile-photo__icon-change cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#ADAAA5" fill-rule="nonzero">
                                                <g>
                                                    <path d="M13.6 2.8h-1.024L12.32 2c-.34-.962-1.252-1.604-2.272-1.6H5.952c-1.031.002-1.946.662-2.272 1.64l-.256.8H2.4C1.075 2.84 0 3.915 0 5.24v6.4c0 1.325 1.075 2.4 2.4 2.4h11.2c1.325 0 2.4-1.075 2.4-2.4v-6.4c.01-.643-.237-1.264-.689-1.723-.45-.459-1.067-.717-1.711-.717zm.8 8.8c0 .442-.358.8-.8.8H2.4c-.442 0-.8-.358-.8-.8V5.2c0-.442.358-.8.8-.8H4c.359.019.686-.204.8-.544l.432-1.312c.11-.326.416-.545.76-.544h4.096c.344 0 .65.218.76.544l.432 1.312c.105.312.39.528.72.544h1.6c.442 0 .8.358.8.8v6.4zM8 4.4c-1.767 0-3.2 1.433-3.2 3.2 0 1.767 1.433 3.2 3.2 3.2 1.767 0 3.2-1.433 3.2-3.2 0-.849-.337-1.663-.937-2.263-.6-.6-1.414-.937-2.263-.937zm0 4.8c-.884 0-1.6-.716-1.6-1.6C6.4 6.716 7.116 6 8 6c.884 0 1.6.716 1.6 1.6 0 .884-.716 1.6-1.6 1.6z" transform="translate(-433 -112) translate(433 112)"/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                        </div>

                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" v-show="photoPreview" @click="selectNewPhoto">
                            <div class="rounded-full h-24 w-24 object-cover cursor-pointer profile-photo__image"
                                :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                <div class="profile-photo__icon-change cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 16 15">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#ADAAA5" fill-rule="nonzero">
                                                <g>
                                                    <path d="M13.6 2.8h-1.024L12.32 2c-.34-.962-1.252-1.604-2.272-1.6H5.952c-1.031.002-1.946.662-2.272 1.64l-.256.8H2.4C1.075 2.84 0 3.915 0 5.24v6.4c0 1.325 1.075 2.4 2.4 2.4h11.2c1.325 0 2.4-1.075 2.4-2.4v-6.4c.01-.643-.237-1.264-.689-1.723-.45-.459-1.067-.717-1.711-.717zm.8 8.8c0 .442-.358.8-.8.8H2.4c-.442 0-.8-.358-.8-.8V5.2c0-.442.358-.8.8-.8H4c.359.019.686-.204.8-.544l.432-1.312c.11-.326.416-.545.76-.544h4.096c.344 0 .65.218.76.544l.432 1.312c.105.312.39.528.72.544h1.6c.442 0 .8.358.8.8v6.4zM8 4.4c-1.767 0-3.2 1.433-3.2 3.2 0 1.767 1.433 3.2 3.2 3.2 1.767 0 3.2-1.433 3.2-3.2 0-.849-.337-1.663-.937-2.263-.6-.6-1.414-.937-2.263-.937zm0 4.8c-.884 0-1.6-.716-1.6-1.6C6.4 6.716 7.116 6 8 6c.884 0 1.6.716 1.6 1.6 0 .884-.716 1.6-1.6 1.6z" transform="translate(-433 -112) translate(433 112)"/>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!--                        <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">-->
                        <!--                            Select A New Photo-->
                        <!--                        </jet-secondary-button>-->

                        <!--                        <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto"-->
                        <!--                                              v-if="$page.user.profile_photo_path">-->
                        <!--                            Remove Photo-->
                        <!--                        </jet-secondary-button>-->
                    </div>
                    <div class="col-span-1 ml-6">
                        <h1 class="fs-34 ff-minion">{{ $page.user.name }}</h1>
                        <div class="text-color-light -mt-2">{{ $page.user.email }}</div>
                    </div>
                </div>
                <jet-input-error :message="form.error('photo')" class="mt-6"/>
            </div>
        </template>

        <template #title>
            Account Details
        </template>
        <!--        <template #description>-->
        <!--            Update your account's profile information and email address.-->
        <!--        </template>-->
        <template #form>
            <div class="grid grid-cols-6 gap-15p">
                <div class="col-start-1 col-end-4">
                    <jet-label for="name" value="First Name"/>
                    <jet-input id="name" type="text" class="mt-1 block w-full input-default" v-model="form.first_name"
                               autocomplete="first_name"/>
                    <jet-input-error :message="form.error('first_name')" class="mt-2"/>
                </div>

                <!-- Email -->
                <div class="col-end-7 col-span-3">
                    <jet-label for="email" value="Last Name"/>
                    <jet-input id="email" type="text" class="mt-1 block w-full input-default" v-model="form.last_name"
                               autocomplete="last_name"/>
                    <jet-input-error :message="form.error('last_name')" class="mt-2"/>
                </div>

                <!-- Name -->
                <div class="mt-4 col-start-1 col-end-4">
                    <jet-label for="name" value="Pen Name"/>
                    <jet-input id="name" type="text" class="mt-1 block w-full input-default" v-model="form.pen_name"
                               autocomplete="pen_name"/>
                    <jet-input-error :message="form.error('pen_name')" class="mt-2"/>
                </div>

                <!-- Email -->
                <div class="mt-4 col-end-7 col-span-3">
                    <jet-label for="email" value="Email"/>
                    <jet-input id="email" type="email" class="mt-1 block w-full input-default" v-model="form.email"/>
                    <jet-input-error :message="form.error('email')" class="mt-2"/>
                </div>

                <div class="mt-4 col-start-1 col-end-4">
                    <jet-label for="password" value="New Password" />
                    <div class="show-password">
                        <jet-input id="password" type="password" class="show-password__input mt-1 block w-full" v-model="form.password" autocomplete="new-password" />
                        <div class="show-password__icon-wrapper" @click="showPassword()">
                            <svg id="show-password-svg" class="show-password__icon" xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#ADAAA5" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M17.074 6.514C15.343 2.494 12.086 0 8.571 0 5.057 0 1.8 2.494.07 6.514c-.096.219-.096.467 0 .686 1.731 4.02 4.988 6.514 8.502 6.514 3.515 0 6.772-2.494 8.503-6.514.096-.219.096-.467 0-.686zM8.571 12C5.854 12 3.283 10.037 1.8 6.857c1.483-3.18 4.054-5.143 6.771-5.143 2.718 0 5.289 1.963 6.772 5.143C13.86 10.037 11.289 12 8.57 12zm0-8.571c-1.893 0-3.428 1.535-3.428 3.428 0 1.894 1.535 3.429 3.428 3.429C10.465 10.286 12 8.75 12 6.857c0-.91-.361-1.781-1.004-2.424S9.48 3.429 8.57 3.429zm0 5.142c-.946 0-1.714-.767-1.714-1.714s.768-1.714 1.714-1.714c.947 0 1.715.767 1.715 1.714S9.518 8.571 8.57 8.571z"
                                                        transform="translate(-825 -630) translate(403 445) translate(60 154) translate(362 31)"/>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <jet-input-error :message="form.error('password')" class="mt-2" />
                </div>

                <div class="mt-4 col-end-7 col-span-3">
                    <jet-label for="password_confirmation" value="Confirm Password" />
                    <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" autocomplete="new-password" />
                    <jet-input-error :message="form.error('password_confirmation')" class="mt-2" />
                </div>
            </div>
        </template>

        <template #actions>
            <div class="flex items-center justify-center ml-2">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
                </jet-button>

                <jet-action-message :on="form.recentlySuccessful" class="ml-4 uppercase">
                    Saved
                </jet-action-message>
            </div>
        </template>

        <template #after>
            <stripe></stripe>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from './../../Jetstream/Button'
import JetFormSection from './../../Jetstream/FormSection'
import JetInput from './../../Jetstream/Input'
import JetInputError from './../../Jetstream/InputError'
import JetLabel from './../../Jetstream/Label'
import JetActionMessage from './../../Jetstream/ActionMessage'
import JetSecondaryButton from './../../Jetstream/SecondaryButton'
import Stripe from "./Stripe";

export default {
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        Stripe,
    },

    props: ['first_name', 'last_name', 'pen_name', 'email', 'password', 'password_confirmation'],

    data() {
        return {
            form: this.$inertia.form({
                '_method': 'PUT',
                pen_name: this.pen_name,
                first_name: this.first_name,
                last_name: this.last_name,
                name: this.name,
                email: this.email,
                photo: null,
                password: '',
                password_confirmation: '',
            }, {
                bag: 'updateProfileInformation',
                resetOnSuccess: false,
            }),

            photoPreview: null,
        }
    },

    methods: {
        showPassword() {
            const showPasswordSvg = document.getElementById('show-password-svg');
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type');

            showPasswordSvg.classList.toggle('active');

            if (type === 'password') {
                passwordInput.setAttribute('type', 'text');
            } else {
                passwordInput.setAttribute('type', 'password');
            }
        },

        updateProfileInformation() {
            if (this.$refs.photo) {
                this.form.photo = this.$refs.photo.files[0]
            }

            this.form.post('/user/profile-information', {
                preserveScroll: true
            });
        },

        selectNewPhoto() {
            this.$refs.photo.click();
        },

        updatePhotoPreview() {
            const reader = new FileReader();

            reader.onload = (e) => {
                this.photoPreview = e.target.result;
            };

            reader.readAsDataURL(this.$refs.photo.files[0]);

            this.updateProfileInformation();
        },

        deletePhoto() {
            this.$inertia.delete('/user/profile-photo', {
                preserveScroll: true,
            }).then(() => {
                this.photoPreview = null
            });
        },
    },
}
</script>
