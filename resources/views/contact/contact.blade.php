<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
<body>
  <div class="table-responsive" style="margin-top: 2rem;" id="student-table">
    <table class="table table-hover table-bordered text-center">
      <thead class="thead-light">
        <tr>
          <th>№</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Register</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @foreach ($data as $i)
          <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->lname}}</td>
            <td>{{$i->fname}}</td>
            <td>{{$i->register}}</td>
            <td>{{$i->desc}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
