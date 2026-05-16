@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-white py-3">

            <h4 class="mb-0">
                Edit Menu
            </h4>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('menus.update',$menu->id) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">

                            Menu Name

                        </label>

                        <input type="text"
                            name="name"
                            value="{{ $menu->name }}"
                            class="form-control rounded-3"
                            placeholder="Enter Menu Name">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">

                            Menu URL

                        </label>

                        <input type="text"
                            name="url"
                            value="{{ $menu->url }}"
                            class="form-control rounded-3"
                            placeholder="/about-us">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">

                            Parent Menu

                        </label>

                        <select name="parent_id"
                            class="form-select rounded-3">

                            <option value="0">

                                Main Menu

                            </option>

                            @foreach($parents as $parent)

                                <option value="{{ $parent->id }}"
                                    {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>

                                    {{ $parent->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">

                            Sort Order

                        </label>

                        <input type="number"
                            name="sort_order"
                            value="{{ $menu->sort_order }}"
                            class="form-control rounded-3">

                    </div>

                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold">

                            Status

                        </label>

                        <select name="status"
                            class="form-select rounded-3">

                            <option value="active"
                                {{ $menu->status == 'active' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="inactive"
                                {{ $menu->status == 'inactive' ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

                <div class="d-flex gap-2">

                    <button class="btn btn-primary rounded-3">

                        <i class="bi bi-check-circle"></i>

                        Update Menu

                    </button>

                    <a href="{{ route('menus.index') }}"
                        class="btn btn-secondary rounded-3">

                        Back

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection