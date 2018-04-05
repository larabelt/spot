import amenities  from 'belt/spot/js/amenities/routes';
import deals  from 'belt/spot/js/deals/routes';
import events  from 'belt/spot/js/events/routes';
import itineraries  from 'belt/spot/js/itineraries/routes';
import places  from 'belt/spot/js/places/routes';
import store from 'belt/core/js/store/index';

import inputItineraries from 'belt/spot/js/inputs/itineraries';
Vue.component('input-itineraries', inputItineraries);

window.larabelt.spot = _.get(window, 'larabelt.spot', {});

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

            const app = new Vue({router, store}).$mount('#belt-spot');
        }
    }

}