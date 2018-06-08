import list from 'belt/spot/js/events/list';
import create from 'belt/spot/js/events/create';
import edit from 'belt/spot/js/events/edit';
import addresses from 'belt/spot/js/events/edit/addresses';
import categories from 'belt/spot/js/events/edit/categories';
import attachments from 'belt/spot/js/events/edit/attachments';
import sections from 'belt/spot/js/events/edit/sections';
import tags from 'belt/spot/js/events/edit/tags';

export default [
    {path: '/events', component: list, canReuse: false, name: 'events'},
    {path: '/events/create', component: create, name: 'events.create'},
    {path: '/events/edit/:id', component: edit, name: 'events.edit'},
    {path: '/events/edit/:id/addresses/:address?', component: addresses, name: 'events.addresses'},
    {path: '/events/edit/:id/attachments', component: attachments, name: 'events.attachments'},
    {path: '/events/edit/:id/categories', component: categories, name: 'events.categories'},
    {path: '/events/edit/:id/sections/:section?', component: sections, name: 'events.sections'},
    {path: '/events/edit/:id/tags', component: tags, name: 'events.tags'},
]