@extends('layouts.auth')

@section('title', 'Index | Tags')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <style>
        #outer{
            text-align: center;
        }

        .inner{
            display: inline-block;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content">
            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Tags</h2>
                </div>

                @if (Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{Session::get('alert-success')}}
                    </div>
                @endif

                <div class="card-body">
                    @if (count($tags) > 0)
                        <table class="table table-striped" id="posts">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center text-danger bg-red">NO Tagas FOUND....</h3>
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#posts').DataTable({'bLengthChange':false});
        });
    </script>
@endsection