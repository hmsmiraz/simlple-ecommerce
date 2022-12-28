<x-backend.layouts.master>
    <x-slot name="pageTitle">
        slider
    </x-slot>

    <x-backend.partials.elements.breadcrumb>
        <x-slot name="pageHeader">Dashboard</x-slot>
        <li class="breadcrumb-item active">Dashboard</li>
    </x-backend.partials.elements.breadcrumb>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1">Slider</i>
            
            <a class="btn btn-info" href="{{route('sliders.create')}}">Add New slider</a>

        </div>
        <div class="card-body">
         <x-backend.partials.elements.message :message="session('message')"/>
            <table id ="datatablesSimple">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>title</th>
                        <th>status</th>
                        <th width="400px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl=0 @endphp
                    @foreach($sliders as $slider)
                    <tr>
                        <td>{{++$sl}}</td>
                        <td>{{$slider->slider_title}}</td>
                        <td>{{$slider->slider_status ? 'active' : 'Deactive'}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{route('sliders.show',['slider'=>$slider->id])}}" style="font-size:11px"><small>Show</small></a>

                            <a class="btn btn-warning btn-sm" href="{{route('sliders.edit',['slider'=>$slider->id])}}" style="font-size:11px"><small>Edit</small></a>

                            <form style="display:inline" action="{{route('sliders.destroy',['slider'=>$slider->id])}}" method="post">@csrf 
                             @method('DELETE')
                             <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('sure you want to delete?')" style="font-size:11px"><small>Delete
                                
                             </small></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    </x-backend.layouts.master>