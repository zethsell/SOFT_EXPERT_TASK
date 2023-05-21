<script setup lang="ts">
import CardAuth from '@/components/auth/CardAuth.vue'
import MButton from '@/components/auth/ButtonAuth.vue'
import MInput from "@/components/inputs/MInput.vue"
import { ref, onMounted } from 'vue'
import type { Login } from '@/models'
import { useLoginStore } from '@/stores/login'

const loginStore = useLoginStore()
const loadingReq = ref(false)
const user = ref<Login>({
  email: '',
  password: ''
})

onMounted(() => loginStore.loggedUser())

async function __login() {
  loadingReq.value = true
  await loginStore.signInUser(user.value)
  loadingReq.value = false
}

</script>
<template>
  <CardAuth title="Sign In">
    <form @submit.prevent="(__login())">
      <m-input label="E-mail" required type="email" v-model="user.email" />
      <m-input label="Password" required type="password" v-model="user.password" />
      <m-button type="submit" label="Sign In" :loading="loadingReq" />
    </form>
    <router-link :to="{ name: 'sign-up' }">First Access? <u>Sign-Up here</u></router-link>
  </CardAuth>
</template>
<style lang="scss" scoped>
form {
  width: 100%;
  padding: 20px;
}

a {
  font-size: 12px;
  color: black;
  text-decoration: none;

  u {
    color: #6082B6;

    &:hover {
      cursor: pointer;
    }
  }
}
</style>