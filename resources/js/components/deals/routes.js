import index from './ctlr/index';
import create from './ctlr/create';
import edit  from './ctlr/edit';
import categories  from './ctlr/categories';
import attachments  from './ctlr/attachments';
import tags  from './ctlr/tags';

export default [
    {path: '/deals', component: index, canReuse: false, name: 'deals'},
    {path: '/deals/create', component: create, name: 'deals.create'},
    {path: '/deals/edit/:id', component: edit, name: 'deals.edit'},
    {path: '/deals/edit/:id/attachments', component: attachments, name: 'deals.attachments'},
    {path: '/deals/edit/:id/categories', component: categories, name: 'deals.categories'},
    {path: '/deals/edit/:id/tags', component: tags, name: 'deals.tags'},
]