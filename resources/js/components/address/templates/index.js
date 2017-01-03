export default `
    <div class="box box-primary">
        <div class="box-body">
            <div class="btn-group">
                <router-link to="/addresses/create" v-bind:class="'btn btn-primary'">add address</router-link>
            </div>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            ID
                            <column-sorter :route="'addressIndex'" :column="'addresses.id'"></column-sorter>
                        </th>
                        <th>
                            Url
                            <column-sorter :route="'addressIndex'" :column="'addresses.name'"></column-sorter>
                        </th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>                
                    <tr v-for="item in items">
                        <td>{{ item.id }}</td>
                        <td>{{ item.url }}</td>
                        <td class="text-right">
                            <router-link :to="{ name: 'addressEdit', params: { id: item.id } }" v-bind:class="'btn btn-xs btn-warning'">
                                <i class="fa fa-edit"></i>
                            </router-link>
                            <a class="btn btn-xs btn-danger" v-on:click="destroy(item.id)"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
            </table>
            <pagination :route="'addressIndex'"></pagination>
        </div>
    </div>
`;