<script lang="ts" setup>
import { PropType, ref, onMounted } from 'vue';
import { apiGet } from '@/api/fetch'

const options = ref<Array<{ id: number, description: string }>>([])

const props = withDefaults(defineProps<{
  label: string
  type?: 'text' | 'password' | 'email' | 'number'
  required: boolean,
  modelValue: any
  endpoint: string
  returnObject?: boolean
}>(), {
  type: 'text',
  modelValue: '',
  required: false,
  returnObject: false
})
onMounted(async () => {
  await loadOptions()
})

async function loadOptions() {
  options.value = await apiGet(props.endpoint)
}

const emit = defineEmits(['update:modelValue'])

function updateValue(event: Event) {
  const target = event.target as HTMLInputElement
  (props.returnObject)
    ? emit('update:modelValue', options.value.find(option => option.id === Number(target.value)))
    : emit('update:modelValue', target.value.trim())
}

</script>
<template>
  <div id="select-wrapper">
    <label>{{ props.label }}</label>
    <select :required="props.required" @input="updateValue"
      :value="returnObject ? props.modelValue?.id : props.modelValue">
      <option v-for="(opt, index) in options" :key="index" :value="opt.id">
        {{ opt.description }}
      </option>
    </select>
  </div>
</template>
<style lang="scss" scoped>
#select-wrapper {
  margin: 10px 0;

  select {
    border: 1px solid #ccc;
    border-radius: 2px;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 40px;
    outline: 0;
  }

}
</style>
