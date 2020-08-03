<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスクサービス
     */
    protected $taskService = null;

    /**
     * コンストラクタ
     *
     * @param TaskService $taskService タスクサービス
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * タスク一覧画面の初期表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskService->getTaskList();
        return view('task.index')->with('tasks', $tasks);
    }

    /**
     * タスク登録画面の初期表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * タスク登録
     *
     * @param TaskFormRequest $request タスクフォームリクエスト
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(TaskFormRequest $request)
    {
        $aryTask = [];
        $aryTask['task_name'] = $request->taskName;
        $aryTask['task_contents'] = $request->taskContents;
        $aryTask['due_date'] = $request->dueDate;
        $aryTask['status_id'] = '01';
        $this->taskService->registTask($aryTask);
        return redirect('/tasks');
    }

    /**
     * タスク編集画面の初期表示
     *
     * @param  int  $taskId タスクID
     * @return \Illuminate\Http\Response
     */
    public function edit(int $taskId)
    {
        $task = $this->taskService->getTask($taskId);
        $statuses = $this->taskService->getStatusList();
        return view('task.edit')
                ->with('task', $task)
                ->with('statuses', $statuses);
    }

    /**
     * タスク更新
     *
     * @param TaskFormRequest $request タスクフォームリクエスト
     * @param  int  $taskId タスクID
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(TaskFormRequest $request, int $taskId)
    {
        $aryTask = [];
        $aryTask['task_id'] = $taskId;
        $aryTask['status_id'] = $request->statusId;
        $aryTask['task_name'] = $request->taskName;
        $aryTask['task_contents'] = $request->taskContents;
        $aryTask['due_date'] = $request->dueDate;

        $this->taskService->updateTask($aryTask);

        return redirect('/tasks');
    }

    /**
     * タスク削除
     *
     * @param  int  $taskId タスクID
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(int $taskId)
    {
        $this->taskService->deleteTask($taskId);
        return redirect('/tasks');
    }
}
