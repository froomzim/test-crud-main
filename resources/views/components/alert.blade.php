<div>
    @if (\Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{!! \Session::get('error') !!}</p>
    </div>
    @endif
    @if (\Session::has('message'))
    <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        <li>{!! \Session::get('message') !!}</li>
    </ul>
    </div>
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        <li>{!! \Session::get('message') !!}</li>
    </ul>
    </div>
    @endif
</div>
