@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">{{ __('Тоглолтын түүх') }}</div>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Нэр</th>
                      <th scope="col">И-мэйл</th>
                      <th scope="col">Авсан оноо</th>
                      <th scope="col">Огноо</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($histories as $history)
                      <tr>
                        <td class="text-white">{{$loop->index}}</td>
                        <td class="text-white">{{$history->user_name}}</td>
                        <td class="text-white">{{$history->user_email}}</td>
                        <td class="text-white">{{$history->point}}</td>
                        <td class="text-white">{{date('Y-m-d H:i', strtotime($history->created_at))}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    </div>
</div>
@endsection
