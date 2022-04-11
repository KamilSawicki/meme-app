<template>
    <div class="dropdown">
        <a class="dropdown-toggle" type="button" @click="toggle">
            {{ label }}
            <ChevronDownIcon class="std-icon dropdown-icon" :class="{'flip': expanded}"/>
        </a>
        <div class="dropdown-menu" id="dropdown-menu" ref="dropdown" v-show="expanded">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import { ChevronDownIcon } from '@heroicons/vue/outline'

export default {
    name: "Dropdown",
    components: {
        ChevronDownIcon
    },
    props: {
        label: {
            type: String,
            default: "Select"
        }
    },
    data() {
        return {
            expanded: false
        };
    },
    methods: {
        toggle() {
            this.expanded = !this.expanded;
        }
    }
}
</script>

<style scoped lang="scss">
.dropdown {
    display: flex;
    align-items: center;
    position: relative;

    .dropdown-toggle {
        cursor: pointer;
        user-select: none;

        &:hover {
            color: $main-accent-color;
        }
    }

    .dropdown-icon {
        transition: transform 0.2s ease-in-out;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        width: max-content;
        z-index: 1000;
        border: 1px solid $box-border-color;
        background-color: $box-bg-color;
    }

}

.flip {
    transform: rotate(180deg);
}
</style>
