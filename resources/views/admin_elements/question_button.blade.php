<div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('quize.index') }}" class="btn btn-outline-success btn-sm">Quize</a>
            <a href="{{ route('question.create', $quize->id) }}" class="btn btn-outline-primary btn-sm">Add Question</a>
            <a href="{{ route('question.view', $quize->id) }}" class="btn btn-outline-info btn-sm">View</a>
            <a href="{{ route('question.all', $quize->id) }}" class="btn btn-outline-dark btn-sm">Questions</a>

        </div>
    </div>
</div>
