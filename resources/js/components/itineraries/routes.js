import index from 'belt/spot/js/components/itineraries/ctlr/index';
import create from 'belt/spot/js/components/itineraries/ctlr/create';
import edit  from 'belt/spot/js/components/itineraries/ctlr/edit';
import attachments  from 'belt/spot/js/components/itineraries/ctlr/attachments';
import categories  from 'belt/spot/js/components/itineraries/ctlr/categories';
import places  from 'belt/spot/js/components/itineraries/ctlr/places';
import sections  from 'belt/spot/js/components/itineraries/ctlr/sections';
import tags  from 'belt/spot/js/components/itineraries/ctlr/tags';

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