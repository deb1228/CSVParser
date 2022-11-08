<script>
        import{defineComponent} from 'vue'
        import AppLayout from '@/Layouts/AppLayout.vue';

        export default defineComponent({
    name: "GraphSelect",
    setup() { },
    components: { AppLayout }
})
        
</script>

<template>
       <AppLayout>
       
             <div class="flex flex-col grow w-full h-full">
                <div class="flex">
                        <div class="flex flex-col ml-20 items-start w-full self-start">
                                <span class="text-8xl text-start font-bold mt-10">We're ready to  </span>                     
                                <span class="text-8xl text-start font-bold mb-5"> pick a GRAPH. </span>
                                 <p>Select the type of graph or chart you want the system to create.</p>
                        </div>
                                 <div class="w-60 min-h-[20rem] mt-10 pr-20 ">
                                    <div class="px-7 py-5 font-bold uppercase text-lg rounded bg-pink-200  hover:bg-pink-600 text-pink-800 text-center cursor-pointer" >Continue</div>
                                </div>    
                </div>               
             </div> 
             
       </AppLayout>
</template>