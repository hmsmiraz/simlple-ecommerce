@props(['name'])

<div class="mb-3">
                <label for="{{$name}}" class="form-label">{{ucwords($name)}}:</label>
                <textarea class="form-control" id="{{$name}}"  name="{{$name}}" >
                {{$slot ?? old($name)}}
                </textarea>
            </div>