<script setup lang="ts">
import MCard from '@/components/cards/MCard.vue'
import MButton from '@/components/auth/ButtonAuth.vue'
import MInput from "@/components/inputs/MInput.vue"
import MAsyncSelect from "@/components/selects/MAsyncSelect.vue"
import { ref, computed, onMounted } from 'vue'
import { apiPost, apiPut, apiGet } from '@/api/fetch'
import type { ProductRegister } from '@/models'
import { useRoute, useRouter } from 'vue-router'
import { alertSuccess } from '@/helpers'

const route = useRoute()
const router = useRouter()
const id = ref<number | null>(null)
const loadingReq = ref(false)
const product = ref<ProductRegister>({
  description: '',
  value: 0
})

onMounted(async () => {
  id.value = Number(route.params.id)
  if ((id.value !== null && id?.value > 0)) product.value = await apiGet(`products/${id.value}`)
})

const title = computed(() => (id.value !== null && id?.value > 0) ? 'Edit Product' : 'New Product')

async function __save() {
  loadingReq.value = true
  const response = (id.value !== null && id?.value > 0)
    ? await apiPut(`products/${id.value}`, product.value)
    : await apiPost('products', product.value)
  if (response) {
    await alertSuccess()
    await __goBack()
  }
  loadingReq.value = false
}

async function __goBack() {
  await router.push({ name: 'products' })
}

</script>
<template>
  <m-card :title="title">
    <form @submit.prevent="(__save())">
      <div>
        <m-input label="Description" v-model="product.description" required />
        <m-input label="Value" type="number" v-model="product.value" required />
        <m-async-select label="Type" v-model="product.type_id" required endpoint="product-type" />
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