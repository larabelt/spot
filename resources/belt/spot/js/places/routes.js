import list from 'belt/spot/js/places/list';
import create from 'belt/spot/js/places/create';
import edit from 'belt/spot/js/places/edit';
import addresses from 'belt/spot/js/places/edit/addresses';
import amenities from 'belt/spot/js/places/edit/amenities';
import attachments from 'belt/spot/js/places/edit/attachments';
import params from 'belt/spot/js/places/edit/params';
import sections from 'belt/spot/js/places/edit/sections';
import terms from 'belt/spot/js/places/edit/terms';

export default [
    {path: '/places', component: list, canReuse: false, name: 'places'},
    {path: '/places/create', component: create, name: 'places.create'},
    {path: '/places/edit/:id', component: edit, name: 'places.edit'},
    {path: '/places/edit/:id/addresses/:address?', component: addresses, name: 'places.addresses'},
    {path: '/places/edit/:id/amenities', component: amenities, name: 'places.amenities'},
    {path: '/places/edit/:id/attachments', component: attachments, name: 'places.attachments'},
    {path: '/places/edit/:id/sections/:section?', component: sections, name: 'places.sections'},
    {path: '/places/edit/:id/terms', component: terms, name: 'places.terms'},
    {path: '/places/edit/:id/params', component: params, name: 'places.params'},
]