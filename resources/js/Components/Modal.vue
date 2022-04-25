<template>
    <div class="modal-overlay" v-show="isActive">
        <div class="modal-container">
            <div class="modal-header">
                <div>
                    <h3 class="modal-title">{{ title }}</h3>
                </div>
                <div class="modal-close" @click="hide">
                    <XIcon class="std-icon" />
                </div>
            </div>
            <div class="modal-body">
                <slot name="body">
                    <slot></slot>
                </slot>
            </div>
        </div>
    </div>
</template>

<script>
import {XIcon} from '@heroicons/vue/outline'

export default {
    name: "Modal",
    components: {
        XIcon
    },
    props: {
        title: {
            type: String,
            default: "Modal"
        },
    },
    data() {
        return {
            isActive: false
        }
    },
    methods: {
        hide() {
            this.isActive = false
        },
        show() {
            this.isActive = true
        }
    }
}
</script>

<style scoped lang="scss">
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        display: flex;
        justify-content: center;
        align-items: center;

        .modal-container {
            position: relative;
            min-width: 500px;
            background-color: $box-bg-color;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            padding: 20px;

            .modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;

                h3 {
                    margin: 0;
                }

                .modal-close {
                    cursor: pointer;
                }
            }

            .modal-body {
                padding: 20px;
            }

            .modal-footer {
                display: flex;
                justify-content: flex-end;
                align-items: center;

                button {
                    margin-left: 10px;
                }
            }
        }

    }
</style>
