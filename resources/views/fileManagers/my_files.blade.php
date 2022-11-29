@extends('layout.mainlayout')
@section('content')
<div class="container pb-filemng-template">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <nav class="navbar navbar-default pb-filemng-navbar">
                <div class="container-fluid">
                    <!-- Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="float-xs-left navbar-toggle collapsed treeview-toggle-btn" data-toggle="collapse" data-target="#treeview-toggle" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#options" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-gears"></span>
                        </button>

                        <!-- Search button -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#pb-filemng-navigation" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-share"></span>
                        </button>
                    </div>

                    <ul class="collapse navbar-collapse nav navbar-nav navbar-right" id="options">
                        <li><a href="#"><span class="fa fa-crosshairs fa-lg"></span></a></li>
                        <li><a href="#"><span class="fa fa-ellipsis-v fa-lg"></span></a></li>
                        <li><a href="#"><span class="fa fa-lg fa-server"></span></a></li>
                        <li><a href="#"><span class="fa fa-lg fa-minus"></span></a></li>
                        <li><a href="#"><span class="fa fa-lg fa-window-maximize"></span></a></li>
                        <li><a href="#"><span class="fa fa-lg fa-times"></span></a></li>
                    </ul>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="pb-filemng-navigation">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><span class="fa fa-chevron-left fa-lg"></span></a></li>
                            <li><a href="#"><span class="fa fa-chevron-right fa-lg"></span></a></li>
                            <li class="pb-filemng-active"><a href="#"><span class="fa fa-file fa-lg"></span></a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.container-fluid -->
            </nav>
            <div class="card ">
                <div class="card-block pb-filemng-panel-body">
                    <div class="row">
                        <div class="col-sm-3 col-md-4 pb-filemng-template-treeview">
                            <div class="collapse navbar-collapse" id="treeview-toggle">
                                <div id="treeview">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-8 pb-filemng-template-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection