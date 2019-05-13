@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3><strong>{{$user->first_name}}'s Following</strong></h3>
            <div class="dropdown-divider py-1"></div>
            @foreach ($followings as $following)
            <div class="list-group-item list-group-item-action mb-3 rounded">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="/user/{{ $following->id }}/home">
                            <img class="rounded img-thumbnail" src="/images/account.png" alt="account" style="width:100px; heigh:100px;">
                        </a>
                    </div>
                    <div class="col-sm-9">
                        <div class="w-100">
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-1">{{ $following->first_name }} {{ $following->last_name }}</h5>
                                <small>Registrated : {{ \Carbon\Carbon::createFromTimeStamp(strtotime($following->created_at)) ->diffForHumans() }}</small>
                            </div>
                            <div class="dropdown-divider py-1"></div>
                            <div class="d-flex justify-content-between">
                                <p>Posted : {{ $following->blogs()->count() }}</p>
                                @if (auth()->user()->id == $following->id)

                                @elseif (auth()->user()->following()->find($following->id) !== null)
                                <a class="btn btn-secondary " href="/user/{{$following->id}}/unfollow" role="button">
                                    <small>
                                        <i class="fas fa-user-slash"></i>Unfollow
                                    </small>
                                </a>
                                @else
                                <a class="btn btn-primary " href="/user/{{$following->id}}/follow" role="button">
                                    <small>
                                        <i class="fas fa-user-plus"></i> Follow
                                    </small>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class=" col-sm-2">
        </div>
    </div>
</div>
@endsection