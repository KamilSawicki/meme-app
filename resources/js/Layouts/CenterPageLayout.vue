<template>
    <div class="center-page-layout">
        <div class="center-page-layout__content">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "CenterPageLayout"
}
</script>

<style scoped>
.center-page-layout {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}
</style>
