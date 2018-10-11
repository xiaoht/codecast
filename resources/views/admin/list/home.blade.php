<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | with iframe</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-With-Iframe/dist/css/skins/all-skins.min.css') }}">
    <script src="{{ asset('AdminLTE-With-Iframe/plugins/ie9/html5shiv.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-With-Iframe/plugins/ie9/respond.min.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">
    @include('admin.list.header')

    @include('admin.list.sidebar')

    @include('admin.list.content')

    @include('admin.list.footer')
</div>

<script src="AdminLTE-With-Iframe/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="AdminLTE-With-Iframe/bootstrap/js/bootstrap.min.js"></script>
<script src="AdminLTE-With-Iframe/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="AdminLTE-With-Iframe/plugins/fastclick/fastclick.js"></script>
<script src="AdminLTE-With-Iframe/dist/js/app.js"></script>
<script src="AdminLTE-With-Iframe/dist/js/demo.js"></script>
<script src="AdminLTE-With-Iframe/dist/js/app_iframe.js"></script>

<script type="text/javascript">

    $(function () {

        App.setbasePath("../");
        App.setGlobalImgPath("AdminLTE-With-Iframe/dist/img/");

        addTabs({
            id: '10008',
            title: '欢迎页',
            close: false,
            url: 'admin/welcome',
            urlType: "relative"
        });

        App.fixIframeCotent();

        var menus = [
            {
                id: "9001",
                text: "UI Elements",
                icon: "fa fa-laptop",
                children: [
                    {
                        id: "90011",
                        text: "buttons",
                        icon: "fa fa-circle-o",
                        url: "UI/buttons_iframe.html",
                        targetType: "iframe-tab"
                    },
                    {
                        id: "90012",
                        text: "icons",
                        url: "UI/icons_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90013",
                        text: "general",
                        url: "UI/general_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90014",
                        text: "modals",
                        url: "UI/modals_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90015",
                        text: "sliders",
                        url: "UI/sliders_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90016",
                        text: "timeline",
                        url: "UI/timeline_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    }
                ]
            },
            {
                id: "9002",
                text: "Forms",
                icon: "fa fa-edit",
                children: [
                    {
                        id: "90021",
                        text: "advanced",
                        url: "forms/advanced_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90022",
                        text: "general",
                        url: "forms/general_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90023",
                        text: "editors",
                        url: "forms/editors_iframe.html",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o"
                    },
                    {
                        id: "90024",
                        text: "百度",
                        url: "https://www.baidu.com",
                        targetType: "iframe-tab",
                        icon: "fa fa-circle-o",
                        urlType: 'abosulte'
                    }
                ]
            }
        ];
        $('.sidebar-menu').sidebarMenu({data: menus});
    });
</script>

</body>
</html>