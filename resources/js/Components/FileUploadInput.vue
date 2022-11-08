<script setup>
import { onMounted } from "vue";
import { create, registerPlugin } from "filepond";

import 'filepond/dist/filepond.min.css';
const props = defineProps({
  id: {
    type: String,
    default: 'filepod_' + Math.floor(Math.random() * 100) + 1
  },
  labelIdle: {
    default: 'Drag and drop files here.',
    type: String
  }
})
const emit = defineEmits(['update:modelValue'])
onMounted(() => {
  const fileInput = document.querySelector('#' + props.id);
  const pond = create(fileInput, {
    storeAsFile: true,
    dropOnPage: true,
    allowMultiple: true,
    credits: null,
    labelIdle: props.labelIdle,
  });
  pond.on('updatefiles', (files) => {
    emit(
      'update:modelValue',
      files.map(function (filepond) {

        return filepond.file
      })
    )
  });
})
</script>

<template>
  <input :id="id" type="file">
</template>

<style scoped>
</style>