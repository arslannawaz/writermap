<template>
    <div class="h-screen flex overflow-hidden bg-default">
        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-semilight">
                <div class="h-0 flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <a href="/dashboard" class="mt-2 flex items-center justify-center flex-shrink-0 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="140" height="61" viewBox="0 0 140 61">
                            <defs>
                                <linearGradient id="3tqz95lgkb" x1="100%" x2="100%" y1="2.765%" y2="135.902%">
                                    <stop offset="0%" stop-color="#7D7E79"></stop>
                                    <stop offset="100%" stop-color="#FFFCF8"></stop>
                                </linearGradient>
                                <linearGradient id="imbdiokd4d" x1="28.935%" x2="80.111%" y1="37.783%" y2="81.956%">
                                    <stop offset="0%" stop-color="#6B6B6A"></stop>
                                    <stop offset="100%" stop-color="#92928E"></stop>
                                </linearGradient>
                                <linearGradient id="976pj6wo0e" x1="51.722%" x2="45.505%" y1="11.457%" y2="94.07%">
                                    <stop offset="0%" stop-color="#B5B5B1"></stop>
                                    <stop offset="100%" stop-color="#E4E3DF"></stop>
                                </linearGradient>
                                <linearGradient id="nlfncfk2ug" x1="27.031%" x2="90.987%" y1="60.894%" y2="-41.779%">
                                    <stop offset="0%" stop-color="#BCB6AA"></stop>
                                    <stop offset="100%" stop-color="#F6F5EF"></stop>
                                </linearGradient>
                                <linearGradient id="kojm8lp1mj" x1="99.982%" x2="99.982%" y1="5.809%" y2="104.162%">
                                    <stop offset="0%" stop-color="#EAE6DF"></stop>
                                    <stop offset="100%" stop-color="#BCB6AA"></stop>
                                </linearGradient>
                                <path id="tyw7diuoma" d="M7.144 29.764c.05-2.804.808-3.417 1.939-4.376.843-.715 1.412-1.273 1.462-3.599.071-3.285-3.074-5.453-5.516-5.516-2.732-.07-4.494 1.968-5.015 3.216C3.628 10.247 14.79.477 15.202.022 17.436 9.714 25.261 18.24 27.967 19.87 18.15 31.938 10.11 51.24 6.738 60.033H6.5V30.408c.411 0 .636-.232.644-.644"></path>
                                <path id="ebsv35r2lf" d="M33.17.712c.215.442-9.492 7.19-15.263 19.67-2.921 6.316-4.703 13.903-3.947 23.286l-.78-1.607C9.505 34.577 5.01 26.66.064 20.58c2.708-1.63 10.542-10.167 12.77-19.867C16.224.316 19.613.087 23.002.07c3.39.016 6.78.245 10.169.64"></path>
                                <path id="otedmt7wui" d="M3.773 2.64c.013 4.632 3.444 2.336 3.398 7.732-.003.411.233.644.644.644V40.64h-.238C5.904 36.278 3.862 30.936.243 23.567-.398 16.602.673 6.5 4.271.097c-.39.828-.501 1.567-.498 2.544"></path>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <g>
                                    <g>
                                        <g>
                                            <path fill="#FFF" d="M24.711 60.742C28.083 51.95 36.124 32.648 45.94 20.58 43.232 18.949 35.398 10.412 33.17.712 29.782.316 26.393.087 23.003.07c-3.39.016-6.779.245-10.168.64-2.228 9.7-10.062 18.237-12.77 19.868 9.816 12.068 17.857 31.37 21.23 40.163h.237V31.117c-.354 0-.644-.29-.644-.643 0-5.51-3.401-2.992-3.401-7.975 0-3.047 2.47-5.516 5.516-5.516 3.047 0 5.516 2.47 5.516 5.516 0 4.983-3.401 2.466-3.401 7.975 0 .354-.29.643-.644.643v29.625h.238z" transform="translate(-75 -36) translate(75 36)"></path>
                                            <g transform="translate(-75 -36) translate(75 36) translate(17.973 .71)">
                                                <mask id="vq4qbmv3kc" fill="#fff">
                                                    <use xlink:href="#tyw7diuoma"></use>
                                                </mask>
                                                <path fill="url(#3tqz95lgkb)" d="M7.144 29.764c.05-2.804.808-3.417 1.939-4.376.843-.715 1.412-1.273 1.462-3.599.071-3.285-3.074-5.453-5.516-5.516-2.732-.07-4.494 1.968-5.015 3.216C3.628 10.247 14.79.477 15.202.022 17.436 9.714 25.261 18.24 27.967 19.87 18.15 31.938 10.11 51.24 6.738 60.033H6.5V30.408c.411 0 .636-.232.644-.644" mask="url(#vq4qbmv3kc)"></path>
                                            </g>
                                            <path fill="url(#imbdiokd4d)" d="M28.196 20.642c8.491 5.52 17.744-.063 17.744-.063-2.706-1.63-10.531-10.156-12.765-19.847-.272.39-11.15 9.572-15.188 19.467 1.135-2.263 3.11-3.28 5.335-3.207 2.066.066 4.373 2.095 4.874 3.65" transform="translate(-75 -36) translate(75 36)"></path>
                                            <path fill="url(#976pj6wo0e)" d="M34.948 37.873c-1.638-4.062-3.95-8.22-7.558-12.069-1.619 1.364-2.236 1.796-2.276 4.725-.005.412-.23.588-.64.588v29.625h.237C26.7 55.56 30.31 46.725 34.948 37.873" transform="translate(-75 -36) translate(75 36)"></path>
                                            <g transform="translate(-75 -36) translate(75 36)">
                                                <mask id="pnm9dbl14h" fill="#fff">
                                                    <use xlink:href="#ebsv35r2lf"></use>
                                                </mask>
                                                <path fill="url(#nlfncfk2ug)" d="M33.17.712c.215.442-9.492 7.19-15.263 19.67-2.921 6.316-4.703 13.903-3.947 23.286l-.78-1.607C9.505 34.577 5.01 26.66.064 20.58c2.708-1.63 10.542-10.167 12.77-19.867C16.224.316 19.613.087 23.002.07c3.39.016 6.78.245 10.169.64" mask="url(#pnm9dbl14h)"></path>
                                            </g>
                                            <path fill="#EAE6DF" d="M33.175.732C18.897 5.12 18.641 18.075.07 20.599c4.946 6.08 9.44 13.998 13.115 21.482l.776 1.587c-.846-13.3 2.766-22.39 7.127-29.094C25.469 7.837 30.609 3.514 33.175.732" transform="translate(-75 -36) translate(75 36)"></path>
                                            <g transform="translate(-75 -36) translate(75 36) translate(13.716 20.101)">
                                                <mask id="1or88v9j1k" fill="#fff">
                                                    <use xlink:href="#otedmt7wui"></use>
                                                </mask>
                                                <path fill="url(#kojm8lp1mj)" d="M3.773 2.64c.013 4.632 3.444 2.336 3.398 7.732-.003.411.233.644.644.644V40.64h-.238C5.904 36.278 3.862 30.936.243 23.567-.398 16.602.673 6.5 4.271.097c-.39.828-.501 1.567-.498 2.544" mask="url(#1or88v9j1k)"></path>
                                            </g>
                                        </g>
                                        <path fill="#656564" d="M75.547 27.36l4.728-14.17h1.233v-.672H77.43v.671h1.976l-3.487 10.583-3.833-10.608 1.98.025v-.67h-5.74l1.882 4.875-2.427 6.602-3.88-10.807h1.976v-.67h-6.703v.67h1.237l4.748 12.267c.397 1.005.743 1.591 1.039 1.756.181.097.413.148.696.148h.494l3.263-8.856 2.672 6.952c.397 1.005.743 1.591 1.038 1.756.182.097.414.148.693.148h.493zm12.862-.642h-1.832v-5.344c.118-1.73.536-2.786 1.262-3.166.114-.05.224-.076.321-.076.182 0 .38.19.595.57.296.528.617.857.963.992.164.047.346.072.544.072.659 0 1.131-.312 1.41-.941.101-.211.148-.435.148-.667 0-.823-.401-1.343-1.212-1.558-.198-.05-.4-.072-.616-.072-1.021 0-1.92.401-2.697 1.212-.346.392-.608.823-.79 1.283l-.173-2.3h-4.33v.645h1.435v8.063c0 .726-.287 1.135-.866 1.236-.164.034-.354.051-.57.051v.642h7c0-.38-.106-.587-.322-.62-.08-.013-.173-.022-.27-.022zm9.645 0h-.916v-9.995h-4.571v.645h1.43v8.063c0 .726-.286 1.135-.864 1.236-.165.034-.355.051-.566.051v.642h6.083c0-.38-.106-.587-.321-.62-.085-.013-.173-.022-.275-.022zm-.692-13.233c0-.726-.32-1.262-.962-1.608-.283-.165-.579-.25-.891-.25-.71 0-1.245.326-1.608.967-.148.279-.224.579-.224.89 0 .727.32 1.255.967 1.584.278.148.565.224.865.224.726 0 1.262-.309 1.608-.916.165-.283.245-.579.245-.891zm2.153 4.006h1.705v6.184c0 2.389.992 3.702 2.968 3.934.198.012.396.02.595.02 1.27 0 2.144-.409 2.621-1.236.232-.41.414-.954.545-1.63l-.667-.1c-.33 1.337-.82 2.072-1.46 2.203-.098.017-.2.025-.296.025-.612 0-.984-.43-1.115-1.287-.034-.199-.05-.406-.05-.62V17.49h3.267v-.642h-3.267v-2.87l-3.14.519v2.351h-1.706v.642zm14.837-.494c1.055.034 1.591.933 1.608 2.697 0 .773-.228 1.25-.692 1.431-.33.118-.823.156-1.482.127l-1.583-.076c.114-2.735.832-4.128 2.149-4.18zm4.626 7.813l-.595-.194c-.46 1.005-1.186 1.688-2.174 2.051-.397.148-.802.224-1.211.224-1.321 0-2.17-.844-2.55-2.524-.147-.692-.232-1.515-.245-2.474l2.276.076c2.655.08 4.195-.337 4.622-1.262.101-.232.147-.485.147-.768 0-1.401-.713-2.423-2.148-3.065-.81-.346-1.727-.519-2.748-.519-1.862 0-3.314.633-4.352 1.904-.79.988-1.186 2.216-1.186 3.685 0 2.39.899 4.056 2.697 4.994.857.447 1.828.67 2.917.67 1.929 0 3.314-.679 4.153-2.03.165-.249.3-.502.397-.768zm7.767 1.908h-1.832v-5.344c.118-1.73.536-2.786 1.262-3.166.114-.05.224-.076.321-.076.182 0 .38.19.595.57.296.528.616.857.963.992.164.047.346.072.544.072.659 0 1.131-.312 1.41-.941.101-.211.148-.435.148-.667 0-.823-.401-1.343-1.212-1.558-.198-.05-.4-.072-.616-.072-1.022 0-1.92.401-2.697 1.212-.346.392-.608.823-.79 1.283l-.173-2.3h-4.33v.645h1.435v8.063c0 .726-.287 1.135-.866 1.236-.164.034-.354.051-.57.051v.642h6.999c0-.38-.105-.587-.32-.62-.081-.013-.174-.022-.27-.022zm8.383.198c1.106 0 1.743-.396 1.908-1.19.017-.114.021-.224.021-.32 0-.84-.527-1.541-1.583-2.103-.228-.13-.6-.304-1.11-.519-1.237-.544-2.055-1.047-2.448-1.507-.43-.498-.646-1.08-.646-1.756 0-1.401.768-2.351 2.3-2.845.646-.215 1.364-.32 2.153-.32 1.288 0 2.292.227 3.018.692 0-.499.148-.769.444-.82.067-.016.135-.025.198-.025v3.094h-.79c-.067-1.502-.881-2.258-2.447-2.275-1.056 0-1.71.346-1.955 1.039-.05.164-.076.329-.076.493 0 .71.494 1.313 1.486 1.807.198.114.528.27.988.469 1.287.578 2.144 1.106 2.575 1.583.493.561.738 1.228.738 2.005 0 1.435-.738 2.397-2.224 2.891-.612.198-1.296.3-2.052.3-1.452 0-2.672-.258-3.664-.769 0 .427-.105.676-.32.743-.098.017-.212.026-.347.026v-3.761h.845c.03 2.026 1.03 3.052 2.988 3.068zM79.038 31.795H73.72l-4.428 10.637-5.196-10.637h-4.424v.671h1.975V45.97h-1.975v.667h4.993c-.097-.413-.32-.633-.666-.667h-1.313v-9.324l5.272 10.24h.443l5.319-12.663V45.97h-1.98v.667h7.298c-.101-.413-.325-.633-.67-.667h-1.31V32.466h1.98v-.67zm9.84 15.09c1.207 0 1.954-.439 2.254-1.312.097-.33.173-.752.22-1.262l-.642-.026c-.098 1.14-.389 1.718-.866 1.73-.363-.029-.544-.442-.544-1.236v-5.166c0-2.06-.954-3.331-2.87-3.808-.494-.118-1.03-.173-1.605-.173-2.245 0-3.655.485-4.23 1.456-.151.25-.223.511-.223.794 0 .642.304 1.047.916 1.211.148.051.304.072.469.072.709 0 1.186-.346 1.435-1.038.034-.097.08-.262.148-.494.181-.659.413-1.072.692-1.237.181-.08.388-.122.62-.122.773 0 1.241.468 1.406 1.41.067.346.101.76.101 1.236v1.608c-4.238.08-6.365 1.203-6.382 3.365 0 1.464.646 2.406 1.929 2.82.38.113.802.172 1.262.172 1.401 0 2.431-.527 3.09-1.582.135-.216.24-.44.325-.672.346 1.419 1.178 2.17 2.495 2.254zm-4.623-1.063c-.827-.034-1.245-.768-1.262-2.204 0-1.089.444-1.798 1.334-2.127.481-.148 1.09-.236 1.832-.27v2.397c-.312 1.157-.814 1.866-1.507 2.128-.152.05-.283.076-.397.076zm12.267 4.87v-4.946c.646.726 1.625 1.106 2.946 1.14 1.63 0 2.942-.63 3.93-1.883.828-1.09 1.237-2.44 1.237-4.057 0-2.093-.625-3.609-1.878-4.55-.676-.51-1.452-.764-2.326-.764-1.317 0-2.39.485-3.217 1.456-.329.397-.574.828-.738 1.288l-.127-2.377h-4.377v.646h1.41v12.76c0 .71-.27 1.123-.815 1.237-.182.034-.38.05-.595.05v.642h6.433c0-.38-.11-.582-.321-.616-.101-.017-.199-.025-.3-.025h-1.262zm2.6-13.874c1.419.034 2.128 1.532 2.128 4.5-.017 3.25-.785 4.88-2.3 4.896-.891 0-1.563-.544-2.006-1.629-.295-.76-.443-1.693-.443-2.794 0-2.065.443-3.53 1.334-4.403.397-.38.823-.57 1.287-.57z" transform="translate(-75 -36) translate(75 36)"></path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                    <!-- Sidebar component, swap this element with another sidebar if you like -->
                    <nav class="mt-16 flex-1 px-2 bg-semilight flex flex-col items-center nav-sidebar">
                        <a href="/user/profile"
                           class="w-48 group flex items-center px-2 py-2 transition duration-75 ease-in-out">
                            <svg class="mr-12 h-5 nav-sidebar__icon nav-sidebar__icon_fill transition duration-75 ease-in-out" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M6.75 7.65H9c.497 0 .9-.403.9-.9s-.403-.9-.9-.9h-.9V5.4c0-.497-.403-.9-.9-.9s-.9.403-.9.9v.495c-1.133.23-1.907 1.281-1.79 2.431.115 1.15 1.084 2.025 2.24 2.024h.9c.249 0 .45.201.45.45s-.201.45-.45.45H5.4c-.497 0-.9.403-.9.9s.403.9.9.9h.9v.45c0 .497.403.9.9.9s.9-.403.9-.9v-.495c1.133-.23 1.907-1.281 1.79-2.431-.115-1.15-1.084-2.025-2.24-2.024h-.9c-.249 0-.45-.201-.45-.45s.201-.45.45-.45zM17.1 9h-2.7V.9c.001-.323-.17-.622-.45-.783-.278-.16-.622-.16-.9 0l-2.7 1.548L7.65.117c-.278-.16-.622-.16-.9 0l-2.7 1.548L1.35.117c-.278-.16-.622-.16-.9 0C.17.278-.001.577 0 .9v14.4C0 16.791 1.209 18 2.7 18h12.6c1.491 0 2.7-1.209 2.7-2.7V9.9c0-.497-.403-.9-.9-.9zM2.7 16.2c-.497 0-.9-.403-.9-.9V2.457l1.8 1.026c.282.147.618.147.9 0l2.7-1.548 2.7 1.548c.282.147.618.147.9 0l1.8-1.026V15.3c.002.307.057.611.162.9H2.7zm13.5-.9c0 .497-.403.9-.9.9s-.9-.403-.9-.9v-4.5h1.8v4.5z" transform="translate(-48 -277) translate(0 1) translate(48 276)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Account
                        </a>
                        <a href="/dashboard"
                           class="mt-10 w-48 group flex items-center px-2 py-2 focus:outline-none transition duration-75 ease-in-out">
                            <svg
                                class="mr-12 h-5 nav-sidebar__icon nav-sidebar__icon_stroke"
                                stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
                            </svg>
                            Dashboard
                        </a>
                    </nav>
                </div>
                <div class="flex-shrink-0 flex pt-4 pb-8 px-10">
                    <a href="/user/profile" class="flex-shrink-0 group block focus:outline-none">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block h-9 w-9 rounded-full"
                                     :src="$page.user.profile_photo_url"
                                     alt=""/>
                            </div>
                            <div class="ml-8 flex flex-col justify-center">
                                <p v-if="$page.user.pen_name" class="text-md leading-5 font-semibold text-color-dark">
                                    {{ $page.user.pen_name }}
                                </p>
                                <p v-else class="text-md leading-5 font-semibold text-color-dark">
                                    {{ $page.user.name }}
                                </p>
                                <form @submit.prevent="logout">
                                    <button type="submit"
                                            class="mt-1 group flex items-center leading-5 font-medium text-color-inactive hover:text-color-active rounded-md focus:outline-none transition ease-in-out duration-75">
                                        Log out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

<!--        Nav header for mobile-->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
<!--            <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">-->
<!--                <button @click.stop="sidebarOpen = true"-->
<!--                        class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-75">-->
<!--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">-->
<!--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                              d="M4 6h16M4 12h16M4 18h16"/>-->
<!--                    </svg>-->
<!--                </button>-->
<!--            </div>-->
            <main class="flex-1 relative z-0 overflow-y-auto pt-2 pb-6 focus:outline-none md:py-0" tabindex="0">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import JetApplicationLogo from './../Jetstream/ApplicationLogo'
import JetApplicationMark from './../Jetstream/ApplicationMark'
import JetDropdown from './../Jetstream/Dropdown'
import JetDropdownLink from './../Jetstream/DropdownLink'
import JetNavLink from './../Jetstream/NavLink'
import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'
import Button from "../Jetstream/Button";

export default {
    components: {
        Button,
        JetApplicationLogo,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put('/current-team', {
                'team_id': team.id
            }, {
                preserveState: false
            })
        },

        logout() {
            axios.post('/logout').then(response => {
                window.location = '/';
            })
        },
    },

    computed: {
        path() {
            return window.location.pathname
        }
    }
}
</script>
