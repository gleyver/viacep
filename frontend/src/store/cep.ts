import { createStore } from 'vuex';
import axios from 'axios';

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

interface State {
  address: Address | null;
  error: string | null;
  loading: boolean;
}

export default createStore({
  state: {
    address: null,
    error: null,
    loading: false
  } as State,

  mutations: {
    setAddress(state, address: Address | null) {
      state.address = address;
      state.error = null;
    },
    setError(state, error: string | null) {
      state.error = error;
      state.address = null;
    },
    setLoading(state, loading: boolean) {
      state.loading = loading;
    }
  },

  actions: {
    async searchCep({ commit }, cep: string) {
      commit('setLoading', true);
      try {
        const response = await axios.get(`http://localhost:8000/api/v1/cep/${cep}`);
        commit('setAddress', response.data);
      } catch (error: any) {
        commit('setError', error.response?.data?.error || 'Erro ao buscar CEP');
      } finally {
        commit('setLoading', false);
      }
    }
  }
}); 