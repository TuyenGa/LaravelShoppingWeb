@extends('admin.master')
@section('controller','User')
@section('action','Add')
@section('content')

    <form action="{{ url('/admin/user') }}" method="POST" class="col-md-6 col-md-offset-3">
        {{ csrf_field() }}
        {{
            \App\Helper\EnginerTemplate::input([
                  "label" => "Name User",
                  "name" => "name",
                  "placeholder" =>  "Please Enter Name",
            ],$errors)
        }}
        {{
           \App\Helper\EnginerTemplate::input([
                 "label" => "Username",
                 "name" => "username",
                 "placeholder" =>  "Please Enter Username",
           ],$errors)
       }}
        {{
            \App\Helper\EnginerTemplate::input([
                  "label" => "Password",
                  "name" => "password",
                  "type" => "password",
                  "placeholder" =>  "Please Enter Password",
            ],$errors)
        }}
        {{
           \App\Helper\EnginerTemplate::input([
                 "label" => "RePassword",
                 "name" => "repassword",
                 "type" => "password",
                 "placeholder" =>  "Please Enter RePassword",
           ],$errors)
        }}
        {{
             \App\Helper\EnginerTemplate::input([
                   "label" => "Email",
                   "name" => "email",
                   "type" => "email",
                   "placeholder" =>  "Please Enter Email",
             ],$errors)
        }}
        {{
             \App\Helper\EnginerTemplate::input([
                   "label" => "Phone",
                   "name" => "phone",
                   "placeholder" =>  "Please Enter Phone",
             ],$errors)
        }}
        {{
            \App\Helper\EnginerTemplate::select([
                  "label" => "Role",
                  "name" => "role_id",
                  "val-name" =>"name",
                  "val-data" =>"id",
                  "datas" => $roles
            ],$errors)
        }}
        <button type="submit" class="btn btn-default">User Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>

@endsection
