@extends('admin.layouts.app')

@section('content')
	
	<div>最新审核状态：{{ $message }}</div>
	</br>
	<a href="javascript:;" onclick="uploadCode()">上传代码</a>
	<a href="/auth_mini_chat">提交审核</a>
	<a href="">发布代码</a>
	
	<img src="" id="preview_img">
	<div>审核列表</div>


@endsection

@section('scripts')
    <script type="text/javascript">
    	function uploadCode(){
    		$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/zcjy/ajax/mini_chat_upload_code',
                type:'post',
                success:function(data){
                    if (data.code == 0) {
                    	$('#preview_img').attr('src', data.message);
                  	}else{
                    	layer.msg(data.message, {icon: 5});
                  	}
                }
            });
    	}
    </script>
@endsection