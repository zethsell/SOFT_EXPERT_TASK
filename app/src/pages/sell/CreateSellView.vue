<script lang="ts" setup>
import MIconButton from '@/components/buttons/MIconButton.vue'
import type { Detail } from '@/models';
import { ref, computed } from 'vue';
import { alertError, alertSuccess, alertCancelSell } from '@/helpers'
import MInput from "@/components/inputs/MInput.vue"
import MAsyncSelect from "@/components/selects/MAsyncSelect.vue"
import MButton from '@/components/auth/ButtonAuth.vue'
import type { ProductInformation } from '@/models';
import { apiPost } from '@/api/fetch'

type LocalProduct = ProductInformation & { quantity: number }

// const sells = ref<SellRegister>({ product: 0 })
const product = ref<LocalProduct>({ quantity: 0 })
const details = ref<Detail[]>([])
const loadingReq = ref(false)

async function __add(pdct: LocalProduct) {

  if (pdct?.id === undefined) {
    await alertError('Error', 'You must select a product!')
    return
  }
  if (pdct?.quantity === undefined || pdct?.quantity === 0) {
    await alertError('Error', 'The quantity value must be valid!')
    return
  }
  const toAdd = {
    product_id: Number(pdct.id),
    value: Number(pdct.value),
    quantity: Number(pdct.quantity),
    description: pdct.description,
    tax: calcProductTaxes(pdct)
  }
  details.value.push(toAdd as any)
  product.value = { quantity: 0 }
}

function __remove(index: number): void {
  details.value = details.value.filter((_, idx) => idx !== index)
}

function calcProductTaxes(pdct: LocalProduct) {
  const totalTaxes = pdct.product_type?.taxes.map(tax => Number(tax.value)).reduce((a, b) => (a + b), 0) ?? 1
  return ((Number(pdct.value) / 100) * totalTaxes)
}

const subtotal = computed(() => details.value.map(detail => Number(detail.value) * Number(detail.quantity)).reduce((a, b) => (a + b), 0))
const taxes = computed(() => details.value.map(detail => Number(detail.tax) * Number(detail.quantity)).reduce((a, b) => (a + b), 0))

async function __save() {
  loadingReq.value = true

  const response = await apiPost('sells', { details: details.value })
  if (response) {
    await alertSuccess()
    __clean()
  }
  loadingReq.value = false
}

function __clean() {
  details.value = []
  product.value = { quantity: 0 }
}

async function __cancel() {
  const response = await alertCancelSell()
  if (response) __clean()
}

</script>
<template>
  <div id="container">
    <div id="list_container">
      <div id="list_item_header">
        <strong>Product ID</strong>
        <strong>Description</strong>
        <strong>Qty</strong>
        <strong>Taxes</strong>
        <strong>Value</strong>
        <strong>Total</strong>
        <strong>Discard</strong>
      </div>
      <div id="list_item_line" v-for="(detail, index) in details" :key="index">
        <div class="item">
          <span>{{ detail.product_id }}</span>
        </div>
        <div class="item">
          <span> {{ detail.description }}</span>
        </div>
        <div class="item">
          <span> {{ detail.quantity }}</span>
        </div>
        <div class="item">
          <span>{{ (Number(detail.tax) * Number(detail.quantity)).toFixed(2) }}</span>
        </div>
        <div class="item">
          <span>{{ (Number(detail.value) * Number(detail.quantity)).toFixed(2) }}</span>
        </div>
        <div class="item">
          <span>{{ ((Number(detail.value) + Number(detail.tax)) * Number(detail.quantity)).toFixed(2) }}</span>
        </div>
        <div class=" item buttons">
          <m-icon-button class="text-red-700 w-10 h-10">
            <fa-icon :icon="['fas', 'trash']" @click="__remove(index)" />
          </m-icon-button>
        </div>
      </div>
    </div>
    <div id="action_container">
      <div id="list_item_header">
        <strong>Action</strong>
      </div>
      <div id="action_content">
        <div id="action_fields">
          <m-async-select label="Product" v-model="product" return-object endpoint="products" />
          <m-input label="Quantity" type="number" v-model="product.quantity" />
          <m-input label="Unit. Price" ype="number" :model-value="product!.value" disabled />
          <m-button type="button" label="Add" :disabled="!product" @click="__add(product!)" />
        </div>
        <div id="total_fields">
          <m-input label="Subtotal" :model-value="(subtotal).toFixed(2)" readonly />
          <m-input label="Taxes" :model-value="(taxes).toFixed(2)" readonly />
          <m-input label="Total" :model-value="(taxes + subtotal).toFixed(2)" readonly />
        </div>
        <div id="action_buttons">
          <m-button type="button" label="Save" :loading="loadingReq" @click="__save()" :disabled="details.length === 0" />
          <m-button type="button" label="Cancel" @click="__cancel()" :disabled="details.length === 0" />
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
#container {
  width: 1200px;
  min-width: 600px;
  display: flex;
  justify-content: center;
  align-self: center;

  #action_container {
    min-height: 75vh;
    border: 1px solid #a9a9a9;
    background-color: #ffffff;
    border-radius: 0 5px 5px 0;
    width: 20%;
    display: flex;
    flex-direction: column;


    #list_item_header {
      height: 45px;
      display: flex;
      justify-content: center;
      align-items: center;
      width: auto;
      border-bottom: 3px solid gray;
      margin: 0 10px;
    }

    #action_content {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;

      #action_fields {
        padding: 10px;
      }

      #total_fields {
        color: white;
        font-weight: bold;
        padding: 10px;
        background-color: #6082B6;
      }

      #action_buttons {
        padding: 10px;
      }
    }
  }


  #list_container {
    border: 1px solid #a9a9a9;
    padding-bottom: 10px;
    min-height: 75vh;
    background-color: #ffffff;
    border-radius: 5px 0 0 5px;
    width: 80%;

    #list_item_header {
      height: 45px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: auto;
      margin: 0 10px;
      border-bottom: 3px solid gray;

      strong {
        width: calc(((100%) - 80px)/7);
      }

      strong:nth-last-child(1) {
        width: 70px;
      }
    }

    #list_item_line {
      height: 45px;
      display: flex;
      align-items: center;
      width: auto;
      margin: 0 10px;
      border-bottom: 1px solid gray;

      .item {
        display: flex;
        align-items: start;
        justify-content: flex-start;
        width: calc(((100%) - 80px)/3);
      }

      .buttons {
        width: 80px;
        justify-content: flex-end;
      }
    }
  }
}
</style>