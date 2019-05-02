@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="rounded p-4" style="background-color:white">
                <div class="body text-center">
                    <div class="py-1">
                        <img class="rounded img-thumbnail" src="/images/account.png" alt="account" style="width:100px; heigh:100px;">
                        <h2>name</h2>
                    </div>
                    <div>
                        <a class="btn btn-primary py-1" href="#" role="button">Edit Profile</a>
                    </div>
                    <div class="dropdown-divider py-1"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href=""><strong>following</strong></a>
                            <p>following</p>
                        </div>
                        <div class="col-sm-6">
                            <a href=""><strong>followers</strong></a>
                            <p>followers</p>
                        </div>
                    </div>
                    <div class="dropdown-divider py-1"></div>
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="card-title">
                                <h3>{{auth()->user()->blogs()->count()}}</h3>
                            </div>
                            <div>
                                <p>blogs posted</p>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <div class="card-title">
                        <h3><strong>Add New Post</strong></h3>
                    </div>
                    <div class="dropdown-divider py-1"></div>
                    <form action="{{ route('post') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control form-group" name="blog_title" placeholder="Enter title here">
                        <textarea class="form-control form-group" name="blog_contents" rows="3" placeholder="Share your thoughts..."></textarea>
                        <div align="right">
                            <input type="submit" class="btn btn-primary" value="Post" style="width:170px;">
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div class="card bg-light mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <h3><strong>Blogs</strong></h3>
                        </div>
                        <div class="list-group">
                            @foreach ($blogs as $blog)
                            <div class="list-group-item list-group-item-action mb-3 rounded">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-1">{{ $blog->title }}</h5>
                                        <small>Posted : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($blog->created_at)) ->diffForHumans() }}</small>
                                    </div>
                                    <div class="dropdown-divider py-1"></div>
                                    <p>{{ $blog->content}}</p>
                                    <a class="btn btn-primary" href="/blog/{{$blog->id}}/delete" role="button">Delete</a>
                                    <a class="btn btn-primary" href="/blog/{{$blog->id}}/edit" role="button">Edit</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection