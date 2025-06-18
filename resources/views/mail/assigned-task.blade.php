<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
  <div class="email-container">
    <div class="email-title">Task Assigned</div>
    <div class="email-body">
      You have been assigned a new task: <strong>{{ $task->title }}</strong>.<br>
      Assigned on: <strong>{{ $task->created_at->format('l, d/m/Y') }}</strong>.<br><br>

      <strong>Task Description</strong><br>
      {{ $task->description }}<br><br>

      Please review it at your earliest convenience.
    </div>
    <div class="email-footer">
      Thanks,<br>
      Light-It
    </div>
  </div>
</body>
</html>
