<?php
class TaskService
{
    /**
     * タスクリストの取得
     *
     * @return Collection タスクリスト
     */
    public function getTaskList()
    {
        return Task::all(); // 登録されている全タスクを取得
    }

    /**
     * タスク情報の取得
     *
     * @param int $taskId 取得するタスクID
     * @return Task タスク情報
     */
    public function getTask(int $taskId)
    {
        return Task::find($taskId); // 引数のタスクIDに対応するタスクを取得
    }

    /**
     * タスクの登録
     *
     * @param array $aryTask 登録するタスク情報
     */
    public function registTask(array $aryTask)
    {
        DB::beginTransaction();

        try
        {
            $task = new Task();
            $task->task_name  = $aryTask['task_name'];
            $task->task_contents  = $aryTask['task_contents'];
            $task->status_id  = $aryTask['status_id'];
            $task->due_date = $aryTask['due_date'];
            $task->save(); // タスクを新規に登録
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
    }

    /**
     * タスクの更新
     *
     * @param array $aryTask 更新するタスク情報
     */
    public function updateTask(array $aryTask)
    {
        DB::beginTransaction();

        try
        {
            $task = Task::find($aryTask['task_id']); // 更新するタスクを取得
            $task->task_name  = $aryTask['task_name'];
            $task->task_contents  = $aryTask['task_contents'];
            $task->status_id = $aryTask['status_id'];
            $task->due_date = $aryTask['due_date'];
            $task->save(); // タスクを更新
            DB::commit();
        }
        catch (Exception $e)
        {
            DB::rollBack();
        }
    }

    /**
     * タスクの削除
     *
     * @param int $userId 削除するタスクID
     */
    public function deleteTask(int $taskId)
    {
        Task::find($taskId)->delete(); // 引数のタスクIDに該当するタスクを削除
    }

    /**
     * ステータスリストの取得
     *
     * @return Collection ステータスリスト
     */
    public function getStatusList()
    {
        return Status::all(); // 全ステータスを取得
    }
}
