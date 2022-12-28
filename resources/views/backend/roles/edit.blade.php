<x-backend.layouts.master>
    <x-slot name="pageTitle">
        Products : Create
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Dashboard</x-slot>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-backend.partials.elements.breadcrumb>


    <!-- <h1 class="mt-4 d-flex justify-content-center">Product</h1> -->

    <div class="container   justify-content-center d-flex">
        <div class="card-header">
            <i class="fas fa-table me-1">Product</i>

            <a class="btn btn-info" href="{{route('products.index')}}">Add New product</a>

        </div>
        <form action="{{route('products.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-backend.form.input name="name" :value="$product->name" />

            <x-backend.form.input name="price" :value="$product->price" />

            <x-backend.form.textarea name="details" >
                {{$product->details}}

            </x-backend.form.textarea>

            <x-backend.form.input name="image" type="file" :value="$product->image" />

            <x-backend.form.button>
                Update
            </x-backend.form.button>

        </form>

    </div>

</x-backend.layouts.master>