import amenities  from './components/amenities/routes';
import deals  from './components/deals/routes';
import events  from './components/events/routes';
import itineraries  from './components/itineraries/routes';
import places  from './components/places/routes';

export default class BeltSpot {

    constructor() {

        if ($('#belt-spot').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/belt/spot',
                routes: []
            });

            router.addRoutes(amenities);
            router.addRoutes(deals);
            router.addRoutes(events);
            router.addRoutes(itineraries);
            router.addRoutes(places);

            const app = new Vue({router}).$mount('#belt-spot');
        }
    }

}