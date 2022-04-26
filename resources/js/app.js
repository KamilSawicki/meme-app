require('./bootstrap');

import { createApp, h, computed } from 'vue';
import {createInertiaApp, usePage} from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import DisableAutocomplete from 'vue-disable-autocomplete';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(DisableAutocomplete)
            .mixin({
                methods: { route },
                directives: {
                    user: computed(() => usePage().props.value.auth.user)
                }
            })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
