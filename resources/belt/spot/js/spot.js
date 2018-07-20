import 'belt/spot/js/bootstrap/inputs';
import 'belt/spot/js/bootstrap/filters';
import 'belt/spot/js/bootstrap/functions';
import 'belt/spot/js/bootstrap/mixins';
import 'belt/spot/js/bootstrap/tiles';

import amenities  from 'belt/spot/js/amenities/routes';
import deals  from 'belt/spot/js/deals/routes';
import events  from 'belt/spot/js/events/routes';
import places  from 'belt/spot/js/places/routes';
import store from 'belt/core/js/store/index';

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
            router.addRoutes(places);

            new Vue({router, store}).$mount('#belt-spot');
        }
    }

}