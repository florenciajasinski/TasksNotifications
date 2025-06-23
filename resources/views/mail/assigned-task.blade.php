<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Assigned</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f5f9;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: #334155;
    }

    .email-wrapper {
      width: 100%;
      padding: 40px 0;
    }

    .email-container {
      background-color: #ffffff;
      max-width: 600px;
      margin: 0 auto;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .email-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .email-header img {
      width: 50px;
      opacity: 0.3;
    }

    .email-title {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 20px;
      color: #0f172a;
    }

    .email-body {
      font-size: 16px;
      line-height: 1.6;
    }

    .email-body strong {
      color: #0f172a;
    }

    .email-footer {
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-header">
      <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo">
    </div>

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
  </div>
</body>
</html>
