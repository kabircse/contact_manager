@extends('layouts.main')

@section('content')
  {!! Form::model($contact,['method'=>'patch', 'route' => ['contacts.update',$contact->id], 'files'=>true]) !!}
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>Edit Contact</strong>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <label for="name" class="control-label col-md-3">Name</label>
                <div class="col-md-8">
                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="company" class="control-label col-md-3">Company</label>
                <div class="col-md-8">
                  {!! Form::text('company', null, ['class'=>'form-control']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="email" class="control-label col-md-3">Email</label>
                <div class="col-md-8">
                  {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="mobile" class="control-label col-md-3">Mobile</label>
                <div class="col-md-8">
                  {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="control-label col-md-3">Address</label>
                <div class="col-md-8">
                  {!! Form::textarea('address', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
              </div>
              <div class="form-group">
                <label for="group" class="control-label col-md-3">Group</label>
                <div class="col-md-5">
                  {!! Form::select('group_id',$groups,null,['class'=>'form-control']) !!}
                </div>
                <div class="col-md-3">
                  <a href="#" id="add-group-btn" class="btn btn-default btn-block">Add Group</a>
                </div>
              </div>
              <div class="form-group" id="add-new-group" style="display:none">
                <div class="col-md-offset-3 col-md-8">
                  <div class="input-group">
                    {!! Form::text('new_group', null, ['class'=>'form-control', 'id'=>'new-group']) !!}
                    <span class="input-group-btn">
                      <a href="#" class="btn btn-default">
                        <i class="glyphicon glyphicon-ok"></i>
                      </a>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                  <img src="http://placehold.it/150x150" alt="Photo">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div class="text-center">
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Choose Photo</span><span class="fileinput-exists">Change</span>{!! Form::file('photo')!!}</span>
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-offset-3 col-md-6">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('contacts.index') }}" class="btn btn-default">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  {!! form::close()!!}
  @section('script')
    <script>
      $(function(){
        $('#add-group-btn').click(function(){
              $('#add-new-group').slideToggle(function(){
                $('#new-group').focus();
            });
        });
      });
    </script>
  @endsection
@endsection
