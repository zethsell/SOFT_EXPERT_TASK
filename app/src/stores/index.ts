import { createPinia } from 'pinia'
import { createPersistedState } from 'pinia-plugin-persistedstate'

export const pinia = createPinia()

pinia.use(createPersistedState({
  storage: localStorage,
  beforeRestore: () => null,
  afterRestore: () => null,
  serializer: {
    serialize: JSON.stringify,
    deserialize: JSON.parse
  }
}))