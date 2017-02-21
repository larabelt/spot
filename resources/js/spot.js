import places  from './components/places/routes';

export default class BeltSpot {

    constructor() {

        if ($('#belt-spot').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/belt/spot',
                routes: []
            });

            router.addRoutes(places);

            const app = new Vue({router}).$mount('#belt-spot');
        }
    }

}