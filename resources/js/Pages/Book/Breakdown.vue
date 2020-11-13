<template>
    <app-layout>
        <app-container>
            <div class="flex px-16">
                <h1 class="h2">Breakdown</h1>
                <div class="ml-16 breakdown-header-links mt-1">
                    <a :href="'/books/' + book.id + '/breakdown/characters'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/characters') }">Characters</a>
                    <a :href="'/books/' + book.id + '/breakdown/settings'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/settings') }">Settings</a>
                    <a :href="'/books/' + book.id + '/breakdown/problem'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/problem') }">Problem</a>
                    <a :href="'/books/' + book.id + '/breakdown/solution'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/solution') }">Solution</a>
                    <a :href="'/books/' + book.id + '/breakdown/key-events'" class="mx-6" :class="{ 'active': isUrlContain('breakdown/key-events') }">Key Events</a>
                </div>
            </div>
            <div class="grid grid-cols-2 px-16">
                <!-- BEGIN Left block -->
                <div>
                    <div class="mt-85px">
                        <div class="book-page flex justify-center">
                            <div class="book-page__paper flex flex-col justify-center ff-minion">
                                <span class="book-page__chapter fs-24 capitalize">{{ type }}</span>

                                <span class="book-page__chapter mt-4">Paragraph</span>

                                <div class="book-page__content -mt-4">
                                    <p contenteditable="true">
                                        I made it through school without reading. On my nightstand are The Overstory by Richard Powers and Edge of the Map by Johanna Garton. Coventry by Rachel Cusk calls to me to finish it with a reminder of how lucid close observation can be. There’s a Stephen King open on my Kindle app…which one? Ah, yes, The Institute. Oh, and Joni just finished a loaner copy of Michelle Obama’s Becoming and I get it next.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Left block -->

                <!-- BEGIN Right block -->
                <div>
                    <div class="mt-85px">
                        <div class="book-page flex justify-center">
                            <div class="book-page__paper flex flex-col justify-center ff-minion">
                                <span class="book-page__chapter">Key Points</span>

                                <div class="book-page__content">
                                    <ul class="list-disc ml-4">
                                        <li>Can they paddle this faster than anyone?</li>
                                        <li>These five are some of my faves.</li>
                                        <li>I’ve read them all more than once, and each time I discover new delights within.</li>
                                        <li>In 1983, the Colorado River was in flood.</li>
                                        <li>The winter had seen the biggest El Niño on record, and the mountains of the Southwest were fat with snow.</li>
                                        <li>Late May, the temperature shot into the 80s and the snowpack melted almost all at once.</li>
                                    </ul>
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
    props: ['book', 'type'],

    components: {
        AppLayout,
        AppContainer,
    },

    data() {
        return {};
    },

    mounted() {
        console.log('mounted')
    },

    methods: {
        isUrlContain(value) {
            return window.location.pathname.indexOf(value) > -1;
        },
    },
}
</script>
