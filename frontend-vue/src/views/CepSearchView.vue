<template>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center">
    <div class="w-full max-w-2xl mx-auto p-4">
      <div class="relative">
        <!-- Card de fundo com rotação -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
        
        <!-- Card principal -->
        <div class="relative bg-white shadow-lg sm:rounded-3xl">
          <div class="px-8 py-12 sm:p-16">
            <!-- Título -->
            <h1 class="text-4xl font-extrabold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
              Consulta de CEP
            </h1>

            <!-- Formulário de busca -->
            <div class="max-w-md mx-auto">
              <div class="space-y-6">
                <div class="relative">
                  <input
                    v-model="cep"
                    type="text"
                    placeholder="Digite o CEP"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                    @keyup.enter="searchCep"
                  />
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </div>
                </div>

                <button
                  @click="searchCep"
                  class="w-full px-4 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-lg hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform transition duration-200 hover:scale-105"
                  :disabled="loading"
                >
                  <span v-if="loading" class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Buscando...
                  </span>
                  <span v-else>Buscar CEP</span>
                </button>
              </div>

              <!-- Resultado -->
              <div class="mt-8">
                <AddressResult :address="address" :error="error" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { useStore } from 'vuex';
import AddressResult from '@/components/AddressResult.vue';

const store = useStore();
const cep = ref('');

const address = computed(() => store.state.address);
const error = computed(() => store.state.error);
const loading = computed(() => store.state.loading);

const searchCep = () => {
  if (cep.value) {
    store.dispatch('searchCep', cep.value);
  }
};
</script> 