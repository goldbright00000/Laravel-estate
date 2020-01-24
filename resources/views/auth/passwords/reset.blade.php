<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Reziden By Variantz</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

{{ Html::style('plugins/font-awesome/css/font-awesome.min.css') }}
{{ Html::style('plugins/bootstrap/css/bootstrap.min.css') }}
{{ Html::style('plugins/simple-line-icons/simple-line-icons.min.css') }}
{{ Html::style('plugins/uniform/css/uniform.default.css') }}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{{ Html::style('css/login.css') }}
<!-- END PAGE LEVEL SCRIPTS -->
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
<!-- BEGIN BODY -->
<body class="login">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="menu-toggler sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.html">
            {{ Html::image('img/reziden-logo-inverse.png') }}
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="reset-form" method="post" action="{{ url('password/reset') }}" >
            <h3>Forget Password ?</h3>
            @if(strlen($error = $errors->first('email')))
            <div class="alert-danger alert">
                <button class="close" data-close="alert"></button>
                <span>
                {{$error}} </span>
            </div>
            @endif
            <p>
                 Enter your e-mail address below to reset your password.
            </p>
            {{csrf_field()}}
            <input type="hidden" name="token" id="csrf-token" value="{{ $token }}">
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" value="{{ $email or old('email') }}"/>
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control placeholder-no-fix" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright">
         2016 © Variantz.
    </div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

{{ Html::script('plugins/jquery.min.js') }}
{{ Html::script('plugins/jquery-migrate.min.js') }}
{{ Html::script('plugins/bootstrap/js/bootstrap.min.js') }}
{{ Html::script('plugins/jquery.blockui.min.js') }}
{{ Html::script('plugins/jquery.cokie.min.js') }}
{{ Html::script('plugins/uniform/jquery.uniform.min.js') }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ Html::script('plugins/jquery-validation/js/jquery.validate.min.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ Html::script('js/metronic.js') }}
{{ Html::script('js/layout.js') }}
{{ Html::script('js/demo.js') }}
{{ Html::script('js/login.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Login.init();
    Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
