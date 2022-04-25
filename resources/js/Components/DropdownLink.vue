<template>
    <Link :href="href" :method="method" class="dropdown-link">
        <slot></slot>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "DropdownLink",
    components: {
        Link,
    },
    props: {
        href: {
            type: String,
            required: true,
        },
        method: {
            type: String,
            default: 'GET',
        },
    },
}
</script>

<style scoped lang="scss">
    .dropdown-link {
        display: block;
        padding: 0.5rem 1rem;
        color: $font-color;
        text-decoration: none;
        white-space: nowrap;
        cursor: pointer;
        transition: background-color 0.15s ease;
        background-color: $box-bg-color;
        user-select: none;

        &:hover {
            color: $main-accent-color;
        }
    }
</style>
