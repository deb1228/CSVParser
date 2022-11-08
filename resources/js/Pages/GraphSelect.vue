<script>
        import{defineComponent} from 'vue'
        import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

        export default defineComponent({
            name: "GraphSelect",
            setup() { },
            data(){
                return {
                    form: useForm({
                        options: {
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            grid: {
                                show: false,
                            },
                            xaxis: {
                                categories: Object.keys(this.series[0].data)
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy HH:mm'
                                },
                            },
                        },
                        series: this.series,
                    })
                    
                }
            },
            props:{
                series: Object,
            },
            methods:{
                submit(){
                    this.form.post(route('graph.presentation'))
                }
            },
            components: { AppLayout }
        })
        
</script>

<template>
       <AppLayout>
       
            <div class="flex flex-col items-center grow w-full h-full">
                <div class="flex w-full">
                    <div class="flex flex-col ml-20 items-start w-full self-start">
                        <span class="text-8xl text-start font-bold mt-10">We're ready to  </span>                     
                        <span class="text-8xl text-start font-bold mb-5"> pick a GRAPH. </span>
                            <p>Select the type of graph or chart you want the system to create.</p>
                    </div>
                    <div class="w-60 min-h-[20rem] mt-10 pr-20 ">
                        <div class="px-7 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer" >NEXT</div>
                    </div>
                </div>               
                <div class="grid grid-cols-3 w-[56rem] gap-5 w-">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/line.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/stock.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/donut.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/side-by-side-bar.png" alt="" srcset="">
                    <img @click="submit()" class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/spline.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/heatmap.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/frequency.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/overlap-column.png" alt="" srcset="">
                    <img class="cursor-pointer hover:scale-125 transition-all duration-150 ease-in-out" src="http://localhost:8000/storage/radar.png" alt="" srcset="">
                </div>   
            </div> 
             
       </AppLayout>
</template>