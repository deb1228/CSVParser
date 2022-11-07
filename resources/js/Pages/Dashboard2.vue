<script>
        import{defineComponent} from 'vue'
        import AppLayout from '@/Layouts/AppLayout.vue';

        export default defineComponent({
    name: "Dashboard2",
    setup() { },
    components: { AppLayout }
})
        
</script>

<template>
       <AppLayout>
             <div class="flex justify-center grow w-full h-full">
                 <div id="FileUpload">
                    <h2>CSV Upload</h2>
                    <input type="file" ref="myFile" @change="changeToJSON()"/> 
                  </div>
             </div> 
       </AppLayout>
</template>