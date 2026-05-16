@extends('layouts.app')

@section('content')

<div class="card shadow border-0 rounded-4">

    <div class="card-header bg-white py-3">

        <h4>Create Menu</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('menus.store') }}"
            method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label>Menu Name</label>

                    <input type="text"
                        name="name"
                        class="form-control">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Menu URL</label>

                    <input type="text"
                        name="url"
                        class="form-control"
                        placeholder="/about-us">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Parent Menu</label>

                    <select name="parent_id"
                        class="form-control">

                        <option value="0">
                            Main Menu
                        </option>

                        @foreach($parents as $parent)

                            <option value="{{ $parent->id }}">

                                {{ $parent->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-6 mb-3">

                    <label>Sort Order</label>

                    <input type="number"
                        name="sort_order"
                        class="form-control"
                        value="0">

                </div>

                <div class="col-md-6 mb-3">

                    <label>Status</label>

                    <select name="status"
                        class="form-control">

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <button class="btn btn-primary">

                Save Menu

            </button>

        </form>

    </div>

</div>

@endsection