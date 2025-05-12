<template>
  <div>
    <!-- Filtres -->
    <div class="bg-gray-200 sticky top-12 z-20 p-4 flex flex-wrap gap-2">
      <button
        v-for="cat in categories"
        :key="cat"
        @click="selectedCategory = cat"
        :class="[
          'px-3 py-1 rounded-full text-sm font-medium transition',
          selectedCategory === cat
            ? 'bg-blue-600 text-white'
            : 'bg-white border border-gray-300 text-gray-700 hover:bg-gray-200'
        ]"
      >
        {{ cat }}
      </button>
    </div>

    <!-- Vidéos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-6">
      <div
        v-for="video in filteredVideos"
        :key="video.id"
        @click="openModal(video)"
        class="cursor-pointer bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden"
      >
        <img :src="video.thumbnail" alt="video thumbnail" class="w-full h-48 object-cover" />
        <div class="p-4 space-y-1">
          <h3 class="text-lg font-semibold text-gray-800">{{ video.title }}</h3>
          <p class="text-sm text-gray-600">{{ video.description }}</p>
          <p class="text-xs text-gray-500">{{ video.views }} vues • {{ video.date }}</p>
        </div>
      </div>
    </div>

    <!-- Modal vidéo -->
    <div
      v-if="selectedVideo"
      class="fixed inset-0 bg-opacity-80 flex items-center justify-center z-[50]"
    >
      <div class="relative w-full max-w-4xl max-h-[90vh] bg-black rounded-lg overflow-hidden flex flex-col">
        <!-- Bouton de fermeture -->
        <button
          @click="closeModal"
          class="absolute top-2 right-2 z-10 text-white text-2xl bg-black/50 rounded-full px-3 py-1 hover:bg-red-500"
          aria-label="Fermer la fenêtre"
        >
          ✕
        </button>

        <!-- Vidéo -->
        <div class="flex-grow aspect-w-16 aspect-h-9">
          <iframe
            class="w-full h-full"
            :src="`https://www.youtube.com/embed/${selectedVideo.youtubeId}?autoplay=1`"
            frameborder="0"
            allow="autoplay; encrypted-media"
            allowfullscreen
          ></iframe>
        </div>

        <!-- Contenu modal avec le titre et la description -->
        <div class="p-4 text-white mt-auto">
          <h2 class="text-xl font-semibold">{{ selectedVideo.title }}</h2>
          <p class="text-sm text-gray-300">{{ selectedVideo.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

// Données
const selectedCategory = ref('Toutes Catégories')
const categories = [
  'Toutes Catégories', 'Nature', 'Gaming', 'Music', 'Inspiration'
]

const videos = ref([
  { id: 1, title: 'Relaxing Nature Sounds', description: 'Chill music and calming visuals.', youtubeId: '2OEL4P1Rz04', thumbnail: 'https://img.youtube.com/vi/2OEL4P1Rz04/hqdefault.jpg', views: '5M', date: 'il y a 2 ans', category: 'Nature' },
  { id: 2, title: 'Epic Music Mix', description: 'Most beautiful epic music tracks.', youtubeId: 'D8DYA97fTOM', thumbnail: 'https://img.youtube.com/vi/D8DYA97fTOM/hqdefault.jpg', views: '3.5M', date: 'il y a 3 ans', category: 'Music' },
  { id: 3, title: 'Beautiful Relaxing Music', description: 'Peaceful piano & guitar instrumental music.', youtubeId: '1ZYbU82GVz4', thumbnail: 'https://img.youtube.com/vi/1ZYbU82GVz4/hqdefault.jpg', views: '10M', date: 'il y a 4 ans', category: 'Nature' },
  { id: 4, title: 'Gaming Music Mix 2023', description: 'Music for video games and productivity.', youtubeId: 'Ds6KqL4zZ2Y', thumbnail: 'https://img.youtube.com/vi/Ds6KqL4zZ2Y/hqdefault.jpg', views: '1.7M', date: 'il y a 8 mois', category: 'Gaming' },
  { id: 5, title: 'Motivational Video', description: 'Push yourself every day.', youtubeId: 'mgmVOuLgFB0', thumbnail: 'https://img.youtube.com/vi/mgmVOuLgFB0/hqdefault.jpg', views: '2.3M', date: 'il y a 5 ans', category: 'Inspiration' },
  { id: 6, title: 'Rain and Thunder Sounds', description: 'Deep sleep, focus and relaxation.', youtubeId: 'xNN7iTA57jM', thumbnail: 'https://img.youtube.com/vi/xNN7iTA57jM/hqdefault.jpg', views: '8M', date: 'il y a 1 an', category: 'Nature' },
  { id: 7, title: 'Chill Gaming Playlist', description: 'Music to play and relax.', youtubeId: 'Tt7bzxurJ1I', thumbnail: 'https://img.youtube.com/vi/Tt7bzxurJ1I/hqdefault.jpg', views: '2M', date: 'il y a 2 ans', category: 'Gaming' },
  { id: 8, title: 'The Best of Classical Music', description: 'Timeless classical masterpieces.', youtubeId: 'GRxofEmo3HA', thumbnail: 'https://img.youtube.com/vi/GRxofEmo3HA/hqdefault.jpg', views: '15M', date: 'il y a 6 ans', category: 'Music' },
  { id: 9, title: 'Morning Motivation', description: 'Start your day with power.', youtubeId: 'UNQHU9UTL7g', thumbnail: 'https://img.youtube.com/vi/UNQHU9UTL7g/hqdefault.jpg', views: '1.2M', date: 'il y a 1 an', category: 'Inspiration' },
  { id: 10, title: 'Study With Me - Music Session', description: 'Lo-fi and calm study beats.', youtubeId: '5qap5aO4i9A', thumbnail: 'https://img.youtube.com/vi/5qap5aO4i9A/hqdefault.jpg', views: '20M', date: 'il y a 4 ans', category: 'Music' }
])

const selectedVideo = ref(false)

// Filtrage des vidéos selon la catégorie sélectionnée
const filteredVideos = computed(() => {
  if (selectedCategory.value === 'Toutes Catégories') return videos.value
  return videos.value.filter(v => v.category === selectedCategory.value)
})

// Ouverture et fermeture du modal
const openModal = (video) => {
  selectedVideo.value = video
}

const closeModal = () => {
  selectedVideo.value = null
}
</script>

<style scoped>
.aspect-w-16.aspect-h-9 {
  position: relative;
  width: 100%;
  padding-bottom: 56.25%;
}
.aspect-w-16.aspect-h-9 iframe {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}
</style>
