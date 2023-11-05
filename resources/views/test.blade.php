<form action="{{route('test.submit')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo" id="photo"  accept=".jpg, .jpeg, .png">
    @error('photo')
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror

    <img class="" width="150px" src="../assets/uploads/{{$photo2}}">
    <button type="submit">Submit</button>
</form>