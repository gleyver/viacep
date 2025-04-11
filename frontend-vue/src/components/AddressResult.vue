<template>
  <div v-if="address || error">
    <!-- Mensagem de erro -->
    <div v-if="error" class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm text-red-700">{{ error }}</p>
        </div>
      </div>
    </div>

    <!-- Resultado do endereço -->
    <div v-if="address" class="bg-white shadow-md rounded-lg overflow-hidden">
      <!-- Cabeçalho -->
      <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-indigo-50 border-b border-gray-200">
        <h3 class="text-xl font-semibold text-gray-800">Endereço encontrado</h3>
        <p class="mt-1 text-sm text-gray-600">Detalhes do endereço para o CEP {{ address.cep }}</p>
      </div>

      <!-- Dados do endereço -->
      <div class="divide-y divide-gray-200">
        <div class="px-6 py-4 grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
          <span class="text-sm font-medium text-gray-500">Logradouro</span>
          <span class="sm:col-span-2 text-sm text-gray-900">{{ address.logradouro }}</span>
        </div>

        <div class="px-6 py-4 grid grid-cols-1 sm:grid-cols-3 gap-4 items-center bg-gray-50">
          <span class="text-sm font-medium text-gray-500">Complemento</span>
          <span class="sm:col-span-2 text-sm text-gray-900">{{ address.complemento || 'Não informado' }}</span>
        </div>

        <div class="px-6 py-4 grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
          <span class="text-sm font-medium text-gray-500">Bairro</span>
          <span class="sm:col-span-2 text-sm text-gray-900">{{ address.bairro }}</span>
        </div>

        <div class="px-6 py-4 grid grid-cols-1 sm:grid-cols-3 gap-4 items-center bg-gray-50">
          <span class="text-sm font-medium text-gray-500">Localidade/UF</span>
          <span class="sm:col-span-2 text-sm text-gray-900">{{ address.localidade }} - {{ address.uf }}</span>
        </div>

        <!-- Códigos em grid -->
        <div class="px-6 py-4">
          <span class="block text-sm font-medium text-gray-500 mb-3">Códigos</span>
          <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 p-3 rounded-lg">
              <span class="text-xs font-medium text-gray-500">IBGE</span>
              <p class="text-sm text-gray-900">{{ address.ibge }}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded-lg">
              <span class="text-xs font-medium text-gray-500">GIA</span>
              <p class="text-sm text-gray-900">{{ address.gia || 'N/A' }}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded-lg">
              <span class="text-xs font-medium text-gray-500">DDD</span>
              <p class="text-sm text-gray-900">{{ address.ddd }}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded-lg">
              <span class="text-xs font-medium text-gray-500">SIAFI</span>
              <p class="text-sm text-gray-900">{{ address.siafi }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
interface Address {
  cep: string;
  logradouro: string;
  complemento: string;
  bairro: string;
  localidade: string;
  uf: string;
  ibge: string;
  gia: string;
  ddd: string;
  siafi: string;
}

defineProps<{
  address: Address | null;
  error: string | null;
}>();
</script> 