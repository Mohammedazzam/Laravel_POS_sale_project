@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

                <h1>@lang('site.users')</h1>

                <ol class="breadcrumb">
                    <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                    <li><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
                    <li class="active">@lang('site.add')</li>
                </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">

                    <h3 class="box-title">@lang('site.add')</h3>

                </div><!--end of box header-->

                <div class="box-body">

                    @include('partials._errors') <!--قمت باستدعء رسالة الخطأ-->
                    <form action="{{route('dashboard.users.store')}}" method="post">

                        {{csrf_field()}}
                        {{method_field('post')}}

                        <div class="form-group">
                            <label>@lang('site.first_name')</label>
                            <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>


                        <div class="form-group">
                            <label @lang('site.permissions')></label>

                            <div class="nav-tabs-custom">

                                <ul class="nav nav-tabs">

                                    <li class="active"> <a href="#users" data-toggle="tab">@lang('site.users')</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="users">

                                        <label><input type="checkbox" name="permissions[]" value="create_users">@lang('site.create')</label>
                                        <label><input type="checkbox" name="permissions[]" value="reade_users">@lang('site.reade')</label>
                                        <label><input type="checkbox" name="permissions[]" value="update_users">@lang('site.update')</label>
                                        <label><input type="checkbox" name="permissions[]" value="delete_users">@lang('site.delete')</label>


                                    </div><!--end of tab content-->
                                </div>

                            </div><!--end of nav tabs-->


                        </div><!--end of form group-->


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
                        </div>


                    </form>

                </div><!--end of body-->

            </div><!--end of box-->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection