@extends('common.master')
@section('title', 'Add Book')
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
                        Add Book
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

                    <form id="regForm" action="{{ url('books') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">ISBN</label>
                                    <input type="text" class="form-control" name="isbn" id="isbn"
                                        placeholder="Enter ISBN" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        id="title" placeholder="e.g. Indian Economy" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">Author</label>
                                    <input type="text" class="form-control" name="author"
                                        id="author" placeholder="e.g. Mrunal Patel" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">Publication</label>
                                    <input type="text" class="form-control" name="publication"
                                        id="publication" placeholder="e.g. Mrunal Publication" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">Language</label>
                                    <input type="text" class="form-control" name="language"
                                        id="language" placeholder="e.g. Tamil" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="pay">Edition</label>
                                    <input type="text" class="form-control" name="edition"
                                        id="edition" placeholder="e.g. 6" autocomplete="off"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="pay">Book Description</label>
                                    <textarea type="text" class="form-control" name="description"
                                        id="description" placeholder="Brief Description" autocomplete="off"
                                        required></textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-12 offset-5">
                                <button type="submit" class="btn btn-primary">
                                    Save Now
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