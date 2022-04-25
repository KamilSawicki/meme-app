<template>
    <Modal title="Logowanie" @close="close" ref="Modal">
        <FormErrors ref="formErrors" />
        <TextInput v-model="form.email" label="Adres email" :vertical="true"/>
        <TextInput v-model="form.password" label="Hasło" :vertical="true" type="password"/>
        <Checkbox v-model="form.remember" label="Zapamiętaj mnie">Zapamiętaj mnie</Checkbox>
        <div class="buttons">
            <Link>Zarejestruj się</Link>
            <Link>Przypomnij hasło</Link>
            <Btn @click="login" :disabled="!form.email || !form.password">Zaloguj</Btn>
        </div>
    </Modal>
</template>

<script>
import Modal from "@/Components/Modal";
import TextInput from "@/Components/TextInput";
import Btn from "@/Components/Btn";
import { Link } from "@inertiajs/inertia-vue3";
import FormErrors from "@/Components/FormErrors";
import Checkbox from "@/Components/Checkbox";

export default {
    name: "LoginModal",
    components: {Checkbox, FormErrors, Modal, TextInput, Link, Btn},
    data() {
        return {
            form: {
                email: "",
                password: "",
                remember: false
            }
        }
    },
    methods: {
        close() {
            this.$refs.Modal.hide();
        },
        show() {
            this.$refs.Modal.show();
        },
        login() {
            this.$inertia.post(route("login"), this.form, {
                onSuccess: () => {
                    this.$refs.Modal.hide();
                },
                onError: (err) => {
                    this.$refs.formErrors.setErrors(err)
                }
            })
        }
    }
}
</script>

<style scoped lang="scss">
.buttons {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1rem;
}
</style>
