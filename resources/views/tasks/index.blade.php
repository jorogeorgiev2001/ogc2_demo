@extends('layouts.app')


@section('content')
    <div class="container col-sm-12">
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
                             ajax: '{!! route('tasks.data') !!}',
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
                                     return ' <a href="task/'+data+'/edit">{{ Form::button('<i class="fa fa-edit fa-lg"></i>', array('class' => 'btn btn-warning')) }}</a>';
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
