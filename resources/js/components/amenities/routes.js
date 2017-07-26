import index from 'belt/spot/js/components/amenities/ctlr/index';
import create from 'belt/spot/js/components/amenities/ctlr/create';
import edit  from 'belt/spot/js/components/amenities/ctlr/edit';

export default [
    {path: '/amenities', component: index, canReuse: false, name: 'amenities'},
    {path: '/amenities/create', component: create, name: 'amenities.create'},
    {path: '/amenities/edit/:id', component: edit, name: 'amenities.edit'},
]