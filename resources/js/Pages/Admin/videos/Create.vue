<template>
  <div class="fixed inset-0 z-50 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white dark:bg-gray-900 p-6 rounded-lg w-full max-w-2xl shadow-md">
      <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Ajouter une vidéo</h3>

      <form @submit.prevent="submitForm" enctype="multipart/form-data" class="space-y-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Titre</label>
          <input type="text" v-model="form.titre" class="w-full mt-1 border px-3 py-2 rounded dark:bg-gray-800 dark:text-white" required />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Description</label>
          <textarea v-model="form.description" class="w-full mt-1 border px-3 py-2 rounded dark:bg-gray-800 dark:text-white"></textarea>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Fichier vidéo</label>
          <input type="file" @change="handleFile" accept="video/*" class="mt-1" />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">URL (optionnel)</label>
          <input type="url" v-model="form.url" class="w-full mt-1 border px-3 py-2 rounded dark:bg-gray-800 dark:text-white" />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">YouTube ID (optionnel)</label>
          <input type="text" v-model="form.youtube_id" class="w-full mt-1 border px-3 py-2 rounded dark:bg-gray-800 dark:text-white" />
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Catégorie</label>
          <select v-model="form.categorie_id" class="w-full mt-1 border px-3 py-2 rounded dark:bg-gray-800 dark:text-white" required>
            <option disabled value="">-- Choisir une catégorie --</option>
            <option v-for="cat in categories" :value="cat.id" :key="cat.id">{{ cat.nom }}</option>
          </select>
        </div>

        <div class="flex items-center space-x-2">
          <label class="text-sm font-medium text-gray-700 dark:text-gray-200">Premium ?</label>
          <input type="checkbox" v-model="form.premium" />
        </div>

        <div class="flex justify-end gap-4 mt-6">
          <button @click="$emit('close')" type="button" class="px-4 py-2 bg-gray-500 text-white rounded">Annuler</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'

const form = ref({
  titre: '',
  description: '',
  video_file: null,
  url: '',
  youtube_id: '',
  categorie_id: '',
  premium: false
})

const categories = ref([
  { id: 1, nom: 'Catégorie A' },
  { id: 2, nom: 'Catégorie B' }
])

const handleFile = (e) => {
  form.value.video_file = e.target.files[0]
}

const submitForm = () => {
  const data = new FormData()
  for (const key in form.value) {
    data.append(key, form.value[key])
  }

  Inertia.post(route('videos.store'), data, {
    onSuccess: () => {
      form.value = {
        titre: '',
        description: '',
        video_file: null,
        url: '',
        youtube_id: '',
        categorie_id: '',
        premium: false
      }
    }
  })
}
</script>
