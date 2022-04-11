<template>
    <nav>
        <div class="nav-wrapper">
            <div class="app-logo">
                LOGO
            </div>
            <div class="search-bar">
                <SearchBox />
            </div>
            <div class="nav-links">
                <Dropdown label="Test" class="nav-links-item">
                    <DropdownLink href="google.com">Google</DropdownLink>
                    <DropdownLink href="google.com">Google</DropdownLink>
                </Dropdown>
            </div>
        </div>
    </nav>
</template>

<script>
import SearchBox from "@/Components/SearchBox";
import Dropdown from "@/Components/Dropdown";
import DropdownLink from "@/Components/DropdownLink";

export default {
    name: "DesktopNav",
    components: {Dropdown, SearchBox, DropdownLink}
}
</script>

<style scoped lang="scss">
    nav {
        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 3rem;
            height: 3rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);

            .nav-links .nav-links-item {
                margin: 0 1rem;
                &:first-child {
                    margin-left: 0;
                }
                &:last-child {
                    margin-right: 0;
                }
            }
        }
    }
</style>
