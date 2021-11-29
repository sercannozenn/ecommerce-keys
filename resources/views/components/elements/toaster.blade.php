<div class="toast fade hide" data-delay="3000">
    <div class="toast-header">
        <i class="anticon anticon-info-circle text-primary m-r-5"></i>
        <strong class="mr-auto">{{ session()->get('result')['title'] }}</strong>
        <small class="text-muted">just now</small>
        <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ session()->get('result')['message'] }}
    </div>
</div>
