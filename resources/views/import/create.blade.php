@extends('common.master')
@section('title', 'Import Books')
@section('content')

<div class="page-title">
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">
                            <i class="icon-area-graph"></i>
                        </a></li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Import Books
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            {{-- <h5 class="title">Jobs Posted</h5> --}}
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <div class="daterange-container">
                <div class="date-range">
                    {{-- {{ $jobs->links() }} --}}
                </div>

                <a href="{{ url('books')}}" data-toggle="tooltip" data-placement="top" title=""
                    class="download-reports" data-original-title="All Books">
                    <i class="icon-list"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">

                    <form id="regForm" action="{{ url('import_books') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4 offset-4">
                                <div class="form-group">
                                    <label class="pay">Upload File</label>
                                    <input type="file" class="form-control" name="books_file" id="books_file"
                                        title="Upload File" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">&nbsp;</label>
                                    <br>
                                    <a href="{{ url('assets/sample_books.xlsx') }}" title="Download Sample Books File" target="_blank" style="font-size: 40px;">
                                        <i class="icon-download nav-icon"></i>
                                    </a>
                                </div>
                            </div>
                            
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12 offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
<!-- Content wrapper end -->
@endsection