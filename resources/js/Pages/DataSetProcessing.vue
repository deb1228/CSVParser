<script setup>
import{ref, onMounted} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/inertia-vue3';


const props = defineProps({
    read_target: String,
})

let tableContent = ref(null);
let tableColumns = ref(null);
let selectedColumns = ref([]);

let form = useForm({
    series: []
})

onMounted(() => {
    const content = atob(props.read_target).split("\r\n")
    tableColumns.value = content[0].split(','); 
    const temp = atob(props.read_target).split("\r\n")
    // console.log(atob(content))
    for (let i in temp) {
        temp[i] = temp[i].split(",");
    }

    let data = [];
    for (let j=1; j<temp.length; j++) {
        let dataEntry = {} 
        for (let i in temp[0]) {
            if(dataEntry[temp[0][i]] != "" &&  temp[j][i] != ""){
                dataEntry[temp[0][i]] = temp[j][i];
            }
        }
        data.push(dataEntry)   
    }
      
    tableContent.value = data
    console.log('Columns:')
    console.log(selectedColumns.value.includes('Employee Id'))
})

const toggleColumn = (target) => {
    if(selectedColumns.value.includes(target)){
        selectedColumns.value.splice(selectedColumns.value.indexOf(target), 1)
    }else{
        selectedColumns.value.push(target);
    }
}

const getColumnData = (target) => {
    for(let i = 0; i<target.length; i++){
        let series = {
            name: target[i],
            data: tableContent.value.map(a =>{
                if(!isNaN(a[target[i]])){
                    return parseInt(a[target[i]])
                }else{
                    return a[target[i]]
                }
            })
        }
        form.series.push(series)
    }
}

const submit = () => {
    if(selectedColumns != []){
        getColumnData(selectedColumns)
        form.post(route('chart.select'))
    }
}
</script>

<template>
       <AppLayout>
             <div class="flex flex-col  grow w-full h-full">
                <div class="flex">
                        <div class="flex flex-col ml-20 items-start w-full self-start">
                                <span class="text-6xl text-start font-black mt-10" @click="readFile">We've Processed </span>                     
                                <span class="text-5xl text-start font-black mb-5"> your data. </span>
                                 <p>First, select the columns you want the system to interpret by clicking the text in the header.</p>
                                 <p>Then, press the CONFIRM button.</p>
                                 <p>Lastly, press the NEXT button to continue.</p>
                                <div class="flex mt-5 justify-between">
                                    <span>Selected Columns:</span>

                                </div>
                                <div class="flex gap-5 ">
                                    <span v-for="column in selectedColumns" class="bg-pink-200 rounded-full shadow px-3 py-1 font-semibold">
                                        {{column}}
                                    </span>
                                </div>
                        </div>
                        <div class="w-70 min-h-[16rem] gap-5 mt-20 pr-20 ">
                            <span @click="getColumnData(selectedColumns)" class="flex gap-3  items-center px-10 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-pulse " preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312V4.002Z"/> </svg>
                                confirm</span>

                            <div @click="submit" class="flex gap-3  items-center px-10 py-5 font-bold uppercase text-lg rounded bg-pink-200 mt-6  hover:bg-pink-600 text-pink-800 text-center cursor-pointer " >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 animate-pulse " preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><path fill="currentColor" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306c.756 0 1.313.492 1.313 1.236c0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22l.096-.107c.688-.763 1.287-1.428 1.287-2.43c0-1.266-1.031-2.215-2.613-2.215c-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z"/></svg>
                                NEXT</div>
                                
                        </div>    
                </div>               
                <div class="relative w-full max-w-7xl mx-auto max-h-80 mb-5 mt-2 overflow-y-scroll  bg-white shadow-lg rounded-sm border border-gray-200 "> 
                    <table class="table-auto w-full ">
                        <thead class="text-l cursor-pointer  font-semibold uppercase text-black bg-pink-200 sticky top-0">
                            <tr class="min-h-[12rem]">
                                <th></th>
                                <th v-for="column in tableColumns"  @click="toggleColumn(column)">
                                    <div class="font-semibold">{{column}}</div>
                                
                                </th>
                                
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100 px-3">
                            <!-- record 1 -->
                            <tr v-for="object in tableContent">
                                <td class="p-2">
                                </td>
                                <td class="text-center" v-for="field in object">{{field}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div> 
       </AppLayout>
</template>