import { useLoginStore } from '@/stores/login'
import axios from 'axios'
import { useRouter } from 'vue-router'

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  timeout: 10000
})

export function headers () {
  const bearer = () => {
    const store = useLoginStore()
    return {
      headers: {
        Authorization: store.credentials.accessToken,
        Accept: 'application/json',
        ContentType: 'application/json'
      }
    }
  }
  return {
    bearer
  }
}

api.interceptors.response.use((response: any) => response,
  async function (error :any) {
    const token = useLoginStore().isLoggedIn
    console.log(error)
    if ([403].includes(Number(error.response.status)) && token) {
      useLoginStore().$reset()
      await useRouter().push({ name: 'login' })
    }
    return Promise.reject(error)
  }
)
export { api }