<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
<body>
  <div class="table-responsive" style="margin-top: 2rem;" id="student-table">
    <table class="table table-hover table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>№</th>
          <th>Title</th>
          <th>Description</th>
          <th>Create date</th>
          <th>User</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($data as $i)
          <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->title}}</td>
            <td>{{$i->description}}</td>
            <td>{{$i->create_date}}</td>
            <td>{{$i->user}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
