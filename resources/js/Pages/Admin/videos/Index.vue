<template>
    <div
    x-data="{ mobileSidebarOpen: false, desktopSidebarOpen: true, darkMode: false, userDropdownOpen: false }"
    x-bind:class="{ 'dark': darkMode }"
        >
    <!-- Page Container -->
    <div
        id="page-container"
        class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-100 transition-all duration-300 ease-out lg:ps-64 dark:bg-gray-800 dark:text-gray-200"
        x-bind:class="{ 'lg:ps-64': desktopSidebarOpen }"
    >
    <Sidebar v-model:link="link" />
    <Header v-model:openModal="openModal" />
    <main class="flex pt-12 max-w-full">
    <div class="p-6 h-full flex flex-col">
    <!-- Bouton Ajouter -->
    <div class="flex justify-end mb-4 shrink-0">
        <button @click="openModal1 = true" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Ajouter une vidéo
        </button>
    </div>

    <!-- Tableau scrollable -->
    <div class="overflow-y-auto bg-gray-300 rounded flex-grow max-h-[60vh]">
        <div class="inline-block min-w-full py-2">
        <div class="overflow-hidden">
            <table class="min-w-full text-sm text-center text-gray-800 dark:text-white">
            <thead class="bg-neutral-100 dark:bg-neutral-900 font-semibold border-b border-neutral-300 dark:border-white/10">
                <tr>
                <th class="px-6 py-4">#</th>
                <th class="px-6 py-4">Preview</th>
                <th class="px-6 py-4">Titre</th>
                <th class="px-6 py-4">Description</th>
                <th class="px-6 py-4">Catégorie</th>
                <th class="px-6 py-4">Premium</th>
                <th class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                v-for="(video, index) in videos"
                :key="video.id"
                class="border-b border-neutral-200 dark:border-white/10 hover:bg-gray-50 dark:hover:bg-neutral-800 transition"
                >
                <td class="px-6 py-4">{{ index + 1 }}</td>
                <td class="px-6 py-4">
                    <video
                    v-if="video.url"
                    :src="video.url"
                    class="w-24 h-16 rounded shadow-md"
                    controls
                    muted
                    ></video>
                    <span v-else class="italic text-gray-400">Aucune</span>
                </td>
                <td class="px-6 py-4">{{ video.titre }}</td>
                <td class="px-6 py-4">{{ video.description || '—' }}</td>
                <td class="px-6 py-4">{{ video.categorie.nom }}</td>
                <td class="px-6 py-4">
                    <span :class="video.premium ? 'text-green-600 font-semibold' : 'text-gray-500'">
                    {{ video.premium ? 'Oui' : 'Non' }}
                    </span>
                </td>
                <td class="px-6 py-4 space-x-2 flex flex-row">
                    <button @click="editVideo(video)" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm shadow">
                    Éditer
                    </button>
                    <button @click="deleteVideo(video.id)" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm shadow">
                    Supprimer
                    </button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between shrink-0">
        <button @click="precedent" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Précédent</button>
        <button @click="suivant" class="px-4 py-2 bg-gray-300 text-gray-800 rounded">Suivant</button>
    </div>
    </div>
    <!-- Modal d'ajout de vidéo -->
    <div v-if="openModal1" class="fixed inset-0 z-50 flex items-center justify-center bg-opacity-50">
    <div
        class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto"
    >
        <h2 class="text-lg font-semibold mb-4">Ajouter une Vidéo</h2>

        <form @submit.prevent="storeVideo">
        <div class="mb-4">
            <label class="block mb-1 font-medium">Titre</label>
            <input v-model="newVideo.titre" type="text" required class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Description</label>
            <textarea v-model="newVideo.description" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Catégorie</label>
            <select v-model="newVideo.categorie_id" required class="w-full border px-3 py-2 rounded">
            <option disabled value="">Sélectionnez une catégorie</option>
            <option v-for="cat in categories" :value="cat.id" :key="cat.id">{{ cat.nom }}</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Fichier vidéo</label>
            <input type="file" @change="handleFileUpload" accept=".mp4,.mov,.avi" class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">URL externe</label>
            <input v-model="newVideo.url" type="url" class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">YouTube ID</label>
            <input v-model="newVideo.youtube_id" type="text" class="w-full border px-3 py-2 rounded" />
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center border-2">
            <input type="checkbox" v-model="newVideo.premium" class="mr-2  bg-green-600"/>
            Vidéo Premium ?
            </label>
        </div>

        <div class="flex justify-end space-x-2">
            <button type="button" @click="openModal1 = false" class="px-4 py-2 bg-gray-400 text-white rounded">Annuler</button>
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">Enregistrer</button>
        </div>
        </form>
    </div>
    </div>
 </main>

 </div>
 <Footer />
</div>
</template>
<script setup>
const link = ref('');
import Sidebar from '@/Pages/Admin/layouts/Sidebar.vue'
import Header from '@/Pages/Admin/layouts/Header.vue'
import Footer from '@/Pages/Admin/layouts/Footer.vue'
import {  ref,onMounted } from 'vue';
import { usePage ,Link} from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = usePage().props;
const page = usePage();
const openModal1 = ref(false)
const videos = ref([
  {
    id: 1,
    titre: 'Introduction au Forex',
    url: '/storage/videos/forex.mp4',
    description: 'Vidéo de base',
    categorie: { id: 1, nom: 'Trading' },
    premium: true,
  },
  {
    id: 2,
    titre: 'Bases de la programmation',
    url: '',
    description: 'Vidéo de base',
    categorie: { id: 2, nom: 'Informatique' },
    premium: false,
  },
    {
    id: 3,
    titre: 'Introduction à IA',
    url: '/storage/videos/forex.mp4',
    description: 'Vidéo de base',
    categorie: { id: 3, nom: 'Trading' },
    premium: true,
  },
])

const categories = ref([
  { id: 1, nom: 'Trading' },
  { id: 2, nom: 'Informatique' },
])

const newVideo = ref({
  titre: '',
  description: '',
  categorie_id: '',
  premium: false,
  url: '',
  youtube_id: '',
  file: null,
})

const handleFileUpload = (event) => {
  newVideo.value.file = event.target.files[0]
}

const storeVideo = () => {
  console.log('Nouvelle vidéo', newVideo.value)
  // envoyer avec Inertia.post()
}

const editVideo = (video) => {
  console.log('Éditer la vidéo', video)
}

const deleteVideo = (id) => {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette vidéo ?')) {
    Inertia.delete(route('videos.destroy', id))
  }
}

const precedent = () => {
  console.log('Page précédente')
}

const suivant = () => {
  console.log('Page suivante')
}

onMounted(() => {
  if (page.props.flash?.success) {
    Swal.fire({
      title: 'Succès 🎉',
      text: page.props.flash.success,
      icon: 'success',
      confirmButtonText: 'OK'
    })
  }
})
</script>
