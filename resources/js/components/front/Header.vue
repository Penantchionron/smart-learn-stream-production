<template>
  <!-- Partie logo-->
   <div class="flex flex-row items-center">
  <nav v-if="!showRegister && !showLogin"
        id="page-sidebar"
        class="fixed start-0 h-16 top-0 bottom-10 z-50 flex flex-col border-gray-200 bg-white transition-transform duration-300 ease-out lg:w-64 ltr:border-r rtl:border-l dark:border-gray-700/75 dark:bg-gray-900"
        x-bind:class="{
            'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
            'translate-x-0': mobileSidebarOpen,
            'lg:ltr:-translate-x-full lg:rtl:translate-x-full': !desktopSidebarOpen,
            'lg:ltr:translate-x-0 lg:rtl:translate-x-0': desktopSidebarOpen,
        }"
        aria-label="Main Sidebar Navigation"
        >
        <div
            class="flex flex-row "
        >
            <!-- Logo-->
            <a href="javascript:void(0)" class="group inline-flex items-center gap-2 font-semibold text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-300">
            <svg data-logo="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 71 41" class="w-12 h-12"	>
            <g id="logogram" transform="translate(0, 0) rotate(0)"><path d="M37.4552 2.39882C38.3804 1.43634 39.6368 0.89563 40.9453 0.89563C46.8318 0.89563 52.3794 0.895633 57.8425 0.895644C68.8303 0.895667 74.3325 14.7158 66.5629 22.7986L49.639 40.4046C48.862 41.2129 47.5335 40.6405 47.5335 39.4974V23.9906L49.4894 21.9559C51.0433 20.3393 49.9427 17.5753 47.7452 17.5753H22.8667L37.4552 2.39882Z" fill="#3A04FF"/><path d="M32.945 39.1672C32.0198 40.1296 30.7634 40.6703 29.455 40.6703C23.5684 40.6703 18.0208 40.6703 12.5577 40.6703C1.56991 40.6703 -3.93229 26.8501 3.83728 18.7674L20.7612 1.16133C21.5382 0.353051 22.8667 0.925506 22.8667 2.06858L22.8667 17.5753L20.9109 19.6101C19.3569 21.2266 20.4575 23.9907 22.6551 23.9907L47.5335 23.9906L32.945 39.1672Z" fill="#3A04FF"/></g>
            <g id="logotype" transform="translate(71, 20.5)"></g>
            </svg>
            <span class="d:flex flex-col text-center">Smart Learn Stream</span>
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

            </div>
        </div>
    </nav>
        <!-- Fin Sidebar  -->
    <header
            id="page-header"
            class="fixed start-0 end-0 top-0 z-30 flex h-16 flex-none items-center bg-white shadow-xs transition-all duration-300 ease-out lg:ps-64 dark:bg-gray-900"
            x-bind:class="{ 'lg:ps-64': desktopSidebarOpen }"
            >
            <div class="mx-auto flex w-full max-w-7xl justify-between px-4 lg:px-8">

                <!-- Left Section -->
                <div class="flex items-center">
                <!-- Toggle Sidebar on Mobile -->
                <div class="me-2 lg:hidden">
                    <button
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-sm border border-gray-300 bg-white px-3 py-2 leading-6 font-semibold text-gray-800 shadow-xs hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow-sm focus:ring-3 focus:ring-gray-500/25 focus:outline-hidden active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    x-on:click="mobileSidebarOpen = true"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hi-solid hi-menu-alt-1 inline-block size-5"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </button>
                </div>
                <!-- END Toggle Sidebar on Mobile -->

                <!-- Toggle Sidebar on Desktop -->
                <div class="hidden lg:block">
                    <button
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded-sm border border-gray-300 bg-white px-3 py-2 leading-6 font-semibold text-gray-800 shadow-xs hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow-sm focus:ring-3 focus:ring-gray-500/25 focus:outline-hidden active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    x-on:click="desktopSidebarOpen = !desktopSidebarOpen"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hi-solid hi-menu-alt-1 inline-block size-5"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </button>
                </div>
                <!-- END Toggle Sidebar on Desktop -->
                </div>
                <!-- END Left Section -->

                <!-- Main Section -->
                <div class="flex items-center">
                <!-- Search -->
                <div class="hidden sm:block">
                    <form onsubmit="return false;">
                    <div class="relative">
                        <input
                        class="block w-96  text-center  rounded-sm border border-gray-300 py-2 pe-10 text-sm leading-5 focus:border-rose-500 focus:ring-3 focus:ring-rose-500/50 dark:border-gray-700 dark:bg-gray-800 dark:placeholder:text-gray-400 dark:focus:border-rose-400 dark:focus:ring-rose-400"
                        type="text"
                        id="search"
                        name="search"
                        placeholder="Recherche.."
                        />
                        <div
                        class="pointer-events-none absolute inset-y-0 end-0 my-px me-px flex w-10 items-center justify-center rounded-r text-gray-300"
                        >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="hi-solid hi-magnifying-glass size-5"
                        >
                            <path
                            fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd"
                            />
                        </svg>
                        </div>
                    </div>
                    </form>
                </div>

                <!-- END Search -->

                <!-- Brand -->
                <a
                    href="javascript:void(0)"
                    class="group inline-flex items-center gap-2 font-semibold text-gray-800 hover:text-gray-600 sm:hidden"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="hi-outline hi-video-camera inline-block size-6 text-rose-500 transition group-hover:scale-110"
                    >
                    <path
                        stroke-linecap="round"
                        d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"
                    />
                    </svg>
                </a>
            </div>
              </div>
       <div class="flex items-center gap-2">
    <div class="relative inline-flex space-x-2 gap-2 rounded-full p-4">
      <button @click="showRegister = true" type="button"
        class="top-10 h-8 w-32 inline-flex items-center justify-center rounded-sm border border-gray-300 bg-white px-3 py-2 text-sm font-semibold text-gray-800 shadow-xs hover:bg-gray-100 hover:shadow-sm dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800">
        <span class="text-center text-blue-600">S'inscrire</span>
      </button>

      <button @click="showLogin = true" type="button"
        class="top-10 h-8 w-32 inline-flex items-center justify-center rounded-sm border border-gray-300 bg-white px-3 py-2 text-sm font-semibold text-gray-800 shadow-xs hover:bg-gray-100 hover:shadow-sm dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800">
        <span class="text-center text-blue-600">Se connecter</span>
      </button>
    </div>

    <!-- Modal Overlay -->
    <div v-if="showRegister || showLogin" class="fixed inset-0 bg-gray-300 bg-opacity-50 z-40" @click="closeModals"></div>

    <!-- Modal S'inscrire -->
    <div v-if="showRegister" class="fixed z-50 inset-0 flex items-center justify-center">
      <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg w-full max-w-md relative">
        <h2 class="text-xl font-bold mb-4 text-blue-600">Créer un compte</h2>
        <form @submit.prevent="handleRegister">
          <input type="text" placeholder="Nom" v-model="registerForm.name"
            class="w-full mb-3 p-2 border rounded dark:bg-gray-800 dark:text-white" />
          <input type="email" placeholder="Email" v-model="registerForm.email"
            class="w-full mb-3 p-2 border rounded dark:bg-gray-800 dark:text-white" />
          <input type="password" placeholder="Mot de passe" v-model="registerForm.password"
            class="w-full mb-3 p-2 border rounded dark:bg-gray-800 dark:text-white" />

          <input type="password" placeholder="Mot de passe" v-model="registerForm.password_confirmation"
            class="w-full mb-3 p-2 border rounded dark:bg-gray-800 dark:text-white" />
          <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">S'inscrire</button>
        </form>
        <button @click="closeModals"
          class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 dark:hover:text-white">&times;</button>
      </div>
    </div>

    <!-- Modal Connexion -->
    <div v-if="showLogin" class="fixed z-50 inset-0 flex items-center justify-center">
      <div class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-lg w-full max-w-md relative">
        <h2 class="text-xl font-bold mb-4 text-blue-600">Connexion</h2>
        <form @submit.prevent="handleLogin">
          <input type="email" placeholder="Email" v-model="loginForm.email"
            class="w-full mb-3 p-2 border rounded dark:bg-gray-800 dark:text-white" />
          <input type="password" placeholder="Mot de passe" v-model="loginForm.password"
            class="w-full mb-3 p-2 border rounded dark:bg-gray-800 dark:text-white" />
          <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Se connecter</button>
        </form>
        <button @click="closeModals"
          class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 dark:hover:text-white">&times;</button>
      </div>
    </div>
    </div>
    </header>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

// États pour afficher les modaux
const showRegister = ref(false)
const showLogin = ref(false)

// Formulaire d'inscription
const registerForm = useForm({
  name: '',
  email: '',
  password: '',
    password_confirmation: '',
})

// Formulaire de connexion 
const loginForm = useForm({
  email: '',
  password: '',
})

// Fermer les modaux
const closeModals = () => {
  showRegister.value = false
  showLogin.value = false
}

// Soumettre le formulaire d'inscription
const handleRegister = () => {
  registerForm.post(route('register'), {
    onFinish: () => {
      registerForm. registerForm.reset('password', 'password_confirmation') // Réinitialiser le mot de passe après soumission
      closeModals()
    },
  })
}

// Soumettre le formulaire de connexion
const handleLogin = () => {
  loginForm.post(route('login'), {
    onFinish: () => {
      loginForm.reset('password')
      closeModals()
    },
  })
}
</script>
