<x-backend.layouts.master>
    <x-slot name="pageTitle">
    Sliders : Create
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Dashboard</x-slot>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-backend.partials.elements.breadcrumb>


    <!-- <h1 class="mt-4 d-flex justify-content-center">Product</h1> -->

    <div class="container   justify-content-center d-flex">
        <div class="card-header">
            <i class="fas fa-table me-1">Slider</i>

            <a class="btn btn-info" href="{{route('sliders.index')}}">Add New product</a>

        </div>
        <form action="{{route('sliders.update',['slider'=>$slider->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-backend.form.input name="slider_title" :value="$slider->slider_title" />

            <x-backend.form.input name="slider_image" type="file" :value="$slider->image" />

            <input type="checkbox" name="slider_status" value="1"{{$slider->slider_status?"cheked":""}}>

            <x-backend.form.button>
                Update
            </x-backend.form.button>

        </form>

    </div>

</x-backend.layouts.master>