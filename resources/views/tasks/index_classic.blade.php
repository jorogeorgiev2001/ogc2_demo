@extends('layouts.app')

@section('content')
    <div class="container col-sm-12">
        <div class="col-sm-offset-0 col-sm-12">



<!-- Край на формуляра за нов клиент -->

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Клиенти
                    </div>

                    <div class="panel-body">
                        <table id="indexTable" class="table table-striped task-table">
                            <thead>
                                <th>Име</th>
                                <th>Адрес (улица)</th>
                                <th>№</th>
                                <th>Вх.</th>
                                <th>Ет.</th>
                                <th>Ап.</th>
                                <th>Телефон</th>
                                <th>Рег. №</th>
                                <th>Тип</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
                                        <td class="table-text"><div>{{ $task->address }}</div></td>
                                        <td class="table-text"><div>{{ $task->address_num }}</div></td>
                                        <td class="table-text"><div>{{ $task->entrance }}</div></td>
                                        <td class="table-text"><div>{{ $task->floor }}</div></td>
                                        <td class="table-text"><div>{{ $task->appartment }}</div></td>
                                        <td class="table-text"><div>{{ $task->telephone }}</div></td>
                                        <td class="table-text"><div>{{ $task->reg_number }}</div></td>
                                        <td class="table-text"><div>{{ $task->type }}</div></td>


                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
