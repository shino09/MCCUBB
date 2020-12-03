@extends('layouts.admin')
    @include('alerts.success')

    @section('content')


<div class="container-fluid">
    <div class="row"></div>
    <div class="row">
        <div class="col-md-30"></div>
        <div class="col-md-60">
            <div id="content"></div>
        </div>
        <div class="col-md-30"></div>
    </div>
    <div class="loading"></div>
</div>
<!-- JavaScripts -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
<script>
    function ajaxLoad(filename, content) {
        content = typeof content !== 'undefined' ? content : 'content';
        $('.loading').show();
        $.ajax({
            type: "GET",
            url: filename,
            contentType: false,
            success: function (data) {
                $("#" + content).html(data);
                $('.loading').hide();
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
    $(document).ready(function () {
        ajaxLoad('taller/list');
    });
</script>
@stop