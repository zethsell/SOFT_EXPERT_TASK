<script lang="ts" setup>
import MIconButton from '@/components/buttons/MIconButton.vue'
import { apiGet, apiDelete } from '@/api/fetch';
import type { SellInformation, Detail } from '@/models';
import { ref, onMounted } from 'vue';
import { convertDate } from '@/helpers'

const sells = ref<SellInformation[]>()
const loadingReq = ref(false)

onMounted(async () => {
  await __list()
})

async function __list() {
  loadingReq.value = true
  sells.value = await apiGet('sells')
  loadingReq.value = true
}

function sumValue(details: Detail[]) {
  const value = details.map(detail => (detail.value + Number(detail.tax)) * detail.quantity).reduce((a, b) => (a + b), 0)
  return value.toFixed(2)
}

function __delete(id: number) {
  void apiDelete(`sells/${id}`)
  sells.value = sells.value?.filter(sell => sell.id !== id)
}
</script>
<template>
  <div id="container">
    <div id="header">
      <h2>Sells</h2>
    </div>
    <div id="list_container">
      <div id="list_item_header">
        <strong>Sell Date</strong>
        <strong>Products Qty</strong>
        <strong>Total</strong>
        <strong>Action</strong>
      </div>
      <div id="list_item_line" v-for="(sell, index) in sells" :key="index">
        <div class="item">
          <span>{{ convertDate(sell.created_at) }}</span>
        </div>
        <div class="item">
          <span>{{ sell.details.length }} units</span>
        </div>
        <div class="item">
          <span>US$ {{ sumValue(sell.details) }}</span>
        </div>
        <div class=" item buttons">
          <m-icon-button class="text-red-700 w-10 h-10" @click="__delete(sell.id)">
            <fa-icon :icon="['fas', 'trash']" />
          </m-icon-button>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped lang="scss">
#container {
  width: 972px;
  display: flex;
  justify-content: center;
  flex-direction: column;
  align-self: center;

  #header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;

    button {
      background-color: #6082B6;
      color: #FFFFFF;
      font-weight: bold;
      border: 0;
      width: 80px;
      border-radius: 3px;

      &:hover {
        background-color: #7393B3;

        cursor: pointer;
      }
    }
  }

  #list_container {
    border: 1px solid #a9a9a9;
    padding-bottom: 10px;
    min-height: 75vh;
    background-color: #ffffff;
    border-radius: 5px;

    #list_item_header {
      height: 45px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: auto;
      margin: 0 10px;
      border-bottom: 3px solid gray;

      strong {
        width: calc(((100%) - 80px)/3);
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