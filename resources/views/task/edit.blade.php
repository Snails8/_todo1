<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>todo管理</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="card">
          <div class="card-header">タスク編集</div>
          <div class="card-body">
              {!! Form::open(['url' => '/task/'.$task->task_id .'/edit', 'method' => 'put']) !!}
                <div class="form-group">
                  {!! Form::label('statusId', 'ステータス') !!}
                  {!! Form::select('statusId', array_pluck($statuses, 'status_name', 'status_id'), $task->status_id, ['class' => 'custom-select']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('taskName', 'タスク名') !!}
                  {!! Form::text('taskName', ($errors->has('taskName') ? old('taskName') : $task->task_name), ['class' => 'form-control '. ($errors->has('taskName') ? 'is-invalid' : '')]) !!}
                  <div class="invalid-feedback">{{$errors->first('taskName')}}</div>
                </div>
                <div class="form-group">
                  {!! Form::label('taskContents', 'タスク内容') !!}
                  {!! Form::textarea('taskContents', ($errors->has('taskContents') ? old('taskContents') : $task->task_contents), ['class' => 'form-control '. ($errors->has('taskContents') ? 'is-invalid' : ''), 'rows' => '3']) !!}
                  <div class="invalid-feedback">{{$errors->first('taskContents')}}</div>
                </div>
                <div class="form-group">
                  {!! Form::label('dueDate', '期限') !!}
                  {!! Form::date('dueDate',$task->due_date, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
                {!! link_to('/tasks', '戻る', ['class' => 'btn btn-primary']) !!}
              {!! Form::close() !!}
          </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
