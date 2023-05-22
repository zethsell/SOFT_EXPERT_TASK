<script setup lang="ts">
import MCard from '@/components/cards/MCard.vue'
import MButton from '@/components/auth/ButtonAuth.vue'
import MInput from "@/components/inputs/MInput.vue"
import { ref, computed, onMounted } from 'vue'
import { apiPost, apiPut, apiGet } from '@/api/fetch'
import type { ProductTypeRegister } from '@/models'
import { useRoute, useRouter } from 'vue-router'
import { alertSuccess } from '@/helpers'
import MAsyncSelectMultiple from "@/components/selects/MAsyncSelectMultiple.vue"

const route = useRoute()
const router = useRouter()
const id = ref<number | null>(null)
const loadingReq = ref(false)
const type = ref<ProductTypeRegister>({
  description: '',
  taxes: []
})

onMounted(async () => {
  id.value = Number(route.params.id)
  if ((id.value !== null && id?.value > 0)) type.value = await apiGet(`product-type/${id.value}`)
})

const title = computed(() => (id.value !== null && id?.value > 0) ? 'Edit Product Type' : 'New Product Type')

async function __save() {
  loadingReq.value = true
  const newTaxes = type.value.taxes.map(tax => ({ 'tax_id': tax.id }))
  const toSave = type.value
  toSave.taxes = newTaxes as any
  console.log(toSave)

  const response = (id.value !== null && id?.value > 0)
    ? await apiPut(`product-type/${id.value}`, toSave)
    : await apiPost('product-type', toSave)
  if (response) {
    await alertSuccess()
    await __goBack()
  }
  loadingReq.value = false
}

async function __goBack() {
  await router.push({ name: 'product-types' })
}

</script>
<template>
  <m-card :title="title">
    <form @submit.prevent="(__save())">
      <div>
        <m-input label="Description" v-model="type.description" required />
        <m-async-select-multiple label="Taxes" v-model="type.taxes" required endpoint="taxes" />
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