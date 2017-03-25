import events  from './components/events/routes';
import places  from './components/places/routes';

export default class BeltSpot {

    constructor() {

        if ($('#belt-spot').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/belt/spot',
                routes: []
            });

            router.addRoutes(events);
            router.addRoutes(places);

            const app = new Vue({router}).$mount('#belt-spot');
        }
    }

}