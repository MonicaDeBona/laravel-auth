<form action="{{ route($routeName, $project) }}" method="POST" class="p-5">
    @csrf
    @method($method)
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </li>
            </ul>
        </div>
    @endif
    <h5 class="mb-4">
        Author: <span class="fw-semibold">{{ Auth::user()->name }} </span>
    </h5>

    <div class="mb-3">
        <label for="project_title" class="form-label">Project Title</label>
        <input type="text" class="form-control" id="project_title" placeholder="Insert project's title" name="title"
            value="{{ old('title', $project->title) }}">
    </div>

    <div class="mb-3">
        <label for="project_date" class="form-label">Project date</label>
        <input type="date" class="form-control" id="project_date" name="project_date"
            value="{{ old('project_date', $project->project_date) }}">
    </div>
    <div class="mb-3">
        <label for="project_content" class="form-label">Project content</label>
        <textarea class="form-control" id="project_content" rows="10" name="content">{{ old('content', $project->content) }}</textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Create new project
        </button>
    </div>
</form>
