import list from 'belt/spot/js/amenities/list';
import create from 'belt/spot/js/amenities/create';
import edit  from 'belt/spot/js/amenities/edit';

export default [
    {path: '/amenities', component: list, canReuse: false, name: 'amenities'},
    {path: '/amenities/create', component: create, name: 'amenities.create'},
    {path: '/amenities/edit/:id', component: edit, name: 'amenities.edit'},
]