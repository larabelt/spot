import index from './ctlr/index';
import create from './ctlr/create';
import edit  from './ctlr/edit';
import attachments  from './ctlr/attachments';
import categories  from './ctlr/categories';
import places  from './ctlr/places';
import sections  from './ctlr/sections';
import tags  from './ctlr/tags';

export default [
    {path: '/itineraries', component: index, canReuse: false, name: 'itineraries'},
    {path: '/itineraries/create', component: create, name: 'itineraries.create'},
    {path: '/itineraries/edit/:id', component: edit, name: 'itineraries.edit'},
    {path: '/itineraries/edit/:id/attachments', component: attachments, name: 'itineraries.attachments'},
    {path: '/itineraries/edit/:id/categories', component: categories, name: 'itineraries.categories'},
    {path: '/itineraries/edit/:id/places/:place?', component: places, name: 'itineraries.places'},
    {path: '/itineraries/edit/:id/sections/:section?', component: sections, name: 'itineraries.sections'},
    {path: '/itineraries/edit/:id/tags', component: tags, name: 'itineraries.tags'},
]