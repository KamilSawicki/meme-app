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
                <Link :href="route('home')" class="nav-links-item">Home</Link>
                <template v-if="user != null">
                    <Dropdown :label="user.name" class="nav-links-item">
                        <DropdownLink :href="route('logout')" method="post">Wyloguj</DropdownLink>
                    </Dropdown>
                </template>
                <template v-else>
                    <a @click="showLoginModal" class="nav-links-item">Zaloguj</a>
                </template>
            </div>
        </div>
        <LoginModal ref="LoginModal"/>
    </nav>
</template>

<script>
import SearchBox from "@/Components/SearchBox";
import Dropdown from "@/Components/Dropdown";
import DropdownLink from "@/Components/DropdownLink";
import LoginModal from "@/Modals/LoginModal";
import { usePage, Link } from "@inertiajs/inertia-vue3";
import { computed } from "vue";

export default {
    name: "DesktopNav",
    components: {LoginModal, Dropdown, SearchBox, DropdownLink, Link},
    methods: {
        showLoginModal() {
            this.$refs.LoginModal.show();
        }
    },
    setup() {
        const user = computed(() => usePage().props.value.auth.user)

        return {
            user
        };
    }
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

            .nav-links {
                display: flex;
                .nav-links-item {
                    margin: 0 1rem;

                    &:first-child {
                        margin-left: 0;
                    }

                    &:last-child {
                        margin-right: 0;
                    }

                    &:hover {
                        color: $main-accent-color;
                    }
                }
            }
        }
    }
</style>
