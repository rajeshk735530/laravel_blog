@extends('layouts.auth');

{{-- @section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    
@endsection --}}

@section('content')

    <!-- ====================================
    ——— CONTENT WRAPPER
    ===================================== -->
    <div class="content-wrapper">
        <div class="content">
            <!-- Top Statistics -->
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini" style="height: 140px">
                        <div class="card-header">
                            <h2>{{$postCount}}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Posts</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini" style="height: 140px">
                        <div class="card-header">
                            <h2>{{$tagCount}}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Tgas</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini" style="height: 140px">
                        <div class="card-header">
                            <h2>{{$categoryCount}}</h2>
                            <div class="sub-title">
                                <span class="mr-1">Categories</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card card-default card-mini" style="height: 140px">
                        <div class="card-header">
                            <h2>{{$userCount}}</h2>
                            <div class="sub-title">
                                <span class="mr-1">User</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/auth/js/chart.js') }}"></script>
    <script src="{{ asset('assets/auth/js/map.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#logout-button').click(function() {
                $('#logout-form').submit();
            });
        });
    </script>
@endsection
