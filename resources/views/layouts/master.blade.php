<!DOCTYPE html>
<html lang="en">
@include('layouts.structure.head')

@section('stylesheet')
@show

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.structure.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.structure.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts.structure.breadcrumb')
            <!-- /.content-header -->
            <!-- Main content -->
            @section('content')
            @show
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        @include('layouts.structure.footer')
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    @include('layouts.structure.scripts')

    @section('scripts')
    @show
    @section('dataTables')
    @show

</body>
</html>
