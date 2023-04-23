a<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import FormWizard from '@/Components/FormWizard.vue';
import FormStep from '@/Components/FormStep.vue';
import Swal from "sweetalert2";
import {Head, Link, useForm } from '@inertiajs/vue3';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

const props = defineProps({
    categories: {
        type: Object,
        required: true
    }
});

const editor = ClassicEditor;

const form = useForm({
    name: '',
    category: 1,
    description: '',
    images: {},
    dateTime: '',
});

const validationSchema = [
    yup.object({
        name: yup.string().required().label('Name'),
        category: yup.string().required().label('Category'),
        description: yup.string().required().label('Description'),
    }),
    yup.object({
        images: yup.mixed()
            .test('fileType', 'File must be an image', (value) => {
                if (value) {
                    const extension = value[0].type.split('.').pop();

                    return  ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'].includes(extension.toLowerCase())
                }
                return true;
            })
    }),
    yup.object({
        dateTime: yup.string().required().label('Date and Time')
    }),
];

const onSubmit = (formData) => {
    form.transform(data => ({
        ...data,
    })).post(route('products.store'), {
        onSuccess: () => {
            form.reset()

            Swal.fire({
                icon: 'success',
                title: 'Task has been created!',
                showConfirmButton: false,
                timer: 1500
            });
        },onError: (error) => {
            console.log(error)
        }
    });
};
</script>

<template>
    <AuthenticatedLayout title="Create Product">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a
                        href="#"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            class="mr-2 w-4 h-4">
                            <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                            <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                        </svg>
                        Create Product
                    </a>
                </li>
            </ol>
        </nav>
        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-3 space-y-4">

                    <InputLabel for="title" value="Create Product" />
                    <FormWizard class="space-y-4"
                        :validation-schema="validationSchema"
                        @submit="onSubmit">
                        <FormStep class="flex flex-col space-y-4">

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <InputLabel for="title" value="Product Name" />
                                    <Field class="shadow-sm px-2 rounded-lg"
                                           v-model="form.name"
                                           name="name"
                                           type="text"
                                           placeholder="Product Name" />

                                    <p class="text-sm text-red-500">
                                        <ErrorMessage name="name" />
                                    </p>
                                </div>

                                <div>
                                    <InputLabel for="title" value="Product Category" />
                                    <Field class="shadow-sm px-2 rounded-lg w-full"
                                           v-model="form.category"
                                           name="category"
                                           as="select">
                                        <option selected value="">Categories</option>
                                        <template  v-for="(category) in categories.data">
                                            <option :value="category.id">{{ category.name }}</option>
                                        </template>
                                    </Field>

                                    <p class="text-sm text-red-500">
                                        <ErrorMessage name="category" />
                                    </p>
                                </div>

                            </div>

                            <div>
                                <InputLabel for="title" value="Product Description" />

                                <Field name="description" v-model="form.description">
                                    <ckeditor :editor="editor" v-model="form.description"></ckeditor>
                                </Field>

                                <p class="text-sm text-red-500">
                                    <ErrorMessage name="description" />
                                </p>
                            </div>

                        </FormStep>

                        <FormStep>
                            <div class="flex-col">

                                <InputLabel for="title" value="Images" />

                                <Field class="shadow-sm px-2 rounded-lg" name="images" v-slot="{ handleChange, handleBlur }">
                                    <input multiple
                                           @change="handleChange"
                                           @blur="handleBlur"
                                           type="file"
                                           @input="form.images = $event.target.files[0]" />

                                </Field>

                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>

                                <p class="text-sm text-red-500">
                                    <ErrorMessage name="images" />
                                </p>
                            </div>
                        </FormStep>

                        <FormStep>
                            <div class="flex-col">

                                <InputLabel for="title" value="Date and Time" />

                                <Field class="shadow-sm px-2 rounded-lg"
                                       v-model="form.dateTime"
                                       name="dateTime"
                                       type="datetime-local"
                                       placeholder="Date and Time" />

                                <p class="text-sm text-red-500">
                                    <ErrorMessage name="dateTime" />
                                </p>
                            </div>
                        </FormStep>
                    </FormWizard>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
