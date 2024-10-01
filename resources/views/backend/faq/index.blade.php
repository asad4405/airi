@extends('layouts.backend_master')
@section('title')
    Faq
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Faq List</h3>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Question</th>
                            <th>Answar</th>
                            <th>Action</th>
                        </tr>
                        @forelse ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td class="text-wrap">{{ $faq->question }}</td>
                                <td class="text-wrap">{{ $faq->answar }}</td>
                                <td>
                                    <a href="{{ route('faq.edit', $faq->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('faq.delete', $faq->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger">No Faq Available!</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Faq</h3>
                </div>
                @if (session('faq_create'))
                    <div class="alert alert-success">{{ session('faq_create') }}</div>
                @endif
                <div class="card-body">
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Question</label>
                            <textarea rows="6" class="form-control" name="question"></textarea>
                            @error('question')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Answar</label>
                            <textarea rows="6" class="form-control" name="answar"></textarea>
                            @error('answar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Faq</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
