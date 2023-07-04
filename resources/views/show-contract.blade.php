@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 style="display:inline;">Show Contract</h2><a href="{{ route('edit-contract', $contract->id) }}" class="btn btn-primary btn-sm float-right">Edit Contract</a>
            <table class="table table-striped mt-4">
                <tbody>
                    @foreach(json_decode($contract) as $k => $v)
                        <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $v }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-4"></p>
            <a href="{{ route('contracts') }}" class="btn btn-primary btn-sm">View All Contracts</a>
            <p class="mt-4"></p>
        </div>
    </div>
</div>
@endsection
