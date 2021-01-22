<template>
    <div class="mt-6 w-full col-span-2">
        <div class="w-full grid grid-cols-2 gap-8">
            <div class="col-span-1">
                <div class="uppercase text-color-light fs-12">
                    Subscription Details
                </div>

                <div class="mt-2 bg-light p-10">
                    <div>
                        <div class="uppercase text-color-light fs-12">
                            Plan
                        </div>
                        <div class="mt-2" v-if="currentSubscription">Advanced</div>
                        <div class="mt-2" v-else>Free</div>

                        <div class="mt-4 uppercase text-color-light fs-12">
                            Next Bill
                        </div>
                        <div class="mt-2" v-if="currentSubscription">{{ formatInvoiceTimestamp(currentSubscription.current_period_end) }}</div>
                        <div class="mt-2" v-else>None</div>

                        <div class="mt-4 uppercase text-color-light fs-12">
                            Cost
                        </div>
                        <div class="mt-2" v-if="currentSubscription">${{ currentSubscription.items.data[0].price.unit_amount / 100 }}/{{ currentSubscription.items.data[0].price.recurring.interval }} total</div>
                        <div class="mt-2" v-else>$0</div>
                    </div>
                    <div class="flex mt-10">
                        <div @click="changeSubscription" class="button rounded-lg bg-dark px-6 py-2 text-white fs-15 cursor-pointer">Change Plan</div>
                        <div @click="cancelSubscription" class="ml-6 rounded-lg border border-gray-400 px-6 py-2 text-color-dark fs-15 cursor-pointer">Cancel Subscription</div>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="uppercase text-color-light fs-12">
                    <div class="flex items-center justify-between">
                        <div>Payment Method</div>
                        <div v-if="card_last_4" class="text-right">**** **** **** {{ card_last_4 }}</div>
                    </div>
                </div>

                <div class="mt-2 bg-light p-10">
                    <form>
                        <div class="flex flex-col">
                            <div class="label-default">Card number</div>
                            <div id="stripeCardNumber"></div>
                        </div>
                        <div class="mt-12 flex justify-between w-full">
                            <div class="w-1/3">
                                <div class="label-default">Date</div>
                                <div id="stripeCardExpiry"></div>
                            </div>

                            <div class="w-1/3">
                                <div class="label-default">CVV</div>
                                <div id="stripeCardCvc"></div>
                            </div>
                        </div>
                    </form>
                    <button @click="submitCard" class="mt-14 button rounded-lg bg-dark px-6 py-2 text-white fs-15 font-normal">Change Payment method</button>
                </div>
            </div>
        </div>

        <div class="my-12">
            <div id="card-element"></div>
        </div>

        <div class="mt-10">
            <div class="uppercase text-color-light fs-12">
                Invoices
            </div>
            <div class="mt-2 bg-light p-10">
                <table class="table-auto w-full" v-if="invoices">
                    <thead>
                        <tr>
                            <th class="px-4 py-4 text-left fs-12 text-color-light uppercase font-normal">Charge Date</th>
                            <th class="px-4 py-4 text-left fs-12 text-color-light uppercase font-normal">Invoice no.</th>
                            <th class="px-4 py-4 text-left fs-12 text-color-light uppercase font-normal">Price</th>
                            <th class="px-4 py-4 text-left fs-12 text-color-light uppercase font-normal">Status</th>
                            <th class="px-4 py-4 text-center fs-12 text-color-light uppercase font-normal">Invoice Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in invoices.data" :key="item.id">
                            <td class="px-4 py-4 border-t">{{ formatInvoiceTimestamp(item.period_end) }}</td>
                            <td class="px-4 py-4 border-t">{{ item.number }}</td>
                            <td class="px-4 py-4 border-t">{{ item.total / 100 }}</td>
                            <td class="px-4 py-4 border-t">{{ item.status }}</td>
                            <td class="px-4 py-4 border-t flex items-center justify-center">
                                <a :href="item.invoice_pdf" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="14" viewBox="0 0 18 14" class="show-password__icon icon-hoverable"><g fill="none" fill-rule="evenodd"><g fill="#ADAAA5" fill-rule="nonzero"><g><g><g><path d="M17.074 6.514C15.343 2.494 12.086 0 8.571 0 5.057 0 1.8 2.494.07 6.514c-.096.219-.096.467 0 .686 1.731 4.02 4.988 6.514 8.502 6.514 3.515 0 6.772-2.494 8.503-6.514.096-.219.096-.467 0-.686zM8.571 12C5.854 12 3.283 10.037 1.8 6.857c1.483-3.18 4.054-5.143 6.771-5.143 2.718 0 5.289 1.963 6.772 5.143C13.86 10.037 11.289 12 8.57 12zm0-8.571c-1.893 0-3.428 1.535-3.428 3.428 0 1.894 1.535 3.429 3.428 3.429C10.465 10.286 12 8.75 12 6.857c0-.91-.361-1.781-1.004-2.424S9.48 3.429 8.57 3.429zm0 5.142c-.946 0-1.714-.767-1.714-1.714s.768-1.714 1.714-1.714c.947 0 1.715.767 1.715 1.714S9.518 8.571 8.57 8.571z" transform="translate(-825 -630) translate(403 445) translate(60 154) translate(362 31)"></path></g></g></g></g></g></svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div v-else>
                    No invoices available.
                </div>
            </div>
        </div>
    </div>
</template>


<script>
// import Vue;
import {loadStripe} from '@stripe/stripe-js';
import Label from "../../Jetstream/Label";
import Vue from "vue";

export default  {
    components: {Label},

    data() {
      return {
        stripe: null,
        invoices: null,
        currentSubscription: null,
        card_last_4: null,
        card_number: null,
        card_exp: null,
        card_cvv: null,

          stripeCardNumber: null,
          stripeCardExpiry: null,
          stripeCardCvc: null,
      }
    },

    async mounted() {
        this.getInvoices();
        this.getCurrentSubscription();


        this.stripe = await loadStripe('pk_test_51I701bBSVLSB8icBg7Qbt2yVX4YkQrEKL3jCUWuSlMJgYjXSj7wWUIKPbdEkhsjDQGahxFueamW8X1Cq4uAHmMzw00pdWddy2G');

        console.log('local stripe', this.stripe);

        const elements = this.stripe.elements();
        // const cardElement = elements.create('card');
        // cardElement.mount('#card-element');

        this.stripeCardNumber = elements.create('cardNumber', {
            classes: {
                base: 'input-default w-full'
            }
        });
        this.stripeCardExpiry = elements.create('cardExpiry', {
            classes: {
                base: 'input-default w-full'
            }
        });
        this.stripeCardCvc = elements.create('cardCvc', {
            classes: {
                base: 'input-default w-full'
            }
        });

        this.stripeCardNumber.mount('#stripeCardNumber');
        this.stripeCardExpiry.mount('#stripeCardExpiry');
        this.stripeCardCvc.mount('#stripeCardCvc');

        // console.log('cardElement', cardElement);

        if (this.$page.user.stripe_card_last_4 !== null) {
            this.card_last_4 = this.$page.user.stripe_card_last_4;
        }
    },

    methods: {
        submitCard() {
            const self = this;

            this.stripe.createToken(this.stripeCardNumber).then((result) => {
                if (result.error) {
                    Vue.swal('Add Card', result.error.message, 'error');
                } else {
                    console.log('stripe token result', result.token);

                    axios.post('/profile/add-card', {
                        'stripe_card_token': result.token.id
                    }).then(function (response) {
                        console.log('add card', response);
                        Vue.swal('Submit Card', '', 'success');
                    }).catch(function (error) {
                        console.log(error);
                        Vue.swal('Add Card', 'Oops..', 'error');
                    });
                }
            });
        },

        changeSubscription() {
            const self = this;
            axios.post('/profile/change-subscription', {}).then(function (response) {
                console.log('change subscription', response);
                self.getCurrentSubscription();
                self.getInvoices();

                Vue.swal('Change Subscription', '', 'success');
            }).catch(function (error) {
                console.log(error);
                Vue.swal('Change Subscription', 'You need attach your credit card', 'error');
            });
        },

        cancelSubscription() {
            const self = this;
            axios.post('/profile/cancel-subscription', {}).then(function (response) {
                console.log('change subscription', response);
                self.getCurrentSubscription();

                Vue.swal('Cancel Subscription', '', 'success');
            }).catch((error) => {
                console.log(error);
                Vue.swal('Cancel Subscription', 'Some error', 'error');
            });
        },

        getInvoices() {
            console.log('current user', this.$page.user);

            const self = this;
            axios.get('/profile/invoices', {}).then(function (response) {
                console.log('invoices', response);
                self.invoices = response.data;
            });
        },

        formatInvoiceTimestamp(timestamp)
        {
            const monthNames = ["January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ];

            const date = new Date(timestamp * 1000);
            return monthNames[date.getMonth()] + ' ' + date.getDate() + ', ' + date.getFullYear();
        },

        getCurrentSubscription()
        {
            const self = this;
            axios.get('/profile/current-subscription', {}).then(function (response) {
                console.log('get current subscription', response);
                self.currentSubscription = response.data;
            });
        },
    },
}
</script>
