import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

/* import the fontawesome core */
import { library } from "@fortawesome/fontawesome-svg-core";

/* import font awesome icon component */
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

/* import specific icons */
import { fas } from "@fortawesome/free-solid-svg-icons";

import VueNumberFormat from 'vue-number-format'
import { createPinia } from "pinia";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        /* add icons to the library */
        library.add(fas);
        const pinia = createPinia();


        createApp({ render: () => h(App, props) })
            .use(pinia)
            .use(VueNumberFormat, {prefix: '', decimal: '.', thousand: ','})
            .use(plugin)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
});
