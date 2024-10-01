@extends('layouts.backend_master')
@section('title')
    Faq Edit
@endsection
@section('content')
    <div class="row">
        <div class="m-auto col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add Faq</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Question</label>
                            <textarea class="form-control" name="question" rows="6">{{ $faq->question }}</textarea>
                            @error('question')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Answar</label>
                            <textarea class="form-control" name="answar" rows="6">{{ $faq->answar }}</textarea>
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
