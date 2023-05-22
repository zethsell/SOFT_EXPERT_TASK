<script lang="ts" setup>
import MIconButton from '@/components/buttons/MIconButton.vue'
import { apiGet, apiDelete } from '@/api/fetch';
import type { ProductTypeInformation } from '@/models';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()
const types = ref<ProductTypeInformation[]>()
const loadingReq = ref(false)

onMounted(async () => {
  await __list()
})

async function __list() {
  loadingReq.value = true
  types.value = await apiGet('product-type')
  loadingReq.value = true
}

async function __create() {
  await router.push({ name: 'product-type-manager' })
}

async function __edit(id: number) {
  await router.push({ name: 'product-type-manager', params: { id } })
}


function __delete(id: number) {
  void apiDelete(`product-type/${id}`)
  types.value = types.value?.filter(type => type.id !== id)
}
</script>
<template>
  <div id="container">
    <div id="header">
      <h2>Product Types</h2>
      <button @click="__create()">New</button>
    </div>
    <div id="list_container">
      <div id="list_item_header">
        <strong>ID</strong>
        <strong>Description</strong>
        <strong>Actions</strong>
      </div>
      <div id="list_item_line" v-for="(type, index) in types" :key="index">
        <div class="item">
          <span>{{ type.id }}</span>
        </div>
        <div class="item">
          <span>{{ type.description }}</span>
        </div>
        <div class=" item buttons">
          <m-icon-button class="text-blue-400 w-10 h-10" @click="__edit(type.id)">
            <fa-icon :icon="['fas', 'pencil-alt']" />
          </m-icon-button>
          <m-icon-button class="text-red-700 w-10 h-10" @click="__delete(type.id)">
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