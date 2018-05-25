import list from 'belt/spot/js/events/list';
import create from 'belt/spot/js/events/create';
import edit from 'belt/spot/js/events/edit';
import addresses from 'belt/spot/js/events/edit/addresses';
import attachments from 'belt/spot/js/events/edit/attachments';
import params from 'belt/spot/js/events/edit/params';
import sections from 'belt/spot/js/events/edit/sections';
import terms from 'belt/spot/js/events/edit/terms';

export default [
    {path: '/events', component: list, canReuse: false, name: 'events'},
    {path: '/events/create', component: create, name: 'events.create'},
    {path: '/events/edit/:id', component: edit, name: 'events.edit'},
    {path: '/events/edit/:id/addresses/:address?', component: addresses, name: 'events.addresses'},
    {path: '/events/edit/:id/attachments', component: attachments, name: 'events.attachments'},
    {path: '/events/edit/:id/sections/:section?', component: sections, name: 'events.sections'},
    {path: '/events/edit/:id/terms', component: terms, name: 'events.terms'},
    {path: '/events/edit/:id/params', component: params, name: 'events.params'},
]