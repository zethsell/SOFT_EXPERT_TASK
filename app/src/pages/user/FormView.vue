<script setup lang="ts">
import MCard from '@/components/cards/MCard.vue'
import MButton from '@/components/auth/ButtonAuth.vue'
import MInput from "@/components/inputs/MInput.vue"
import { ref, computed, onMounted } from 'vue'
import { apiPost, apiPut, apiGet } from '@/api/fetch'
import type { UserRegister } from '@/models'
import { useRoute, useRouter } from 'vue-router'
import { alertSuccess } from '@/helpers'

const route = useRoute()
const router = useRouter()
const id = ref<number | null>(null)
const loadingReq = ref(false)
const user = ref<UserRegister>({
  email: '',
  password: '',
  name: '',
  passwordConfirmation: '',
})

onMounted(async () => {
  id.value = Number(route.params.id)
  if ((id.value !== null && id?.value > 0)) user.value = await apiGet(`users/${id.value}`)
})

const passVerify = computed(() => user.value.password === user.value.passwordConfirmation)
const title = computed(() => (id.value !== null && id?.value > 0) ? 'Edit User' : 'New User')

async function __save() {
  loadingReq.value = true
  const response = (id.value !== null && id?.value > 0)
    ? await apiPut(`users/${id.value}`, user.value)
    : await apiPost('users', user.value)
  if (response) {
    await alertSuccess()
    await __goBack()
  }
  loadingReq.value = false
}

async function __goBack() {
  await router.push({ name: 'users' })
}

</script>
<template>
  <m-card :title="title">
    <form @submit.prevent="(__save())">
      <div>
        <m-input label="Name" v-model="user.name" required />
        <m-input label="E-mail" type="email" v-model="user.email" required />
        <m-input v-if="!id" label="Password" type="password" v-model="user.password" required />
        <m-input v-if="!id" label="Confirm Password" type="password" v-model="user.passwordConfirmation" required />
        <span v-if="!passVerify && !id" id="error">The passwords does not match!</span>
      </div>
      <div class="buttons">
        <m-button type="submit" label="Save" :loading="loadingReq" />
        <m-button type="button" label="Cancel" :disabled="loadingReq" @click="__goBack()" />
      </div>
    </form>
  </m-card>
</template>
<style lang="scss" scoped>
form {
  width: 100%;
  height: 100%;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
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

.buttons {
  margin-top: 20px;
}
</style>