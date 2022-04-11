<template>
    <div>
        <DesktopNav></DesktopNav>
        <div class="row">
            <div class="col-2 sidebar">
                <slot name="sidebar"></slot>
            </div>
            <div class="col-8 main">
                <slot name="main"></slot>
            </div>
            <div class="col-2 aside">
                <slot name="aside"></slot>
            </div>
        </div>
    </div>
</template>

<script>
import DesktopNav from '@/Components/DesktopNav.vue';

export default {
    name: "ThreeColumnsLayout",
    components: {
        DesktopNav
    }
}
</script>

<style scoped>
</style>
