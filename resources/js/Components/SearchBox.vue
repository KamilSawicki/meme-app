<template>
    <div class="search-box-wrapper">
        <input type="text" placeholder="Szukaj..." name="search" autocomplete="off">
        <button class="search-button">
            <SearchIcon class="std-icon search-icon"/>
        </button>
    </div>
</template>

<script>
import { SearchIcon } from '@heroicons/vue/outline'

export default {
    name: "SearchBox",
    components: {
        SearchIcon
    }
}
</script>

<style scoped lang="scss">
.search-box-wrapper {
    display: flex;
    align-items: center;
    background-color: #fff;
    height: 2rem;
    border-radius: 1rem;
    padding-left: 1rem;

    input {
        border: unset;
        &:focus {
            outline: unset;
        }
    }

    .search-button{
        background-color: $main-accent-color;
        border: none;
        padding: 0;
        margin-left: 1rem;
        cursor: pointer;
        height: 2rem;
        width: 2rem;
        border-radius: 2rem;
    }

    .search-icon {
       color: #fff;
    }
}
</style>
