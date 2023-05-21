<script lang="ts" setup>
import { computed, ref } from 'vue';

const props = withDefaults(defineProps<{
  label: string
  type?: 'text' | 'password' | 'email'
  required: boolean,
  modelValue: string
}>(), {
  type: 'text',
  modelValue: '',
  required: false
})

const emit = defineEmits(['update:modelValue'])
const show = ref(false)
const icon = computed(() => show.value
  ? 'fa-eye-slash'
  : 'fa-eye'
)

function updateValue(event: Event) {
  const target = event.target as HTMLInputElement
  emit('update:modelValue', target.value.trim())
}

</script>
<template>
  <div id="input-wrapper">
    <label>{{ props.label }}</label>
    <div>
      <input :type="!show ? props.type : 'text'" :required="props.required" @change="updateValue"
        :value="props.modelValue" />
      <fa-icon id="icon" @click="show = !show" v-if="props.type === 'password'" :icon="['fas', icon]" />
    </div>
  </div>
</template>
<style lang="scss" scoped>
#input-wrapper {
  margin: 10px 0;

  div {
    border: 1px solid #ccc;
    border-radius: 2px;
    display: flex;
    justify-content: center;
    align-items: center;

    input {
      padding: 5px;
      width: 100%;
      height: 35px;
      border: 0;
      outline: 0;
    }

    #icon {
      background-color: transparent;
      border: 0;
      width: 30px;
      color: #A9A9A9;

      &:hover {
        cursor: pointer;
      }
    }
  }
}
</style>