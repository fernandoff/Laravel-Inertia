<template>
  <Head title="Log In" />

  <main class="grid place-items-center min-h-screen">
    <section class="bg-white p-8 rounded-xl max-w-md mx-auto border w-full">
      <h1 class="text-3xl mb-6">
        Log In
      </h1>

      <form @submit.prevent="submit">
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email"> Email </label>

          <input
            id="email"
            v-model="form.email"
            class="border p-2 w-full rounded"
            type="email"
            name="email"
            required
          >

          <div
            v-if="form.errors.email"
            class="text-red-500 text-xs mt-1"
            v-text="form.errors.email"
          />
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password"> Password </label>

          <input
            id="password"
            v-model="form.password"
            class="border p-2 w-full rounded"
            type="password"
            name="password"
          >

          <div
            v-if="form.errors.password"
            class="text-red-500 text-xs mt-1"
            v-text="form.errors.password"
          />
        </div>

        <div>
          <button
            type="submit"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
            :disabled="form.processing"
          >
            Log In
          </button>
        </div>
      </form>
    </section>
  </main>
</template>

<script>
export default {
  layout: null,
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
  email: "",
  password: "",
});

let submit = () => {
  form.post("/login");
};
</script>
