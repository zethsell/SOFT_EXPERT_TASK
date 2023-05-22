<template>
  <button>
    <slot />
  </button>
</template>
<style scoped lang="scss">
button {
  margin: 1px;
  height: 30px;
  width: 30px;
  background-color: transparent;
  border: 1px solid gray;
  border-radius: 2px;

  &:hover {
    cursor: pointer;
    background-color: #a9a9a9;
  }
}
</style>
