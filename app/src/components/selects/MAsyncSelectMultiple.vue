<script lang="ts" setup>
import { ref, onMounted } from 'vue';
import { apiGet } from '@/api/fetch'

const options = ref<Array<{ id: number, description: string }>>([])
const optionsSelected = ref<Array<{ id: number, description: string }>>([])
const selected = ref(0)
const props = withDefaults(defineProps<{
  label: string
  type?: 'text' | 'password' | 'email' | 'number'
  required: boolean,
  modelValue: Array<any>
  endpoint: string
}>(), {
  type: 'text',
  modelValue: [] as any,
  required: false,
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
  selected.value = Number(target.value)
}

function __add() {
  optionsSelected.value.push(options.value.find(option => option?.id === selected.value)!)
  options.value = options.value.filter(option => option?.id !== selected.value)
  selected.value = 0
  emit('update:modelValue', optionsSelected.value)
}

function __undo(id: number) {
  options.value.push(optionsSelected.value.find(option => option?.id === id)!)
  optionsSelected.value = optionsSelected.value.filter(option => option?.id !== id)
  emit('update:modelValue', optionsSelected.value)
}

</script>
<template>
  <div id="select-wrapper">
    <label>{{ props.label }}</label>
    <div id="div-select">
      <select @input="updateValue" :value="selected">
        <option value="0" />
        <option v-for="(opt, index) in options" :key="index" :value="opt.id">
          {{ opt.description }}
        </option>
      </select>
      <button type="button" @click="(__add())" :disabled="selected === 0">
        <fa-icon :icon="['fas', 'fa-add']" />
      </button>
    </div>
    <div id="div-list" v-if="optionsSelected.length > 0">
      <div v-for="(opt, index) in optionsSelected" :key="index">
        <span>{{ opt.id }}</span>
        <span>{{ opt.description }}</span>
        <button type="button">
          <fa-icon :icon="['fas', 'fa-undo-alt']" @click="(__undo(opt.id))" />
        </button>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
#select-wrapper {
  margin: 10px 0;

  #div-select {
    display: flex;

    select {
      border: 1px solid #ccc;
      border-radius: 2px;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 40px;
      outline: 0;
      margin-right: 10px;
    }

    button {
      color: green;
      width: 40px;
      height: 40px;
    }
  }

  #div-list {
    border: 1px solid #ccc;
    padding: 5px;
    margin-top: 10px;
    width: 100%;
    display: flex;
    flex-direction: column;


    div {
      border-top: 1px solid #ccc;
      margin-top: 2px;
      height: 35px;
      display: flex;
      width: 100%;
      justify-content: space-between;
      align-items: center;

      span {
        display: flex;
        float: right;
      }

      button {
        color: red;
        padding: 5px;
      }

    }


  }
}
</style>
