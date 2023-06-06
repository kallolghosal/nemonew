@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Rank</h2><a href="{{ route('all-ranks') }}" class="btn btn-primary btn-sm float-right">All Ranks</a>
            @if (session('message'))
                <h6 class="text-success">{{ session('message') }}</h6>
            @endif
            <p class="mt-4"></p>
            @foreach($rank as $rk)
            <form action="{{ route('update-rank') }}" method="post">
            @csrf
                <label for="rank">Rank</label>
                <input type="text" name="rank" value="{{ $rk->rank }}" class="form-control">
                <p class="mt-4"></p>
                <label for="order">Order</label>
                <input type="text" name="order" value="{{ $rk->rank_order }}" class="form-control">
                <p class="mt-4"></p>
                <label for="category">Category</label>
                <input type="text" name="category" value="{{ $rk->category }}" class="form-control">
                <input type="hidden" name="rankid" value="{{ $rk->id }}">
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">&nbsp;
                <a href="{{ route('delete-rank', $rk->id) }}" onclick="return confirm('Are you sure you want to delete this rank?');" class="btn btn-primary">Delete Rank</a>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection