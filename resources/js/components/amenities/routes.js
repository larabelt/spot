import index from './ctlr/index';
import create from './ctlr/create';
import edit  from './ctlr/edit';

export default [
    {path: '/amenities', component: index, canReuse: false, name: 'amenities'},
    {path: '/amenities/create', component: create, name: 'amenities.create'},
    {path: '/amenities/edit/:id', component: edit, name: 'amenities.edit'},
]