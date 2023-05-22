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
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding: 20px;
  overflow: hidden;
}
</style>