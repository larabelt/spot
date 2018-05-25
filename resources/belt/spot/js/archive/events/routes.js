import index from 'belt/spot/js/events/ctlr/index';
import create from 'belt/spot/js/events/ctlr/create';
import edit  from 'belt/spot/js/events/ctlr/edit';
import addresses  from 'belt/spot/js/events/ctlr/addresses';
import attachments  from 'belt/spot/js/events/ctlr/attachments';
import params  from 'belt/spot/js/events/ctlr/params';
import sections  from 'belt/spot/js/events/ctlr/sections';
import terms  from 'belt/spot/js/events/ctlr/terms';

export default [
    {path: '/events', component: index, canReuse: false, name: 'events'},
    {path: '/events/create', component: create, name: 'events.create'},
    {path: '/events/edit/:id', component: edit, name: 'events.edit'},
    {path: '/events/edit/:id/addresses/:address?', component: addresses, name: 'events.addresses'},
    {path: '/events/edit/:id/attachments', component: attachments, name: 'events.attachments'},
    {path: '/events/edit/:id/sections/:section?', component: sections, name: 'events.sections'},
    {path: '/events/edit/:id/terms', component: terms, name: 'events.terms'},
    {path: '/events/edit/:id/params', component: params, name: 'events.params'},
]