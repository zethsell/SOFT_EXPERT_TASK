<script lang="ts" setup>
import MIconButton from '@/components/buttons/MIconButton.vue'
import { apiGet, apiDelete } from '@/api/fetch';
import type { TaxInformation } from '@/models';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const taxs = ref<TaxInformation[]>()
const loadingReq = ref(false)
const router = useRouter()

onMounted(async () => {
  await __list()
})

async function __list() {
  loadingReq.value = true
  taxs.value = await apiGet('taxes')
  loadingReq.value = true
}

async function __create() {
  await router.push({ name: 'tax-manager' })
}

async function __edit(id: number) {
  await router.push({ name: 'tax-manager', params: { id } })
}

function __delete(id: number) {
  void apiDelete(`taxs/${id}`)
  taxs.value = taxs.value?.filter(tax => tax.id !== id)
}
</script>
<template>
  <div id="container">
    <div id="header">
      <h2>Taxes</h2>
      <button @click="__create()">New</button>
    </div>
    <div id="list_container">
      <div id="list_item_header">
        <strong>ID</strong>
        <strong>Description</strong>
        <strong>Value</strong>
        <strong>Actions</strong>
      </div>
      <div id="list_item_line" v-for="(tax, index) in taxs" :key="index">
        <div class="item">
          <span>{{ tax.id }}</span>
        </div>
        <div class="item">
          <span>{{ tax.description }}</span>
        </div>
        <div class="item">
          <span>{{ tax.value }}%</span>
        </div>
        <div class=" item buttons">
          <m-icon-button class="text-blue-400 w-10 h-10" @click="__edit(tax.id)">
            <fa-icon :icon="['fas', 'pencil-alt']" />
          </m-icon-button>
          <m-icon-button class="text-red-700 w-10 h-10" @click="__delete(tax.id)">
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
        width: calc(((100%) - 80px)/2);
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
        width: calc(((100%) - 80px)/2);
      }

      .buttons {
        width: 80px;
        justify-content: space-evenly;
      }
    }
  }
}
</style>