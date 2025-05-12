
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
    <Sidebar />
   <Header v-model:openModal="openModal" />
    <main class="flex-1 pt-16 max-w-full items-center">
         <div v-if="openModal" class="fixed inset-0 z-50 flex justify-center items-center  bg-opacity-50 ">
        <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg p-6 relative dark:bg-gray-800">
            <!-- En-tête -->
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h2 class="text-xl font-semibold text-center text-gray-800 dark:text-gray-200">Vos Informations</h2>
                <button @click="openModal = false" class="text-gray-500 hover:text-red-500 text-xl font-bold">&times;</button>
            </div>

            <!-- Corps du modal -->
            <div class="space-y-4">
                <div>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Nom :</span>
                    <span class="text-gray-900 dark:text-white">{{ $page.props.auth.user.name }}</span>
                </div>
                <div>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Email :</span>
                    <span class="text-gray-900 dark:text-white">{{ $page.props.auth.user.email }}</span>
                </div>
                <div>
                    <span class="font-medium text-gray-700 dark:text-gray-300">Rôle :</span>
                    <span class="text-gray-900 dark:text-white">{{ $page.props.auth.user.role ?? 'Utilisateur Standard' }}</span>
                </div>
            </div>

            <!-- Pied de modal -->
            <div class="mt-6 flex justify-end">
                <button @click="openModal = false" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">Fermer</button>
            </div>
        </div>
        </div>
        <VideoGrid />
    </main>
      <Footer >
      </Footer >
  </div>
</div>
</template>
<script setup>
import Sidebar from '@/components/layout/Sidebar.vue'
import Header from '@/components/layout/Header.vue'
import Footer from '@/components/front/Footer.vue'
import VideoGrid from '@/components/sections/VideoGrid.vue'
import {  ref,onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
const props = usePage().props;
const page = usePage();
const openModal = ref(false);
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
