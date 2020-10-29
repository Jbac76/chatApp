<h5>Status Update</h5>

@if ($errors->any())
    <div class="">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger" role="alert">{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <div class="form-group mt-3">
        <textarea class="form-control rounded-0" id="statusUpdate" name="body" rows="3" placeholder="Status update"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary rounded-0 mr-2">Post</button>
    <button type="button" class="btn btn-link ml-auto">Add photos</button>
</form>
<hr>