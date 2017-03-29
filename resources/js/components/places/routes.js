import index from './ctlr/index';
import create from './ctlr/create';
import edit  from './ctlr/edit';
import categories  from './ctlr/categories';
import attachments  from './ctlr/attachments';
import tags  from './ctlr/tags';
import amenities  from './ctlr/amenities';

export default [
    {path: '/places', component: index, canReuse: false, name: 'places'},
    {path: '/places/create', component: create, name: 'places.create'},
    {path: '/places/edit/:id', component: edit, name: 'places.edit'},
    {path: '/places/edit/:id/attachments', component: attachments, name: 'places.attachments'},
    {path: '/places/edit/:id/categories', component: categories, name: 'places.categories'},
    {path: '/places/edit/:id/tags', component: tags, name: 'places.tags'},
    {path: '/places/edit/:id/amenities', component: amenities, name: 'places.amenities'},
]