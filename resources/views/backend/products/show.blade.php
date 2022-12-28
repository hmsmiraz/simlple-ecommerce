<x-backend.layouts.master>
    <x-slot name="pageTitle">
        table
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Dashboard</x-slot>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-backend.partials.elements.breadcrumb>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1">Product</i>
            
            <a class="btn btn-info" href="{{route('products.create')}}">Add New product</a>

        </div>
        <div class="card-body">

        <h2>Name:{{$product->name}}</h2>
        <h3>Price:{{$product->price}}</h3>
        <h3>Discount:{{$product->discount}}</h3>
        <h4>Details:{{$product->details}}</h4>
        <img src="/storage/{{$product->image}}"/>
        </div>
    </div>

    </x-backend.layouts.master>