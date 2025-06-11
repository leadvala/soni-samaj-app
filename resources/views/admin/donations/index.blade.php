@extends('layouts.master')

@section('page_title', 'Donations List')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Donations List',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Donations'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Donations List</h3>
            <a href="{{ route('admin.donations.create') }}" class="btn btn-primary float-right">Add New Donations</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Goal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->title }}</td>
                            <td><img src="{{ asset('storage/' . ($donation->image ?? 'default.jpg')) }}" alt="" style="max-width: 100px"></td> 
                            <td>{{$donation->goal}}</td>
                            <td>
                                <a href="{{ route('admin.donations.edit', $donation->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.donations.destroy', $donation->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
