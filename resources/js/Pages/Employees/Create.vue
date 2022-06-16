<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLink from "@/Components/AnchorLink.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";
import BreezeButton from "@/Components/Button";
import BreezeResetButton from "@/Components/ResetButton";
import { Inertia } from "@inertiajs/inertia";
import BreezeHeading from "@/Components/Heading.vue";

const props = defineProps({
    departments: Object,
});
const form = useForm({
    name: null,
    email: null,
    department_id: null,
});

function addEmployee() {    
    // console.log(form.post(route("employees.store")));
    // return;
    form.post(route("employees.store"));
}
function resetForm() {
    form.clearErrors();
    form.reset();
}
</script>

<template>
    <Head title="Create Department" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <BreezeHeading> Create Employee </BreezeHeading>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div v-show="form.hasErrors">
                            <div class="text-red-600 font-medium">
                                Please make the following corrections:
                            </div>
                        </div>
                        <form @submit.prevent="addEmployee">
                            <!-- email -->
                            <BreezeLabel for="name" value="Name"></BreezeLabel>
                            <BreezeInput
                                type="text"
                                id="name"
                                class="mt-1 block w-1/2"
                                v-model="form.name"
                                autofocus
                            ></BreezeInput>
                            <BreezeInputError
                                :message="form.errors.name"
                            ></BreezeInputError>
                            <BreezeLabel
                                for="department"
                                value="department"
                            ></BreezeLabel>
                            <select
                                id="department_id"
                                class="focus:ring focus:ring-opacity-50 rounded-md shadow-sm"
                                v-model="form.department_id"
                            >
                                <option value="">-Please Select-</option>
                                <option v-for="option in departments" :value="option.id">
                                    {{ option.label }}
                                </option>
                            </select>
                            <BreezeInputError
                                :message="form.errors.department_id"
                            ></BreezeInputError>
                            <BreezeLabel
                                for="email"
                                value="email"
                            ></BreezeLabel>
                            <BreezeInput
                                type="email"
                                id="email"
                                class="mt-1 block w-1/2"
                                v-model="form.email"
                                autofocus
                            ></BreezeInput>
                            <BreezeInputError
                                :message="form.errors.email"
                            ></BreezeInputError>
                            <!-- submit -->
                            <div class="flex items-center justify-end mt-4">
                                <BreezeResetButton @click="resetForm"
                                    >Reset Form</BreezeResetButton
                                >
                                <BreezeButton :loading="form.processing"
                                    >Create</BreezeButton
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
