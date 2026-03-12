@extends('adminlte::page')

@section('title', 'Create Skill')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Create Skill</h3>

        <a href="{{ route('skill_sections.index') }}" class="btn btn-sm btn-secondary d-flex align-items-center gap-2">

            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('skill_sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    {{-- Title --}}
                    <div class="form-group col-md-6 mb-3">
                        <label>Title <span class="text-danger">*</span></label>

                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror">

                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Subtitle --}}
                    <div class="form-group col-md-6 mb-3">
                        <label>Subtitle</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle') }}"
                            class="form-control @error('subtitle') is-invalid @enderror">

                        @error('subtitle')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Description --}}
                    <div class="form-group col-md-12 mb-3">
                        <label>Description</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Skill Name --}}
                    <div class="form-group col-md-6 mb-3">
                        <label>Skill Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Percent --}}
                    <div class="form-group col-md-6 mb-3">
                        <label>Percent (%)</label>
                        <input type="number" name="percent" value="{{ old('percent') }}"
                            class="form-control @error('percent') is-invalid @enderror" min="0" max="100">
                        @error('percent')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Serial --}}
                    <div class="form-group col-md-6 mb-3">
                        <label>Serial</label>
                        <input type="number" name="serial" value="{{ old('serial', 1) }}"
                            class="form-control @error('serial') is-invalid @enderror">
                        @error('serial')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Status --}}
                    <div class="form-group col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    {{-- Image --}}
                    <div class="form-group col-md-6 mb-4">
                        <label>Image</label>

                        <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp"
                            class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">

                    <button type="submit" class="btn btn-success px-4">
                        Save Skill
                    </button>

                </div>
            </form>
        </div>
    </div>
@stop
