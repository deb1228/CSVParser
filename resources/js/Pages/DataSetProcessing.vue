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
                                 <p>Select the columns you want the system to interpret.</p>
                                <div class="flex justify-between">
                                    <span>Selected Columns:</span>

                                </div>
                                <div class="flex gap-5 mt-2">
                                    <span v-for="column in selectedColumns" class="bg-slate-100 rounded-full shadow px-3 py-1 font-semibold">
                                        {{column}}
                                    </span>
                                </div>
                        </div>
                        <div class="w-60 min-h-[16rem] gap-7 mt-10 pr-20 ">
                            <span @click="getColumnData(selectedColumns)" class="px-7 py-5 mb-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer ">1:Confirm</span>

                            <div @click="submit" class="px-7 py-5 mt-10 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer" >2: NEXT</div>
                        </div>    
                </div>               
                <div class="relative w-full max-w-7xl mx-auto max-h-80 overflow-y-scroll  bg-white shadow-lg rounded-sm border border-gray-200 "> 
                    <table class="table-auto w-full ">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50 sticky top-0">
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