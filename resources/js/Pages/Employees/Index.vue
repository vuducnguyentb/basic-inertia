<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
    import BreezeTc from "@/Components/TableColumn.vue";
    import BreezeTable from "@/Components/Table.vue";
    // import BreezePagination from "@/Components/Pagination.vue";
    import BreezeLink from "@/Components/AnchorLink.vue";
    import {Head} from "@inertiajs/inertia-vue3";
    import {ref, defineProps} from "vue";
    import {Link} from "@inertiajs/inertia-vue3";
    import BreezeHeading from "@/Components/Heading.vue";
    import {useForm} from "@inertiajs/inertia-vue3";
    import {Inertia} from '@inertiajs/inertia'

    const props = defineProps({
        employees: Object,
        departments: Object,
        department_id: [String, Number]
    });
    const form = useForm({});

    const employees = ref(props.employees);

    function destroy(id) {
        Inertia.delete(route("employees.destroy", id),{preserveScroll:true});
    }

    function getEmployees(department_id) {
        Inertia.get(route("employees.index"),
            {
                deparment_id: department_id
            },
            {
                only: ["employees", "department_id"]
            })
    }

</script>

<template>
    <Head title="Employees"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            <BreezeHeading> Employees</BreezeHeading>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-between mb-6">
                            <select id="department_id"
                                    class="mt-1 block-w-1/3 focus:ring focus:ring-opacity-50 rounded-md shadow-sm"
                                    v-model="department_id"
                                    @change="getEmployees(department_id)"
                            >
                                <option value="">-Please Select-</option>
                                <option v-for="option in departments" :value="option.id">{{option.label}}</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mb-6">
                            <BreezeLink :href="route('employees.create')"
                            >Create Employee
                            </BreezeLink
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
                                v-for="d in employees"
                                :key="d.id"
                                class="hover:bg-gray-200"
                            >
                                <BreezeTc>{{ d.id }}</BreezeTc>
                                <BreezeTc>{{ d.name }}</BreezeTc>
                                <BreezeTc>{{ d.department }}</BreezeTc>
                                <BreezeTc>{{ d.email }}</BreezeTc>
                                <BreezeTc>
                                        <BreezeLink
                                            mode="edit"
                                            :href="
                                                    route(
                                                        'employees.edit',
                                                        d.id
                                                    )
                                                "
                                        >Edit
                                        </BreezeLink
                                        >
                                        <BreezeLink
                                            mode="delete"
                                            @click.prevent="destroy(d.id)"
                                        >Delete
                                        </BreezeLink
                                        >
                                </BreezeTc>
                            </tr>
                            </tbody>
                        </BreezeTable>
                        <!--                        <BreezePagination :links="employees.links" />-->
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
