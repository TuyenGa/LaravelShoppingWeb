@extends('admin.master')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ url("/admin/user").'/'.$user->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field("PUT") }}
                            {{
                                \App\Helper\EnginerTemplate::input([
                                      "label" => "Name User",
                                      "name" => "name",
                                      "placeholder" =>  "Please Enter Name",
                                      "value" => $user->name
                                ],$errors)
                            }}
                            {{
                               \App\Helper\EnginerTemplate::input([
                                     "label" => "Username",
                                     "name" => "username",
                                     "placeholder" =>  "Please Enter Username",
                                      "value" => $user->username
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
                                        "value" => $user->email
                                 ],$errors)
                            }}
                            {{
                                 \App\Helper\EnginerTemplate::input([
                                       "label" => "Phone",
                                       "name" => "phone",
                                       "placeholder" =>  "Please Enter Phone",
                                        "value" => $user->phone
                                 ],$errors)
                            }}
                            {{
                                \App\Helper\EnginerTemplate::select([
                                      "label" => "Role",
                                      "name" => "role_id",
                                      "val-name" =>"name",
                                      "val-data" =>"id",
                                      "value" => $user->role_id,
                                      "datas" => $roles
                                ],$errors)
                            }}
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

                @endsection

