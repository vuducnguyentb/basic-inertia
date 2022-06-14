<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLink from "@/Components/AnchorLink.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";
import BreezeButton from "@/Components/Button";
import { Inertia } from "@inertiajs/inertia";
import { defineProps } from "vue";


const props = defineProps({
    department:Object,
})

const form = useForm({
    name: props.department.name,
    email: props.department.email,
    phone: props.department.phone,
});

function submitDepartment() {
    form.put(route("departments.update",props.department.id));
}
function resetForm() {
    form.clearErrors();
    form.reset();
}
</script>

<template>
    <Head title="Edit Department" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Department
            </h2>
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
                        <form @submit.prevent="submitDepartment">
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
                            <BreezeLabel
                                for="phone"
                                value="phone"
                            ></BreezeLabel>
                            <BreezeInput
                                type="text"
                                id="phone"
                                class="mt-1 block w-1/2"
                                v-model="form.phone"
                                autofocus
                            ></BreezeInput>
                            <BreezeInputError
                                :message="form.errors.phone"
                            ></BreezeInputError>
                            <!-- submit -->
                            <div class="flex items-center justify-end mt-4">
                                <BreezeButton :loading="form.processing"
                                    >Update</BreezeButton
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
