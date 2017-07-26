import index from 'belt/spot/js/components/deals/ctlr/index';
import create from 'belt/spot/js/components/deals/ctlr/create';
import edit  from 'belt/spot/js/components/deals/ctlr/edit';
import categories  from 'belt/spot/js/components/deals/ctlr/categories';
import attachments  from 'belt/spot/js/components/deals/ctlr/attachments';
import tags  from 'belt/spot/js/components/deals/ctlr/tags';

export default [
    {path: '/deals', component: index, canReuse: false, name: 'deals'},
    {path: '/deals/create', component: create, name: 'deals.create'},
    {path: '/deals/edit/:id', component: edit, name: 'deals.edit'},
    {path: '/deals/edit/:id/attachments', component: attachments, name: 'deals.attachments'},
    {path: '/deals/edit/:id/categories', component: categories, name: 'deals.categories'},
    {path: '/deals/edit/:id/tags', component: tags, name: 'deals.tags'},
]