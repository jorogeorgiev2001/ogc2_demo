@extends('layouts.app')

@section('content')
<div class="col-sm-12">
  <!-- New Task Form -->
  <form action="{{ url('task/store') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

<div class="panel panel-info">
    <div class="panel-heading lead">
      <div class="row">
        <div class="col-sm-6 col-xs-8">
                      Нов клиент
        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-2 col-xs-4">
        <!-- Add Task Button -->

            <div class="pull-left">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-btn-margin fa-edit"></i><b>Добави</b>
                </button>
            </div>

      </div>
      <div class="col-sm-0">

      </div>
    </div>

    </div>

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

              <div class="row">
                <div class="col-sm-6"

                        <fieldset>
                          <legend>Клиент</legend>

                          <!-- Име -->
                          <div class="form-group">
                              <label for="task-name" class="col-sm-2 control-label">Име</label>

                              <div class="col-sm-10">
                                  <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                              </div>
                          </div>


                          <!-- Адрес (само улица) -->
                          <div class="form-group">
                              <label for="task-address" class="col-sm-2 control-label">Адрес</label>

                              <div class="col-sm-8">
                                  <input type="text" name="address" id="task-address" class="form-control" value="{{ old('task') }}">
                              </div>
                          </div>

                        <div class="row col-sm-offset-2">

                                <!-- Номер -->
                                <div class="form-group col-sm-6">
                                    <label for="task-address_num" class="col-sm-2 control-label">№</label>

                                    <div class="col-sm-10">
                                        <input type="number" min="1" max="333" name="address_num" id="task-address_num" class="form-control" value="{{ old('task') }}">
                                    </div>
                                </div>

                                <!-- Вход -->
                                <div class="form-group col-sm-6">
                                    <label for="task-entrance" class="col-sm-2 control-label">Вх.</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="entrance" id="task-entrance" class="form-control" value="{{ old('task') }}">
                                    </div>
                                </div>
                        </div>
                        <div class="row col-sm-offset-2">

                                <!-- Етаж -->
                                <div class="form-group col-sm-6">
                                    <label for="task-floor" class="col-sm-2 control-label">Ет.</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="floor" id="task-floor" class="form-control" value="{{ old('task') }}">
                                    </div>
                                </div>

                                <!-- Апартамент -->
                                <div class="form-group col-sm-6">
                                    <label for="task-appartment" class="col-sm-2 control-label">Ап.</label>

                                    <div class="col-sm-10">
                                        <input type="number" min="1" max="100" name="appartment" id="task-appartment" class="form-control" value="{{ old('task') }}">
                                    </div>
                                </div>

                        </div>

                          <!-- Телефон -->
                          <div class="form-group">
                              <label for="task-telephone" class="col-sm-2 control-label">Тел.</label>

                              <div class="col-sm-6">
                                  <input type="tel" name="telephone" id="task-telephone" class="form-control" value="{{ old('task') }}">
                              </div>
                          </div>


                          <!-- Бележки -->
                          <div class="form-group">
                              <label for="task-notes" class="col-sm-2 control-label">Бележки</label>

                              <div class="col-sm-6">

                                  <textarea name="notes" id="task-notes" class="form-control"></textarea>
                              </div>
                          </div>
                        </fieldset>

                </div>
                <div class="col-sm-6"

                        <fieldset>
                          <legend>Съоръжение</legend>

                          <!-- Регистрационен номер -->
                          <div class="form-group">
                              <label for="task-reg_number" class="col-sm-3 control-label">Рег. №</label>

                              <div class="col-sm-5">
                                  <input type="text" pattern="696-ГИ-[0-9]{5}" name="reg_number" id="task-reg_number" class="form-control" value="696-ГИ-">
                              </div>
                          </div>

                          <!-- Проверен ли е -->
                          <div class="form-group">
                              <label for="task-is_checked" class="col-sm-3 control-label">Проверен</label>

                              <div class="col-sm-3">
                                <input id="task-is_checked" type="radio" name="is_checked" value="1">Да &nbsp;
                                <input id="task-is_checked" type="radio" name="is_checked" value="0">Не
                              </div>
                          </div>

                          <!-- Дата на последната проверка -->
                          <div class="form-group">
                              <label for="task-date_of_last_check" class="col-sm-3 control-label">Последна проверка:</label>

                              <div class="col-sm-5">
                                  <input type="date" name="date_of_last_check" id="task-date_of_last_check" class="form-control" value="{{ old('task') }}">
                              </div>
                          </div>

                          <!-- Насрочен за дата... -->
                          <div class="form-group">
                              <label for="task-date_scheduled" class="col-sm-3 control-label">Насрочен за дата:</label>

                              <div class="col-sm-5">
                                  <input type="date" name="date_scheduled" id="task-date_scheduled" class="form-control" value="{{ old('task') }}">
                              </div>
                          </div>

                          <!-- Номер на табло -->
                          <div class="form-group">
                              <label for="task-equip_value" class="col-sm-3 control-label">№ табло</label>

                              <div class="col-sm-3">
                                  <input type="text" pattern="[0-9]{5}" name="equip_value" id="task-equip_value" class="form-control" value="{{ old('task') }}">
                              </div>
                          </div>

                          <!-- Тип инсталация -->
                          <div class="form-group">
                              <label for="task-type" class="col-sm-3 control-label">Тип инсталация</label>

                              <div class="col-sm-3">
                                  <select name="type" id="task-type" class="form-control">
                                    <option value="ВГИ" selected>ВГИ</option>
                                    <option value="СГИ">СГИ</option>
                                    <option value="СГИ - 1 аб.">СГИ - 1 аб.</option>
                                    <option value="СГИ - 2 аб.">СГИ - 2 аб.</option>
                                  </select>
                              </div>
                          </div>

                          <!-- Статус -->
                          <div class="form-group">
                              <label for="task-status" class="col-sm-3 control-label">Статус:</label>

                              <div class="col-sm-5">
                                  <select name="status" id="task-status" class="form-control">
                                    <option value="непроверен" selected>непроверен</option>
                                    <option value="обаждане">обаждане</option>
                                    <option value="отложен">отложен</option>
                                    <option value="насрочен">насрочен</option>
                                    <option value="проблем">проблем</option>
                                    <option value="проверен">проверен</option>
                                  </select>
                              </div>
                          </div>

                          <!-- Инспектор -->
                          <div class="form-group">
                              <label for="task-inspector" class="col-sm-3 control-label">Инспектор</label>

                              <div class="col-sm-7">
                                  <select name="inspector" id="task-inspector" class="form-control">
                                    <option value="{{ old('task') }}"></option>
                                    <option value="Д">Д</option>
                                    <option value="Г">Г</option>
                                    <option value="К">К</option>
                                  </select>
                              </div>
                          </div>
                        </fieldset>

                </div>
        </div>

    </div>

                      </form>

</div>
</div>

@endsection
