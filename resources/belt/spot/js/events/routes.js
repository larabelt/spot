import list from 'belt/spot/js/events/list';
import create from 'belt/spot/js/events/create';
import edit from 'belt/spot/js/events/edit';
import locations from 'belt/spot/js/events/edit/locations';
import attachments from 'belt/spot/js/events/edit/attachments';
import sections from 'belt/spot/js/events/edit/sections';
import terms from 'belt/spot/js/events/edit/terms';

export default [
    {path: '/events', component: list, canReuse: false, name: 'events'},
    {path: '/events/create', component: create, name: 'events.create'},
    {path: '/events/edit/:id', component: edit, name: 'events.edit'},
    {path: '/events/edit/:id/locations/:location?', component: locations, name: 'events.locations'},
    {path: '/events/edit/:id/attachments', component: attachments, name: 'events.attachments'},
    {path: '/events/edit/:id/sections/:section?', component: sections, name: 'events.sections'},
    {path: '/events/edit/:id/terms', component: terms, name: 'events.terms'},
]