<x-backend.layouts.master>
    <x-slot name="pageTitle">
       Slider
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Dashboard</x-slot>
        <li class="breadcrumb-item active">Slider</li>
    </x-backend.partials.elements.breadcrumb>


    <!-- <h1 class="mt-4 d-flex justify-content-center">Product</h1> -->

    <div class="container   justify-content-center d-flex">
     <div class="card-header">
            <i class="fas fa-table me-1">Create Slider</i>

            <a class="btn btn-info" href="{{route('sliders.index')}}">List</a>
        </div> 
        <div class="card-body">
            
<x-backend.partials.elements.errors :errors="$errors"/>
 
    

        <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <x-backend.form.input name="slider_title"/>

            <x-backend.form.input name="slider_image" type="file"/>
           
            <input type="checkbox" name="slider_status"/>

            <x-backend.form.button>
                Submit
            </x-backend.form.button>
        </form>

    </div>

</x-backend.layouts.master>