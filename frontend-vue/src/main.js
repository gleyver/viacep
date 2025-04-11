import './assets/main.css'
import { createApp } from 'vue'
import { createStore } from 'vuex'
import App from './App.vue'
import router from './router'

const store = createStore({
  state() {
    return {
      address: null,
      error: null,
      loading: false
    }
  },
  mutations: {
    setAddress(state, address) {
      state.address = address
      state.error = null
    },
    setError(state, error) {
      state.error = error
      state.address = null
    },
    setLoading(state, loading) {
      state.loading = loading
    }
  },
  actions: {
    async searchCep({ commit }, cep) {
      commit('setLoading', true)
      try {
        const response = await fetch(`http://localhost:8000/api/v1/cep/${cep}`)
        const data = await response.json()
        if (response.ok) {
          commit('setAddress', data)
        } else {
          commit('setError', data.error)
        }
      } catch (error) {
        commit('setError', 'Erro ao buscar CEP')
      } finally {
        commit('setLoading', false)
      }
    }
  }
})

const app = createApp(App)
app.use(router)
app.use(store)
app.mount('#app')
