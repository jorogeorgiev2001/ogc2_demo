<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {

        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);

    }

    public function add(Request $request)
    {
        return view('tasks.add', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function edit($id)
    {
      $task = Task::find($id);

        return view('tasks.edit')->with('task', $task);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

      $this->validate($request, [
          'name'            => 'required|max:255',
          'address'         => 'required|max:255',
          'address_num'     => 'required|numeric|max:999',
          'entrance'        => 'string|max:1',
          'floor'           => 'numeric',
          'appartment'      => 'numeric|max:100',
          'reg_number'      => 'string|max:12',
          'telephone'       => 'string|max:10',
          'is_checked'      => 'string',
          'date_of_last_check' => 'date',
          'date_scheduled'  => 'date',
          'equip_value'     => 'integer',
          'type'            => 'string|max:10', // оставям повече, за да се уточнява колко хора са
          'notes'           => 'string|max:255',
          'status'          => 'string',          // оставям ги празни, за да пробвам дали работи
          'inspector'       => 'string'
      ]);


      Task::find($id)->update([
          'name'            => $request->name,
          'address'         => $request->address,
          'address_num'     => $request->address_num,
          'entrance'        => $request->entrance,
          'floor'           => $request->floor,
          'appartment'      => $request->appartment,
          'reg_number'      => $request->reg_number,
          'telephone'       => $request->telephone,
          'is_checked'      => $request->is_checked,
          'date_of_last_check' => $request->date_of_last_check,
          'date_scheduled'  => $request->date_scheduled,
          'equip_value'     => $request->equip_value,
          'type'            => $request->type,
          'notes'           => $request->notes,
          'status'          => $request->status,
          'inspector'       => $request->inspector
      ]);
      \Session::flash('flash_message', 'Записът е обновен успешно!');
      return redirect('/tasks')->with('success','Item updated successfully');

    }


// ДОбавено заради Datatables

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
public function anyData()
{

    return Datatables::of(
      Task::select('id','user_id','name','address','address_num','entrance','floor','appartment',
                   'reg_number','telephone','is_checked','date_of_last_check',
                   'date_scheduled','equip_value','type','notes','status','inspector')
                   ->where('user_id', '=', \Auth::id())
      )
    ->make(true);
}


public function fromDateToDate(Request $request)
{


    return Datatables::of(
        Task::select('id','name','address','address_num','entrance','floor','appartment',
                     'reg_number','telephone','is_checked','date_of_last_check',
                     'date_scheduled','equip_value','type','notes','status','inspector')
                     ->whereDate('date_of_last_check', '>=', $request->startDate)
                     ->whereDate('date_of_last_check', '<=', $request->endDate)
                     ->where('is_checked', '0')
                     ->where('user_id', '=', \Auth::id())
        )
        ->make(true);
}

public function dateFilter(Request $request)
{

    return view('tasks.dateFilter')->with('startDate', session()->get('startDate'))->with('endDate', session()->get('endDate'));

}


/**
* Обновяване на филтъра от формата за избор на дати
*
* @param Request $request
* @return Response
*/
public function updateDateFilter(Request $request)
{
    $startDate  = $request->startDate;
    $endDate    = $request->endDate;

    // Връща изгледа с променливи
    return redirect()->back()->with('startDate', $startDate)->with('endDate', $endDate);
}
//Край Datatables

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'            => 'required|max:255',
            'address'         => 'required|max:255',
            'address_num'     => 'required|numeric|max:999',
            'entrance'        => 'string|max:1',
            'floor'           => 'numeric',
            'appartment'      => 'numeric|max:100',
            'reg_number'      => 'string|max:12',
            'telephone'       => 'string|max:10',
            'is_checked'      => 'string',
            'date_of_last_check' => 'date',
            'date_scheduled'  => 'date',
            'equip_value'     => 'integer',
            'type'            => 'string|max:10', // оставям повече, за да се уточнява колко хора са
            'notes'           => 'string|max:255',
            'status'          => 'string',          // оставям ги празни, за да пробвам дали работи
            'inspector'       => 'string'
        ]);

        $request->user()->tasks()->create([
            'name'            => $request->name,
            'address'         => $request->address,
            'address_num'     => $request->address_num,
            'entrance'        => $request->entrance,
            'floor'           => $request->floor,
            'appartment'      => $request->appartment,
            'reg_number'      => $request->reg_number,
            'telephone'       => $request->telephone,
            'is_checked'      => $request->is_checked,
            'date_of_last_check' => $request->date_of_last_check,
            'date_scheduled'  => $request->date_scheduled,
            'equip_value'     => $request->equip_value,
            'type'            => $request->type,
            'notes'           => $request->notes,
            'status'          => $request->status,
            'inspector'       => $request->inspector
        ]);

        return redirect('/tasks');

    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

}
