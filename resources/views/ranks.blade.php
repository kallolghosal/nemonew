@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 style="display:inline;">All Ranks</h2><a href="{{ route('add-rank') }}" class="btn btn-primary btn-sm float-right">Add Rank</a>
            <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <td>Rank</td>
                    <td>Order</td>
                    <td>Category</td>
                    <td>Edit</td>
                </tr>
            </thead>
            <tbody>
                @foreach($ranks as $rank)
                <tr>
                    <td>{{ $rank->rank }}</td>
                    <td>{{ $rank->rank_order }}</td>
                    <td>{{ $rank->category }}</td>
                    <td><a href="#"><i class="bi bi-eye"></i></a>&nbsp;<a href="{{ route('edit-rank', $rank->id) }}"><i class="bi bi-pencil"></i></a>&nbsp;<a href="#"><i class="bi bi-trash"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $ranks->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
@endsection