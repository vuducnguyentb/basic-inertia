<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeTc from "@/Components/TableColumn.vue";
import BreezeTable from "@/Components/Table.vue";
import BreezePagination from "@/Components/Pagination.vue";
import BreezeLink from "@/Components/AnchorLink.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, defineProps } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import BreezeHeading from "@/Components/Heading.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    departments: Object,
});
const form = useForm({
});

function destroy(id){
    Inertia.delete(route('departments.destroy', id),{preserveScroll:true});
    //   this.$inertia.delete(route("departments.destroy", id));
    //   this.delete(route("departments.destroy", id));
}

function employees(id) {
    Inertia.visit(route('employees.index'),{
        method:'get',
        data:{deparment_id:id}
    })
}
</script>

<template>
    <Head title="Department" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <BreezeHeading> Departments </BreezeHeading>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-end mb-6">
                            <BreezeLink :href="route('departments.create')"
                                >Create Departments</BreezeLink
                            >
                        </div>
                        <BreezeTable>
                            <template #header>
                                <BreezeTc>ID</BreezeTc>
                                <BreezeTc>NAME</BreezeTc>
                                <BreezeTc>EMAIL</BreezeTc>
                                <BreezeTc>PHONE</BreezeTc>
                                <BreezeTc>ACTION</BreezeTc>
                            </template>
                            <tbody>
                                <tr
                                    v-for="d in departments.data"
                                    :key="d.id"
                                    class="hover:bg-gray-200"
                                >
                                    <BreezeTc>{{ d.id }}</BreezeTc>
                                    <BreezeTc>{{ d.name }}</BreezeTc>
                                    <BreezeTc>{{ d.email }}</BreezeTc>
                                    <BreezeTc>{{ d.phone }}</BreezeTc>
                                    <BreezeTc>
                                        <BreezeLink
                                            mode="edit"
                                            :href="
                                                route('departments.edit', d.id)
                                            "
                                            >Edit</BreezeLink
                                        >
                                        <BreezeLink
                                            mode="delete"
                                            @click.prevent="destroy(d.id)"
                                            >Delete</BreezeLink
                                        >
                                        <BreezeLink
                                            mode="view"
                                            @click.prevent="employees(d.id)"
                                        >View</BreezeLink
                                        >
                                    </BreezeTc>
                                </tr>
                            </tbody>
                        </BreezeTable>
                        <BreezePagination :links="departments.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
