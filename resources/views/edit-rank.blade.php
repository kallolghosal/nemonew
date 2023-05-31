@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">Edit Rank</h2><a href="{{ route('all-ranks') }}" class="btn btn-primary btn-sm float-right">All Ranks</a>
            <p class="mt-4"></p>
            @foreach($rank as $rk)
            <form action="" method="post">
                <label for="rank">Rank</label>
                <input type="text" name="rank" value="{{ $rk->rank }}" class="form-control">
                <p class="mt-4"></p>
                <label for="order">Order</label>
                <input type="text" name="order" value="{{ $rk->rank_order }}" class="form-control">
                <p class="mt-4"></p>
                <label for="category">Category</label>
                <input type="text" name="category" value="{{ $rk->category }}" class="form-control">
                <p class="mt-4"></p>
                <input type="submit" value="Save" name="submit" class="btn btn-primary">
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection