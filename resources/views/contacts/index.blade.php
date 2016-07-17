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
                <img width="80" height="70" class="media-object" src="{{ asset($row->photo) }}" alt="...">                
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
          {!! Form::open(['route' => ['contacts.destroy',$row->id], 'method' => 'DELETE']) !!}
            <a href="{{ route('contacts.edit',$row->id) }}" class="btn btn-circle btn-default btn-xs" title="Edit">
              <i class="glyphicon glyphicon-edit"></i>
            </a>
              <button type="submit" class="btn btn-circle btn-danger btn-xs" title="Delete" onclick="return confirm('Are you sure ?')">
                <i class="glyphicon glyphicon-remove"></i>
              </button>
            {!! Form::close() !!}
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
