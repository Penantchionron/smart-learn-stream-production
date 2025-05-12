<template>
    <div id="app"
      x-data="{ mobileSidebarOpen: false, desktopSidebarOpen: true, darkMode: false, userDropdownOpen: false }"
      x-bind:class="{ 'dark': darkMode }"
      class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-800 dark:text-gray-200"
    >
    <!-- le hearder barre de recherche bouton connexion  -->
    <Header/>
    <!-- Contenus main ici -->
      <main class="flex-1 pt-16 ">
        <VideoGrid />
      </main>
      <Footer/>
    </div>

  </template>

  <script setup>
  import Header from '@/components/front/Header.vue'
  import Footer from '@/components/front/Footer.vue'
  import VideoGrid from '@/components/sections/VideoGrid.vue'
  </script>
