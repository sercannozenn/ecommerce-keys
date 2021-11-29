@extends('layouts.admin')
@section('title', 'Products ndex')

@section('css')
    @stack('css')
@endsection

@section('content')

    <div class="page-header">
        <h2 class="header-title">Orders List</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                <a class="breadcrumb-item" href="#">Apps</a>
                <a class="breadcrumb-item" href="#">E-commerce</a>
                <span class="breadcrumb-item active">Orders List</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                    <form action="" id="listForm">
                    <div class="col-md-4">
                        <select name="paginate" class="custom-select" onchange="event.preventDefault(); document.getElementById('listForm').submit();">
                            <option selected>Paginate</option>
                            <option value="10" {{ request()->get('paginate') == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request()->get('paginate') == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ request()->get('paginate') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request()->get('paginate') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    </form>
                </div>

                <div class="col-lg-4 float-right text-right">
                    <button class="btn btn-primary">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Add Product</span>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <x-elements.table :links="true">
                    <x-slot name="columns">
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </x-slot>
                    <x-slot name="rows">
                        @foreach($records as $record)
                            <tr id="item_{{ $record->product_id }}">
                                <td>
                                    {{ $record->product_id }}
                                </td>
                                <td>{{ $record->product_name }}</td>
                                <td>{{ $record->category->category_name }}</td>
                                <td>{{ $record->price }} ₺</td>
                                <td>
                                    @if ($record->quantity)
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-success badge-dot m-r-10"></div>
                                            <div>In Stock</div>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center">
                                            <div class="badge badge-danger badge-dot m-r-10"></div>
                                            <div>No Stock</div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.edit',$record->product_id) }}" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                        <i class="anticon anticon-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-href="{{ route('admin.products.destroy',$record->product_id) }}" class="btn btn-icon btn-hover btn-sm btn-rounded deleteProduct">
                                        <i class="anticon anticon-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-elements.table>
            </div>
            {{ $records->links('vendor.pagination.admin-table-paginate') }}
        </div>
    </div>
    <form action="" method="POST" id="productDelete" style="display: none;">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" id="deleteProductId">
    </form>

@endsection

@section('js')
    @stack('js')
    <script>
        $('.deleteProduct').click(function ()
        {
            let action = $(this).data('href');
            if (action == '' || action == null)
            {
                alert('Product cannot delete');
            }
            else
            {
                $('#productDelete').attr('action', action);
                $('#productDelete').submit();
            }

        })
    </script>
@endsection
