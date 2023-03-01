<form method="POST" action="@if($edit) {{ route('post.update', $post) }} @else {{ route('post.store') }} @endif">
    @csrf
    @if($edit)
        @method('PATCH')
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titel</label>
        <input type="text"
               class="form-control"
               value="{{ $edit ? old('title', $post->title) : old('title') }}"
               id="title"
               name="title"
        >
        @error('title') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Text</label>
        <textarea class="form-control" id="text" name="text">
{{ $edit ? old('text', $post->text) : old('text') }}
        </textarea>
        @error('text') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <div class="mb-3">
        <label for="categories" class="form-label">Kategorien</label>
        <select name="categories[]" id="categories" class="form-control" multiple>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('categories') <p class="text-danger">{{ $message }}</p> @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{ $edit ? 'Post editieren' : 'Posten' }}</button>
</form>
