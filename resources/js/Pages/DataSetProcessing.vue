<script setup>
import{ref, onMounted} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';


const props = defineProps({
    read_target: String,
})

let tableContent = ref(null);
let tableColumns = ref(null);

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
})
</script>

<template>
       <AppLayout>
             <div class="flex flex-col  grow w-full h-full">
                <div class="flex">
                        <div class="flex flex-col ml-20 items-start w-full self-start">
                                <span class="text-8xl text-start font-bold mt-10" @click="readFile">We've Processed </span>                     
                                <span class="text-8xl text-start font-bold mb-5"> your data. </span>
                                 <p>Select the columns you want the system to interpret.</p>
                        </div>
                                 <div class="w-60 min-h-[20rem] mt-10 pr-20 ">
                                    <div class="px-7 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer" >Continue</div>
                                </div>    
                </div>               
                <div class="w-full max-w-7xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200"> 
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th></th>
                                <th v-for="column in tableColumns" class="p-2">
                                    <div class="font-semibold">{{column}}</div>
                                </th>
                                
                            </tr>
                        </thead>

                        <tbody class="text-sm divide-y divide-gray-100">
                            <!-- record 1 -->
                            <tr v-for="object in tableContent">
                                <td class="p-2">
                                    <input type="checkbox" class="w-5 h-5"
                                        @click="toggleCheckbox($el, 2890.66)" />
                                </td>
                                <td class="text-center" v-for="field in object">{{field}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
             </div> 
       </AppLayout>
</template>