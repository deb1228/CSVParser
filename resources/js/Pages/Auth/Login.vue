<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DashboardVue from '../Dashboard.vue';
import LoginVue from '../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Pages/Auth/Login.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
     
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="flex items-center p-10 w-screen h-screen bg-gradient-to-r from-purple-400 to-pink-400 justify-center">
        <div class="flex flex-col items-center justify-center gap-4 border-5 rounded-md bg-white shadow-xl min-w-[30rem] p-4 min-h-[20rem]">
            <span class="px-3 cursor-pointer font-bold ">Username</span>
            <InputError class="mt-2" :message="form.errors.email" />
            <input v-model="form.email" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="username@ticket.com" type="text" name="search"/>

            <span class="px-3 cursor-pointer font-bold">Password</span>
            <InputError class="mt-2" :message="form.errors.password" />
            <input v-model="form.password" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="*************" type="password" name="search"/>

            <button @click="submit" class=" text-sm font-medium text-pink-700 bg-pink-100 rounded-full py-2 px-6 mr-4 cursor-pointer hover:text-pink-200">ENTER</button>
                    <span class="text-sm text-black underline font-medium cursor-pointer hover:text-white">Forgot Password? Click Here
                    </span>


        </div>
    </div>
</template>
