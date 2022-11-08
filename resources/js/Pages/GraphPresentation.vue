<script>
        import{defineComponent} from 'vue'
        import AppLayout from '@/Layouts/AppLayout.vue';
        import VueApexCharts from 'vue3-apexcharts'
        import { Link } from '@inertiajs/inertia-vue3'

        export default defineComponent({
    name: "DataSet",
    setup() { },
    props: {
        options: Object,
        series: Object,
    },
    components: { AppLayout, VueApexCharts, Link },
})
        
</script>

<template>
       <AppLayout>
             <div class="relative flex flex-col  grow w-full h-full">
                <div class="flex">
                        <div class="flex flex-col ml-20 items-start w-full self-start">
                                <span class="text-6xl text-start font-bold mt-10">Here is your </span>                     
                                <span class="text-5xl text-start font-bold mb-5"> Graph. </span>
                                
                        </div>
                        <Link :href="route('dashboard')">
                                <div class="w-60 min-h-[20rem] mt-10 pr-20 ">
                                    <div class="px-7 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer" >back to Dashboard</div>
                                </div>  
                        </Link>  
                </div>               
                <div class="absolute right-10 bottom-0 flex justify-end p-12 w-full ">
                        <VueApexCharts :options="options" :series="series" height="400" width="750" type="area"></VueApexCharts>
                </div>
             </div> 
             
       </AppLayout>
</template>