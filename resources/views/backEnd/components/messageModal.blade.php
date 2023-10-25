@if ($message = Session::get('success'))
<div class="toast-container position-fixed top-0 end-0 p-3 z-2 ">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true">
        <div class="toast-header bg-success text-white">
            <i class="fa-regular fa-circle-check me-2  text-15px"></i>
            <strong class="me-auto ">Success</strong>
            <small>1 detik yang lalu</small>
            <button type="button" class="x-button" data-bs-dismiss="toast" aria-label="Close"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
</div>

@elseif ($message = Session::get('error'))
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true">
        <div class="toast-header bg-danger text-white">
            <i class="fa-solid fa-circle-xmark me-2 text-15px"></i>
            <strong class="me-auto">Error</strong>
            <small>1 detik yang lalu</small>
            <button type="button" class="x-button" data-bs-dismiss="toast" aria-label="Close"><i
                    class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
</div>
@endif