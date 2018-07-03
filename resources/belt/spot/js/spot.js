import amenities  from 'belt/spot/js/amenities/routes';
import deals  from 'belt/spot/js/deals/routes';
import events  from 'belt/spot/js/events/routes';
import places  from 'belt/spot/js/places/routes';
import store from 'belt/core/js/store/index';

window.larabelt.spot = _.get(window, 'larabelt.spot', {});

import inputPlaces from 'belt/spot/js/places/inputs';

Vue.component('input-places', inputPlaces);

import tilePlaceDefault from 'belt/spot/js/places/tiles/default';
import tilePlaceListItem from 'belt/spot/js/places/tiles/list-item';

Vue.component('tile-place-default', tilePlaceDefault);
Vue.component('tile-place-list-item', tilePlaceListItem);

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

            const app = new Vue({router, store}).$mount('#belt-spot');
        }
    }

}