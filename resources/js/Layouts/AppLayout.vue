<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'), {
        onFinish: () => {
            Inertia.visit(route('login'))
        }
    });
};
</script>

<template>
    <div class="flex flex-col h-screen">
        <Head :title="title" />

        <Banner />

        <div class="flex p-6 w-full bg-pink-200 h-16">
            <div class="flex justify-between w-full ">
                
                    <div class="flex pr-60  items-center">
                        <span class="text-2xl px-6 font-bold py-3">TICKETnet</span>
                    </div>
                         <div class="flex items-center gap-5 ">
                                 <span class="px-6 cursor-pointer hover:text-white">Download</span>
                                <span class="px-6 cursor-pointer hover:text-white">Share</span>
                                <button @click="logout" class=" px-2  text-l text-pink-600 font-semibold rounded-full border border-pink-600 hover:text-white hover:bg-pink-600 hover:border-white focus:outline-none focus:ring-2 focus:ring-sky-600 focus:ring-offset-2">Log Out</button>
                        </div>  
            </div>
        </div>
                <slot />
        
    
    </div>
</template>
