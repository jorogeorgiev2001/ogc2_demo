@extends('layouts.app')

@section('content')
    <div class="container col-sm-12">
        <div class="col-sm-offset-0 col-sm-12">

          <table class="table table-bordered" id="tasks-table">
               <thead>
                   <tr>
                       <th>Име</th>
                       <th>Адрес</th>
                       <th>№</th>
                       <th>Вх.</th>
                       <th>Ет.</th>
                       <th>Ап.</th>
                       <th>бутони</th>
                   </tr>
               </thead>
           </table>
       @stop

       @push('scripts')
       <script>

       $(function() {
           $('#tasks-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{!! route('tasks.data') !!}',
               columns: [
                   { data: 'name', name: 'name' },
                   { data: 'address', name: 'address' },
                   { data: 'address_num', name: 'address_num' },
                   { data: 'entrance', name: 'entrance' },
                   { data: 'floor', name: 'floor' },
                   { data: 'appartment', name: 'appartment' },
                   { data: null, defaultContent: '<a href="#">link</a>'}
               ]
           });
       });
       </script>
       @endpush
