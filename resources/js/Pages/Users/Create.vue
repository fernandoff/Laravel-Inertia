<template>
  <Head title="Create User" />

  <h1 class="text-3xl">Create New User</h1>

  <form @submit.prevent="submit">
    <CpInput v-model="form.name" :error="form.errors.name" id="name" label="Nome" type="text"/>
    <CpInput v-model="form.email" :error="form.errors.email" id="email" label="Email" type="text"/>
  </form>

</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import CpInput from "../../Shared/CpInput";

let form = useForm({
  name: '',
  email: '',
  password: '',
});

let submit = () => {
  form.post('/users');
};
</script>
