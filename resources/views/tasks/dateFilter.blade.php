@extends('layouts.app')

@section('content')
    <div class="container col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading text-center lead">
                Филтриране по дата на последна проверка
            </br/>(само не проверени)
            </div>
            <div class="panel-body">

                <div class="row">
                        <div class="col-sm-10 col-sm-offset-2">
                            <form class="form-horizontal" action="{!! route('dateFilter.filter') !!}" method="post">
                                {{ csrf_field() }}

                                <!-- Начална дата -->
                                <div class="form-group col-sm-4">
                                    <label for="fromDateToDate-startDate" class="control-label col-sm-4">От дата:</label>

                                    <div class="col-sm-8">
                                        <input type="date" name="startDate" id="fromDateToDate-startDate" class="form-control" value="{{$startDate}}">
                                    </div>
                                </div>

                                <!-- До дата -->
                                <div class="form-group col-sm-4">
                                    <label for="fromDateToDate-endDate" class="control-label col-sm-4">До дата:</label>

                                    <div class="col-sm-8">
                                        <input type="date" name="endDate" id="fromDateToDate-endDate" class="form-control" value="{{$endDate}}">
                                    </div>
                                </div>
                                <div class="form-group pull-left col-sm-2">
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn-margin fa-edit"></i><b>Обнови</b>
                                        </button>
                                    </div>
                                </div>



                            </form>
                        </div>
                    </div>

            </div>
       </div>
       <div class="col-sm-offset-0 col-sm-12 table-bordered">

             <table id="tasks-table">
                  <thead>
                      <tr>
                          <th></th>
                          <th>Име</th>
                          <th>Адрес</th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th>Телефон</th>
                          <th>Рег.№</th>
                          <th></th>

                      </tr>
                  </thead>
              </table>

       @stop

       @push('scripts')

            @include('tasks.tableRow')

             <script>
                     var template = Handlebars.compile($("#details-template").html());

                         var table = $('#tasks-table').DataTable({
                             processing: true,
                             serverSide: true,
                             ajax: '{!! action('TaskController@fromDateToDate', ['startDate' => $startDate, 'endDate' => $endDate]) !!}', // Вика метода в контролера с добавени променливи
                             columns: [
                                 {
                                     "className":      'details-control',
                                     "orderable":      false,
                                     "searchable":     false,
                                     "data":           null,
                                     "defaultContent": ''
                                 },
                                 { data: 'name', name: 'name' },
                                 { data: 'address', name: 'address',
                                    render: function ( data, type, full, meta ) {
                                    return ' ул. '+data;
                                    }
                                 },
                                 { data: 'address_num', name: 'address_num',
                                    render: function ( data, type, full, meta ) {
                                      return ' № '+data;
                                    }
                                  },
                                 { data: 'entrance', name: 'entrance',
                                   render: function ( data, type, full, meta ) {
                                     return ' вх. '+data;
                                   }
                                 },
                                 { data: 'floor', name: 'floor',
                                   render: function ( data, type, full, meta ) {
                                     return ' ет. '+data;
                                   }
                                 },
                                 { data: 'appartment', name: 'appartment',
                                   render: function ( data, type, full, meta ) {
                                     return ' ап. '+data;
                                   }
                                 },
                                 { data: 'telephone', name: 'telephone' },
                                 { data: 'reg_number', name: 'reg_number' },
                                 { data: 'id',
                                   render: function ( data, type, full, meta ) {
                                     return ' <a href="../task/'+data+'/edit">{{ Form::button('<i class="fa fa-edit fa-lg"></i>', array('class' => 'btn btn-warning')) }}</a>';
                                   }
                                 },

                             ],
                             order: [[1, 'asc']]
                         });

                         // Add event listener for opening and closing details
                         $('#tasks-table tbody').on('click', 'td.details-control', function () {
                             var tr = $(this).closest('tr');
                             var row = table.row( tr );

                             if ( row.child.isShown() ) {
                                 // This row is already open - close it
                                 row.child.hide();
                                 tr.removeClass('shown');
                             }
                             else {
                                 // Open this row
                                 row.child( template(row.data()) ).show();
                                 tr.addClass('shown');
                             }
                         });

                     </script>

       @endpush
