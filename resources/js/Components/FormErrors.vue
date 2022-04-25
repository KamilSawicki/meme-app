<template>
    <div class="form-errors">
        <div class="error" v-for="error in errors">
            <ExclamationIcon class="std-icon error-sign"/>
            <span>{{ error }}</span>
        </div>
    </div>
</template>

<script>
import { ExclamationIcon} from '@heroicons/vue/outline';

export default {
    name: "FormErrors",
    components: {
        ExclamationIcon
    },
    data() {
        return {
            errors: []
        }
    },
    methods: {
        addError(error) {
            this.errors.push(error);
        },
        removeError(error) {
            this.errors.splice(this.errors.indexOf(error), 1);
        },
        setErrors(errors) {
            this.errors = errors;
        },
        flush() {
            this.errors = [];
        }
    }
}
</script>

<style scoped lang="scss">
.error {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 1rem;
    padding: .3rem .5rem;
    border: 2px solid #f44336;
    color: #f44336;
    font-size: .8rem;

    .error-sign {
        margin-right: .5rem;
        height: 1.2em;
        width: 1.2em;
        font-size: 1.2em;
        color: #f44336;
    }
}
</style>
