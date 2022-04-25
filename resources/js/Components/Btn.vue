<template>
    <button :class="color">
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: "Btn",
    props: {
        color: {
            type: String,
        }
    }
}
</script>

<style scoped lang="scss">
button {
    background-color: transparent;
    border: 2px solid $main-accent-color;
    color: $main-accent-color;
    padding: .5rem 1rem;
    border-radius: .25rem;
    cursor: pointer;
}
.green {
    border: 2px solid #00aa00;
    color: #00aa00;
}
.red {
    border: 2px solid #aa0000;
    color: #aa0000;
}
.blue {
    border: 2px solid #336dff;
    color: #336dff;
}
</style>
