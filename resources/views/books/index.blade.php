@extends('common.master')
@section('title', 'All Books')
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
                        Books
                    </li>
                </ol>
            </nav>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
            {{-- <h5 class="title">Jobs Posted</h5> --}}
            
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="daterange-container">
                <div class="date-range">
                </div>
                @can('book-create')
                <a href="{{ url('books/create')}}" data-toggle="tooltip" data-placement="top" title="Add Book"
                    class="download-reports" data-original-title="Add Book">
                    <i class="icon-plus"></i>
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                @if ($errors->any())
                    <center>
                        <div class="alert alert-danger">
                            <button style="color: white" type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </center>
                @endif
                
                <div class="card-body">
                    <div class="row gutters">

                        {{-- {!! $books->links() !!} --}}

                        @if(count($books))
                        @foreach ($books as $book)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 flip-card" style="margin-bottom: 10px;">
                            <div class="card text-center flip-card-inner" style="height: 250px;">
                                <div class="flip-card-front" style="background: #00b89440;">
                                    <div class="card-header chakri-front">
                                        <div class="card-title">
                                            {{-- {{ isset($fund->title)?$fund->title:'' }} --}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ isset($book->title)?$book->title:'' }}
                                        </h5>
                                        <label class="">
                                            ISBN:                                             
                                            <strong>
                                                {{ isset($book->isbn)?$book->isbn:'' }}
                                            </strong>
                                        </label>
                                        <br>
                                        <label class="">
                                            Author: 
                                           <strong>
                                            {{ isset($book->author)?$book->author:'' }}
                                           </strong>
                                        </label>
                                        <br>
                                        <label class="">
                                            Publication: 
                                            <strong>
                                                {{ isset($book->publication)?$book->publication:'' }}
                                            </strong>
                                        </label>
                                        <br>
                                        <label class="">
                                            Language: 
                                            <strong>
                                                {{ isset($book->language)?$book->language:'' }}
                                            </strong>
                                        </label>
                                    </div>
                                    <div class="card-footer text-right" style="background: #03284e4d">
                                        <lable class="badge badge-sm badge-default float-left text-left" href="javascript:void(0)">
                                            Added On: 
                                            <strong>
                                                {{ Carbon\Carbon::parse($book->created_at)->format('d-M-Y') }}  
                                            </strong>
                                        </lable>

                                        @if(auth()->user()->roles[0]->name == 'user')
                                        @php
                                            $subscription =  App\Subscription::where(['book_id' => $book->id, 'user_id' => auth()->user()->id])->first();
                                        @endphp

                                        @if(isset($subscription))
                                        <a class="badge badge-sm badge-primary" href="{{ route('books.show',$book->id) }}">
                                            Show
                                        </a>
                                        
                                        <a class="badge badge-sm badge-danger" href="javascript:void(0);"
                                        onclick='unsubscription_method("{{ $book->id }}");'>
                                            Un-Subscribe
                                        </a>
                                        <form id="unsubscription{{ $book->id }}" action="{{ url('subscriptions/'.$book->id.'/subscribe/'.$book->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="badge badge-sm badge-danger">
                                                Un-Subscribe
                                            </button>
                                        </form>
                                        @else

                                        <a class="badge badge-sm badge-success" href="javascript:void(0);"
                                        onclick='subscription_method("{{ $book->id }}");'>
                                            Subscribe
                                        </a>
                                        <form id="subscription{{ $book->id }}" action="{{ url('subscriptions/'.$book->id.'/subscribe') }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('POST')
                                            
                                            <button type="submit" class="badge badge-sm badge-danger">
                                                Subscribe
                                            </button>
                                        </form>

                                        @endif

                                        @else
                                        <a class="badge badge-sm badge-primary" href="{{ route('books.show',$book->id) }}">
                                            Show
                                        </a>
                                        @endif


                                        @can('book-edit')
                                        <a class="badge badge-sm badge-info" href="{{ route('books.edit',$book->id) }}">
                                            Edit
                                        </a>
                                        @endcan

                                        @can('book-delete')
                                        <a class="badge badge-sm badge-danger" href="javascript:void(0);"
                                            onclick='delete_method("{{ $book->id }}");'>
                                            Delete
                                        </a>
                                        @endcan

                                        <form id="form{{ $book->id }}" action="{{ url('books/'.$book->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            
                                            @can('book-delete')
                                            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                            <button type="submit" class="badge badge-sm badge-primary">Delete</button>
                                            @endcan
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                        
                    </div>
                </div>
            
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-3">
                        {!! $books->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>

<script>
    function delete_method(id) {
        event.preventDefault();
        if (confirm('Are You Sure, You Want To Delete ??')) {
            document.getElementById('form' +
                id).submit();
        }
    }
    function subscription_method(id) {
        event.preventDefault();
        if (confirm('Are You Sure, You Want To Subscribe ??')) {
            document.getElementById('subscription' +
                id).submit();
        }
    }
    function unsubscription_method(id) {
        event.preventDefault();
        if (confirm('Are You Sure, You Want To Un-Subscribe ??')) {
            document.getElementById('unsubscription' +
                id).submit();
        }
    }
</script>
<!-- Content wrapper end -->
@endsection