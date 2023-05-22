<script lang="ts" setup>

const props = defineProps<{
  title: string
}>()

</script>
<template>
  <div id="card">
    <div id="wrapper">
      <h1>{{ props.title }}</h1>
      <slot />
    </div>
  </div>
</template>
<style lang="scss" scoped>
#card {
  background-color: #FFFFFF;
  max-width: 500px;
  min-height: 500px;
  width: 100%;
  height: 100%;
  border-radius: 5px;
  display: flex;
  align-items: center;
  flex-direction: column;
  padding: 15px 0;

  #wrapper {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}
</style>