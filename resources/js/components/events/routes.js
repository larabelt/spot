import index from './ctlr/index';
import create from './ctlr/create';
import edit  from './ctlr/edit';
import categories  from './ctlr/categories';
import attachments  from './ctlr/attachments';
import sections  from './ctlr/sections';
import tags  from './ctlr/tags';

export default [
    {path: '/events', component: index, canReuse: false, name: 'events'},
    {path: '/events/create', component: create, name: 'events.create'},
    {path: '/events/edit/:id', component: edit, name: 'events.edit'},
    {path: '/events/edit/:id/attachments', component: attachments, name: 'events.attachments'},
    {path: '/events/edit/:id/categories', component: categories, name: 'events.categories'},
    {path: '/events/edit/:id/sections/:section?', component: sections, name: 'events.sections'},
    {path: '/events/edit/:id/tags', component: tags, name: 'events.tags'},
]