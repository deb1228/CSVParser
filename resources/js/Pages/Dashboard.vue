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
          <div @click="submit" class="flex gap-3  items-center px-10 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer " >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 animate-bounce" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M13 2.03c4.73.47 8.5 4.22 8.95 8.97A9.976 9.976 0 0 1 13 21.93v-2c3.64-.43 6.5-3.32 6.96-6.96A7.994 7.994 0 0 0 13 4.05V2.03m-2 .03v2c-1.43.2-2.78.78-3.9 1.68L5.67 4.26A9.827 9.827 0 0 1 11 2.06M4.26 5.67L5.69 7.1A8.017 8.017 0 0 0 4.05 11h-2c.2-1.96.95-3.81 2.21-5.33M2.06 13h2c.18 1.42.75 2.77 1.63 3.9l-1.42 1.43A10.04 10.04 0 0 1 2.06 13m5.04 5.37c1.13.88 2.48 1.45 3.9 1.63v2c-1.96-.21-3.82-1-5.33-2.26l1.43-1.37M12 7.5L7.5 12H11v4h2v-4h3.5L12 7.5Z"/></svg>
            Submit</div>
        </div>
       

        
    </div>
</div>

  </AppLayout>
</template>
