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

                </div>

            </div><!--end of box-->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection