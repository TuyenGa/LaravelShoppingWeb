@extends('layouts.site')
@section('controller','User')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">Register Page</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- register -->
<div class="register">
    <div class="container">
        <h2>Register Here</h2>
        <form action="{{ url('/register') }}" method="POST" class="col-md-6 col-md-offset-3">
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
    </div>
</div>
<!-- //register -->
@endsection