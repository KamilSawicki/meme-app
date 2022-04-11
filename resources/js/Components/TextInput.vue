<template>
    <div class="form-group" :class="{'form-vertical':vertical}">
        <div class="form-desc">
            <label v-if="label">{{ label }} </label>
            <span v-if="help" class="help">
                <span class="help-content">{{ help }}</span>
            </span>
        </div>
        <input
            :type="type"
            class="form-control"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
    </div>
</template>

<script>
export default {
    name: "TextInput",
    props: {
        label: {
            type: String,
            default: '',
        },
        help: {
            type: String,
            default: '',
        },
        placeholder: {
            type: String,
            default: '',
        },
        modelValue: {
            type: String,
            default: '',
        },
        type: {
            type: String,
            default: 'text',
        },
        vertical: {
            type: Boolean,
            default: false,
        },
    },
}
</script>

<style scoped lang="scss">
    .form-group {
        margin-bottom: 15px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;

        .form-desc {
            display: flex;
        }

        label {
            margin-right: 1rem;

            &::after {
                content: ':';
            }
        }

        input {
            flex: 1;
            //padding: .5rem 1rem;
            //border-radius: .25rem;
            //border: 1px solid #ccc;
            //box-shadow: #333333 0 0 0 1px;
            border: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
            padding-bottom: .25rem;
            transition: border-bottom-color .2s ease-in-out;
            color: $font-color;

            &:focus {
                outline: none;
                border-bottom: 2px solid $main-accent-color;
            }
        }

        .help {
            position: relative;
            margin-right: 1rem;

            &:before {
                content: '?';
                display: block;
                background-color: $main-accent-color;
                border-radius: 50%;
                margin-right: .5rem;
                width: 1rem;
                height: 1rem;
                line-height: 1rem;
                text-align: center;
                padding: .25rem;
            }
            &:hover {
                .help-content {
                    display: block;
                }
            }
            &-content {
                display: none;
                position: absolute;
                top: 2rem;
                width: 30vw;
                background-color: $box-bg-color-light;
                color: $font-color-light;
                padding: $box-inner-padding;
                border-radius: .25rem;
                border: 1px solid $box-border-color-light;
            }
        }
    }
    .form-vertical {
        flex-direction: column;
        .form-desc {
            width: 100%;
            margin-bottom: .5rem;
        }
        input {
            width: calc( 100% - 2rem - 2px );
        }
    }
</style>
