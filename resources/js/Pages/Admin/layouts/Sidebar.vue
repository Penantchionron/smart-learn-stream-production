<template>
  <!-- Page Sidebar -->
  <nav
        id="page-sidebar"
        class=" bg-gray-100 fixed start-0 top-0 bottom-0 z-50 flex h-full w-full flex-col border-gray-200 transition-transform duration-300 ease-out lg:w-64 ltr:border-r rtl:border-l dark:border-gray-700/75 dark:bg-gray-900"
        x-bind:class="{
            'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
            'translate-x-0': mobileSidebarOpen,
            'lg:ltr:-translate-x-full lg:rtl:translate-x-full': !desktopSidebarOpen,
            'lg:ltr:translate-x-0 lg:rtl:translate-x-0': desktopSidebarOpen,
        }"
        aria-label="Main Sidebar Navigation"
        >
        <div
            class="flex h-16 w-full flex-none items-center justify-between px-5 shadow-xs"
        >
            <!-- Logo-->
            <a href="javascript:void(0)" class="group inline-flex items-center gap-2 font-semibold text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-300">
            <svg data-logo="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 71 41" class="w-12 h-12"	>
            <g id="logogram" transform="translate(0, 0) rotate(0)"><path d="M37.4552 2.39882C38.3804 1.43634 39.6368 0.89563 40.9453 0.89563C46.8318 0.89563 52.3794 0.895633 57.8425 0.895644C68.8303 0.895667 74.3325 14.7158 66.5629 22.7986L49.639 40.4046C48.862 41.2129 47.5335 40.6405 47.5335 39.4974V23.9906L49.4894 21.9559C51.0433 20.3393 49.9427 17.5753 47.7452 17.5753H22.8667L37.4552 2.39882Z" fill="#3A04FF"/><path d="M32.945 39.1672C32.0198 40.1296 30.7634 40.6703 29.455 40.6703C23.5684 40.6703 18.0208 40.6703 12.5577 40.6703C1.56991 40.6703 -3.93229 26.8501 3.83728 18.7674L20.7612 1.16133C21.5382 0.353051 22.8667 0.925506 22.8667 2.06858L22.8667 17.5753L20.9109 19.6101C19.3569 21.2266 20.4575 23.9907 22.6551 23.9907L47.5335 23.9906L32.945 39.1672Z" fill="#3A04FF"/></g>
            <g id="logotype" transform="translate(71, 20.5)"></g>
            </svg>
            <span class="d:flex flex-row text-center">Smart Learn Stream</span>
            </a>
            <div class="flex items-center">
            <!-- Dark Mode -->
            <button
                type="button"
                class="inline-flex items-center justify-center leading-5 text-gray-800 hover:text-gray-600 focus:outline-hidden active:text-gray-800 dark:text-gray-200 dark:hover:text-gray-300 dark:active:text-gray-200"
                x-on:click="darkMode = !darkMode"
            >
                <svg
                x-show="!darkMode"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="hi-outline hi-moon inline-block size-5"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                />
                </svg>
                <svg
                x-cloak
                x-show="darkMode"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="hi-outline hi-sun inline-block size-5"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                />
                </svg>
            </button>


            <!-- fermer Sidebar sur Mobile -->
            <button
                type="button"
                class="ms-3 inline-flex items-center justify-center leading-5 text-gray-800 hover:text-rose-600 focus:outline-hidden active:text-rose-800 lg:hidden dark:text-gray-200 dark:hover:text-rose-300 dark:active:text-rose-200"
                x-on:click="mobileSidebarOpen = false"
            >
                <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="hi-solid hi-x-mark inline-block size-5"
                >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12"
                />
                </svg>
            </button>
            <!-- Fin Sidebar sur Mobile -->
            </div>
        </div>
        <!-- Fin Sidebar  -->

        <!-- Sidebar Navigation -->
        <div class="overflow-y-auto text-white font-bold overflow-x-hidden ">
            <div class="w-full py-4">
            <nav class="space-y-1">
                <inertia-link :href="route('admin.dashboard')" class="group flex items-center gap-2 border-r-4 border-rose-400 bg-rose-50 px-5 py-0.5 text-sm font-medium text-rose-900 dark:bg-rose-800 dark:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-home  inline-block size-6 text-rose-600 dark:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                    </svg>
                </span>
                 <span class="grow py-2 font-bold">Admin Dashboard</span>
              </inertia-link>
                <a
                href="javascript:void(0)"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-globe-americas inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64"
                    />
                    </svg>
                </span>
                <span class="grow py-2 font-bold">Statistiques</span>
                </a>
                <a
                href="javascript:void(0)"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-clipboard-list inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"
                    />
                    </svg>
                </span>
                <span class="grow py-2 font-bold">Création du contenu</span>
                </a>
                <div
                class="px-5 pt-6 pb-2 text-xs tracking-wider text-gray-400 uppercase  font-bold"
                >
                *******************************************
                </div>
                <Link :href="route('videos.index')"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-square-2x2 inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"
                    />
                    </svg>
                </span>
                <span class="grow py-2  font-bold">Vidéos</span>
            </Link>
                <Link :href="route('categories.index')"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-queue-list inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"
                    />
                    </svg>
                </span>
                <span class="grow py-2  font-bold">Catégories</span>
                </Link>
             <Link :href="route('commentaires.index')"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-play-circle inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z"
                    />
                    </svg>
                </span>
                <span class="grow py-2  font-bold">Modération des Commentaires</span>
                <span
                    class="rounded-full bg-rose-400/10 px-2 py-1 text-xs leading-4 font-medium text-rose-700 transition dark:bg-rose-400/20 dark:text-rose-200 dark:group-hover:bg-rose-400/30"
                    >26</span
                >
            </Link>

               <Link :href="route('roles.index')"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-clock inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                    </svg>
                </span>
                <span class="grow py-2  font-bold">Roles</span>
                <span
                    class="rounded-full bg-rose-400/10 px-2 py-1 text-xs leading-4 font-medium text-rose-700 transition dark:bg-rose-400/20 dark:text-rose-200 dark:group-hover:bg-rose-400/30"
                    >?</span
                >
            </Link >
             <Link :href="route('users.index')"
                class="group flex items-center gap-2 px-5 py-0.5 text-sm font-medium text-gray-700 hover:bg-rose-50 hover:text-rose-900 active:bg-gray-50 dark:text-gray-200 dark:hover:bg-rose-800 dark:hover:text-rose-200"
                >
                <span class="flex flex-none items-center opacity-75">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-heart  font-bold inline-block size-6 text-gray-400 group-hover:text-rose-600 dark:group-hover:text-rose-300"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                    />
                    </svg>
                </span>
                <span class="grow py-2  font-bold">Utilisateurs</span>
                <span
                    class="rounded-full bg-rose-400/10 px-2 py-1 text-xs leading-4 font-medium text-rose-700 transition dark:bg-rose-400/20 dark:text-rose-200 dark:group-hover:bg-rose-400/30"
                    >39</span
                >
            </Link>
            </nav>
            </div>
        </div>
        <!-- Fin Sidebar Navigation -->
    </nav>
        <!-- Fin Page Sidebar -->

</template>
<script setup>
 import { Link } from '@inertiajs/vue3';
</script>
