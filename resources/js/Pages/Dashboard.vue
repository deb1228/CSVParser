<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
  <AppLayout>
   <!-- Content -->
   <div class="flex justify-center  w-full  h-16 ">
    <div class="flex flex-col items-center gap-5 w-full max-w-[72rem] min-w-[42rem]">
        <span class="text-7xl font-bold my-5">Ticket Check</span>
        <p>Upload and convert violation data to analyze and graph.</p>
        <form class="flex items-center space-x-6 my-12 bg-white shadow-xl p-5 rounded-xl">
            <div class="shrink-0">
            </div>
            <label class="block">
                <span class="sr-only">Choose profile photo</span>
                <input type="file" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-pink-50 file:text-pink-700
                hover:file:bg-pink-100
                "/>
            </label>
        </form>
        <form>
               <label class="block">
                  <span class="block text-xl font-medium text-slate-700">Name:
                  </span>
               </label>
         </form>
     <label class="relative block">
              <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
              <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
            </span>
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Last name,First name M.I" type="text" name="search"/>
      </label>
        <form>
            <label class="block">
              <span class="block text-xl font-medium text-slate-700">Total Issued Ticket:
              </span>
         </label>
        </form>
    <label class="relative block">
<span class="sr-only">Search</span>
<span class="absolute inset-y-0 left-0 flex items-center pl-2">
<svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
</span>
<input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="000-000-000" type="text" name="search"/>
</label>
<form>
          <label class="block">
      <span class="block text-xl font-medium text-slate-700">Smoke Free Violation:
      </span>
         </label>
    </form>
    <label class="relative block">
<span class="sr-only">Search</span>
<span class="absolute inset-y-0 left-0 flex items-center pl-2">
<svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
</span>
<input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="000-000-000" type="text" name="search"/>
</label>
<form>
          <label class="block">
      <span class="block text-xl font-medium text-slate-700">Anti-Road Obstruction Violation:
      </span>
         </label>
    </form>
    <label class="relative block">
<span class="sr-only">Search</span>
<span class="absolute inset-y-0 left-0 flex items-center pl-2">
<svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
</span>
<input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="000-000-000" type="text" name="search"/>
</label>

<button class="px-4 py-1 text-xl text-pink-600 font-semibold rounded-full border border-pink-200 hover:text-white hover:bg-pink-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-sky-600 focus:ring-offset-2">Enter</button>

        <span class="text-4xl font-bold my-5 text-slate-800">Output</span>
        <div class="bg-pink-200 items-center shadow-xl rounded-xl p-10 min-h-[42rem]  max-w-[92rem] w-[64rem] mb-12">
        <div class="flex flex-col items-center my-40 bg-pink-200">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
                <div class="text-2xl font-bold"> Processing...
                </div> 
        </div>
        </div>
    </div>
</div>

  </AppLayout>
</template>
