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

const props = defineProps({
    employees: Object,
});
const form = useForm({});

function destroy(id) {
    form.delete(route("employees.destroy", id));
}
</script>

<template>
    <Head title="Department" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <BreezeHeading> Employees </BreezeHeading>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-end mb-6">
                            <BreezeLink :href="route('employees.create')"
                                >Create Employee</BreezeLink
                            >
                        </div>
                        <BreezeTable>
                            <template #header>
                                <BreezeTc>ID</BreezeTc>
                                <BreezeTc>NAME</BreezeTc>
                                <BreezeTc>DEPARTMENT</BreezeTc>
                                <BreezeTc>EMAIL</BreezeTc>
                                <BreezeTc>ACTION</BreezeTc>
                            </template>
                            <tbody>
                                <tr
                                    v-for="d in employees.data"
                                    :key="d.id"
                                    class="hover:bg-gray-200"
                                >
                                    <BreezeTc>{{ d.id }}</BreezeTc>
                                    <BreezeTc>{{ d.name }}</BreezeTc>
                                    <BreezeTc>{{ d.department }}</BreezeTc>
                                    <BreezeTc>{{ d.email }}</BreezeTc>
                                    <BreezeTc>
                                        <form>
                                            <BreezeLink
                                                mode="edit"
                                                :href="
                                                    route(
                                                        'employees.edit',
                                                        d.id
                                                    )
                                                "
                                                >Edit</BreezeLink
                                            >
                                            <BreezeLink
                                                mode="delete"
                                                @click.prevent="destroy(d.id)"
                                                >Delete</BreezeLink
                                            >
                                        </form>
                                    </BreezeTc>
                                </tr>
                            </tbody>
                        </BreezeTable>
                        <BreezePagination :links="employees.links" />
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
