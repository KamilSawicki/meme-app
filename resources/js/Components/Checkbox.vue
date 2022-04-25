<template>
    <div class="form-group">
        <label class="control-label control-label-left" v-if="reverse" for="checkbox"  @click="check">
            <slot></slot>
        </label>
        <div class="checkbox" id="checkbox" @click="check">
            <CheckIcon class="std-icon checkbox-icon" v-show="modelValue"/>
        </div>
        <label class="control-label control-label-right" v-if="!reverse" for="checkbox"  @click="check">
            <slot></slot>
        </label>
        <input type="checkbox" v-model="modelValue" ref="checkbox">
    </div>
</template>

<script>
import {CheckIcon} from '@heroicons/vue/outline';
export default {
    name: "Checkbox",
    components: {
        CheckIcon
    },
    props: {
        reverse: {
            type: Boolean,
            default: false
        },
        modelValue: {
            type: Boolean,
            default: false
        }
    },
    methods: {
        check() {
            this.$refs.checkbox.click();
            this.$emit('update:modelValue', this.modelValue)
        }
    }
}
</script>

<style scoped lang="scss">
.form-group {
    display: flex;
    align-items: center;
    margin-bottom: 15px;

    .control-label {
        user-select: none;
        cursor: pointer;

        &-left {
            margin-right: .5rem;
        }
        &-right {
            margin-left: .5rem;
        }
    }

    input {
        display: none;
    }

    .checkbox {
        box-shadow: 0 0 0 1px $font-color inset;
        width: 1rem;
        height: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;

        .checkbox-icon {
            color: $main-accent-color;
        }
    }
}
</style>
