<script lang="js" setup>
import { text } from "@fortawesome/fontawesome-svg-core";
import { Link, router, usePage } from "@inertiajs/vue3";
import { useForm } from "vee-validate";
import { computed, onMounted, ref, useTemplateRef } from "vue";
import * as yup from "yup";
import CustomLoader from "../Common/Components/CustomLoader.vue";


const roles = [
    { value: null, label: "Seleccione uno", selected: true },
    { selected: false, value: "invitado", label: "Invitado" },
    { selected: false, value: "miron", label: "Miron" },
];

const validationSchema = yup.object({
    email: yup.string().email().required(),
    password: yup.string().min(8).required(),
    role: yup.string().oneOf([]).notRequired(),
});

const { values, defineField, errors, meta, handleSubmit } = useForm({
    validationSchema,
});

const [email, emailAttrs] = defineField("email");
const [password, passwordAttrs] = defineField("password");
const [role, roleAttrs] = defineField("role");

const onSubmit = handleSubmit((value) => {
    hideAlert()
    sendRequest(value)
});

const showError = ref(false)

const hideAlert = (force = false) =>{
    const hasError =  (usePage().props.errors.credentials )

    if(force){
        showError.value = false
        return false
    }


    if(hasError){
        showError.value = true
        return true
    }
}



const emailRef = useTemplateRef('emailRef')
const passRef = useTemplateRef('passwordRef')
const btnRef = useTemplateRef('loginRef')
const formRef = useTemplateRef('form')
const useRole = ref(false)

const roleRoutine = () =>{
    passRef.value.disabled = true
    emailRef.value.disabled = true

    // meta.value.valid = true
    useRole.value = true

    btnRef.value.disabled = false
    btnRef.value.classList.remove('btn-disabled')
}

const roleRoutineInverse = () =>{
    passRef.value.disabled = false
    emailRef.value.disabled = false

    useRole.value = false

    btnRef.value.disabled = true
}



const logginAs = (event)=>{
    hideAlert()

    const roleType = event.srcElement.value


    switch (roleType) {
        case 'miron':
            email.value = 'miron@pollo.com'
            password.value = "1234Miron"
            roleRoutine()
        break;

        case 'invitado':
            email.value = 'invitado@pollo.com'
            password.value = "1234Invitado"
            roleRoutine()
        break;

        default:
            email.value = ''
            password.value = ""
            roleRoutineInverse()
            break;
    }
}


const resetPage = () =>{
    router.get('/login')
}


const showDialog = ref()

const loginByRole = () =>{
    showDialog.value = true
    if(useRole.value ){
        sendRequest(values)
    }
}


const sendRequest = (vals)=>{
    router.post('login', vals, {
        onSuccess: () => showDialog.value = false,
        onError: () => {showDialog.value = false}
    });
}
</script>

<template >
    <CustomLoader :showDialog="showDialog"></CustomLoader>

    <div class="min-h-screen bg-white">
        <div class="h-30 bg-info text-center pt-9 mb-5">
            <h1 class="text-white text-5xl font-extrabold">
                PolliCulos |
                <span class="text-black font-bold">Bienvenido</span>
            </h1>
        </div>

        <div class="flex flex-col h-[40rem]">
            <div
                v-if="$page.props.errors.credentials"
                class="flex flex-row justify-center h-[10%] mt-30"
            >
                <div
                    role="alert"
                    class="alert alert-vertical alert-error sm:alert-horizontal"
                >
                    <!-- <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="stroke-info h-6 w-6 shrink-0"
                    ></svg> -->

                    <div class="ml-1">
                        <h3 class="font-bold">Error</h3>
                        <div class="text-xs">Credenciales incorrectas</div>
                    </div>
                    <button
                        class="btn btn-sm btn-error"
                        @click="hideAlert(true)"
                    >
                        x
                    </button>
                </div>
            </div>

            <div class="flex flex-row justify-center items-center h-full">
                <div class="grid grid-cols-6 basis-2xl">
                    <form
                        class="col-span-6"
                        @submit.prevent="onSubmit"
                        ref="form"
                    >
                        <div class="w-full">
                            <fieldset class="fieldset border rounded-xl">
                                <div class="bg-info mt-2 p-6 mb-6">
                                    <label class="font-bold text-white text-xl"
                                        >Entrar como</label
                                    >
                                    <select
                                        @change="logginAs"
                                        class="select w-full"
                                        v-model="role"
                                        v-bind="roleAttrs"
                                    >
                                        <option
                                            v-for="roleItem in roles"
                                            :selected="roleItem.selected"
                                            :value="roleItem.value"
                                        >
                                            {{ roleItem.label }}
                                        </option>
                                    </select>
                                </div>

                                <div class="pl-6 pr-6 pb-4">
                                    <label class="font-light text-xl">
                                        Usuario<span
                                            class="text-2xl text-red-500 text-center"
                                            >*</span
                                        >
                                    </label>
                                    <input
                                        ref="emailRef"
                                        type="email"
                                        v-model="email"
                                        v-bind="emailAttrs"
                                        :class="[
                                            'input w-full',
                                            {
                                                'input-error': errors.email,
                                            },
                                        ]"
                                        placeholder="Escriba su usuario"
                                    />
                                    <span
                                        class="label text-red-500"
                                        v-if="errors.email"
                                        >{{ errors.email }}</span
                                    >
                                </div>

                                <div class="pl-6 pr-6 pb-4">
                                    <label class="font-light text-xl">
                                        Contraseña<span
                                            class="text-2xl text-red-500"
                                            >*</span
                                        >
                                    </label>
                                    <input
                                        ref="passwordRef"
                                        type="password"
                                        :class="[
                                            'input w-full',
                                            {
                                                'input-error': errors.email,
                                            },
                                        ]"
                                        v-model="password"
                                        v-bind="passwordAttrs"
                                        placeholder="Escriba su contraseña"
                                    />
                                    <span
                                        class="label text-red-500"
                                        v-if="errors.password"
                                        >{{ errors.password }}</span
                                    >
                                </div>
                            </fieldset>

                            <div class="grid grid-cols-2 gap-2 pt-4">
                                <input
                                    type="submit"
                                    @click="loginByRole"
                                    value="Entrar"
                                    ref="loginRef"
                                    :disabled="!meta.valid"
                                    :class="[
                                        'col btn btn-active btn-info btn-block',
                                        {
                                            'btn-disabled': !meta.valid,
                                        },
                                    ]"
                                />

                                <span
                                    @click="resetPage"
                                    class="col btn btn-active btn-error btn-block"
                                >
                                    Cancelar
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
