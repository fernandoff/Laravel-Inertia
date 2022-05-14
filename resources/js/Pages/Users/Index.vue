<template>
  <Head title="Users" />



  <Pagination :links="users.links" class="mt-6" />
</template>

<script setup>
import Pagination from '../../Shared/Pagination';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from "lodash/debounce";

let props = defineProps({
  users: Object,
  filters: Object,
});

let search = ref(props.filters.search);

watch(search, debounce(function (value) {
  Inertia.get('/users', { search: value }, { preserveState: true, replace: true });
}, 300));
</script>
