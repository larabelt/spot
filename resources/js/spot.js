import blockIndex from './components/block/ctlr-index';
import blockCreate from './components/block/ctlr-create';
import blockEdit  from './components/block/ctlr-edit';
import pageIndex from './components/page/ctlr-index';
import pageCreate from './components/page/ctlr-create';
import pageEdit  from './components/page/ctlr-edit';
import placeIndex from './components/place/ctlr-index';
import placeCreate from './components/place/ctlr-create';
import placeEdit  from './components/place/ctlr-edit';

export default class OhioSpot {

    constructor() {

        if ($('#ohio-spot').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/ohio/spot',
                routes: [
                    {path: '/blocks', component: blockIndex, canReuse: false, name: 'blockIndex'},
                    {path: '/blocks/create', component: blockCreate, name: 'blockCreate'},
                    {path: '/blocks/edit/:id', component: blockEdit, name: 'blockEdit'},
                    {path: '/pages', component: pageIndex, canReuse: false, name: 'pageIndex'},
                    {path: '/pages/create', component: pageCreate, name: 'pageCreate'},
                    {path: '/pages/edit/:id', component: pageEdit, name: 'pageEdit'},
                    {path: '/places', component: placeIndex, canReuse: false, name: 'placeIndex'},
                    {path: '/places/create', component: placeCreate, name: 'placeCreate'},
                    {path: '/places/edit/:id', component: placeEdit, name: 'placeEdit'},
                ]
            });

            const app = new Vue({router}).$mount('#ohio-spot');
        }
    }

}