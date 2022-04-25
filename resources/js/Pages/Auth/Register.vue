<template>
    <CenterPageLayout>
        <div class="page-wrapper">
            <div class="row">
                <div class="col-12 brand">
                    <Link href="/">BRAND</Link>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h1>Rejestracja</h1>
                    <FormErrors ref="form_errors" />
                    <TextInput label="Nazwa użytkownika" v-model="form.username" type="text" :vertical="true"/>
                    <TextInput label="Email" v-model="form.email" type="email" :vertical="true"/>
                    <TextInput label="Password" v-model="form.password" type="password" :vertical="true"/>
                    <TextInput label="Confirm Password" v-model="form.password_confirmation" type="password"
                               :vertical="true"/>
                    <Checkbox v-model="form.terms">Zgadzam się z warunkami regulaminu</Checkbox>
                    <Btn @click="register">Zarejestruj</Btn>
                </div>
                <div class="col-6">
                    <h2>Regulamin</h2>
                    <div class="terms">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, asperiores,
                            consequatur,
                            doloremque, ea eaque eius enim error esse et exercitationem facere fuga fugiat harum
                            ipsa
                            iste iure laboriosam libero magni molestiae nam natus necessitatibus nemo neque nobis
                            nostrum
                            obcaecati odit officia omnis optio pariatur perferendis perspiciatis placeat quae quam
                            quas
                            quisquam quod ratione repellat repudiandae rerum saepe sed similique sint soluta sunt
                            suscipit
                            temporibus tenetur totam unde velit vero voluptas voluptate voluptates voluptatum.
                            Accusantium
                            aliquam atque autem consequatur cumque debitis doloremque dolorum eaque eius enim error
                            esse
                            et
                            exercitationem facere fuga fugiat harum ipsa iste iure laboriosam libero magni molestiae
                            nam
                            natus necessitatibus nemo neque nobis nostrum obcaecati odit officia omnis optio
                            pariatur
                            perferendis
                            perspiciatis placeat quae quam quas quisquam quod ratione repellat repudiandae rerum
                            saepe
                            sed
                            similique sint soluta sunt suscipit temporibus tenetur totam unde velit vero voluptas
                            voluptate
                            voluptates voluptatum. Accusantium aliquam atque autem consequatur cumque debitis doloremque
                            dolorum eaque eius enim error esse et exercitationem facere fuga fugiat harum ipsa iste
                            iure
                            laboriosam libero magni molestiae nam natus necessitatibus nemo neque nobis nostrum
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </CenterPageLayout>
</template>

<script>
import CenterPageLayout from "@/Layouts/CenterPageLayout";
import {Link} from "@inertiajs/inertia-vue3";
import TextInput from "@/Components/TextInput";
import Btn from "@/Components/Btn";
import Checkbox from "@/Components/Checkbox";
import FormErrors from "@/Components/FormErrors";

export default {
    name: "Register",
    components: {FormErrors, Checkbox, TextInput, CenterPageLayout, Link, Btn},
    data() {
        return {
            form: {
                email: '',
                username: '',
                password: '',
                password_confirmation: '',
                terms: false
            }
        }
    },
    methods: {
        register() {
            this.$refs.form_errors.flush()
            if (!this.form.terms) {
                this.$refs.form_errors.addError('Musisz zaakceptować regulamin, aby móc kontynuować.');
                return;
            }
            if (this.form.password !== this.form.password_confirmation) {
                this.$refs.form_errors.addError('Hasła nie są identyczne.')
                return;
            }
            this.$inertia.post(route('register'), this.form, {
                onSuccess: () => {
                },
                onError: (res) => {
                    this.$refs.form_errors.setErrors(res);
                },
            })
        }
    }
}
</script>

<style scoped lang="scss">
.page-wrapper {
    min-width: 600px;
    width: 60vw;
    max-height: 80vh;

    .brand {
        text-align: center;
        font-size: 2em;
    }
}
</style>
