<x-backend.layouts.master>
    <x-slot name="pageTitle">
    Roles : Create
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Dashboard</x-slot>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-backend.partials.elements.breadcrumb>


    <!-- <h1 class="mt-4 d-flex justify-content-center">Product</h1> -->

    <div class="container   justify-content-center d-flex">
     <div class="card-header">
            <i class="fas fa-table me-1">Role</i>

            <a class="btn btn-info" href="{{route('roles.index')}}">List</a>
        </div> 
        <div class="card-body">
            
<x-backend.partials.elements.errors :errors="$errors"/>
 
    

        <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
            @csrf
          <x-backend.form.input name="name"/>

            <x-backend.form.input type="number" name="price"/>

            <x-backend.form.textarea name="details"/>

            <x-backend.form.input name="image" type="file"/>
           
            <x-backend.form.button>
                Submit
            </x-backend.form.button>
        </form>

    </div>

</x-backend.layouts.master>