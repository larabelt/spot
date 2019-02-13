<section>
    <div class="row">
        <div class="col-lg-12">
            <div id="belt-app-pre-main">
                <div id="belt-work-requests-alerts"><!----></div>
            </div>

            <div id="belt-spot">
                <div>
                    <div>
                        <section class="content-header">
                            <ol class="breadcrumb">
                                <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                <li><a href="/admin/belt/spot/events" class="router-link-exact-active router-link-active">Event Manager</a></li>
                            </ol>
                            <h1><span>Event Manager</span>
                                <small></small>
                                <span class="pull-right"><span><span class="pull-right"><a href="/tbd" target="_blank"><i class="fa fa-question-circle"></i></a></span></span></span></h1>
                        </section>
                    </div>
                    <section class="content-subheader"><p class="text-muted">Manage your event.</p></section>
                    <section class="content">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="filter-set clearfix">
                                    <div class="pull-left"><span><div class="form-group filter pull-left"><label>Filter</label> <div class="form-group"><div class="input-group"><input placeholder="filter" class="form-control"> <!----></div></div></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter pull-left"><label>Type</label> <div class="form-group"><select title="item type" class="form-control"><option value=""></option> <option value="default">default</option></select></div></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter pull-left"><label>Starts At</label> <div class="form-inline"><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div> <input type="date" name="column_date" class="form-control"></div> <!----></div> <!----></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter pull-left"><label>Ends At</label> <div class="form-inline"><div class="input-group date"><div class="input-group-addon"><i class="fa fa-calendar"></i></div> <input type="date" name="column_date" class="form-control"></div> <!----></div> <!----></div></span></div>
                                    <div class="pull-left"><span><div class="form-group filter pull-left filter-priority"><label>Priority</label> <div class="form-group"><select title="item priority" class="form-control"><option value="0">0 or higher</option><option value="1">1 or higher</option><option value="2">2 or higher</option><option value="3">3 or higher</option><option value="4">4 or higher</option><option
                                                                value="5">5 or higher</option><option value="6">6 or higher</option><option value="7">7 or higher</option><option value="8">8 or higher</option><option value="9">9 or higher</option><option value="10">10 or higher</option></select></div></div></span></div>
                                    <div class="pull-right"><a href="/admin/belt/spot/events/create" class="btn btn-primary">add an event</a></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                ID
                                                <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by events.id"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th>
                                                Type
                                                <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by events.subtype"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th>
                                                Name
                                                <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by events.name"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th>
                                                Starts
                                                <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by events.starts_at"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th>
                                                Ends
                                                <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by events.ends_at"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th class="column-sorter-priority">
                                                Priority
                                                <span><span class="belt-column-sorter pull-right asc"><a href="" title="sort by events.priority"><i class="fa fa-arrows-v"></i> <i class="fa fa-sort-amount-asc"></i> <i class="fa fa-sort-amount-desc"></i></a></span></span></th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>12</td>
                                            <td>default</td>
                                            <td>ab eaque</td>
                                            <td>02/02/2019 4:35 AM</td>
                                            <td>02/17/2019 11:39 AM</td>
                                            <td class="table-data-priority">4</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/12" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>default</td>
                                            <td>aut</td>
                                            <td>01/30/2019 3:05 AM</td>
                                            <td>02/27/2019 9:42 AM</td>
                                            <td class="table-data-priority">6</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/7" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>17</td>
                                            <td>default</td>
                                            <td>autem fuga</td>
                                            <td>02/03/2019 6:08 AM</td>
                                            <td>02/20/2019 6:45 PM</td>
                                            <td class="table-data-priority">4</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/17" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>22</td>
                                            <td>default</td>
                                            <td>cupiditate et</td>
                                            <td>02/03/2019 1:52 AM</td>
                                            <td>02/17/2019 9:54 AM</td>
                                            <td class="table-data-priority">3</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/22" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>default</td>
                                            <td>dignissimos</td>
                                            <td>01/30/2019 2:32 AM</td>
                                            <td>03/02/2019 6:13 AM</td>
                                            <td class="table-data-priority">4</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/4" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>default</td>
                                            <td>et est</td>
                                            <td>01/29/2019 7:25 AM</td>
                                            <td>02/25/2019 8:04 AM</td>
                                            <td class="table-data-priority">4</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/1" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>14</td>
                                            <td>default</td>
                                            <td>explicabo</td>
                                            <td>01/29/2019 3:08 PM</td>
                                            <td>02/15/2019 11:25 AM</td>
                                            <td class="table-data-priority">10</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/14" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>default</td>
                                            <td>facere</td>
                                            <td>01/25/2019 7:02 AM</td>
                                            <td>02/28/2019 4:17 AM</td>
                                            <td class="table-data-priority">9</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/8" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15</td>
                                            <td>default</td>
                                            <td>in</td>
                                            <td>01/28/2019 8:10 AM</td>
                                            <td>02/16/2019 1:10 AM</td>
                                            <td class="table-data-priority">7</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/15" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>18</td>
                                            <td>default</td>
                                            <td>ipsam aut</td>
                                            <td>02/02/2019 10:33 PM</td>
                                            <td>02/17/2019 5:20 PM</td>
                                            <td class="table-data-priority">8</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/18" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>19</td>
                                            <td>default</td>
                                            <td>nemo sed</td>
                                            <td>02/09/2019 8:23 PM</td>
                                            <td>03/01/2019 10:01 PM</td>
                                            <td class="table-data-priority">8</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/19" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>21</td>
                                            <td>default</td>
                                            <td>neque quibusdam</td>
                                            <td>01/29/2019 6:22 AM</td>
                                            <td>02/26/2019 3:45 PM</td>
                                            <td class="table-data-priority">1</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/21" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>default</td>
                                            <td>nesciunt</td>
                                            <td>02/05/2019 6:48 PM</td>
                                            <td>02/20/2019 12:06 AM</td>
                                            <td class="table-data-priority">1</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/3" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>default</td>
                                            <td>non</td>
                                            <td>02/10/2019 5:27 PM</td>
                                            <td>02/18/2019 5:46 AM</td>
                                            <td class="table-data-priority">9</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/2" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>25</td>
                                            <td>default</td>
                                            <td>perferendis</td>
                                            <td>01/22/2019 2:00 PM</td>
                                            <td>02/22/2019 5:18 AM</td>
                                            <td class="table-data-priority">6</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/25" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>default</td>
                                            <td>quis</td>
                                            <td>02/10/2019 11:40 AM</td>
                                            <td>02/17/2019 12:46 PM</td>
                                            <td class="table-data-priority">9</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/20" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>16</td>
                                            <td>default</td>
                                            <td>quis labore</td>
                                            <td>01/22/2019 7:09 AM</td>
                                            <td>03/01/2019 5:21 PM</td>
                                            <td class="table-data-priority">1</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/16" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>default</td>
                                            <td>quos corrupti</td>
                                            <td>01/28/2019 10:12 PM</td>
                                            <td>02/25/2019 6:46 PM</td>
                                            <td class="table-data-priority">8</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/13" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>default</td>
                                            <td>reprehenderit itaque</td>
                                            <td>01/23/2019 7:42 PM</td>
                                            <td>03/02/2019 9:51 AM</td>
                                            <td class="table-data-priority">7</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/6" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>default</td>
                                            <td>sint</td>
                                            <td>02/08/2019 7:27 AM</td>
                                            <td>02/23/2019 11:31 AM</td>
                                            <td class="table-data-priority">4</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="dropdown" aria-expanded="false" title="options" class="btn btn-xs btn-default dropdown-toggle text-muted"><i class="fa fa-gear"></i></button>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="fa fa-clone"></i> Copy</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a class="modal-delete-trigger ''"><i class="fa fa-trash"></i> Remove</a></li>
                                                    </ul>
                                                    <a href="/admin/belt/spot/events/edit/11" class="btn btn-xs btn-default" title="edit event"><i class="fa fa-edit"></i></a></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Type</th>
                                            <th>Name</th>
                                            <th>Starts</th>
                                            <th>Ends</th>
                                            <th class="column-sorter-priority">Priority</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div>
                                    <div class="row belt-pagination">
                                        <div class="col-md-4">
                                            <div role="status" aria-live="polite" class="pagination">
                                                Showing 1 to 20 of 25 entries
                                            </div>
                                        </div>
                                        <div class="col-md-8"><span class="pull-right"><ul class="pagination-sm pagination"><li class="disabled"><span><i title="first page" class="fa fa-step-backward"></i></span></li> <li class="disabled"><span><i title="previous page" class="fa fa-backward"></i></span></li> <li class="active"><a href="" title="page 1">1</a></li><li class=""><a href=""
                                                                                                                                                                                                                                                                                                                                                                                             title="page 2">2</a></li> <li><a
                                                                href="" title="next page"><i class="fa fa-forward"></i></a></li> <li><a href="" title="last page"><i class="fa fa-step-forward"></i></a></li></ul></span> <span class="pull-right"><div class="form-inline"><div class="form-group"><select title="items per page" class="form-control" style="height: 30px;"><option
                                                                    value="">show 20 items</option> <option value="10">10 items</option><option value="50">50 items</option><option value="100">100 items</option><option value="500">500 items</option><option value="1000">1000 items</option></select></div></div></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</section>