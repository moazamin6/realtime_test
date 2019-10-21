@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body" id="app">


                        <div class="dropdown">
                            <select class="browser-default custom-select" id="user_select" name="user_select">
                                <option selected>Select User</option>
                                @foreach($users as $user)
                                    @if($user->id!==Auth::id())
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="usr">Message</label>
                                <input type="text" class="form-control" name="message" id="message">
                            </div>
                        </div>

                        <input class="btn btn-dark" id="btn-send" value="send message">


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
       $(document).ready(function () {

          let user_select = '';
          $('#user_select').on('change', function (e) {
             let optionSelected = $("#user_select:selected", this);

             user_select = this.value;
          });
          $('#btn-send').on('click', function (e) {

             let msg = $('#message').val();
             let data = {
                user_select: user_select,
                message: msg,
                "_token": "{{ csrf_token() }}"
             };
             $.ajax({
                url: "{{url('/message')}}",
                data: data,
                method: 'post',
                success: function (result) {
                   console.log(result);
                }
             });
          });
       })
    </script>
@endpush