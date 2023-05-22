<script setup lang="ts">
import { useLoginStore } from '@/stores/login';
import { useRouter } from 'vue-router';

const loginStore = useLoginStore()

async function redirect(to = 'logout') {
  if (to === 'logout') {
    loginStore.signOutUser()
  }
  await useRouter().push({ name: to })
}
</script>
<template>
  <nav>
    <div>
      <fa-icon id="icon" :icon="['fas', 'fa-home']" @click="redirect('home')" />
      <router-link :to="{ name: 'new-sell' }">PDV</router-link>
      <router-link :to="{ name: 'sells' }">Sell</router-link>
      <router-link :to="{ name: 'products' }">Products</router-link>
      <router-link :to="{ name: 'product-types' }">Product Type</router-link>
      <router-link :to="{ name: 'taxes' }">Taxes</router-link>
      <router-link :to="{ name: 'users' }">Users</router-link>
      <router-link to="#" @click="redirect()">Logout</router-link>
    </div>
  </nav>
</template>
<style scoped lang="scss">
nav {
  background-color: #6082B6;
  height: 60px;
  justify-content: center;
  align-items: center;
  display: flex;
  width: 100%;
  border-bottom: 2px solid navy;
  padding: 10px 0;

  div {
    display: flex;
    column-gap: 5px;
    align-items: center;
    justify-content: center;
    width: 972px;

    #icon {
      margin-right: 20px;
      color: #FFFFFF;
    }

    a {
      text-decoration: none;
      text-align: center;
      font-size: 14px;
      font-weight: bold;
      line-height: 10px;
      color: #FFFFFF;
      border-right: 2px solid #aaaaaa;
      border-left: 2px solid transparent;
      width: 120px;
    }

    a:nth-child(2) {
      border-left: 2px solid #aaaaaa;
    }

    a:nth-last-child(1) {
      border: 0;
    }

    a:hover {
      color: #aaaaaa;
    }

    #icon:hover {
      color: #aaaaaa;
      cursor: pointer;
    }
  }


}
</style>