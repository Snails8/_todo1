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
          <div class="card-header">タスク一覧</div>
          <div class="card-body">
            <p>{!! link_to('/task/create', '新規登録', ['class' => 'btn btn-primary']) !!}</p>
            <table class="table table-hover table-sm">
              <thead class="thead-light">
              <tr>
                <th>ステータス</th>
                <th>タスク名</th>
                <th>タスク内容</th>
                <th>期限</th>
                <th>&nbsp;</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($tasks as $task)
                <tr>
                  <td>{{$task->status->status_name}}</td>
                  <td>{{$task->task_name}}</td>
                  <td><pre>{{$task->task_contents}}</pre></td>
                  <td>{{$task->due_date}}</td>
                  <td>
                    <a href="{{ url('/task/'.$task->task_id.'/edit') }}" class="btn btn-link py-0 pr-0 border-0">編集</a>
                    {!! Form::open(['url' => '/task/'. $task->task_id. '/delete', 'method' => 'delete', 'class' => 'd-inline']) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-link py-0 border-0']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
