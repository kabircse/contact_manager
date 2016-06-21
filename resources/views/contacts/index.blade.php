@extends('layouts.main')

@section('content')
  <div class="panel panel-default">
    @if(count($contacts)>0)
    <table class="table">
      @foreach($contacts as $row)
      <tr>
        <td class="middle">
          <div class="media">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="http://placehold.it/100x100" alt="...">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">{{$row->name}}</h4>
              <address>
                <strong>{{$row->company}}</strong><br>
                {{$row->email}}
              </address>
            </div>
          </div>
        </td>
        <td width="100" class="middle">
          <div>
            <a href="#" class="btn btn-circle btn-default btn-xs" title="Edit">
              <i class="glyphicon glyphicon-edit"></i>
            </a>
            <a href="#" class="btn btn-circle btn-danger btn-xs" title="Edit">
              <i class="glyphicon glyphicon-remove"></i>
            </a>
          </div>
        </td>
      </tr>
      @endforeach
    </table>
    @endif
  </div>

  <div class="text-center">
    {{$contacts->appends(Request::query())->links()}}
  </div>
@endsection
