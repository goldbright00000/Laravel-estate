<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.7.0
Author: KeenThemes
Website: https://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Reziden By Variantz</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(isset($estate_id))
<meta name="estate-id" content="{{$estate_id}}">
@endif
<meta name="user-id" content="{{$user->id}}">
<meta name="base_url" content="{{asset('')}}">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
{{ Html::style('plugins/font-awesome/css/font-awesome.min.css') }}
{{ Html::style('plugins/bootstrap/css/bootstrap.min.css') }}
{{ Html::style('plugins/simple-line-icons/simple-line-icons.min.css') }}
{{ Html::style('plugins/uniform/css/uniform.default.css') }}
{{ Html::style('plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE STYLES -->
{{ Html::style('plugins/select2/select2.css') }}
{{ Html::style('plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css') }}
{{ Html::style('plugins/bootstrap-modal/css/bootstrap-modal.css') }}

<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
{{ Html::style('css/components.css') }}
{{ Html::style('css/plugins.css') }}
{{ Html::style('css/layout.css') }}
{{ Html::style('css/theme/darkblue.css') }}
{{ Html::style('css/app.css') }}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="{{url('img/favyicon.png')}}"/>
</head>
<!-- END HEAD -->
