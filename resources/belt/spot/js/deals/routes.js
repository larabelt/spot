import index from 'belt/spot/js/deals/ctlr/index';
import create from 'belt/spot/js/deals/ctlr/create';
import edit  from 'belt/spot/js/deals/ctlr/edit';
import attachments  from 'belt/spot/js/deals/ctlr/attachments';
import terms  from 'belt/spot/js/deals/ctlr/terms';

export default [
    {path: '/deals', component: index, canReuse: false, name: 'deals'},
    {path: '/deals/create', component: create, name: 'deals.create'},
    {path: '/deals/edit/:id', component: edit, name: 'deals.edit'},
    {path: '/deals/edit/:id/attachments', component: attachments, name: 'deals.attachments'},
    {path: '/deals/edit/:id/terms', component: terms, name: 'deals.terms'},
]