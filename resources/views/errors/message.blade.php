@if(session('failed'))
    <div class="alert alert-danger" role="alert">
        <strong>{{session('failed')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="icon-close" aria-hidden="true"></span>
            </button>
    </div>
@elseif(session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="icon-close" aria-hidden="true"></span>
            </button>
    </div>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            <strong>{{ $error }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="icon-close" aria-hidden="true"></span>
            </button>
        </div>
    @endforeach
@endif