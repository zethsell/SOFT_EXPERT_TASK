
<script lang="ts" setup>

const props = withDefaults(defineProps<{
  label: string
  type?: 'button' | 'submit'
  loading: boolean
}>(), {
  type: 'button',
  loading: false,
})
</script>
<template>
  <button :type="props.type" :disabled="loading">
    <span v-if="!loading">{{ props.label }} </span>
    <fa-icon v-else :icon="['fas', 'spinner']" class="fa-spin" />
  </button>
</template>
<style lang="scss" scoped>
button {
  width: 100%;
  height: 35px;
  border: 1px solid #ccc;
  border-radius: 2px;
  margin: 5px 0;
  background-color: #6082B6;
  color: #FFFFFF;
  font-weight: bold;
  font-size: 16px;

  &:hover {
    background-color: #7393B3;
    cursor: pointer;
  }
}
</style>