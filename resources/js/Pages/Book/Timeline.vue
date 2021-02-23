<template>
    <app-layout>
        <app-container width="w-container">
            <div class="flex items-center justify-between">
                <h1 class="h2">Events</h1>


                <div class="flex items-center justify-end">
                    <svg @click="$refs.search_input.classList.toggle('hidden'); $refs.search_input.focus()" class="icon-hoverable" xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#BEBDB8" fill-rule="nonzero">
                                <g>
                                    <g>
                                        <path d="M18.738 17.453l-3.357-3.33c2.705-3.373 2.302-8.273-.918-11.158C11.243.079 6.328.213 3.271 3.27.213 6.328.079 11.243 2.965 14.463c2.885 3.22 7.785 3.623 11.158.918l3.33 3.33c.17.17.401.267.642.267s.473-.096.643-.268c.339-.35.339-.906 0-1.257zm-9.69-2.072c-3.498 0-6.334-2.836-6.334-6.333 0-3.498 2.836-6.334 6.334-6.334 3.497 0 6.333 2.836 6.333 6.334 0 1.68-.667 3.29-1.855 4.478-1.188 1.188-2.799 1.855-4.478 1.855z" transform="translate(-1174 -44) translate(1174 44)"/>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>

                    <input ref="search_input" type="text" class="ml-2 input-default input-default_p-zero hidden" @keyup="search($event)">

<!--                    <svg class="icon-hoverable ml-6" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">-->
<!--                        <g fill="none" fill-rule="evenodd">-->
<!--                            <g fill="#BEBDB8" fill-rule="nonzero">-->
<!--                                <g>-->
<!--                                    <path d="M16.2 5.562V.9c0-.497-.403-.9-.9-.9s-.9.403-.9.9v4.662c-1.068.388-1.779 1.402-1.779 2.538s.711 2.15 1.779 2.538V17.1c0 .497.403.9.9.9s.9-.403.9-.9v-6.462c1.068-.388 1.779-1.402 1.779-2.538s-.711-2.15-1.779-2.538zM15.3 9c-.497 0-.9-.403-.9-.9s.403-.9.9-.9.9.403.9.9-.403.9-.9.9zm-5.4 1.962V.9C9.9.403 9.497 0 9 0s-.9.403-.9.9v10.062c-1.068.388-1.779 1.402-1.779 2.538s.711 2.15 1.779 2.538V17.1c0 .497.403.9.9.9s.9-.403.9-.9v-1.062c1.068-.388 1.779-1.402 1.779-2.538s-.711-2.15-1.779-2.538zM9 14.4c-.497 0-.9-.403-.9-.9s.403-.9.9-.9.9.403.9.9-.403.9-.9.9zM3.6 3.762V.9c0-.497-.403-.9-.9-.9s-.9.403-.9.9v2.862C.732 4.15.021 5.164.021 6.3S.732 8.45 1.8 8.838V17.1c0 .497.403.9.9.9s.9-.403.9-.9V8.838C4.668 8.45 5.379 7.436 5.379 6.3S4.668 4.15 3.6 3.762zM2.7 7.2c-.497 0-.9-.403-.9-.9s.403-.9.9-.9.9.403.9.9-.403.9-.9.9z" transform="translate(-1223 -44) translate(1223 44)"/>-->
<!--                                </g>-->
<!--                            </g>-->
<!--                        </g>-->
<!--                    </svg>-->

                    <button class="ml-6 button rounded-md bg-dark px-10 py-2 font-semibold text-white fs-12" @click="isEventCreateModalShow = true;" >Create New</button>
                </div>
            </div>
            <div id="timeline-scroll" class="timeline custom-scroll flex">
<!--                <div class="timeline-event__wrapper">-->
<!--                    <h3 class="timeline-event__title">Draggable 1</h3>-->
<!--                    <h3 class="timeline-event__description">-->
<!--                        Details about this event can be entered here.-->
<!--                    </h3>-->
<!--                    <draggable class="list-group"-->
<!--                               :list="list1"-->
<!--                               group="people"-->
<!--                               v-bind="dragOptions"-->
<!--                               @start="drag = true"-->
<!--                               @end="drag = false"-->
<!--                               @change="log">-->
<!--                        <div-->
<!--                            class="timeline-event-item"-->
<!--                            v-for="(element, index) in list1"-->
<!--                            :key="index"-->
<!--                        >-->
<!--                            <transition-group type="transition" :name="!drag ? 'flip-list' : null">-->
<!--                                <div :key="index">-->
<!--                                    <div class="timeline-event-item__title">-->
<!--                                        {{ element.name }}-->
<!--                                    </div>-->
<!--                                    <div class="timeline-event-item__description">-->
<!--                                        description-->
<!--                                    </div>-->

<!--                                    <div class="flex justify-between">-->
<!--                                        <div class="timeline-event-item__order">-->
<!--                                            {{ index }}-->
<!--                                        </div>-->
<!--                                        <div class="timeline-event-item__user-avatar">-->
<!--                                            <img :src="$page.user.profile_photo_url" alt="user-avatar">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </transition-group>-->
<!--                        </div>-->
<!--                    </draggable>-->
<!--                </div>-->

                <div class="timeline-event__wrapper" v-for="(event, eventIndex) in events" :class="{'hidden': searchString !== false && event.items.length === 0}">
                    <div class="flex justify-between items-start">
                        <div class="timeline-event__title-wrapper">
                            <h3 class="timeline-event__title">{{ event.title }}</h3>
                            <div class="timeline-event__description">
                                {{ event.description }}
                            </div>
                        </div>

                        <div class="timeline-event__icon-edit icon-hoverable px-4" @click="openEventEditModal(event)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="18" viewBox="0 0 4 18">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#BEBDB8">
                                        <path d="M618 214c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm0-7c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm0-7c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2z" transform="translate(-616 -200)"/>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="flex flex-col">
                    <draggable class="list-group"
                               :list="event.items"
                               group="people"
                               v-bind="dragOptions"
                               @start="drag = true"
                               @end="drag = false"
                               @change="log(eventIndex, $event)">
                        <div
                            class="timeline-event-item"
                            v-for="(element, index) in event.items"
                            :key="index"
                        >
                            <transition-group type="transition" :name="!drag ? 'flip-list' : null">
                                <div :key="index">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <div v-if="element.id === 'new'" class="timeline-event-item__title">
                                                <input :ref="'newEventItem_' + eventIndex + '_' + index"
                                                       type="text"
                                                       class="input-default input-default_p-zero input-default_border-none"
                                                       :value="element.title"
                                                       @keydown.enter="handleNewEventItemEnter($event, eventIndex)"
                                                       @keydown="handleRemoveNewEventItem($event, eventIndex, index)"
                                                >
                                            </div>
                                            <div v-else class="timeline-event-item__title">
                                                {{ element.title }}
                                            </div>
                                            <div class="timeline-event-item__description">
                                                {{ element.description }}
                                            </div>
                                        </div>

                                        <div class="icon-hoverable px-1" @click="openEventItemEditModal(event, element)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="4" height="18" viewBox="0 0 4 18">
                                                <g fill="none" fill-rule="evenodd">
                                                    <g fill="#BEBDB8">
                                                        <path d="M618 214c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm0-7c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2zm0-7c1.105 0 2 .895 2 2s-.895 2-2 2-2-.895-2-2 .895-2 2-2z" transform="translate(-616 -200)"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="flex justify-between">
                                        <div class="timeline-event-item__order" v-html="(eventIndex + 1) + '.' + (index + 1)"></div>
<!--                                        <div class="timeline-event-item__user-avatar">-->
<!--                                            <img :src="$page.user.profile_photo_url" alt="user-avatar">-->
<!--                                        </div>-->
                                    </div>
                                </div>
                            </transition-group>
                        </div>
                    </draggable>
<!--                        <svg @click="isEventItemCreateModalShow = true; currentEventNew = event;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" class="cursor-pointer icon-hoverable mx-auto mt-8"><g fill="none" fill-rule="evenodd"><g fill="#BEBDB8" fill-rule="nonzero"><g><path d="M9 0C4.03 0 0 4.03 0 9s4.03 9 9 9 9-4.03 9-9c0-2.387-.948-4.676-2.636-6.364C13.676.948 11.387 0 9 0zm0 16.2c-3.976 0-7.2-3.224-7.2-7.2S5.024 1.8 9 1.8s7.2 3.224 7.2 7.2c0 1.91-.759 3.74-2.109 5.091C12.741 15.441 10.91 16.2 9 16.2zm3.6-8.1H9.9V5.4c0-.497-.403-.9-.9-.9s-.9.403-.9.9v2.7H5.4c-.497 0-.9.403-.9.9s.403.9.9.9h2.7v2.7c0 .497.403.9.9.9s.9-.403.9-.9V9.9h2.7c.497 0 .9-.403.9-.9s-.403-.9-.9-.9z" transform="translate(-490 -46) translate(490 46)"></path></g></g></g></svg>-->

<!--                    </div>-->
                    <svg @click="addNewEventItem(eventIndex)" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" class="cursor-pointer icon-hoverable mx-auto mt-8"><g fill="none" fill-rule="evenodd"><g fill="#BEBDB8" fill-rule="nonzero"><g><path d="M9 0C4.03 0 0 4.03 0 9s4.03 9 9 9 9-4.03 9-9c0-2.387-.948-4.676-2.636-6.364C13.676.948 11.387 0 9 0zm0 16.2c-3.976 0-7.2-3.224-7.2-7.2S5.024 1.8 9 1.8s7.2 3.224 7.2 7.2c0 1.91-.759 3.74-2.109 5.091C12.741 15.441 10.91 16.2 9 16.2zm3.6-8.1H9.9V5.4c0-.497-.403-.9-.9-.9s-.9.403-.9.9v2.7H5.4c-.497 0-.9.403-.9.9s.403.9.9.9h2.7v2.7c0 .497.403.9.9.9s.9-.403.9-.9V9.9h2.7c.497 0 .9-.403.9-.9s-.403-.9-.9-.9z" transform="translate(-490 -46) translate(490 46)"></path></g></g></g></svg>

                    </div>
                </div>

            </div>
        </app-container>

        <template v-slot:modals>
            <need-subscription v-if="!$page.user.stripe_subscription"></need-subscription>

            <portal-target name="modal_event_item_create"></portal-target>
            <jet-dialog-modal :portal="'modal_event_item_create'" :show="isEventItemCreateModalShow" @close="isEventItemCreateModalShow = false">
                <template #title>
                    <span class="h2">Create new Event Item</span>
                </template>

                <template #content>
                    <div class="flex flex-col">
                        <label class="label-default">Title</label>
                        <select ref="event_item_input_event_id" class="input-default w-full" v-model="currentEventNew.id">
                            <option :value="event.id" v-for="(event, index) in events" :key="index">{{ event.title }}</option>
                        </select>

                        <label class="mt-6 label-default">Title</label>
                        <input ref="event_item_input_title" type="text" class="input-default w-full">

                        <label class="mt-6 label-default">Description</label>
                        <textarea ref="event_item_input_description" class="input-default w-full"></textarea>
                    </div>
                </template>

                <template #footer>
                    <div class="flex justify-center">
                        <button @click="createEventItem()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
                    </div>
                </template>
            </jet-dialog-modal>

            <portal-target name="modal_event_item_edit"></portal-target>
            <jet-dialog-modal :portal="'modal_event_item_edit'" :show="isEventItemEditModalShow" @close="isEventItemEditModalShow = false">
                <template #title>
                    <span class="h2">Edit Event Item</span>
                </template>

                <template #content>
                    <div class="flex flex-col">
<!--                        <label class="label-default">Title</label>-->
<!--                        <select ref="event_item_input_event_id" class="input-default w-full">-->
<!--                            <option :value="event.id" v-for="(event, index) in events" :key="index">{{ event.title }}</option>-->
<!--                        </select>-->

                        <label class="mt-6 label-default">Title</label>
                        <input v-model="eventItemEdit.title" type="text" class="input-default w-full">

                        <label class="mt-6 label-default">Description</label>
                        <textarea v-model="eventItemEdit.description" class="input-default w-full"></textarea>
                    </div>
                </template>

                <template #footer>
                    <div class="flex justify-between">
                        <button @click="updateEventItem()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
                        <button @click="deleteEventItem()" class="button rounded-lg bg-danger px-8 py-2 font-semibold text-white">Delete</button>
                    </div>
                </template>
            </jet-dialog-modal>

            <portal-target name="modal_event_create"></portal-target>
            <jet-dialog-modal :portal="'modal_event_create'" :show="isEventCreateModalShow" @close="isEventCreateModalShow = false">
                <template #title>
                    <span class="h2">Create new Event</span>
                </template>

                <template #content>
                    <div class="flex flex-col">
                        <label class="mt-6 label-default">Title</label>
                        <input ref="event_input_title" type="text" class="input-default w-full" :value="'Event ' + (events.length+1)">

                        <label class="mt-6 label-default">Description</label>
                        <textarea ref="event_input_description" class="input-default w-full"></textarea>
                    </div>
                </template>

                <template #footer>
                    <div class="flex justify-center">
                        <button @click="createEvent()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
                    </div>
                </template>
            </jet-dialog-modal>

            <portal-target name="modal_event_edit"></portal-target>
            <jet-dialog-modal :portal="'modal_event_edit'" :show="isEventEditModalShow" @close="isEventEditModalShow = false">
                <template #title>
                    <span class="h2">Edit Event</span>
                </template>

                <template #content>
                    <div class="flex flex-col">
                        <!--                        <label class="label-default">Title</label>-->
                        <!--                        <select ref="event_item_input_event_id" class="input-default w-full">-->
                        <!--                            <option :value="event.id" v-for="(event, index) in events" :key="index">{{ event.title }}</option>-->
                        <!--                        </select>-->

                        <label class="mt-6 label-default">Title</label>
                        <input v-model="eventEdit.title" type="text" class="input-default w-full">

                        <label class="mt-6 label-default">Description</label>
                        <textarea v-model="eventEdit.description" class="input-default w-full"></textarea>
                    </div>
                </template>

                <template #footer>
                    <div class="flex justify-between">
                        <button @click="updateEvent()" class="button rounded-lg bg-dark px-8 py-2 font-semibold text-white">Confirm</button>
                        <button @click="deleteEvent()" class="button rounded-lg bg-danger px-8 py-2 font-semibold text-white">Delete</button>
                    </div>
                </template>
            </jet-dialog-modal>
        </template>
    </app-layout>
</template>


<script>
import AppLayout from "../../Layouts/AppLayout";
import AppContainer from "../../Layouts/AppContainer";
import NeedSubscription from "../../Components/NeedSubscription";
import draggable from "vuedraggable";
import Vue from "vue";
import JetDialogModal from "../../Jetstream/DialogModal";

export default {
    components: {AppContainer, AppLayout, draggable, JetDialogModal, NeedSubscription},
    data() {
        return {
            events: [],
            drag: false,
            currentEventNew: null,
            eventEdit: {},
            eventItemEdit: {},
            isEventCreateModalShow: false,
            isEventEditModalShow: false,
            isEventItemEditModalShow: false,
            isEventItemCreateModalShow: false,
            searchString: false,
            list1: [
                { name: "John", id: 1 },
                { name: "Joao", id: 2 },
                { name: "Jean", id: 3 },
                { name: "Gerard", id: 4 }
            ],
            list2: [
                { name: "Juan", id: 5 },
                { name: "Edgard", id: 6 },
                { name: "Johnson", id: 7 }
            ]
        }
    },

    created() {
        window.addEventListener('scroll', this.handleScroll);
    },

    computed: {
        dragOptions() {
            return {
                animation: 200,
                group: "description",
                disabled: false,
                ghostClass: "ghost"
            };
        }
    },

    mounted() {
        this.updateEventsList();
        const timeLineScroll = document.getElementById('timeline-scroll');
        timeLineScroll.scrollIntoView();
        timeLineScroll.addEventListener('scroll', function () {
           console.log('SCROLL');
        });
    },

    methods: {
        handleNewEventItemEnter(event, eventIndex) {
            console.log('handleNewEventItemEnter', event);
            console.log('handleNewEventItemEnter', eventIndex);
            this.createEventItem(this.events[eventIndex].id, event.target.value);
        },
        addNewEventItem(eventIndex) {
            this.events[eventIndex].items.push({title: '', id: 'new'});

            const index = parseInt(this.events[eventIndex].items.length) - 1;

            console.log('addNewEventItem index', index);
            console.log('addNewEventItem length', parseInt(this.events[eventIndex].items.length));
            console.log('addNewEventItem items', this.events[eventIndex]);
            console.log('addNewEventItem refs', this.$refs);
            this.$nextTick(() => {
                this.$refs[`newEventItem_${eventIndex}_${index}`][0].focus();
            });
        },
        handleRemoveNewEventItem(event, eventIndex, itemIndex) {
            console.log('handleRemoveNewEventItem', eventIndex, itemIndex);
            if ((event.key === "Backspace" || event.key === "Delete") && this.$refs[`newEventItem_${eventIndex}_${itemIndex}`][0].value.length === 0) {
                this.events[eventIndex].items.splice(itemIndex, 1);
            }
        },
        handleScroll() {
            console.log('scroll');
        },

        add: function() {
            this.list.push({ name: "Juan" });
        },
        replace: function() {
            this.list = [{ name: "Edgard" }];
        },
        clone: function(el) {
            return {
                name: el.name + " cloned"
            };
        },
        log: function(eventIndex, event) {
            window.console.log('bookEvent', eventIndex);
            window.console.log('event', event);

            this.updateOrderForEventItems(eventIndex);
            if (event.moved !== undefined) {
                console.log('MOVED', event.moved);
            }
        },

        openEventItemEditModal(event, eventItem) {
            this.eventItemEdit = eventItem;
            this.eventItemEdit.event_id = event.id;
            this.isEventItemEditModalShow = true;
        },

        openEventEditModal(event) {
            this.eventEdit = event;
            this.isEventEditModalShow = true;
        },

        resetModalInputs() {
            if (this.$refs['event_item_input_event_id'] !== undefined) {
                this.$refs['event_item_input_event_id'].value = this.events[0].id;
                this.$refs['event_item_input_title'].value = null;
                this.$refs['event_item_input_description'].value = null;
            }
        },

        createEvent(title, description) {
            this.isEventCreateModalShow = false;

            console.log(this.$refs['event_input_title'].value);
            console.log(this.$refs['event_input_description'].value);

            const url = '/books/' + this.$page.book.id + '/timeline/events/create';

            let data = {};
            if (title === null && description === null) {
                data = {
                    title: this.$refs['event_input_title'].value,
                    description: this.$refs['event_input_description'].value,
                };
            } else {
                data = {
                    title: title,
                    description: description,
                };
            }

            axios.post(url, {

            }).then((response) => {
                console.log(response.data);
                this.updateEventsList();
                this.$refs['event_input_title'].value = null;
                this.$refs['event_input_description'].value = null;
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('createEvent', 'Oops..', 'error');
            });
        },

        createEventItem(event_id = null, title = null, description = null) {
            this.isEventItemCreateModalShow = false;

            let url = '';

            let data = {};
            if (event_id === null && title === null && description === null) {
                data = {
                    event_id: this.$refs['event_item_input_event_id'].value,
                    title: this.$refs['event_item_input_title'].value,
                    description: this.$refs['event_item_input_description'].value,
                };

                url = '/books/' + this.$page.book.id + '/timeline/events/'+ this.$refs['event_item_input_event_id'].value +'/items/create'
            } else {
                data = {
                    event_id: event_id,
                    title: title,
                    description: description,
                };

                url = '/books/' + this.$page.book.id + '/timeline/events/'+ event_id +'/items/create';
            }

            axios.post(url, data).then((response) => {
                console.log(response.data);
                this.updateEventsList();

                if (event_id === null) {
                    this.resetModalInputs();
                }
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('createEventItem', 'Oops..', 'error');
            });
        },

        deleteEvent() {
            this.isEventEditModalShow = false;

            const url = '/books/' + this.$page.book.id + '/timeline/events/'+ this.eventEdit.id +'/delete';
            axios.post(url).then((response) => {
                console.log(response.data);
                this.updateEventsList();
                this.resetModalInputs();
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('deleteEvent', 'Oops..', 'error');
            });
        },

        updateEvent() {
            this.isEventEditModalShow = false;

            const url = '/books/' + this.$page.book.id + '/timeline/events/'+ this.eventEdit.id +'/update';
            axios.post(url, {
                title: this.eventEdit.title,
                description: this.eventEdit.description,
            }).then((response) => {
                console.log(response.data);
                // this.updateEventsList();
                this.resetModalInputs();
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('updateEvent', 'Oops..', 'error');
            });
        },

        updateEventItem() {
            this.isEventItemEditModalShow = false;

            const url = '/books/' + this.$page.book.id + '/timeline/events/'+ this.eventItemEdit.event_id +'/items/'+ this.eventItemEdit.id +'/update';
            axios.post(url, {
                title: this.eventItemEdit.title,
                description: this.eventItemEdit.description,
            }).then((response) => {
                console.log(response.data);
                // this.updateEventsList();
                this.resetModalInputs();
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('updateEventItem', 'Oops..', 'error');
            });
        },

        deleteEventItem() {
            this.isEventItemEditModalShow = false;

            const url = '/books/' + this.$page.book.id + '/timeline/events/'+ this.eventItemEdit.event_id +'/items/'+ this.eventItemEdit.id +'/delete';
            axios.post(url).then((response) => {
                console.log(response.data);
                this.updateEventsList();
                this.resetModalInputs();
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('deleteEventItem', 'Oops..', 'error');
            });
        },

        updateEventsList() {
            const url = '/books/' + this.$page.book.id + '/timeline/events/list';
            axios.get(url).then((response) => {
                console.log(response.data);
                this.events = response.data;
            }).catch((error) => {
                console.log('error', error);
                Vue.swal('updateEventsList', 'Oops..', 'error');
            });
        },

        // updateEventItem(event_id, item_id, field, value) {
        //     const url = '/books/' + this.$page.book.id + '/timeline/events/'+ event_id +'/items/'+ item_id +'/update';
        //     axios.post(url, {
        //         field: field,
        //         value: value,
        //     }).then((response) => {
        //         console.log(response.data);
        //         this.events = response.data;
        //     }).catch((error) => {
        //         console.log('error', error);
        //         Vue.swal('updateEventsList', 'Oops..', 'error');
        //     });
        // },

        updateOrderForEventItems(eventIndex) {
            const url = '/books/' + this.$page.book.id + '/timeline/events/'+ this.events[eventIndex].id +'/items/reorder';
            axios.post(url, {
                items: this.events[eventIndex].items,
            }).then((response) => {
                console.log('updateOrderForEventItems response', response.data);
                // this.events[eventIndex].items = response.data;
            }).catch((error) => {
                console.log('updateOrderForEventItems error', error);
                Vue.swal('updateOrderForEventItems', 'Oops..', 'error');
            });
        },

        search(event) {
            console.log('search', event, this.$refs.search_input.value);

            if (this.$refs.search_input.value == '') {
                // this.$refs.search_input.classList.toggle('hidden');
                this.updateEventsList();
                this.searchString = false;
            } else {
                this.searchString = this.$refs.search_input.value;

                const url = '/books/' + this.$page.book.id + '/timeline/search';
                axios.post(url, {
                    query: this.$refs.search_input.value,
                }).then((response) => {
                    console.log('search response', response.data);
                    this.events = response.data;
                }).catch((error) => {
                    console.log('search error', error);
                    Vue.swal('Search', 'Oops..', 'error');
                });
            }
        },
    }
}
</script>

<style scoped lang="scss">
.list-group {
    min-height: 300px;
}

.timeline-event__title-wrapper {
    height: 45px;
}
</style>
