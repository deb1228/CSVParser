<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm, } from '@inertiajs/inertia-vue3';

// form for File Upload
const form = useForm({
  file_target: '',
})

// 1. Variable for File
const file = ref(null)

// Function to notify file change
const updateFile = () => {
  form.file_target = file.value.files[0]
  console.log(form.file_target)
}
// Function to submit
const submit = () => {
  form.post(route('file.upload'),{
    forceFormData: true,
    onError: (error) => console.log(error)
  })
}
</script>

<template>
  <AppLayout>
   <!-- Content -->
   <div class="flex justify-center  w-full  h-16 ">
    <div class="flex flex-col  gap-16 w-full max-w-[72rem] min-w-[42rem]">
        <div class="flex flex-col items-start w-50">
          <span class="text-8xl text-start font-bold mt-10">Upload Your </span>
          <span class="text-8xl text-start font-bold mb-5"> File Below </span>

          <p>Select a file and when done click on the submit button below.</p>
        </div>
        <form class="flex  items-center space-x-6 my-12 bg-white shadow-xl p-5 max-w-[32rem] rounded-full self-center ">
            <div class="shrink-0">
            </div>
            <label class="block ">
                <span class="sr-only">Choose file photo</span>
                <input ref="file" @change="updateFile" type="file" class="block w-full border-black text-sm text-slate-500
                file:mr-4 file:py-2 file:px-8
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-pink-50 file:text-pink-700
                hover:file:bg-pink-100
                w-max-[12rem]
                "/>
            </label>
        </form>
        <div class="w-60 min-h-[20rem] self-end ">
          <!-- <FileUploadInput v-model="form.file_target" /> -->
          <div class="px-7 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer" @click="submit">Submit</div>
        </div>
       

        
    </div>
</div>

  </AppLayout>
</template>
