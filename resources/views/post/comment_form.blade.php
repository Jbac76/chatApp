<div>
    <form action="{{ route('comment.store', [$post->id]) }}" method="POST">
        @csrf
        <div class="input-group mb-3 rounded-0">
            <input type="text" class="form-control rounded-0" name="comment" placeholder="Comment">
            <div class="input-group-append rounded-0">
              <button class="btn btn-outline-secondary rounded-0" type="submit">Comment</button>
            </div>
        </div>
    </form>
</div>