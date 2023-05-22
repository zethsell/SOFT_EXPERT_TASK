<script lang="ts" setup>
import MUpBar from '@/components/bars/MUpBar.vue';

</script>
<template>
  <header>
    <m-up-bar />
  </header>
  <main>
    <router-view />
  </main>
</template>

<style scoped lang="scss">
main {
  height: 75%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  overflow: hidden;
}
</style>