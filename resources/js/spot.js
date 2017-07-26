import amenities  from 'belt/spot/js/components/amenities/routes';
import deals  from 'belt/spot/js/components/deals/routes';
import events  from 'belt/spot/js/components/events/routes';
import itineraries  from 'belt/spot/js/components/itineraries/routes';
import places  from 'belt/spot/js/components/places/routes';

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