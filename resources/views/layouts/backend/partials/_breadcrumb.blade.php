<div class="page-title-box">
    <div class="float-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('app.dashboard') }}">{{ config('app.name') }}</a></li>
            <?php $link = "" ?>
            <li class="breadcrumb-item"><a href="{{ $link != "" ? route("$link") : "" }}">{{ $previous ?? '' }}</a></li>
            <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title ?? ''}}</h4>
</div><!--end page-title-box-->
