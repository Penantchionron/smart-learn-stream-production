<template>
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
    <div v-if="showRegister || showLogin" class="fixed inset-0 bg-black bg-opacity-50 z-40" @click="closeModals"></div>

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
</template>
<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import Swal from 'sweetalert2'
const Swal = require('sweetalert2')
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

// Ajoute SweetAlert après l’inscription réussie
const handleRegister = () => {
  registerForm.post(route('register'), {
    onSuccess: () => {
      Swal.fire({
        title: 'Inscription réussie',
        text: 'Votre compte a été créé avec succès.',
        icon: 'success',
        confirmButtonText: 'OK',
      })
    },
    onFinish: () => {
      registerForm.reset('password', 'password_confirmation')
      closeModals()
    },
  })
}

// Ajoute SweetAlert après connexion réussie
const handleLogin = () => {
  loginForm.post(route('login'), {
    onSuccess: () => {
      Swal.fire({
        title: 'Connexion réussie',
        text: 'Bienvenue sur votre compte.',
        icon: 'success',
        confirmButtonText: 'Continuer',
      })
    },
    onFinish: () => {
      loginForm.reset('password')
      closeModals()
    },
  })
}
//sweet alert2
const page = usePage();

onMounted(() => {
    if (page.props.flash.success) {
        Swal.fire({
            title: 'Succès 🎉',
            text: page.props.flash.success,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }
});
</script>

// <!-- <script setup>
// import { ref } from 'vue'
// import { useForm } from '@inertiajs/vue3'

// // États pour afficher les modaux
// const showRegister = ref(false)
// const showLogin = ref(false)

// // Formulaire d'inscription
// const registerForm = useForm({
//   name: '',
//   email: '',
//   password: '',
//     password_confirmation: '',
// })

// // Formulaire de connexion (si tu veux aussi gérer via Inertia)
// const loginForm = useForm({
//   email: '',
//   password: '',
// })

// // Fermer les modaux
// const closeModals = () => {
//   showRegister.value = false
//   showLogin.value = false
// }

// // Soumettre le formulaire d'inscription
// const handleRegister = () => {
//   registerForm.post(route('register'), {
//     onFinish: () => {
//       registerForm. registerForm.reset('password', 'password_confirmation') // Réinitialiser le mot de passe après soumission
//       closeModals()
//     },
//   })
// }

// // Soumettre le formulaire de connexion (optionnel)
// const handleLogin = () => {
//   loginForm.post(route('login'), {
//     onFinish: () => {
//       loginForm.reset('password')
//       closeModals()
//     },
//   })
// }
// </script> -->
