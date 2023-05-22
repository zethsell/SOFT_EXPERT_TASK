import { defineStore } from 'pinia'
import { Login, Logged, UserRegister } from '@/models'
import { alertError } from '@/helpers'
import { api } from '@/api'
import { router } from '@/router'
import { alertSuccess } from '@/helpers'

export const useLoginStore = defineStore({
  id: 'credentials',
  state: () => ({
    credentials: {
      user: {}
    } as Logged
  }),
  persist: true,
  actions: {
    async signInUser(user: Login) {
      await api
        .post<Logged>('sign-in', user)
        .then(async (res) => {
          this.credentials = res.data
          api.defaults.headers.common['Authorization'] = res.data.accessToken
          api.defaults.headers.common['Accept'] = 'application/json'
          this.redirectLoggedUser()
        })
        .catch(async (err) => {
          await alertError('Error', err.response.data.error.message)
        })
    },
    async signUpUser(user: UserRegister) {
      await api
        .post<Logged>('sign-up', user)
        .then(async (res) => {
          await alertSuccess('SignUp Sucess!', 'You will be redirected to Sign In')
          await router.push({ name: 'login' })
        })
        .catch(async (err) => {
          await alertError('Error', err.response.data.error.message)
        })
    },
    async redirectLoggedUser() {
      await api.get('users-me').then(async (res) => {
        this.credentials.user = res.data
        await router.push({ name: 'home' })
      })
    },
    async signOutUser() {
      this.$reset()
      await router.push({ name: 'login' })
    },
    async loggedUser() {
      if (this.isLoggedIn) {
        await router.replace({ name: 'home' })
      }
    }
  },
  getters: {
    isLoggedIn: (state) => state.credentials.accessToken
  }
})
