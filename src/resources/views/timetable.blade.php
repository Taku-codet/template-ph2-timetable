<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>時間割</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <h2>区画1：月曜日の授業</h2>
  <table>
    <tr><th>時限</th><th>科目コード</th><th>科目名</th><th>教員</th><th>教室</th></tr>
    @foreach ($mondayCourses as $course)
      <tr>
        <td>{{ $course->period }}限</td>
        <td>{{ $course->code }}</td>
        <td>{{ $course->name }}</td>
        <td>{{ $course->teacher }}</td>
        <td>{{ $course->room }}</td>
      </tr>
    @endforeach
  </table>
    <h2>区画2：必修の授業</h2>
  <table>
    <tr><th>科目名</th><th>単位</th>
    @foreach ($requiredCourses as $require)
      <tr>
        <td>{{ $require->name }}</td>
        <td>{{ $require->credits}}</td>
      </tr>
    @endforeach
  </table>
</body>
</html>