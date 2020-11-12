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
                            <div class="book-page__paper flex flex-col justify-between ff-minion">
                                <span class="text-center">Additional title</span>

                                <div class="text-center">
                                    <p class="font-semibold fs-24">”{{ book.name }}”</p>
                                    <p>By {{ $page.user.pen_name }}</p>
                                </div>

                                <div>
                                    <div class="text-right">
                                        <p>
                                            First Stree 12,  BC 6769<br>
                                            +1 6768 797<br>
                                            {{ $page.user.email }}<br>
                                            amb-gord_stories.com<br>
                                        </p>
                                    </div>

                                    <p class="text-center mt-16 copyright">Copyright</p>
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
                            <div class="book-page__paper flex flex-col justify-end">
                                <span class="book-page__chapter">Chapter One</span>

                                <div class="book-page__content">
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
    props: ['book'],

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
